<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:05
 */

class Certification_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_certifications";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, description, date, duree, id_candidats")
            ->from($this->table)
            ->where("id", $id)
            ->limit(1);

        return $this->db->get();
    }
}

/* End of file Certification_model.php */
/* Location: ./application/models/Certification_model.php */