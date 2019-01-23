<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'Blank Page - Accueil';

        $this->load->view('include/header', $data);
        $this->load->view('include/main_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
		$this->load->view('main/index', $data);
		$this->load->view('include/footer', $data);
	}

	public function login()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['title'] = 'Blank Page - Connexion';

        $this->load->view('include/header');
//            if($this->form_validation->run() == FALSE)
//                // TODO: Afficher profil candidat
//                $this->load->view('main/profil_candidat', $data);
//            else
//                $this->load->view('main/login', $data);
//
        $this->load->view('main/login');
        $this->load->view('include/footer');
    }

    public function inscription()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['title'] = 'Blank Page - Inscription';

        $this->load->view('include/header');
//            if($this->form_validation->run() == FALSE)
//                // TODO: Rediriger vers connexion
//                $this->load->view('main/login', $data);
//            else
//                $this->load->view('main/inscription', $data);
//
        $this->load->view('main/inscription');
        $this->load->view('include/footer');
    }
}
