<?php

class procesos_model extends CI_Model {

    //put your code here
    public function getPersonas($id_persona = null) {
        $this->db->select('*');
        $this->db->from('tab_personas');
        $this->db->join('tab_cargos', 'tab_cargos.ID_CARGO = tab_personas.ID_CARGO');
        if (isset($id_persona)) {
            $this->db->where('ID_PERSONA', $id_persona);
        }
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function insertarFilaF18($id_persona, $codigo, $item, $descripcion, $cumple, $observaciones, $id_verificador) {
        $datos['ID_PERSONA'] = $id_persona;
        $datos['CODIGO'] = $codigo;
        $datos['ITEM_VEIFICADO'] = $item;
        $datos['DESCRIPCION'] = $descripcion;
        $datos['CUMPLE'] = $cumple;
        $datos['OBSERVACIONES'] = $observaciones;
        $datos['ID_PERSONA_VERIFICADOR'] = $id_verificador;
        $this->db->insert('tab_formulario018', $datos);
    }

    public function getFormulario18($id_persona) {
        $this->db->select('*');
        $this->db->from('tab_formulario018');
        $this->db->join('tab_personas', 'tab_personas.ID_PERSONA = tab_formulario018.ID_PERSONA_VERIFICADOR');
        $this->db->where('tab_formulario018.ID_PERSONA', $id_persona);
        $this->db->order_by('CODIGO');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function actulizarFilaF18($id_persona, $codigo, $item, $descripcion, $cumple, $observaciones, $id_verificador) {
        $this->db->set("ITEM_VEIFICADO", $item); //matricula terminada
        $this->db->set("DESCRIPCION", $descripcion); //matricula terminada
        $this->db->set("CUMPLE", $cumple); //matricula terminada
        $this->db->set("OBSERVACIONES", $observaciones); //matricula terminada
        $this->db->set("ID_PERSONA_VERIFICADOR", $id_verificador); //matricula terminada
        $this->db->where('ID_PERSONA', $id_persona);
        $this->db->where('CODIGO', $codigo);

        $this->db->update('tab_formulario018');
    }

    public function codigoMaximo($id_persona) {
        $this->db->select('*');
        $this->db->from('tab_formulario018');
        $this->db->where('tab_formulario018.ID_PERSONA', $id_persona);
        $this->db->order_by('CODIGO DESC');
        $this->db->limit(1);
        $consulta = $this->db->get();
        return $consulta->result();
    }
    
    public function getFormulario18Limites($id_persona,$inicio,$fin) {
        $this->db->select('*');
        $this->db->from('tab_formulario018');
        $this->db->join('tab_personas', 'tab_personas.ID_PERSONA = tab_formulario018.ID_PERSONA_VERIFICADOR');
        $this->db->where('tab_formulario018.ID_PERSONA', $id_persona);
        $this->db->where("tab_formulario018.CODIGO >= $inicio AND tab_formulario018.CODIGO <= $fin", NULL,FALSE);
        $this->db->order_by('CODIGO');
        $consulta = $this->db->get();
        return $consulta->result();
    }

}
