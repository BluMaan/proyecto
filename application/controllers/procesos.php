<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of procesos
 *
 * @author José
 */
class procesos extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('procesos_model');
        $this->load->library('grocery_CRUD');
//        if (!$this->session->userdata('id_usuario')) {
//            redirect('autentificacion');
//        }
    }

    public function cargos() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_cargos');
            $crud->set_subject('Cargos');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Cargos";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function personas() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_personas');
            $crud->set_subject('Personas');

            //creando un combo box de datos relacionados con otra tabla (DINÁMICOS)
            $crud->display_as('ID_CARGO', 'CARGO');
            $crud->set_relation('ID_CARGO', 'tab_cargos', 'CARGO');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Usuarios";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            //show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            echo $e->getMessage() . ' --- ' . $e->getTraceAsString();
        }
    }
    public function meses() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_meses');
            $crud->set_subject('Meses');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Registrar Mes";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            //show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            echo $e->getMessage() . ' --- ' . $e->getTraceAsString();
        }
    }
    
    public function pagos() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_pagos');
            $crud->set_subject('Pagos');

            //creando un combo box de datos relacionados con otra tabla (DINÁMICOS)
            $crud->display_as('ID_PERSONA','Cliente' );
            $crud->set_relation('ID_PERSONA', 'tab_personas', '{CEDULA} {NOMBRES} {APELLIDOS}');
            //$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
            $crud->set_relation_n_n('Meses', 'tab_pagos_mes', 'tab_meses', 'id_pago', 'ID_MES', 'mes', 'meses');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Registrar Pagos";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            //show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            echo $e->getMessage() . ' --- ' . $e->getTraceAsString();
        }
    }
    
    public function asistencia() {
        $datos['TITULO_PAGINA'] = "Listado de Estudiantes";
        $datos['PERSONAS'] = $this->procesos_model->getPersonas();
        $this->load->view('personas_list', $datos);
    }

    public function formulario018() {
        $datos['TITULO_PAGINA'] = "Listado de Personas";
        $datos['PERSONAS'] = $this->procesos_model->getPersonas();
        $this->load->view('personas_list', $datos);
    }

    public function editFormulario018($id_persona) {
        $datos['TITULO_PAGINA'] = "Editando Formulario 18";
        $datos['PERSONAS'] = $this->procesos_model->getPersonas();
        $actual = $this->procesos_model->getPersonas($id_persona);
        $datos['ACTUAL'] = $actual[0];
        $datos['ID_PERSONA'] = $id_persona;

        $matriz = array();
        $matriz2 = array();
        for ($i = 0; $i < 15; $i++) {
            $matriz[$i] = array("", "", "", "", "");
        }
        $datos['EXISTE'] = "NO";
        $result = $this->procesos_model->getFormulario18($id_persona);
        if ($result && count($result) > 0) {
            $datos['EXISTE'] = "SI";
            $matriz = array();
            for ($i = 0; $i < 15; $i++) {
                $val = $result[$i];
                $matriz[$i] = array($val->ITEM_VEIFICADO, $val->DESCRIPCION,
                    $val->CUMPLE, $val->OBSERVACIONES, $val->ID_PERSONA_VERIFICADOR);
            }
            //datos de experiencia
            for ($i = 15; $i < count($result); $i++) {
                  $val = $result[$i];
                $matriz2[] = array($val->CODIGO, $val->ITEM_VEIFICADO, $val->DESCRIPCION, $val->OBSERVACIONES);
            }
        }

        $datos['F18'] = $matriz;
        $datos['experiencia'] = $matriz2;
        $this->load->view('personas_edit_f018', $datos);
    }

    public function guardarFormulario() {
        $existe = $_REQUEST["existe"];
        $id_persona = $_REQUEST["id_persona"];
        $verificado_por = $_REQUEST["verificado_por"];
        $empresa = $_REQUEST['empresa'];
        $anios = $_REQUEST['anios'];
        $actividades = $_REQUEST['actividades'];
        $codigo = $_REQUEST['codigo'];

        if ($existe == "NO") {
            //ingresando datos generales
            for ($i = 1; $i <= 15; $i++) {
                $this->procesos_model->insertarFilaF18($id_persona, $i, $_REQUEST["fila_$i" . "_1"], $_REQUEST["fila_$i" . "_2"], $_REQUEST["fila_$i" . "_3"], $_REQUEST["fila_$i" . "_4"], $verificado_por);
            }
            //ingresando datos de experiencia laboral
            $codigo_inicial = 100;
            for ($i = 0; $i < count($empresa); $i++) {
                $this->procesos_model->insertarFilaF18($id_persona, $codigo_inicial, $empresa[$i], $anios[$i], "SE", $actividades[$i], $verificado_por);
                $codigo_inicial++;
            }
        } else {
            $codigo_maximo = $this->procesos_model->codigoMaximo($id_persona);
            $codigo_maximo = $codigo_maximo[0];
            $codigo_inicial = 100;
            if ($codigo_maximo->CODIGO > 15) {
                $codigo_inicial = $codigo_maximo->CODIGO + 1;
            }

            //actualizando datos generales
            for ($i = 1; $i <= 15; $i++) {
                $this->procesos_model->actulizarFilaF18($id_persona, $i, $_REQUEST["fila_$i" . "_1"], $_REQUEST["fila_$i" . "_2"], $_REQUEST["fila_$i" . "_3"], $_REQUEST["fila_$i" . "_4"], $verificado_por);
            }
            //actualizando e insertando datos de experiencia laboral
            for ($i = 0; $i < count($codigo); $i++) {
                if ($codigo[$i] == "NUEVO") {//nuevo
                    $this->procesos_model->insertarFilaF18($id_persona, $codigo_inicial, $empresa[$i], $anios[$i], "SE", $actividades[$i], $verificado_por);
                    $codigo_inicial++;
                } else {
                    $this->procesos_model->actulizarFilaF18($id_persona, $codigo[$i], $empresa[$i], $anios[$i], "SE", $actividades[$i], $verificado_por);
                }
            }
        }
        redirect('procesos/formulario018');
    }

}
