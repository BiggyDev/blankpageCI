<?php
/**
 * Created by PhpStorm.
 * User: yamna
 * Date: 23/01/2019
 * Time: 10:04
 */

class Infos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_infos";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, age, sexe, adresse, cp, ville, portable, permis, vehicule, picture, bio, portfolio, more, mobilite, rayon, id_candidats")
            ->from($this->table)
            ->where("id", $id)
            ->limit(1);

        return $this->db->get();
    }
}

/* End of file Infos_model.php */
/* Location: ./application/models/Infos_model.php */