<?php

class Candidats extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Blank Page - Mon compte';

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu', $data);
        $this->load->view('main/index', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function disconnect()
    {
        if (isLogged()) {
            $this->session->sess_destroy();
            redirect('accueil/index');
        } else {
            echo '404';
        }

    }

    public function profile()
    {
        $data['title'] = 'Blank Page - Mon profil';


        $this->load->view('include/header', $data);
        $this->load->view('profil/profil_candidat', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function addCV($id)
    {
        $data['title'] = 'Blank Page - Nouveau CV';

        if ($id == 1) {
            $data['birthday'] = array(
                'type' => 'date',
                'value' => 'birthday',
                'name' => 'birthday',
            );
            $data['gender'] = array(
                ''          => 'Sexe',
                'female'    => 'Femme',
                'male'      => 'Homme'
            );

            $data['permis'] = array(
                ''      => 'Choisissez vos permis',
                'am'    => 'AM',
                'a1'    => 'A1',
                'a2'    => 'A2',
                'a'     => 'A',
                'b1'    => 'B1',
                'b'     => 'B',
                'c1'    => 'C1',
                'c'     => 'C',
                'd1'    => 'D1',
                'd'     => 'D',
                'be'    => 'BE',
                'c1e'   => 'C1E',
                'ce'    => 'CE',
                'd1e'   => 'D1E',
                'de'    => 'DE'
            );
        } elseif ($id == 2) {
            $data['datedebut'] = array(
                'type' => 'date',
                'name' => 'datedebut',
                'value' => 'datedebut'
            );
        } elseif ($id == 3) {
            $data['date_debut'] = array(
                'type' => 'date',
                'name' => 'date_debut',
                'value' => 'date_debut'
            );
        } elseif ($id == 4) {
            $data['competence'] = array(
                'php' => 'PHP',
                'html' => 'HTML',
                'js' => 'JavaScript'
            );
            $data['niveau'] = array (
              'debutant' => 'Débutant',
              'intermediaire' => 'Interm&eacute;diaire',
              'confirme' => 'Confirm&eacute;',
              'expert' => 'Expert'
            );
        } elseif ($id == 5) {
            $data['langue'] = array(
                'anglais' => 'Anglais',
                'francais' => 'Français',
                'espagnol' => 'Espagnol'
            );
            $data['niveau'] = array (
                'debutant' => 'Débutant',
                'intermediaire' => 'Interm&eacute;diaire',
                'confirme' => 'Confirm&eacute;',
                'expert' => 'Expert'
            );
        }



        $_GET['id'] = $id;

        $this->load->view('include/header', $data);

        if (isset($id)) {
            $this->load->view('profil/newCVstep' . $id, $data);
        }

        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }


}