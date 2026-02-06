<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escuela extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_content_type('application/json');
        $this->load->model([
            'Carrera_model',
            'Turno_model',
            'Grado_model',
            'Grupo_model',
            'Alumno_model'
        ]);
    }

    private function getJson() {
        return json_decode($this->input->raw_input_stream, true) ?? [];
    }

    // =====================
    // CATALOGOS
    // =====================

    public function obtener_carreras() {
        echo json_encode(['status'=>true,'data'=>$this->Carrera_model->obtener_activas()]);
    }

    public function obtener_turnos() {
        echo json_encode(['status'=>true,'data'=>$this->Turno_model->obtener_activos()]);
    }

    public function obtener_grados() {
        echo json_encode(['status'=>true,'data'=>$this->Grado_model->obtener_activos()]);
    }

    public function obtener_grupos() {
        echo json_encode(['status'=>true,'data'=>$this->Grupo_model->obtener_todos()]);
    }

    // =====================
    // REGISTROS
    // =====================

    public function registrar_carrera() {
        $j = $this->getJson();
        $nombre = $j['nombre_carrera'] ?? $this->input->post('nombre_carrera');

        if (!$nombre) {
            echo json_encode(['status'=>false,'message'=>'nombre_carrera requerido']);
            return;
        }

        $this->Carrera_model->insertar(['nombre_carrera'=>$nombre]);
        echo json_encode(['status'=>true,'message'=>'Carrera registrada']);
    }

    public function registrar_grupo() {
        $j = $this->getJson();

        if (empty($j['id_carrera']) || empty($j['id_turno']) || empty($j['id_grado']) || empty($j['grupo'])) {
            echo json_encode(['status'=>false,'message'=>'Datos incompletos']);
            return;
        }

        $this->Grupo_model->insertar([
            'id_carrera'=>$j['id_carrera'],
            'id_turno'=>$j['id_turno'],
            'id_grado'=>$j['id_grado'],
            'grupo'=>$j['grupo']
        ]);

        echo json_encode(['status'=>true,'message'=>'Grupo registrado']);
    }

    public function registrar_alumno() {
        $j = $this->getJson();

        if (empty($j['nombre']) || empty($j['apellido_paterno']) || empty($j['id_grupo'])) {
            echo json_encode(['status'=>false,'message'=>'Datos incompletos']);
            return;
        }

        $this->Alumno_model->insertar([
            'nombre'=>$j['nombre'],
            'apellido_paterno'=>$j['apellido_paterno'],
            'apellido_materno'=>$j['apellido_materno'] ?? null,
            'id_grupo'=>$j['id_grupo']
        ]);

        echo json_encode(['status'=>true,'message'=>'Alumno registrado']);
    }

    // =====================
    // ACTIVAR / DESACTIVAR
    // =====================

    public function cambiar_estado_alumno($id) {
        $ok = $this->Alumno_model->cambiar_estado($id);
        echo json_encode(['status'=>$ok,'message'=>$ok?'Estado actualizado':'Alumno no encontrado']);
    }

    public function cambiar_estado_carrera($id) {
        $ok = $this->Carrera_model->cambiar_estado($id);
        echo json_encode(['status'=>$ok,'message'=>$ok?'Estado actualizado':'Carrera no encontrada']);
    }

    public function cambiar_estado_grupo($id) {
        $ok = $this->Grupo_model->cambiar_estado($id);
        echo json_encode(['status'=>$ok,'message'=>$ok?'Estado actualizado':'Grupo no encontrado']);
    }

    public function cambiar_estado_turno($id) {
        $ok = $this->Turno_model->cambiar_estado($id);
        echo json_encode(['status'=>$ok,'message'=>$ok?'Estado actualizado':'Turno no encontrado']);
    }

    public function cambiar_estado_grado($id) {
        $ok = $this->Grado_model->cambiar_estado($id);
        echo json_encode(['status'=>$ok,'message'=>$ok?'Estado actualizado':'Grado no encontrado']);
    }

    // =====================
    // LISTADOS
    // =====================

    public function listar_alumnos() {
        echo json_encode(['status'=>true,'data'=>$this->Alumno_model->obtener_todos()]);
    }
}
