<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:13
 */

class Competencestech_model extends CI_Model
{
    public $name;

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
        $this->db->select("id, name,id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }

    function get_if_php(){
        $this->db->select("id_candidats")
            ->from($this->table)
            ->where('name','PHP');

        return $this->db->get()->result_array();
    }

    function get_if_comp($arg){
        $this->db->select('id_candidats')
            ->from($this->table)
            ->like('name', $arg);

        return $this->db->get()->result_array();
    }

    public function insert_entry($name)
    {
        $competencestech = array(
            'name'                => $name,
        );

        $this->db->insert('bp_competencestech', $competencestech);
    }
}

/* End of file Competencestech_model.php */
/* Location: ./application/models/Competencestech_model.php */