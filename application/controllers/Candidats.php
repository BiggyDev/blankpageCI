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
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/profil_candidat', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function addCV($id)
    {
        $data['title'] = 'Blank Page - Nouveau CV';

        if(isset($_POST['submitted']) && $id != 9) {
            $nextid = $id + 1;
            redirect('/candidats/addCV/' . $nextid);
        } elseif (isset($_POST['notsubmitted']) && $id != 1)  {
            $precid = $id - 1;
            redirect('/candidats/addCV/' . $precid);
        } elseif (isset($_POST['submitted']) && $id == 9) {
            redirect('/candidats/showCV');
        }

        if ($id == 1) {
            $data['birthday'] = array(
                'type'  => 'date',
                'value' => 'birthday',
                'name'  => 'birthday',
            );
            $data['gender'] = array(
                '' => 'Sexe',
                'female' => 'Femme',
                'male' => 'Homme'
            );
            $data['permis'] = array(
                '' => 'Choisissez vos permis',
                'am' => 'AM',
                'a1' => 'A1',
                'a2' => 'A2',
                'a' => 'A',
                'b1' => 'B1',
                'b' => 'B',
                'c1' => 'C1',
                'c' => 'C',
                'd1' => 'D1',
                'd' => 'D',
                'be' => 'BE',
                'c1e' => 'C1E',
                'ce' => 'CE',
                'd1e' => 'D1E',
                'de' => 'DE'

            );
        } elseif ($id == 2) {
            $data['datedebut'] = array(
                'type'      => 'date',
                'name'      => 'infos[0][datedebut]',
                'value'     => 'datedebut',
                'data-name' => 'datedebut'
            );
        } elseif ($id == 3) {
            $data['date_debut'] = array(
                'type'      => 'date',
                'name'      => 'infos[0][date_debut]',
                'value'     => 'date_debut',
                'data-name' => 'date_debut'
            );
        } elseif ($id == 4) {
            $data['competence'] = array(
                'php'   => 'PHP',
                'html'  => 'HTML',
                'js'    => 'JavaScript'
            );
            $data['niveau'] = array (
              'debutant'        => 'Débutant',
              'intermediaire'   => 'Interm&eacute;diaire',
              'confirme'        => 'Confirm&eacute;',
              'expert'          => 'Expert'
            );
        } elseif ($id == 5) {
            $data['langue'] = array(
                'anglais'   => 'Anglais',
                'francais'  => 'Français',
                'espagnol'  => 'Espagnol'
            );
            $data['niveau'] = array (
                'debutant'      => 'Débutant',
                'scolaire'      => 'Scolaire',
                'professionnel' => 'Professionnel',
                'maternelle'    => 'Langue Maternelle'
            );
        } elseif ($id == 6) {
            $data['datedebut'] = array(
                'type'      => 'date',
                'name'      => 'infos[0][datedebut]',
                'value'     => 'datedebut',
                'data-name' => 'datedebut'
            );
        } elseif ($id == 7) {
            $data['savoiretre'] = array(
                'amical'        => 'Amical',
                'respectueux'   => 'Respectueux'
            );
        }

        if (isset($_POST['submitted']) && $id == 1) {

            $rules = array(
                array(
                    'field' => 'name',
                    'label' => 'Nom & Pr&eacute;nom',
                    'rules' => 'trim|required|min_length[4]|max_length[60]'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Adresse E-mail',
                    'rules' => 'trim|required|min_length[6]|max_length[70]|valid_email'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Mot de Passe',
                    'rules' => 'trim|required|min_length[6]|max_length[200]'
                ),
                array(
                    'field' => 'confirmpassword',
                    'label' => 'Confirmation Mot de Passe',
                    'rules' => 'trim|required|min_length[6]|max_length[200]|matches[password]'
                )
            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === TRUE) {

                $this->form_validation->set_data($_POST);

                if (isset($id)) {
                    if ($id == 1) {
                        $this->load->model('Infos_model', '', TRUE);
                        $this->Infos_model->insert_entry($this->input->post('age'), $this->input->post('sexe'), $this->input->post('adresse'), $this->input->post('cp'), $this->input->post('ville'), $this->input->post('portable'), $this->input->post('permis'), $this->input->post('vehicule'), $this->input->post('picture'), $this->input->post('bio'), $this->input->post('portfolio'), $this->input->post('more'));
                    }
                }
            }
        }

        $_GET['id'] = $id;

        $this->load->view('include/header', $data);
        $this->load->view('include/header_menu_logged', $data);

        if (isset($id))
            $this->load->view('profil/newCVstep' . $id, $data);

        $this->load->view('profil/dynamicform.html', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function showCV()
    {
        $data['title'] = 'Blank Page - Récapitulatif';


        $this->load->view('include/header', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/newCVviewall', $data);
        $this->load->view('profil/dynamicform.html', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);

    }

}

