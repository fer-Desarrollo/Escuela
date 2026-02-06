<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo_model extends CI_Model {

    protected $table = 'grupos';
    protected $primaryKey = 'id_grupo';

    public function insertar($data) {
        return $this->db->insert($this->table, $data);
    }

    public function obtener_todos() {
        return $this->db
            ->select('g.*, c.nombre_carrera, t.nombre_turno, gr.numero_grado')
            ->from('grupos g')
            ->join('carreras c', 'c.id_carrera = g.id_carrera')
            ->join('turnos t', 't.id_turno = g.id_turno')
            ->join('grados gr', 'gr.id_grado = g.id_grado')
            ->where('g.activo', 1)
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
