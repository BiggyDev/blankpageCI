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

        $this->load->view('include/header', $data);
//            if($this->form_validation->run() == FALSE)
//                // TODO: Afficher profil candidat
//                $this->load->view('main/profil_candidat');
//            else
//                $this->load->view('main/login', $data);
//
        $this->load->view('main/login', $data);
        $this->load->view('include/footer', $data);
    }

    public function inscription()
    {
        $data['title'] = 'Blank Page - Inscription';

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom & Pr&eacute;nom', 'required');
        $this->form_validation->set_rules('password', 'Mot de Passe', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Confirmation Mot de Passe', 'required');
        $this->form_validation->set_rules('email', 'Adresse E-mail', 'required');

        $this->load->view('include/header', $data);

        if($this->form_validation->run() == FALSE)
                // TODO: Rediriger vers connexion
                $this->load->view('main/inscription');
            else
                $this->load->view('main/login', $data);

        $this->load->view('include/footer', $data);

    }

}
