<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:21
 */

class Experiences_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_experiences";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, entreprise, intitule,date_debut,duree,description,adresse,cp,ville,id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }
}

/* End of file Experience_model.php */
/* Location: ./application/models/Experience_model.php */