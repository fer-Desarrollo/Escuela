<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grado_model extends CI_Model {

    protected $table = 'grados';
    protected $primaryKey = 'id_grado';

    public function insertar($data) {
        return $this->db->insert($this->table, $data);
    }

    public function obtener_activos() {
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
