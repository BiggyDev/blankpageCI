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

        switch($id){
            case 1 :
                $this->session->set_userdata("infos", $this->input->post());
                break;
            case 2:
                $this->session->set_userdata("formations", $this->input->post());
                break;
            case 3:
                $this->session->set_userdata("experiences", $this->input->post());
                break;
            case 4:
                $this->session->set_userdata("competencestech", $this->input->post());
                break;
            case 5:
                $this->session->set_userdata("langues", $this->input->post());
                break;
            case 6:
                $this->session->set_userdata("certifications", $this->input->post());
                break;
            case 7:
                $this->session->set_userdata("savoiretre", $this->input->post());
                break;
            case 8:
                $this->session->set_userdata("reseaux", $this->input->post());
                break;
            case 9:
                $this->session->set_userdata("interets", $this->input->post());
                break;
        }

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
            $data['gender'] = array(
                '' => 'Sexe',
                'Femme' => 'Femme',
                'Homme' => 'Homme'
            );
            $data['permis'] = array(
                '' => 'Choisissez vos permis',
                'AM' => 'AM',
                'A1' => 'A1',
                'A2' => 'A2',
                'A' => 'A',
                'B1' => 'B1',
                'B' => 'B',
                'C1' => 'C1',
                'C' => 'C',
                'D1' => 'D1',
                'D' => 'D',
                'BR' => 'BE',
                'C1E' => 'C1E',
                'CE' => 'CE',
                'D1E' => 'D1E',
                'DE' => 'DE'
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
                'PHP'   => 'PHP',
                'HTML'  => 'HTML',
                'JavaScript'    => 'JavaScript'
            );
            $data['niveau'] = array (
              'Débutant'        => 'Débutant',
              'Interm&eacute;diaire'   => 'Interm&eacute;diaire',
              'Confirm&eacute;'        => 'Confirm&eacute;',
              'Expert'          => 'Expert'
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
                'Amical'        => 'Amical',
                'Respectueux'   => 'Respectueux'
            );
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

        $this->session->get_userdata();

        if (isset($_POST['submitted'])) {

            if(isset($_SESSION['infos'])){
                $this->load->model('Infos_model', '', TRUE);
                $this->Infos_model->insert_entry($_SESSION['infos']['age'], $_SESSION['infos']['gender'], $_SESSION['infos']['address'], $_SESSION['infos']['postalcode'], $_SESSION['infos']['city'], $_SESSION['infos']['portable'], $_SESSION['infos']['permis'], $_SESSION['infos']['vehicle'], $_SESSION['infos']['bio'], $_SESSION['infos']['portfolio'], $_SESSION['infos']['more'], $_SESSION['bp_candidats']['id']);
            }

            if(isset($_SESSION['formations']['infos'])) {
                foreach ($_SESSION['formations']['infos'] as $data_index) {
                    $this->load->model('Formation_model', '', TRUE);
                    $this->Formation_model->insert_entry($data_index['ecole'], $data_index['address'], $data_index['postalcode'], $data_index['city'], $data_index['diplome'], $data_index['datedebut'], $data_index['duree'], $data_index['mention_commentaires'], $_SESSION['bp_candidats']['id']);
                }
            }

            if(isset($_SESSION['experiences']['infos'])) {
                foreach ($_SESSION['experiences']['infos'] as $data_index) {
                    $this->load->model('Experiences_model', '', TRUE);
                    $this->Experiences_model->insert_entry($data_index['entreprise'], $data_index['intitule'], $data_index['date_debut'], $data_index['duree'], $data_index['description'], $data_index['address'], $data_index['postalcode'], $data_index['city'], $_SESSION['bp_candidats']['id']);
                }
            }

            if(isset($_SESSION['competencestech'])) {
                $this->load->model('Competencestech_model', '', TRUE);
                $this->Competencestech_model->insert_entry($_SESSION['competencestech']['name'], $_SESSION['bp_candidats']['id']);
            }

            if(isset($_SESSION['langues'])) {
                $this->load->model('Langues_model', '', TRUE);
                $this->Langues_model->insert_entry($_SESSION['langues']['infos'][0]['name'], $_SESSION['langues']['infos'][0]['niveau'], $_SESSION['bp_candidats']['id']);
            }

            if(isset($_SESSION['certifications']['infos'])) {
                foreach ($_SESSION['certifications']['infos'] as $data_index) {
                    $this->load->model('Certification_model', '', TRUE);
                    $this->Certification_model->insert_entry($data_index['name'], $data_index['description'], $data_index['datedebut'], $data_index['duree'], $_SESSION['bp_candidats']['id']);
                }
            }

            if(isset($_SESSION['savoiretre'])) {
                $this->load->model('Savoiretre_model', '', TRUE);
                $this->Savoiretre_model->insert_entry($_SESSION['savoiretre']['name'], $_SESSION['bp_candidats']['id']);
            }

            if(isset($_SESSION['reseaux'])) {
                $this->load->model('Reseaux_model', '', TRUE);
                $this->Reseaux_model->insert_entry($_SESSION['reseaux']['linkedin'], $_SESSION['reseaux']['facebook'], $_SESSION['reseaux']['twitter'], $_SESSION['reseaux']['dribbble'], $_SESSION['reseaux']['instagram'], $_SESSION['reseaux']['twitch'], $_SESSION['bp_candidats']['id']);
            }

            if(isset($_SESSION['interets']['infos'])) {
                foreach ($_SESSION['interets']['infos'] as $data_index) {
                    $this->load->model('Interet_model', '', TRUE);
                    $this->Interet_model->insert_entry($data_index['name'], $data_index['description'], $_SESSION['bp_candidats']['id']);
                }
            }

        }
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
        $this->email->to($_SESSION['bp_candidats']['email']);
        $this->email->reply_to('blankpage.nfs@gmail.com');
        $this->email->subject('✔ Confirmation de création de votre CV - Blank Page');
        $this->email->message($message);
        if(!$this->email->send())
        {
            show_error($this->email->print_debugger());
        }
    }

    public function sendMailredirect()
    {
       $this->sendMail();

       redirect('candidats/profile');
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

