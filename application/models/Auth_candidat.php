<?php

class Auth_candidat extends CI_Model
{
    protected $name;
    protected $email;
    protected $password;
    protected $token;

    public function insert_entry($name, $email, $password, $token)
    {
        $candidat = array(

            'name'          => $name,
            'email'         => $email,
            'password'      => $password,
            'token'         => $token
        );

        $this->db->insert('bp_candidats', $candidat);
    }

    public function get_user($email)
    {
        $this->db->select('*');
        $this->db->from('bp_candidats');
        $this->db->where('email', $email);

        return $this->db->get()->result_array();
    }
}