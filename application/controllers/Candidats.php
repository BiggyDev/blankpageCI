<?php

class Candidats extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->err_404();
    }

    public function index() //Charge la page d'accueil une fois connecté
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

    public function disconnect() //Fonction de déconnection
    {
        if (isLogged()) {
            $this->session->sess_destroy();
            redirect('accueil/index');
        } else {
            echo '404';
        }

    }

    public function profile() //Charge la page profil du candidat
    {
        $data['title'] = 'Blank Page - Mon profil';

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/profil_candidat', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function monCV() //Charge le CV du candidat et les modèles liés aux données de son CV
    {
        $data['title'] = 'Blank Page - Mon CV';

        $this->load->model('Auth_candidat', '', TRUE);

        $user['infos']              = $this->Auth_candidat->get_cv_infos($_SESSION['bp_candidats']['id']);
        $user['formation']          = $this->Auth_candidat->get_cv_formations($_SESSION['bp_candidats']['id']);
        $user['experiences']        = $this->Auth_candidat->get_cv_experiences($_SESSION['bp_candidats']['id']);
        $user['candidats']          = $this->Auth_candidat->get_cv_candidats($_SESSION['bp_candidats']['id']);
        $user['certifications']     = $this->Auth_candidat->get_cv_certifications($_SESSION['bp_candidats']['id']);
        $user['competencestech']    = $this->Auth_candidat->get_cv_competencestech($_SESSION['bp_candidats']['id']);
        $user['interet']            = $this->Auth_candidat->get_cv_interets($_SESSION['bp_candidats']['id']);
        $user['langues']            = $this->Auth_candidat->get_cv_langues($_SESSION['bp_candidats']['id']);
        $user['reseaux']            = $this->Auth_candidat->get_cv_reseaux($_SESSION['bp_candidats']['id']);
        $user['savoiretre']         = $this->Auth_candidat->get_cv_savoiretre($_SESSION['bp_candidats']['id']);

        $data['user'] = $user;

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/cv_candidat', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function addCV($id) //Charge les formulaires d'ajout d'un CV, les modèles liés, et les différentes données présélectionnées
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
                'PHP'           => 'PHP',
                'HTML'          => 'HTML',
                'JavaScript'    => 'JavaScript',
                'CSS'           => 'CSS',
                'Symfony'       => 'Symfony',
                'Angular'       => 'Angular',
                'React'         => 'React',
                'Electron'      => 'Electron',
                'WordPress'     => 'WordPress'
            );
            $data['niveau'] = array(
                'Débutant' => 'Débutant',
                'Interm&eacute;diaire' => 'Interm&eacute;diaire',
                'Confirm&eacute;' => 'Confirm&eacute;',
                'Expert' => 'Expert'
            );
        } elseif ($id == 5) {
            $data['name'] = array(
                'Anglais'   => 'Anglais',
                'Français'  => 'Français',
                'Espagnol'  => 'Espagnol',
                'Allemand'  => 'Allemand'
            );
            $data['niveau'] = array (
                'Débutant'              => 'Débutant',
                'Scolaire'              => 'Scolaire',
                'Professionnel'         => 'Professionnel',
                'Langue Maternelle'     => 'Langue Maternelle'
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
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu_logged', $data);

        if (isset($id))
            $this->load->view('profil/newCVstep' . $id, $data);

        $this->load->view('profil/dynamicform.html', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function showCV() //Charge le récapitulatif des données saisies par l'utilisateur lors de l'ajout d'un CV, et les modèles liés à l'insertion en BDD
    {
        $data['title'] = 'Blank Page - Récapitulatif';

        $this->session->get_userdata();

        if (isset($_POST['submitted'])) {

            if(!empty($_SESSION['infos'])){
                $this->load->model('Infos_model', '', TRUE);
                $this->Infos_model->insert_entry($_SESSION['infos']['age'], $_SESSION['infos']['gender'], $_SESSION['infos']['address'], $_SESSION['infos']['postalcode'], $_SESSION['infos']['city'], $_SESSION['infos']['portable'], $_SESSION['infos']['permis'], $_SESSION['infos']['vehicle'], $_SESSION['infos']['bio'], $_SESSION['infos']['portfolio'], $_SESSION['infos']['more'], $_SESSION['bp_candidats']['id']);
            }

            if(!empty($_SESSION['formations']['infos'])) {
                foreach ($_SESSION['formations']['infos'] as $data_index) {
                    $this->load->model('Formation_model', '', TRUE);
                    $this->Formation_model->insert_entry($data_index['ecole'], $data_index['address'], $data_index['postalcode'], $data_index['city'], $data_index['diplome'], $data_index['datedebut'], $data_index['duree'], $data_index['mention_commentaires'], $_SESSION['bp_candidats']['id']);
                }
            }

            if(!empty($_SESSION['experiences']['infos'])) {
                foreach ($_SESSION['experiences']['infos'] as $data_index) {
                    $this->load->model('Experiences_model', '', TRUE);
                    $this->Experiences_model->insert_entry($data_index['entreprise'], $data_index['intitule'], $data_index['date_debut'], $data_index['duree'], $data_index['description'], $data_index['address'], $data_index['postalcode'], $data_index['city'], $_SESSION['bp_candidats']['id']);
                }
            }

            if(!empty($_SESSION['competencestech'])) {
                foreach ($_SESSION['competencestech']['name'] as $data_index) {
                    $this->load->model('Competencestech_model', '', TRUE);
                    $this->Competencestech_model->insert_entry($data_index, $_SESSION['bp_candidats']['id']);
                }
            }

            if(!empty($_SESSION['langues'])) {
                $this->load->model('Langues_model', '', TRUE);
                $this->Langues_model->insert_entry($_SESSION['langues']['name'], $_SESSION['langues']['niveau'], $_SESSION['bp_candidats']['id']);
            }

            if(!empty($_SESSION['certifications']['infos'])) {
                foreach ($_SESSION['certifications']['infos'] as $data_index) {
                    $this->load->model('Certification_model', '', TRUE);
                    $this->Certification_model->insert_entry($data_index['name'], $data_index['description'], $data_index['datedebut'], $data_index['duree'], $_SESSION['bp_candidats']['id']);
                }
            }

            if(!empty($_SESSION['savoiretre'])) {
                $this->load->model('Savoiretre_model', '', TRUE);
                $this->Savoiretre_model->insert_entry($_SESSION['savoiretre']['name'], $_SESSION['bp_candidats']['id']);
            }

            if(!empty($_SESSION['reseaux'])) {
                $this->load->model('Reseaux_model', '', TRUE);
                $this->Reseaux_model->insert_entry($_SESSION['reseaux']['linkedin'], $_SESSION['reseaux']['facebook'], $_SESSION['reseaux']['twitter'], $_SESSION['reseaux']['dribbble'], $_SESSION['reseaux']['instagram'], $_SESSION['reseaux']['twitch'], $_SESSION['bp_candidats']['id']);
            }

            if(!empty($_SESSION['interets']['infos'])) {
                foreach ($_SESSION['interets']['infos'] as $data_index) {
                    $this->load->model('Interet_model', '', TRUE);
                    $this->Interet_model->insert_entry($data_index['name'], $data_index['description'], $_SESSION['bp_candidats']['id']);
                }
            }

        }
        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/newCVviewall', $data);
        $this->load->view('profil/dynamicform.html', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function sendMail() //Fonction d'envoi du mail de confirmation d'ajout d'un CV
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

    public function sendMailredirect() //Fonction d'envoi de mail si l'utilisateur n'a pas reçu via la fonction ci-dessus
    {
       $this->sendMail();

       redirect('candidats/profile');
    }

    public function CVconfirm() // Charge la page de confirmation d'ajout de la création du CV
    {
        $data['title'] = 'Blank Page - Confirmation d\'ajout du CV';

        $this->sendMail();

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/confirmationAjoutCV', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function modifEmail() //Fonction permettant de modifier son adresse e-mail
    {
        $data['title'] = 'Blank Page - Modification d\'adresse e-mail';

        if (isset($_POST['submitted'])) {

            $this->form_validation->set_rules('newmail', 'Nouvelle adresse e-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');

            if ($this->form_validation->run() === TRUE) {

                $this->form_validation->set_data($_POST);

                $user = $this->Auth_candidat->get_user($_SESSION['bp_candidats']['email']);

                $password = $user[0]['password'];

                if (password_verify($this->input->post('password'), $password)) {

                    $this->Auth_candidat->update_email($this->input->post('newmail'));

                    $this->disconnect();

                } else {
                    $this->session->set_flashdata('fail_password', 'Mot de passe erroné');
                }

            }
        }

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/modifEmail', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    public function modifPassword() //Fonction permettant de modifier son mot de passe
    {
        $data['title'] = 'Blank Page - Modification du mot de passe';

        if (isset($_POST['submitted'])) {

            $rules = array(
                array(
                    'field' => 'oldpassword',
                    'label' => 'Ancien Mot de Passe',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'newpassword',
                    'label' => 'Nouveau Mot de Passe',
                    'rules' => 'trim|required|min_length[6]|max_length[200]'
                ),
                array(
                    'field' => 'password2',
                    'label' => 'Confirmation Nouveau Mot de Passe',
                    'rules' => 'trim|required|min_length[6]|max_length[200]|matches[newpassword]'
                )
            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === TRUE) {

                $this->form_validation->set_data($_POST);

                $user = $this->Auth_candidat->get_user($_SESSION['bp_candidats']['email']);

                $password = $user[0]['password'];

                if (password_verify($this->input->post('oldpassword'), $password)) {

                    $token = $this->generateRandomString(255);
                    $hash = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);

                    $this->Auth_candidat->update_password($hash, $token);

                    $this->disconnect();

                } else {
                    $this->session->set_flashdata('fail_oldpassword', 'Ancien Mot de Passe erroné');
                }

            }
        }

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu_logged', $data);
        $this->load->view('profil/modifPassword', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

    private function generateRandomString($length) //Fonction permettant de générer un nouveau token
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function err_404() //Fonction d'affichage d'une page 404
    {
        if (!isLogged()) {
            redirect('errors/html/error_404', 'location');
        }
    }

}


