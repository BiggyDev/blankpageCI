<?php

class Candidats extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Blank Page - Mon compte';

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu', $data);
        $this->load->view('profil/profil_candidat', $data);
        $this->load->view('include/footer', $data);
    }
}