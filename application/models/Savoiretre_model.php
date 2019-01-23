<?php

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
            ->where("id", $id)
            ->limit(1);

        return $this->db->get();
    }
}


/* End of file Savoiretre_model.php */
/* Location: ./application/models/Savoiretremodel.php */