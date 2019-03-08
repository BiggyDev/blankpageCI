<?php
/**
 * Created by PhpStorm.
 * User: yamna
 * Date: 23/01/2019
 * Time: 10:04
 */

class Interet_model extends CI_Model
{
    public $name;
    public $description;

    function __construct()
    {
        parent::__construct();
        $this->table = "bp_interet";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, description, id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }

    public function insert_entry($name, $description, $id_candidat) //Insère les données saisies par l'utilisateur dans la table 'interets'
    {
        $interets = array(

            'name'                => $name,
            'description'         => $description,
            'id_candidats'        => $id_candidat
        );

        $this->db->insert('bp_interet', $interets);
    }
}

/* End of file Interet_model.php */
/* Location: ./application/models/Interet_model.php */