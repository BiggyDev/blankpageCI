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

        if (isset($_POST['submitted']) && $id == 1) {

            $rules = array(
                array(
                    'field' => 'birthday',
                    'label' => 'Date de naissance',
                    'rules' => 'trim|numeric'
                ),
                array(
                    'field' => 'gender',
                    'label' => 'Sexe',
                    'rules' => ''
                ),
                array(
                    'field' => 'address',
                    'label' => 'Adresse du candidat',
                    'rules' => 'max_length[70]'
                ),
                array(
                    'field' => 'postalcode',
                    'label' => 'Code postal de la ville de résidence',
                    'rules' => 'trim|numeric|min_length[5]'
                ),
                array(
                    'field' => 'city',
                    'label' => 'Ville de résidence',
                    'rules' => 'max_length[70]'
                ),
                array(
                    'field' => 'portable',
                    'label' => 'T&eacute;l&eacute;phone',
                    'rules' => 'trim|max_length[10]|numeric'
                ),
                array(
                    'field' => 'permis',
                    'label' => 'Permis de conduire',
                    'rules' => ''
                ),
                array(
                    'field' => 'vehicle',
                    'label' => 'V&eacute;hicule personnel',
                    'rules' => ''
                ),
                array(
                    'field' => 'vehicle',
                    'label' => 'V&eacute;hicule personnel',
                    'rules' => ''
                ),
                array(
                    'field' => 'picture',
                    'label' => 'Photo',
                    'rules' => ''
                ),
                array(
                    'field' => 'bio',
                    'label' => 'A propos du candidat',
                    'rules' => 'max_length[255]'
                ),
                array(
                    'field' => 'portfolio',
                    'label' => 'Site / Blog / Portfolio',
                    'rules' => 'max_length[255]'
                ),
                array(
                    'field' => 'more',
                    'label' => 'Autres',
                    'rules' => 'max_length[255]'
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 2) {

            $rules = array(
                array(
                    'field' => 'infos[0][ecole]',
                    'label' => 'Ecole',
                    'rules' => 'max_length[70]'
                ),
                array(
                    'field' => 'infos[0][address]',
                    'label' => 'Adresse',
                    'rules' => 'trim|max_length[255]'
                ),
                array(
                    'field' => 'infos[0][postalcode]',
                    'label' => 'Code postal',
                    'rules' => 'trim|numeric|min_length[5]'
                ),
                array(
                    'field' => 'infos[0][city]',
                    'label' => 'Ville',
                    'rules' => 'max_length[70]'
                ),
                array(
                    'field' => 'infos[0][diplome]',
                    'label' => 'Dipl&ocirc;me',
                    'rules' => 'max_length[100]'
                ),
                array(
                    'field' => 'infos[0][datedebut]',
                    'label' => 'Date de d&eacute;but',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'infos[0][duree]',
                    'label' => 'Dur&eacute;e de la formation',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'infos[0][mention_commentaires]',
                    'label' => 'Mention / Commentaires',
                    'rules' => 'max_length[255]'
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 3) {

            $rules = array(
                array(
                    'field' => 'infos[0][entrerpise]',
                    'label' => 'Entreprise',
                    'rules' => 'max_length[100]'
                ),
                array(
                    'field' => 'infos[0][address]',
                    'label' => 'Adresse de l\'entreprise',
                    'rules' => 'max_length[70]'
                ),
                array(
                    'field' => 'infos[0][postalcode]',
                    'label' => 'Code postal',
                    'rules' => 'trim|numeric|min_length[5]'
                ),
                array(
                    'field' => 'infos[0][city]',
                    'label' => 'Ville de l\'entreprise',
                    'rules' => 'max_length[70]'
                ),
                array(
                    'field' => 'infos[0][intitule]',
                    'label' => 'Intitul&eacute; du poste',
                    'rules' => 'max_length[50]'
                ),
                array(
                    'field' => 'infos[0][date_debut]',
                    'label' => 'Date de d&eacute;but',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'infos[0][duree]',
                    'label' => 'Dur&eacute;e',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'infos[0][description]',
                    'label' => 'Description du poste',
                    'rules' => 'max_length[500]'
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 4) {

            $rules = array(
                array(
                    'field' => 'name',
                    'label' => 'Comp&eacute;tences du candidat',
                    'rules' => ''
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 5) {

            $rules = array(
                array(
                    'field' => 'infos[0][name]',
                    'label' => 'Anglais',
                    'rules' => ''
                ),
                array(
                    'field' => 'infos[0][name]',
                    'label' => 'Fran&ccedil;ais',
                    'rules' => ''
                ),
                array(
                    'field' => 'infos[0][niveau]',
                    'label' => 'D&eacute;butant',
                    'rules' => ''
                ),
                array(
                    'field' => 'infos[0][niveau]',
                    'label' => 'Scolaire',
                    'rules' => ''
                ),
                array(
                    'field' => 'infos[0][niveau]',
                    'label' => 'Professionnel',
                    'rules' => ''
                ),
                array(
                    'field' => 'infos[0][niveau]',
                    'label' => 'Langue maternelle',
                    'rules' => ''
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 6) {

            $rules = array(
                array(
                    'field' => 'infos[0][name]',
                    'label' => 'Nom',
                    'rules' => 'max_length[50]'
                ),
                array(
                    'field' => 'infos[0][description]',
                    'label' => 'Description',
                    'rules' => 'max_length[50]'
                ),
                array(
                    'field' => 'infos[0][datedebut]',
                    'label' => 'Date de d&eacute;but',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'infos[0][duree]',
                    'label' => 'Dur&eacute;e de validit&eacute;',
                    'rules' => 'trim'
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 7) {

            $rules = array(
                array(
                    'field' => 'name',
                    'label' => 'Nom',
                    'rules' => ''
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 8) {

            $rules = array(
                array(
                    'field' => 'lien',
                    'label' => 'Linkedin',
                    'rules' => 'trim|'
                ),
                array(
                    'field' => 'lien',
                    'label' => 'Facebook',
                    'rules' => 'trim|'
                ),
                array(
                    'field' => 'lien',
                    'label' => 'Twitter',
                    'rules' => 'trim|'
                ),
                array(
                    'field' => 'lien',
                    'label' => 'Dribbble',
                    'rules' => 'trim|'
                ),
                array(
                    'field' => 'lien',
                    'label' => 'Instagram',
                    'rules' => 'trim|'
                ),
                array(
                    'field' => 'lien',
                    'label' => 'Twitch',
                    'rules' => 'trim|'
                )
            );

            $this->form_validation->set_rules($rules);
        }

        if (isset($_POST['submitted']) && $id == 9) {

            $rules = array(
                array(
                    'field' => 'infos[0][name]',
                    'label' => 'Activit&eacute;',
                    'rules' => 'max_length[50]'
                ),
                array(
                    'field' => 'infos[0][description]',
                    'label' => 'Description',
                    'rules' => 'max_length[50]'
                )
            );

            $this->form_validation->set_rules($rules);

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

