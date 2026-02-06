<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        redirect('registroalumnos');
    }

    public function registroalumnos()
    {
        $this->load->view('layout/header');
        $this->load->view('registro_alumnos');
        $this->load->view('layout/footer');
    }

    public function registrogrupos()
    {
        $this->load->view('layout/header');
        $this->load->view('registro_grupos');
        $this->load->view('layout/footer');
    }

    public function alumnosregistrados()
    {
        $this->load->view('layout/header');
        $this->load->view('alumnos_registrados');
        $this->load->view('layout/footer');
    }

    public function configuracioncatalogos()
    {
        $this->load->view('layout/header');
        $this->load->view('configuracion_catalogos');
        $this->load->view('layout/footer');
    }
}
