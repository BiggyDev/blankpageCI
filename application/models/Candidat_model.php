<?php


class Candidat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_candidats";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, email, password, token, created_at")
            ->from($this->table)
            ->where("id", $id);

        return $this->db->get();
    }
}

/* End of file Candidat_model.php */
/* Location: ./application/models/Candidat_model.php */