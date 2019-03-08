<?php

class Auth_candidat extends CI_Model
{
    protected $name;
    protected $email;
    protected $password;
    protected $token;

    public function insert_entry($name, $email, $password, $token) //Insère les données de connexion de l'utilisateur
    {
        $candidat = array(

            'name'          => $name,
            'email'         => $email,
            'password'      => $password,
            'token'         => $token
        );

        $this->db->insert('bp_candidats', $candidat);
    }

    public function get_user($email) //Recherche si le mail existe
    {
        $this->db->select('*');
        $this->db->from('bp_candidats');
        $this->db->where('email', $email);

        return $this->db->get()->result_array();
    }

    public function update_email($email) //Update de l'email de l'utilisateur
    {
        $data = array(
          'email' => $email
        );

        $this->db->where('id', $_SESSION['bp_candidats']['id']);
        $this->db->update('bp_candidats', $data);
    }

    public function update_password($password, $token) //Update du mot de passe et du token de l'utilisateur
    {
        $data = array(
            'password' => $password,
            'token'    => $token
        );

        $this->db->where('id', $_SESSION['bp_candidats']['id']);
        $this->db->update('bp_candidats', $data);
    }

    public function update_password_through_email($email, $password, $token) //Update du mot de passe et du token de l'utilisateur via l'email
    {
        $data = array(
            'password' => $password,
            'token'    => $token
        );

        $this->db->where('email', $email);
        $this->db->update('bp_candidats', $data);
    }

    public function get_cv_candidats($id) //Recupère les données de la table 'candidats' pour l'id connecté
    {
        $this->db->select('name, email');
        $this->db->from('bp_candidats');
        $this->db->where('id', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_certifications($id) //Recupère les données de la table 'certifications' pour l'id connecté
    {
        $this->db->select('name,description,date,duree');
        $this->db->from('bp_certifications');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_competencestech($id) //Recupère les données de la table 'competencestech' pour l'id connecté
    {
        $this->db->select('name');
        $this->db->from('bp_competencestech');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_experiences($id) //Recupère les données de la table 'experiences' pour l'id connecté
    {
        $this->db->select('entreprise,intitule,date_debut,duree,description,adresse,cp,ville');
        $this->db->from('bp_experiences');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_formations($id) //Recupère les données de la table 'formations' pour l'id connecté
    {
        $this->db->select('ecole,adresse,cp,ville,diplome,datedebut,duree,mention_commentaires');
        $this->db->from('bp_formation');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_infos($id) //Recupère les données de la table 'infos' pour l'id connecté
    {
        $this->db->select('age,sexe,adresse,cp,ville,portable,permis,vehicule,bio,portfolio,more');
        $this->db->from('bp_infos');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_interets($id) //Recupère les données de la table 'interets' pour l'id connecté
    {
        $this->db->select('name,description');
        $this->db->from('bp_interet');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_langues($id) //Recupère les données de la table 'langues' pour l'id connecté
    {
        $this->db->select('name,niveau');
        $this->db->from('bp_langues');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_reseaux($id) //Recupère les données de la table 'reseaux' pour l'id connecté
    {
        $this->db->select('linkedin,facebook,twitter,dribbble,instagram,twitch');
        $this->db->from('bp_reseaux');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

    public function get_cv_savoiretre($id) //Recupère les données de la table 'savoiretre' pour l'id connecté
    {
        $this->db->select('name');
        $this->db->from('bp_savoiretre');
        $this->db->where('id_candidats', $id);

        return $this->db->get()->result_array();
    }

}