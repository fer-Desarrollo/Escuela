<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grado_model extends CI_Model {

    protected $table = 'grados';
    protected $primaryKey = 'id_grado';

    public function insertar($data) {
        return $this->db->insert($this->table, $data);
    }

    // 🔹 MOSTRAR TODOS (activos e inactivos)
    public function obtener_activos() {
        return $this->db
            ->get($this->table)
            ->result();
    }

    // 🔹 TOGGLE activo / inactivo
    public function cambiar_estado($id) {
        $this->db->query("
            UPDATE {$this->table}
            SET activo = IF(activo = 1, 0, 1)
            WHERE {$this->primaryKey} = ?
        ", [$id]);

        return $this->db->affected_rows() > 0;
    }
}
