<?php

class ejemplo extends CI_Controller{
    
    public function maestro_detalle() {
        $datos['TITULO_PAGINA'] = "Listado de Personas";
        $this->load->view('template_maestro_detalle_view',$datos);
    }
    
}
