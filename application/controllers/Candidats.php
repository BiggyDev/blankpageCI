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

            $this->session->set_userdata($this->input->post());
        } elseif ($id == 2) {
            $data['datedebut'] = array(
                'type'      => 'date',
                'name'      => 'infos[0][datedebut]',
                'value'     => 'datedebut',
                'data-name' => 'datedebut'
            );
            $this->session->set_userdata($this->input->post());
        } elseif ($id == 3) {
            $data['date_debut'] = array(
                'type'      => 'date',
                'name'      => 'infos[0][date_debut]',
                'value'     => 'date_debut',
                'data-name' => 'date_debut'
            );
            $this->session->set_userdata($this->input->post());
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
            $this->session->set_userdata($this->input->post());
        } elseif ($id == 5) {
            $this->session->set_userdata($this->input->post());
        } elseif ($id == 6) {
            $data['datedebut'] = array(
                'type'      => 'date',
                'name'      => 'infos[0][datedebut]',
                'value'     => 'datedebut',
                'data-name' => 'datedebut'
            );
            $this->session->set_userdata($this->input->post());
        } elseif ($id == 7) {
            $data['savoiretre'] = array(
                'amical'        => 'Amical',
                'respectueux'   => 'Respectueux'
            );
            $this->session->set_userdata($this->input->post());
        } elseif ($id == 8) {
            $this->session->set_userdata($this->input->post());
        } elseif ($id == 9) {
            $this->session->set_userdata($this->input->post());
        }

        if (isset($_POST['submitted']) && $id == 9) {

            if ($this->form_validation->run() === TRUE) {

                $this->form_validation->set_data($_POST);

                $this->load->model('Infos_model', '', TRUE);
                $this->Infos_model->insert_entry($this->input->post('birthday'), $this->input->post('gender'), $this->input->post('address'), $this->input->post('postalcode'), $this->input->post('city'), $this->input->post('portable'), $this->input->post('permis'), $this->input->post('vehicle'), $this->input->post('picture'), $this->input->post('bio'), $this->input->post('portfolio'), $this->input->post('more'));

                $this->load->model('Formation_model', '', TRUE);
                $this->Formation_model->insert_entry($this->input->post('infos[0][ecole]'), $this->input->post('infos[0][address]'), $this->input->post('infos[0][postalcode]'), $this->input->post('infos[0][city]'), $this->input->post('infos[0][diplome]'), $this->input->post('infos[0][datedebut]'), $this->input->post('infos[0][duree]'), $this->input->post('infos[0][mention_commentaires]'));

                $this->load->model('Experiences_model', '', TRUE);
                $this->Experiences_model->insert_entry($this->input->post('infos[0][entrerpise]'), $this->input->post('infos[0][intitule]'), $this->input->post('infos[0][date_debut]'), $this->input->post('infos[0][duree]'), $this->input->post('infos[0][description]'), $this->input->post('infos[0][address]'), $this->input->post('infos[0][codepostal]'), $this->input->post('infos[0][city]'));

                $this->load->model('Competencestech_model', '', TRUE);
                $this->Competencestech_model->insert_entry($this->input->post('name'));

                $this->load->model('Langues_model', '', TRUE);
                $this->Langues_model->insert_entry($this->input->post('infos[0][name]'), $this->input->post('infos[0][niveau]'));

                $this->load->model('Certification_model', '', TRUE);
                $this->Certification_model->insert_entry($this->input->post('infos[0][name]'), $this->input->post('infos[0][description]'), $this->input->post('infos[0][datedebut]'), $this->input->post('infos[0][duree]'));

                $this->load->model('Savoiretre_model', '', TRUE);
                $this->Savoiretre_model->insert_entry($this->input->post('name'));

                $this->load->model('Reseaux_model', '', TRUE);
                $this->Reseaux_model->insert_entry($this->input->post('name'), $this->input->post('lien'));

                $this->load->model('Interet_model', '', TRUE);
                $this->Interet_model->insert_entry($this->input->post('name'), $this->input->post('description'));
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

/*
        if (isset($_POST['submitted'])) {
            if ($this->form_validation-> run() === TRUE) {
                $this->form_validation->set_data($_POST);
                if (isset($id)) {
                    if ($id == 1) {
                        $this->load->model('Infos_model', '', TRUE);
                        $this->Infos_model->insert_entry($this->input->post('age'), $this->input->post('sexe'), $this->input->post('adresse'), $this->input->post('cp'), $this->input->post('ville'), $this->input->post('portable'), $this->input->post('permis'), $this->input->post('vehicule'), $this->input->post('picture'), $this->input->post('bio'), $this->input->post('portfolio'), $this->input->post('more'));
                    }
                }
            }
        }
*/

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

    public function sendMail()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'blankpage.nfs@gmail.com',
            'smtp_pass' => 'blankpage5',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $message = 'Nous vous confirmons que votre CV a bien &eacute;t&eacute; cr&eacute;&eacute; ! Vous pourrez le retrouver dans votre profil. Merci d\'avoir utilis&eacute; Blank Page.';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('blankpage.nfs@gmail.com', 'Blank Page');
        $this->email->to($_SESSION['email']);
        $this->email->reply_to('blankpage.nfs@gmail.com');
        $this->email->subject('✔ Confirmation de création de votre CV - Blank Page');
        $this->email->message($message);
        if(!$this->email->send())
        {
            show_error($this->email->print_debugger());
        }

        if (site_url('localhost/blankpageCI/candidats/sendMail', 'http')) {
            // TODO : Rediriger vers profil
            redirect('candidats/profile');
        }
    }

    public function CVconfirm()
    {
        $data['title'] = 'Blank Page - Confirmation d\'ajout du CV';

        $this->sendMail();

        $this->load->view('include/header', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/confirmationAjoutCV', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

}

