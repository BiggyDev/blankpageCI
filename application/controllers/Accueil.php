<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function index() //Charge la page d'accueil
	{
	    $data['title'] = 'Blank Page - Accueil';

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu', $data);
		$this->load->view('main/index', $data);
		$this->load->view('include/footer_menu', $data);
		$this->load->view('include/footer', $data);
	}

	public function login() //Gère la page de connexion
    {
        $data['title'] = 'Blank Page - Connexion';

        if (isset($_POST['submitted'])) {

            $rules = array(
                array(
                    'field' => 'email',
                    'label' => 'Adresse E-mail',
                    'rules' => 'trim|required|valid_email'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Mot de Passe',
                    'rules' => 'trim|required'
                ),
            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === TRUE) {

                $this->form_validation->set_data($_POST);

                $user = $this->Auth_candidat->get_user($this->input->post('email'));

                if (!empty($user)) {

                    $password = $user[0]['password'];

                    if (password_verify($this->input->post('password'), $password)) {

                        $_SESSION['bp_candidats'] = array(
                            'id' => $user[0]['id'],
                            'email' => $user[0]['email'],
                            'name' => $user[0]['name'],
                            'ip' => $_SERVER['REMOTE_ADDR']
                        );

                        // TODO: Rediriger vers connexion
                        redirect('candidats/index');

                    } else {
                        $this->session->set_flashdata('fail_password', 'Mot de passe erroné');
                    }
                } else {
                    $this->session->set_flashdata('fail_email', 'Cette adresse e-mail n\'existe pas');
                }
            }
        }
        $this->load->view('include/header', $data);
        $this->load->view('main/login', $data);
        $this->load->view('include/footer', $data);
    }


    public function inscription() //Gère la page d'inscription
    {
        $data['title'] = 'Blank Page - Inscription';

        if (isset($_POST['submitted'])) {

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

                $this->load->model('Auth_candidat', '', TRUE);

                $hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $token = $this->generateRandomString(255);

                $this->Auth_candidat->insert_entry($this->input->post('name'), $this->input->post('email'), $hash, $token);

                // TODO: Rediriger vers connexion
                redirect('accueil/login');
            }
        }
        $this->load->view('include/header', $data);
        $this->load->view('main/inscription');
        $this->load->view('include/footer', $data);
    }

    private function generateRandomString($length) //Fonction permettant de créer le token
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function forgotPassword()
    {
        $data['title'] = 'Mot de passe oublié - Blank Page';

        if (isset($_POST['submitted'])) {

            $this->form_validation->set_rules('email', 'Adresse E-mail', 'trim|required|valid_email');

            if ($this->form_validation->run() === TRUE) {

                $this->form_validation->set_data($_POST);

                $this->load->model('Auth_candidat', '', TRUE);
                $user = $this->Auth_candidat->get_user($this->input->post('email'));

                if (isset($user)) {

                    $token = $this->generateRandomString(255);

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

                    $message = 'Vous recevez ce mail suite à l\'oubli de votre mot de passe actuel. Veuillez cliquez sur le lien ci-dessous pour accéder au formulaire de saisie de votre nouveau mot de passe.<br/><a href="http://localhost/blankpageCI/accueil/newPassword/' . $token . '">http://localhost/blankpageCI/accueil/newPassword/' . $token .'</a>';
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('blankpage.nfs@gmail.com', 'Blank Page');
                    $this->email->to($this->input->post('email'));
                    $this->email->reply_to('blankpage.nfs@gmail.com');
                    $this->email->subject('Mot de passe oublié - Blank Page');
                    $this->email->message($message);
                    if (!$this->email->send()) {
                        show_error($this->email->print_debugger());
                    }

                    $this->session->set_userdata('token', $token);
                    $this->session->set_userdata('email', $this->input->post('email'));
                    redirect('accueil/resetPassword');

                } else {
                    $this->session->set_flashdata('fail_email', 'Adresse e-mail inexistante');
                }
            }
        }
        $this->load->view('include/header', $data);
        $this->load->view('main/forgotPassword', $data);
        $this->load->view('include/footer', $data);
    }

    public function newPassword($token)
    {
        $data['title'] = 'Nouveau mot de passe - Blank Page';

        if ($token == $this->session->userdata('token')) {

            if (isset($_POST['submitted'])) {

                $rules = array(
                    array(
                        'field' => 'password',
                        'label' => 'Nouveau Mot de Passe',
                        'rules' => 'trim|required|min_length[6]|max_length[200]'
                    ),
                    array(
                        'field' => 'confirmpassword',
                        'label' => 'Confirmation Nouveau Mot de Passe',
                        'rules' => 'trim|required|min_length[6]|max_length[200]|matches[password]'
                    )
                );

                $this->form_validation->set_rules($rules);

                if ($this->form_validation->run() === TRUE) {

                    $this->form_validation->set_data($_POST);

                    $this->load->model('Auth_candidat', '', TRUE);

                    $hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $token = $this->generateRandomString(255);

                    $this->Auth_candidat->update_password_through_email($this->session->userdata('email'), $hash, $token);

                    // TODO: Rediriger vers connexion
                    redirect('accueil/login');
                }
            }

            $this->load->view('include/header', $data);
            $this->load->view('main/newPassword', $data);
            $this->load->view('include/footer', $data);
        } else {
            echo 'Token invalide';
        }
    }

    public function resetPassword()
    {
        $data['title'] = 'Reset mot de passe - Blank Page';

        $this->load->view('include/header', $data);
        $this->load->view('main/resetPassword', $data);
        $this->load->view('include/footer', $data);
    }

}
