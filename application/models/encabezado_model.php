<?php


class encabezado_model extends CI_Model {
    
    
    public function __construct() {
        $this->load->database();
    }
   public function f0($id_persona,$archivo) {
        $this->db->select('*');
        $this->db->from('tab_codigos');
        $this->db->join('tab_encabezado', 'tab_encabezado.ID_ENCABEZADO=tab_codigos.ID_ENCABEZADO');
        $this->db->join('tab_archivos', 'tab_archivos.ID_ARCHIVO=tab_codigos.ID_ARCHIVO');
        $this->db->where('tab_codigos.ID_PERSONA',$id_persona);
        $this->db->where('tab_archivos.ID_ARCHIVO',$archivo);
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function ingresof0($id_persona,$contador, $fecha_emision, $fecha_final,$archivo,$id_encabezado) {
        $datos['ID_PERSONA'] = $id_persona;
        $datos['ID_ARCHIVO'] = $archivo;
        $datos['ID_ENCABEZADO'] = $id_encabezado;
        $datos['CODIGO'] = "ITCA-F011-".$contador;
        $datos['FECHA_EMISION'] = $fecha_emision;
        $datos['FECHA_FINAL'] = $fecha_final;
        $this->db->insert('tab_codigos', $datos);
    }
}
