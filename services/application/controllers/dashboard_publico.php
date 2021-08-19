<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_publico extends MY_Controller {

    protected $data = array(
        'active' => 'dashboard_public'
    );

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['active'] = 'dashboard_public';
        $this->data['comunas'] = $this->app_model->get_comunas();
        $this->load_view_public('dashboard_public', $this->data);
    }

    public function cotizar(){
      $msg ="";
        if($_POST){
            $cantidad = $this->input->post('cantidadCajas', true);
            $tamaño = $this->input->post('ComboTamañoCaja', true);
            $comunaOrigen = $this->input->post('comboDesde', true);
            $comunaDestino = $this->input->post('comboHasta', true);
            $msg = "OK";
            $comuna_origen = $this->app_model->get_comunasID($comunaOrigen);
            $comuna_destino = $this->app_model->get_comunasID($comunaDestino);

            $precio = $this->app_model->get_zona_by_idComuna($comunaDestino); //Metodo que devuelve el precio de la comunaDestino
            //$idZonasJS = $_REQUEST['zonas']
            //$precio = $this->app_model->get_comuna_zona_precio($idZonasJS);


            //TRAER PRECIO DE COMUNA DE DESTINO y CALCULAR

            $precio = $precio[0]['precio'] + 1000 ;//precio comuna destino + 1000

            $dato = array("valid" => true, "msg" => $msg , "comunaOrigen" => $comuna_origen,"comunaDestino" => $comuna_destino , "precio" => $precio, "cantidad" => $cantidad);


        }else {
          $msg = "None";
          $dato = array("valid" => false, "msg" => $msg );
        }
        echo json_encode($dato);
    }
}
