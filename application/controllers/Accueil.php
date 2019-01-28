<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function index()
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

    public function profil_candidat()
    {
        $data['title'] = 'Blank Page - Profil';

        $this->load->view('include/header', $data);
        $this->load->view('include/following_menu', $data);
        $this->load->view('include/sidebar_menu', $data);
        $this->load->view('include/header_menu', $data);
        $this->load->view('main/profil_candidat', $data);
        $this->load->view('include/footer_menu', $data);
        $this->load->view('include/footer', $data);
    }

	public function login()
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

                $this->db->select('*');
                $this->db->from('bp_candidats');
                $this->db->where('email', $this->input->post('email'));
                $user = $this->db->get()->result_array();

                if (isset($user)) {
                    $password = $user[0]['password'];
                    if(!password_verify($this->input->post('password'), $password)) {
                        $this->form_validation->set_message('password', 'Mot de passe erroné');
                    } else {

                        $_SESSION['bp_candidats'] = array(
                            'id'      => $user[0]['id'],
                            'email'   => $user[0]['email'],
                            'ip'      => $_SERVER['REMOTE_ADDR']
                        );

                        $userdata = array(
                            'name'     =>  $user[0]['name'],
                            'email'    =>  $user[0]['email'],
                        );

                        $this->session->set_userdata($userdata);

                        // TODO: Rediriger vers connexion
                        redirect('candidats/index');
                    }
                } else {
                    $this->form_validation->set_message('email', 'Veuillez vous inscrire');
                }

            }
        }
        $this->load->view('include/header', $data);
        $this->load->view('main/login', $data);
        $this->load->view('include/footer', $data);
    }


    public function inscription()
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
                    'rules' => 'trim|required|min_length[6]|max_length[70]|is_unique[bp_candidats.email]|valid_email'
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

    private function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
