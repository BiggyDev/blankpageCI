<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:13
 */

class Competencestech_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_competencestech";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, niveau,id_candidats")
            ->from($this->table)
            ->where("id", $id)
            ->limit(1);

        return $this->db->get();
    }
}

/* End of file Competencestech_model.php */
/* Location: ./application/models/Competencestech_model.php */