<?php
/**
 * Created by PhpStorm.
 * User: yamna
 * Date: 19/02/2019
 * Time: 15:41
 */

class Langues_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "bp_langues";
    }

    function get_all(){
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, niveau, id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }
}

/* End of file Langues_model.php */
