<?php
/**
 * Created by PhpStorm.
 * User: yamna
 * Date: 23/01/2019
 * Time: 10:04
 */

class Savoiretre_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_savoiretre";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }
}


/* End of file Savoiretre_model.php */
/* Location: ./application/models/Savoiretremodel.php */