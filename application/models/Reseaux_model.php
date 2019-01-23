<?php

class Reseaux_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_reseaux";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, lien, id_candidats")
            ->from($this->table)
            ->where("id", $id)
            ->limit(1);

        return $this->db->get();
    }
}

/* End of file Reseaux_model.php */
/* Location: ./application/models/Reseaux_model.php */