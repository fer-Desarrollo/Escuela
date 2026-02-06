<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrera_model extends CI_Model {

    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';

    public function insertar($data) {
        return $this->db->insert($this->table, $data);
    }

    public function obtener_activas() {
        return $this->db
            ->where('activo', 1)
            ->get($this->table)
            ->result();
    }

    public function cambiar_estado($id) {
        $this->db->set('activo', '1 - activo', false)
                 ->where($this->primaryKey, $id)
                 ->update($this->table);

        return $this->db->affected_rows() > 0;
    }
}
