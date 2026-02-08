<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrera_model extends CI_Model {

    public function obtener_todas() {
        return $this->db
            ->order_by('activo', 'DESC')
            ->get('carreras')
            ->result();
    }

    public function cambiar_estado($id) {
        $registro = $this->db
            ->get_where('carreras', ['id_carrera' => $id])
            ->row();

        if (!$registro) return false;

        $nuevo = $registro->activo ? 0 : 1;

        $this->db->where('id_carrera', $id);
        return $this->db->update('carreras', [
            'activo' => $nuevo
        ]);
    }

    public function insertar($data) {
        return $this->db->insert('carreras', $data);
    }
}

