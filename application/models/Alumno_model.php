<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno_model extends CI_Model {

    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';

    public function insertar($data) {
        return $this->db->insert($this->table, $data);
    }

    public function obtener_todos() {
        return $this->db
            ->select('a.*, g.grupo, c.nombre_carrera')
            ->from('alumnos a')
            ->join('grupos g', 'g.id_grupo = a.id_grupo')
            ->join('carreras c', 'c.id_carrera = g.id_carrera')
            ->where('a.activo', 1)
            ->get()
            ->result();
    }

    public function cambiar_estado($id) {
        $this->db->set('activo', '1 - activo', false)
                 ->where($this->primaryKey, $id)
                 ->update($this->table);

        return $this->db->affected_rows() > 0;
    }
}
