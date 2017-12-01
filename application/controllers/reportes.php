<?php

class reportes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('procesos_model');
    }

    public function reportepdf() {
        $this->load->helper('path');
        $font_directory = './application/libraries/fpdf/font/';
        set_realpath($font_directory);
        $this->load->library('fpdf');
        define('FPDF_FONTPATH', $font_directory);
        $this->fpdf->Open();
        $this->fpdf->AddPage("P"); //L:Horizontal o P:Vertical
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Cell(190, 6, utf8_decode("PRUEBA"), 0, 1, 'C');
        $this->fpdf->Output();
    }

    public function reporte_usuarios() {
        $this->load->helper('path');
        $font_directory = './application/libraries/fpdf/font/';
        set_realpath($font_directory);
        $this->load->library('fpdf');
        define('FPDF_FONTPATH', $font_directory);

        $this->fpdf->Open();
        $this->fpdf->AddPage("P"); //L:Horizontal o P:Vertical
        $this->fpdf->SetFont('Arial', 'B', 15);

        $this->fpdf->Image('./assets/imagenes/banner_reporte.jpg', 15, 5, 180);
        $this->fpdf->Cell(280, 6, "", 0, 1, 'C'); //280 HORI - 190 VER
        $this->fpdf->Ln(20);

        //TITULO DEL REPORTE
        $this->fpdf->SetFont('Arial', 'BU', 13);
        $this->fpdf->Cell(190, 12, utf8_decode("REPORTE DE USUARIOS"), 0, 1, 'C');

        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(143, 164, 225);
        $this->fpdf->Cell(10, 5, "", 0, 0, 'L');
        $this->fpdf->Cell(7, 5, "Nro", 1, 0, 'L', true);
//        $this->fpdf->Cell(45, 5, "NOMBRES", 1, 0, 'L', true);
//        $this->fpdf->Cell(45, 5, "APELLIDOS", 1, 0, 'L', true);
        $this->fpdf->Cell(45, 5, "NOMBRE USUARIO", 1, 0, 'L', true);
        $this->fpdf->Cell(35, 5, "ROL", 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial', '', 8);
        $this->fpdf->SetFillColor(214, 230, 151);
        $bandera = true;

        $i = 0;
        $altura = 5;
        $usuarios = $this->usuarios_model->get_usuarios();
        foreach ($usuarios as $user) {
            if ($i % 2 == 0)
                $this->fpdf->SetFillColor(255, 255, 255);
            else
                $this->fpdf->SetFillColor(218, 225, 247);

            //DATOS DE LA BASE
            $this->fpdf->Cell(10, 5, "", 0, 0, 'L');
            $this->fpdf->Cell(7, $altura, $i + 1, 1, 0, 'C', $bandera);
//            $this->fpdf->Cell(45, $altura, utf8_decode($user->NOMBRES), 1, 0, 'L', $bandera);
//            $this->fpdf->Cell(45, $altura, utf8_decode($user->APELLIDOS), 1, 0, 'L', $bandera);
            $this->fpdf->Cell(45, $altura, utf8_decode($user->NOMBRE_USUARIO), 1, 0, 'L', $bandera);
            $this->fpdf->Cell(35, $altura, utf8_decode($user->DESCRIPCION), 1, 1, 'L', $bandera);
            $i++;
        }
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 8);
        $this->fpdf->SetFillColor(255, 255, 255);
        $this->fpdf->Cell(10, 5, "", 0, 0, 'L');
        $this->fpdf->Cell(159, 5, "Total de registros: " . $i, 0, 1, 'L');

        $this->fpdf->Output();
    }

    public function reporte_f018($id_persona) {
        
        $result = $this->procesos_model->getFormulario18($id_persona);
        if(count($result)){
        
        $this->load->helper('path');
        $font_directory = './application/libraries/fpdf/font/';
        set_realpath($font_directory);
        $this->load->library('fpdf');
        define('FPDF_FONTPATH', $font_directory);

        $this->fpdf->Open();
        $this->fpdf->AddPage("L"); //L:Horizontal o P:Vertical
        $this->fpdf->SetFont('Arial', 'B', 15);

        $this->fpdf->Image('./assets/imagenes/itca.jpg', 15, 18, 30);
        $this->fpdf->Cell(280, 6, "", 0, 1, 'C'); //280 HORI - 190 VER
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Cell(45, 6, "", 0, 0, 'C');
        $this->fpdf->MultiCell(145, 6, utf8_decode("VERIFICACIÓN DEL CUMPLIMIENTO DEL PERFIL DEL PERSONAL DE CERTIFICACIÓN"), 1, 'C', 0);

        $alto = 7;
        $fuente = 9;

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(45, $alto-2, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto-2, utf8_decode("Código:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto-2, utf8_decode("ITCA-F018-$id_persona"), 1, 1, 'L', 0);

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(45, $alto-2, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto-2, utf8_decode("Versión :"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto-2, utf8_decode("1.1"), 1, 1, 'L', 0);

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(45, $alto-2, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto-2, utf8_decode("Fecha de Emisión:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $hoy = date("d/m/y");
        $this->fpdf->Cell(100, $alto-2, utf8_decode("" . $hoy), 1, 1, 'L', 0);

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(45, $alto-2, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto-2, utf8_decode("Fecha de Revisión :"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto-2, utf8_decode("" . $hoy), 1, 1, 'L', 0);

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(45, $alto-2, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto-2, utf8_decode("File :"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto-2, utf8_decode("F018"), 1, 1, 'L', 0);

        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->SetFillColor(143, 164, 225);

        //DESDE AQUI
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->SetFillColor(143, 164, 225);
        
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(7 + 3 * 45 + 38 + 80, $alto, utf8_decode("DATOS DE IDENTIFICACIÓN DEL CARGO"), 1, 1, 'C', true);

        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(80, $alto, "Item  Verificado", 1, 0, 'L', true);
        $this->fpdf->Cell(80, $alto, utf8_decode("Descripción"), 1, 0, 'L', true);
        $this->fpdf->Cell(20, $alto, "Cumple", 1, 0, 'L', true);
        $this->fpdf->Cell(80, $alto, utf8_decode("Observación"), 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial', '', $fuente - 1);
        $this->fpdf->SetFillColor(214, 230, 151);
        
        $id_persona_verificador = 0;
        $bandera = true;
        $i = 0;
        $altura = 5;
        $result = $this->procesos_model->getFormulario18Limites($id_persona, 1, 7);
        foreach ($result as $fila) {
            if ($i % 2 == 0)
                $this->fpdf->SetFillColor(255, 255, 255);
            else
                $this->fpdf->SetFillColor(218, 225, 247);


            $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->ITEM_VEIFICADO), 1, 0, 'L', true);
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->DESCRIPCION), 1, 0, 'L', true);
            $this->fpdf->Cell(20, $alto, utf8_decode($fila->CUMPLE), 1, 0, 'L', true);
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->OBSERVACIONES), 1, 1, 'L', true);
            $id_persona_verificador = $fila->ID_PERSONA_VERIFICADOR;
            $i++;
        }
        $this->fpdf->Ln();
        
        //DESDE AQUI
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->SetFillColor(143, 164, 225);
        
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(7 + 3 * 45 + 38 + 80, $alto, utf8_decode("FORMACIÓN REQUERIDA"), 1, 1, 'C', true);

        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(80, $alto, "Item  Verificado", 1, 0, 'L', true);
        $this->fpdf->Cell(80, $alto, utf8_decode("Descripción"), 1, 0, 'L', true);
        $this->fpdf->Cell(20, $alto, "Cumple", 1, 0, 'L', true);
        $this->fpdf->Cell(80, $alto, utf8_decode("Observación"), 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial', '', $fuente - 1);
        $this->fpdf->SetFillColor(214, 230, 151);
        
        $bandera = true;
        $i = 0;
        $altura = 5;
        $result = $this->procesos_model->getFormulario18Limites($id_persona, 8, 9);
        foreach ($result as $fila) {
            if ($i % 2 == 0)
                $this->fpdf->SetFillColor(255, 255, 255);
            else
                $this->fpdf->SetFillColor(218, 225, 247);


            $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->ITEM_VEIFICADO), 1, 0, 'L', true);
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->DESCRIPCION), 1, 0, 'L', true);
            $this->fpdf->Cell(20, $alto, utf8_decode($fila->CUMPLE), 1, 0, 'L', true);
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->OBSERVACIONES), 1, 1, 'L', true);
            $i++;
        }
        $this->fpdf->Ln();
        
        
         //DESDE AQUI
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->SetFillColor(143, 164, 225);
        
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(7 + 3 * 45 + 38 + 80, $alto, utf8_decode("EXPERIENCIA LABORAL REQUERIDA"), 1, 1, 'C', true);

        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(80, $alto, "Item Verificado", 1, 0, 'L', true);
        $this->fpdf->Cell(80, $alto, utf8_decode("Descripción"), 1, 0, 'L', true);
        $this->fpdf->Cell(20, $alto, "Cumple", 1, 0, 'L', true);
        $this->fpdf->Cell(80, $alto, utf8_decode("Observación"), 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial', '', $fuente - 1);
        $this->fpdf->SetFillColor(214, 230, 151);
        
        $bandera = true;
        $i = 0;
        $altura = 5;
        $result = $this->procesos_model->getFormulario18Limites($id_persona, 10, 10);
        foreach ($result as $fila) {
            if ($i % 2 == 0)
                $this->fpdf->SetFillColor(255, 255, 255);
            else
                $this->fpdf->SetFillColor(218, 225, 247);

            $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->ITEM_VEIFICADO), 1, 0, 'L', true);
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->DESCRIPCION), 1, 0, 'L', true);
            $this->fpdf->Cell(20, $alto, utf8_decode($fila->CUMPLE), 1, 0, 'L', true);
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->OBSERVACIONES), 1, 1, 'L', true);
            $i++;
        }
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->SetFillColor(143, 164, 225);
        
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(100, $alto,"Empresa y Puesto", 1, 0, 'L', true);
        $this->fpdf->Cell(30, $alto, utf8_decode("Años Laborados"), 1, 0, 'L', true);
        $this->fpdf->Cell(130, $alto, utf8_decode("Actividades"), 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial', '', $fuente - 1);
        $this->fpdf->SetFillColor(214, 230, 151);
        
        $bandera = true;
        $i = 0;
        $altura = 5;
        $result = $this->procesos_model->getFormulario18Limites($id_persona, 100, 2000);
        foreach ($result as $fila) {
            if ($i % 2 == 0)
                $this->fpdf->SetFillColor(255, 255, 255);
            else
                $this->fpdf->SetFillColor(218, 225, 247);
            $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
            $this->fpdf->Cell(100, $alto, utf8_decode($fila->ITEM_VEIFICADO), 1, 0, 'L', true);
            $this->fpdf->Cell(30, $alto, utf8_decode($fila->CUMPLE), 1, 0, 'L', true);
            $this->fpdf->Cell(130, $alto, utf8_decode($fila->OBSERVACIONES), 1, 1, 'L', true);
            $i++;
        }
        
        $this->fpdf->Ln();
        
        //DESDE AQUI
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->SetFillColor(143, 164, 225);
        
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(7 + 3 * 45 + 38 + 80, $alto, utf8_decode("CONOCIMIENTOS ESPECÍFICOS"), 1, 1, 'C', true);

        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(160, $alto, "Item Verificado", 1, 0, 'L', true);
        $this->fpdf->Cell(20, $alto, "Cumple", 1, 0, 'L', true);
        $this->fpdf->Cell(80, $alto, utf8_decode("Observación"), 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial', '', $fuente - 1);
        $this->fpdf->SetFillColor(214, 230, 151);
        
        $bandera = true;
        $i = 0;
        $altura = 5;
        $result = $this->procesos_model->getFormulario18Limites($id_persona, 11, 15);
        foreach ($result as $fila) {
            if ($i % 2 == 0)
                $this->fpdf->SetFillColor(255, 255, 255);
            else
                $this->fpdf->SetFillColor(218, 225, 247);
            $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
            $this->fpdf->Cell(160, $alto, utf8_decode($fila->ITEM_VEIFICADO), 1, 0, 'L', true);
            $this->fpdf->Cell(20, $alto, utf8_decode($fila->CUMPLE), 1, 0, 'L', true);
            $this->fpdf->Cell(80, $alto, utf8_decode($fila->OBSERVACIONES), 1, 1, 'L', true);
            $i++;
        }
        $this->fpdf->Ln();

        $texto = "Declaro bajo juramente, bajo las prevenciones de Ley que la información aquí consignada es verídica y de mi entera responsabilidad; por lo cual, la INSTITUTO TECNOLÓGICO SUPERIOR 'JOSÉ CHIRIBOGA GRIJALVA'  podrá verificar esta información en cualquier momento, y en caso de comprobarse falsedad en la misma, podrán iniciarse las acciones administrativas, civiles y penales que ampara la legislación ecuatoriana vigente.";
         
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->MultiCell(260, 6, utf8_decode($texto), 1, 'L', 0);
        
        //---------------------------------------------------------------
        $this->fpdf->Ln();
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
         $this->fpdf->SetFillColor(143, 164, 225);
        $this->fpdf->MultiCell(145, 6, utf8_decode("PERSONAL INVOLUCRADO EN EL PROCESO DE CERTIFICACIÓN"), 1, 'C', true);
        
        $persona = $this->procesos_model->getPersonas($id_persona);
        $persona = $persona[0];
       
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto+10, utf8_decode("Firma:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto+10, utf8_decode(""), 1, 1, 'L', 0);

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("NOMBRES COMPLETOS:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->APELLIDOS.' '.$persona->NOMBRES), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("CARGO:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->CARGO), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("No. DE TELÉFONO:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->NRO_TELEFONO), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("CORREO ELECTRÓNICO:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->CORREO_ELECTRONICO), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("FECHA:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($hoy), 1, 1, 'L', 0);
        
        $this->fpdf->Ln();
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->MultiCell(145, 6, utf8_decode("VERIFICADO POR"), 1, 'C', TRUE);
        
        $persona = $this->procesos_model->getPersonas($id_persona_verificador);
        $persona = $persona[0];
       
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto+10, utf8_decode("Firma:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto+10, utf8_decode(""), 1, 1, 'L', 0);

        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("NOMBRES COMPLETOS:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->APELLIDOS.' '.$persona->NOMBRES), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("CARGO:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->CARGO), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("No. DE TELÉFONO:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->NRO_TELEFONO), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("CORREO ELECTRÓNICO:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($persona->CORREO_ELECTRONICO), 1, 1, 'L', 0);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'C');
        $this->fpdf->Cell(45, $alto, utf8_decode("FECHA:"), 1, 0, 'L', 0);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(100, $alto, utf8_decode($hoy), 1, 1, 'L', 0);
        
        $this->fpdf->Ln();
        
        //DESDE AQUI
        $this->fpdf->SetFont('Arial', 'B', $fuente);
         $this->fpdf->SetFillColor(143, 164, 225);
        
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(7 + 3 * 45 + 38 + 80, $alto, utf8_decode("CONTROL DE EMISIÓN"), 1, 1, 'C', true);

        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(50, $alto, "", 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto, utf8_decode("Elaboró"), 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto, utf8_decode("Revisó"), 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto, utf8_decode("Autorizó"), 1, 1, 'L', false);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(50, $alto, "Nombre", 1, 0, 'L', false);
        $this->fpdf->SetFont('Arial', '', $fuente);
        $this->fpdf->Cell(70, $alto, utf8_decode("Ing. Carla  Jaramillo"), 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto, utf8_decode("Dra. Nuria Galárraga"), 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto, utf8_decode("Dra. Alicia Soto"), 1, 1, 'L', false);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto, "", 0, 0, 'L');
        $this->fpdf->Cell(50, $alto, "Cargo", 1, 0, 'L', false);
        $this->fpdf->SetFont('Arial', '', $fuente-1);
        $this->fpdf->Cell(70, $alto, utf8_decode("Analista de Certificación y Control"), 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto, utf8_decode("Responsable de procesos de certificación y control"), 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto, utf8_decode("Coordinador del Comité de Certificación"), 1, 1, 'L', false);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto+10, "", 0, 0, 'L');
        $this->fpdf->Cell(50, $alto+10, "Firma", 1, 0, 'L', false);
        $this->fpdf->SetFont('Arial', '', $fuente-1);
        $this->fpdf->Cell(70, $alto+10, "", 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto+10, "", 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto+10, "", 1, 1, 'L', false);
        
        $this->fpdf->SetFont('Arial', 'B', $fuente);
        $this->fpdf->Cell(10, $alto+10, "", 0, 0, 'L');
        $this->fpdf->Cell(50, $alto+10, "fecha", 1, 0, 'L', false);
        $this->fpdf->SetFont('Arial', '', $fuente-1);
        $this->fpdf->Cell(70, $alto+10, "", 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto+10, "", 1, 0, 'L', false);
        $this->fpdf->Cell(70, $alto+10, "", 1, 1, 'L', false);
       
        $this->fpdf->Ln();

        $this->fpdf->Output();
        }else{
            echo "No existen datos";
        }
    }

}
