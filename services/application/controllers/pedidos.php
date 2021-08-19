<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedidos extends MY_Controller {

    protected $data = array(
        'active' => 'pedidos'
    );

    public function listar_pedidos() {
        $this->load_view('pedidos/listar_pedidos', $this->data);
    }

    public function add_pedido() {
        $this->data['comunas'] = $this->app_model->get_comunas();
        $this->load_view('pedidos/add_pedido', $this->data);
    }

    public function add_detalle_pedidos(){
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');

        //--- Validamos post ---//
        if ($_POST) {

            //--- Obtencion de los datos ---//
            $idPedido = $this->input->post('idPedido_formSolicitudEnvio', true);

            if ($idPedido == "") {
                $idCliente = $this->input->post('idClienteEnvio_formSolicitudEnvio', true);
                $telefono = $this->input->post('telefono_formSolicitudEnvio', true);
                $empresa = $this->input->post('empresa_formSolicitudEnvio', true);
                $direccion = $this->input->post('direccion_formSolicitudEnvio', true);
                $idComuna = $this->input->post('comuna_formSolicitudEnvio', true);
                $fechaRetiro = $this->input->post('fechaRetiro_formSolicitudEnvio', true);
                $horaDesde = $this->input->post('horaDesde_formSolicitudEnvio', true);
                $horaHasta = $this->input->post('horaHasta_formSolicitudEnvio', true);

                //--- Agregamos el pedido a la bd porque no exite nada registrado y de esta forma obtenemos el id del pedido ---//
                $add_pedido = $this->app_model->add_pedido($idCliente, $telefono, $empresa, $direccion, $idComuna, $fechaRetiro, $horaDesde, $horaHasta);
                $ultimo_pedido = $this->app_model->get_ultimo_pedido();
                $idPedido = $ultimo_pedido[0]['idPedido'];
            }
            
            if ($idPedido != "") {
                $nombreReceptor = $this->input->post('nombreReceptor_formSolicitudEnvio', true);
                $telefonoDespacho = $this->input->post('telefonoDespacho_formSolicitudEnvio', true);
                $direccionDespacho = $this->input->post('direccionDespacho_formSolicitudEnvio', true);
                $comunaDespacho = $this->input->post('comunaDespacho_formSolicitudEnvio', true);
                $fechaDespachoEstimada = $this->input->post('fechaDespachoEstimada_formSolicitudEnvio', true);
                $horaDesdeDespacho = $this->input->post('horaDesde1_formSolicitudEnvio', true);
                $horaHastaDespacho = $this->input->post('horaHasta1_formSolicitudEnvio', true);
                $cantidad = $this->input->post('cantidad_formSolicitudEnvio', true);
                $tamaño = $this->input->post('tamaño_producto', true);
                $observacion = $this->input->post('observacion_pedido', true);

                if(empty($horaHastaDespacho)) {
                    $horaDesdeDespacho = "00:00";
                }
                if(empty($horaHastaDespacho)){
                    $horaHastaDespacho = "00:00";
                }
                //--- Obtenemos la zona de la comuna para el precio a cobrar ---//
                $zona = $this->app_model->get_zona_by_idComuna($comunaDespacho);
                $precio = $zona[0]['precio'];

                //--- Agregarmos un pedido al detalle del pedido general ---//
                $add_detalle_pedido = $this->app_model->add_detalle_pedido($idPedido, $nombreReceptor, $telefonoDespacho, $direccionDespacho, $comunaDespacho, $fechaDespachoEstimada, $horaDesdeDespacho, $horaHastaDespacho, $cantidad, $tamaño, $precio, $observacion);
                $ultimo_detalle_pedido = $this->app_model->get_ultimo_detalle_pedido();
                
                //--- Consultas para el armado de la tabla ---//
                $comuna = $this->app_model->get_comuna_by_idComuna($comunaDespacho);
                if ($tamaño == 1){
                    $nombreTamaño = "Grande";
                } else if ($tamaño == 2) {
                    $nombreTamaño = "Mediano";
                } else if ($tamaño == 3) {
                    $nombreTamaño = "Pequeño";
                }
                
                //--- Validamos si se tienen los datos y el registro realizado correctamente ---//
                if ($add_detalle_pedido && $comuna && $tamaño) {
                    $msg = "Se inserto el pedido con exito";
                    $dato = array("valid" => true, "msg" => $msg, "idPedido" => $idPedido, "idDetallePedido" => $ultimo_detalle_pedido[0]['idDetallePedido'], "nombreReceptor" => $nombreReceptor, "tamaño" => $nombreTamaño, "cantidad" => $cantidad, 'comuna' => $comuna[0]['nombre'], "precio" => $precio);
                } else {
                    $msg = "Error al insertar el pedido, vuelva a intentarlo";
                    $dato = array("valid" => false, "msg" => $msg);
                }
            } else {
                $msg = "Error el id del pedido esta vacio, vuelva a intentarlo";
                $dato = array("valid" => false, "msg" => $msg);
            }
        } else {

            $msg = "Error de sistema. Contacte con el Administrador.";
            $dato = array("valid" => false, "msg" => $msg);
        }

        echo json_encode($dato);
    }

    public function add_pedido_final(){
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');

        //--- Validamos post ---//
        if ($_POST) {
            $idPedido = $this->input->post('idPedido', true);    
            $montoTotal = $this->input->post('montoTotal', true);
            $cantidadPedidos = $this->input->post('cantidadPedidos', true);

            //--- Validacion de los datos ---//
            if (!empty($idPedido) &&
                !empty($montoTotal) &&
                !empty($cantidadPedidos)) {

                if($cantidadPedidos < 5){
                    $montoTotal = $montoTotal + (1000 * $cantidadPedidos);
                }

                //--- Finalizamos el pedido general ---//
                $add_pedido_final = $this->app_model->add_pedido_final($idPedido, $montoTotal);
                                    
                //--- Validamos si se tienen los datos y el registro realizado correctamente ---//
                if ($add_pedido_final) {
                    $msg = "Se finalizo el pedido con exito";
                    $dato = array("valid" => true, "msg" => $msg, "montoTotal" => $montoTotal, "cantidadPedidos" => $cantidadPedidos);
                } else {
                    $msg = "Error al finalizar el pedido, vuelva a intentarlo";
                    $dato = array("valid" => false, "msg" => $msg, "montoTotal" => 0, "idPedido" => $idPedido);
                }
            } else {
                $msg = "Algun dato obligatorio falta, vuelva a intentarlo";
                $dato = array("valid" => false, "msg" => $msg, "montoTotal" => 0);
            }
        } else {

            $msg = "Error de sistema. Contacte con el Administrador.";
            $dato = array("valid" => false, "msg" => $msg, "montoTotal" => 0);
        }

        echo json_encode($dato);
    }
 
    public function delete_detalle_pedido(){
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');

        //--- Validamos post ---//
        if ($_POST) {
            $idDetallePedido = $this->input->post('idDetallePedido', true);

            //--- Validacion de los datos ---//
            if (!empty($idDetallePedido)) {
                //--- Eliminamos el detalle del pedido ---//
                $detalle_pedido = $this->app_model->get_detalle_pedido_by_idDetallePedido($idDetallePedido);
                
                if ($detalle_pedido) {
                    //--- Eliminamos el detalle del pedido ---//
                    $delete_detalle_pedido = $this->app_model->delete_detalle_pedido($idDetallePedido);
                                        
                    //--- Validamos si el registro realizado correctamente ---//
                    if ($delete_detalle_pedido) {
                        $msg = "Se quito el pedido con exito";
                        $dato = array("valid" => true, "msg" => $msg, "montoTotal" => floatval($detalle_pedido[0]['precio']) );
                    } else {
                        $msg = "Error al quitar el pedido, vuelva a intentarlo";
                        $dato = array("valid" => false, "msg" => $msg, "montoTotal" => 0, "idDetallePedido" => $idDetallePedido);
                    }
                } else {
                    $msg = "Error al obtener el pedido, vuelva a intentarlo";
                    $dato = array("valid" => false, "msg" => $msg, "montoTotal" => 0, "idDetallePedido" => $idDetallePedido);
                }
            } else {
                $msg = "Algun dato obligatorio falta, vuelva a intentarlo";
                $dato = array("valid" => false, "msg" => $msg, "montoTotal" => 0);
            }
        } else {
            $msg = "Error de sistema. Contacte con el Administrador.";
            $dato = array("valid" => false, "msg" => $msg, "montoTotal" => 0);
        }

        echo json_encode($dato);
    }
 
    public function listar_pedidos_table() {
        //--- Declaracion del arreglo ---//
        $dato = [];

        //--- datos ---//
        $userdata = $this->session->all_userdata();
        if ($userdata['idNivel'] == 1) {
            $pedidos = $this->app_model->get_pedido();
        } else {
            $pedidos = $this->app_model->get_pedido_by_idUsuario($userdata['idUsuario']);
        }

        if ($pedidos) {
            foreach ($pedidos as $key => $value) {
                $opcion = '';

                $dato[] = array(
                    $value['idPedido'],
                    $value['apellidoUsuario'] . ", " . $value['nombreUsuario'],
                    $value['nombreComuna'],
                    $value['fechaRetiro'],
                    $value['horaRetiroDesde'] . " - " . $value['horaRetiroHasta'],
                    $opcion,
                    "DT_RowId" => $value['idPedido']
                );
            }
        
        }

        $aa = array(
            'sEcho' => 1,
            'iTotalRecords' => count($dato),
            'iTotalDisplayRecords' => 10,
            'aaData' => $dato
        );

        echo json_encode($aa);
    }

}

?>
