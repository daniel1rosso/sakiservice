<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_model extends CI_Model {

    public function compare_user_password($user, $password) {
        $values = array(
            'usuario' => $user,
            'password' => $password
        );
        $this->db->where($values);
        $result = $this->db->get('usuarios');
        return ($result != '') ? $result->result_array() : false;
    }

    public function get_usuario_info($idUsuario) {
        $this->db->select('*');
        $this->db->from('usuarios');

        $this->db->where('idUsuario', $idUsuario);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function set_usuario($usuario, $password, $nombre, $apellido, $email, $telefono, $provincia, $localidad) {
        $values = array(
            'usuario' => $usuario,
            'password' => $password,
            'nombreCompleto' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'idProvincia' => $provincia,
            'idLocalidad' => $localidad
        );
        $result = $this->db->insert('usuarios', $values);
    }

    public function get_sexo() {
        $this->db->select('*');
        $this->db->from('sexo');
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function set_log_usuario($idUser, $nombreUser, $idNivel) {
        $values = array(
            'idUsuarioLog' => $idUser,
            'usuarioLog' => $nombreUser,
            'idNivel' => $idNivel
        );
        $result = $this->db->insert('session_logs', $values);
    }

    public function get_usuario_byId($idUsuario) {
        $this->db->select('
            idUsuario,
            nombreCompleto,
            apellido,
            usuario,
            password,
            email,
            telefono,
            idComuna,
            direccion,
            idNivel

        ');
        $this->db->from('usuarios');
        $this->db->where('usuarios.eliminado', 0);
        $this->db->where('usuarios.idUsuario', $idUsuario);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function get_usuario_byIdGen($idGenUsuario) {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('eliminado', 0);
        $this->db->where('idGenUsuario', $idGenUsuario);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function get_usuario_byUsuario($nombreUsuario) {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('eliminado', 0);
        $this->db->where('usuario', $nombreUsuario);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? true : false;
    }

    public function delete_usuario_by_idUsuario($idUsuario) {

        $values = array(
            'eliminado' => 1
        );

        $this->db->where('idUsuario', $idUsuario);
        $result = $this->db->update('usuarios', $values);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function update_usuario($id, $nombre, $apellido, $nombreUsuario, $password, $email, $telefono, $comuna, $direccion, $nivel) {
        $values = array(
            'nombreCompleto' => $nombre,
            'apellido' => $apellido,
            'usuario' => $nombreUsuario,
            'password' => $password,
            'email' => $email,
            'telefono' => $telefono,
            'eliminado' => 0,
            'idComuna' => $comuna,
            'direccion' => $direccion,
            'idNivel' => $nivel
        );
        $this->db->where('idUsuario', $id);
        $this->db->update('usuarios', $values);

        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function add_usuario($nombre, $apellido, $nombreUsuario, $password, $email, $telefono, $idGenUsuario, $nivel, $comuna, $direccion) {
        $values = array(
            'email' => $email,
            'telefono' => $telefono,
            'nombreCompleto' => $nombre,
            'apellido' => $apellido,
            'usuario' => $nombreUsuario,
            'password' => $password,
            'idGenUsuario' => $idGenUsuario,
            'idNivel' => $nivel,
            'idComuna' => $comuna,
            'direccion' => $direccion,
            'eliminado' => 0
        );
        $result = $this->db->insert('usuarios', $values);

        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function get_usuarios() {
        $this->db->select('
            idUsuario,
            nombreCompleto,
            apellido,
            usuario,
            password,
            usuarios.eliminado,
            email,
            telefono
        ');
        $this->db->from('usuarios');
        $this->db->where('usuarios.eliminado', 0);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function update_usuario_perfil($id, $nombreImg)
    {
        $values = array(
            'idUsuario' => $id,
            'imgPerfil' => $nombreImg,
            'eliminado' => 0
        );
        $this->db->where('idUsuario', $id);
        $result = $this->db->update('usuarios', $values);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    /**
     * Obtencion de los niveles del sistema
     *
     * @return void
     */
    public function get_niveles() {
        $this->db->from('niveles');
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    /**
     * Obtenemos las comunas con el precio de la zona
     *
     * @return void
     */
    public function get_comunas(){
        $this->db->select('
        c.idComuna,
        c.nombre,
        c.idZona,
        z.precio as precioZona
        ');
        $this->db->from('comunas as c');
        $this->db->join('zonas as z', 'z.idZona = c.idZona');
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    public function get_comunasID($idComuna) {
        $this->db->select('*');
        $this->db->from('comunas');
        $this->db->where('idComuna', $idComuna);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function get_zonaID($idComuna) {
        $this->db->select('idZona');
        $this->db->from('comunas');
        $this->db->where('idComuna', $idComuna);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    /**
     * Add New Pedido
     *
     * @param [type] $idCliente
     * @param [type] $telefono
     * @param [type] $empresa
     * @param [type] $direccion
     * @param [type] $idComuna
     * @param [type] $fechaRetiro
     * @param [type] $horaDesde
     * @param [type] $horaHasta
     * @return void
     */
    public function add_pedido($idCliente, $telefono, $empresa, $direccion, $idComuna, $fechaRetiro, $horaDesde, $horaHasta) {
        $values = array(
            'idCliente' => $idCliente,
            'telefono' => $telefono,
            'empresa' => $empresa,
            'direccion' => $direccion,
            'idComuna' => $idComuna,
            'fechaRetiro' => $fechaRetiro,
            'horaRetiroDesde' => $horaDesde,
            'horaRetiroHasta' => $horaHasta,
            'eliminado' => 0
        );
        $result = $this->db->insert('pedidos', $values);

        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function get_ultimo_pedido() {
        $this->db->from('pedidos');
        $this->db->order_by('idPedido', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    /**
     * Add New Detalle Pedido
     *
     * @param [type] $idPedido
     * @param [type] $nombreReceptor
     * @param [type] $telefonoDespacho
     * @param [type] $direccionDespacho
     * @param [type] $comunaDespacho
     * @param [type] $fechaDespachoEstimada
     * @param [type] $horaDesdeDespacho
     * @param [type] $horaHastaDespacho
     * @param [type] $cantidad
     * @param [type] $observacion
     * @return void
     */
    public function add_detalle_pedido($idPedido, $nombreReceptor, $telefonoDespacho, $direccionDespacho, $comunaDespacho, $fechaDespachoEstimada, $horaDesdeDespacho, $horaHastaDespacho, $cantidad, $idTamaño, $precio, $observacion) {
        $values = array(
            'idPedido' => $idPedido,
            'nombreDestinatario' => $nombreReceptor,
            'telefono' => $telefonoDespacho,
            'direccion' => $direccionDespacho,
            'idComuna' => $comunaDespacho,
            'fechaDespacho' => $fechaDespachoEstimada,
            'horaDespachoDesde' => $horaDesdeDespacho,
            'horaDespachoHasta' => $horaHastaDespacho,
            'cantidad' => $cantidad,
            'idTamaño' => $idTamaño,
            'precio' => $precio,
            'observaciones' => $observacion,
            'idEstado' => 1,
            'eliminado' => 0
        );
        $result = $this->db->insert('pedidos_detalle', $values);

        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function get_ultimo_detalle_pedido() {
        $this->db->from('pedidos_detalle');
        $this->db->order_by('idDetallePedido', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function get_detalle_pedido_by_idDetallePedido($idDetallePedido) {
        $this->db->from('pedidos_detalle');
        $this->db->where('idDetallePedido', $idDetallePedido);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function get_comuna_by_idComuna($idComuna) {
        $this->db->from('comunas');
        $this->db->where('idComuna', $idComuna);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function get_zona_by_idComuna($idComuna) {
        $this->db->select('z.precio');
        $this->db->from('comunas as c');
        $this->db->join('zonas as z', 'z.idZona = c.idZona');
        $this->db->where('c.idComuna', $idComuna);
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function add_pedido_final($idPedido, $montoTotal){

        $values = array(
            'precioTotal' => $montoTotal
        );

        $this->db->where('idPedido', $idPedido);
        $result = $this->db->update('pedidos', $values);
        return ($this->db->affected_rows() > 0) ? true : false;
    }


    public function delete_detalle_pedido($idDetallePedido){

        $values = array(
            'eliminado' => 1
        );

        $this->db->where('idDetallePedido', $idDetallePedido);
        $result = $this->db->update('pedidos_detalle', $values);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function get_pedido() {
        $this->db->select('p.idPedido,p.idCliente,p.telefono,p.empresa,p.direccion,p.idComuna,p.fechaRetiro,p.horaRetiroDesde,p.horaRetiroHasta,p.precioTotal,p.eliminado,p.fechaAlta,u.nombreCompleto as nombreUsuario,u.apellido as apellidoUsuario,c.nombre as nombreComuna');
        $this->db->from('pedidos as p');
        $this->db->where('p.eliminado', 0);
        $this->db->where('p.precioTotal !=', 0);
        $this->db->order_by('p.idPedido', 'ASC');
        $this->db->join('usuarios as u', 'u.idUsuario = p.idCliente');
        $this->db->join('comunas as c', 'c.idComuna = p.idComuna');
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function get_pedido_by_idUsuario($idUsuario) {
        $this->db->select('p.idPedido,p.idCliente,p.telefono,p.empresa,p.direccion,p.idComuna,p.fechaRetiro,p.horaRetiroDesde,p.horaRetiroHasta,p.precioTotal,p.eliminado,p.fechaAlta,u.nombreCompleto as nombreUsuario,u.apellido as apellidoUsuario,c.nombre as nombreComuna');
        $this->db->from('pedidos as p');
        $this->db->where('p.eliminado', 0);
        $this->db->where('p.precioTotal !=', 0);
        $this->db->where('p.idCliente', $idUsuario);
        $this->db->order_by('p.idPedido', 'ASC');
        $this->db->join('usuarios as u', 'u.idUsuario = p.idCliente');
        $this->db->join('comunas as c', 'c.idComuna = p.idComuna');
        $result = $this->db->get();

        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
}
