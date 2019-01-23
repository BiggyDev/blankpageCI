<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:16
 */


class Formation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_formation";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, ecole, adresse,cp,ville,diplome,datedebut,duree,mention,id_candidats")
            ->from($this->table)
            ->where("id", $id)
            ->limit(1);

        return $this->db->get();
    }
}

/* End of file Formation_model.php */
/* Location: ./application/models/Formation_model.php */