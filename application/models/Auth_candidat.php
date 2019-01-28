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
}