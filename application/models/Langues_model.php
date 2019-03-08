<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:13
 */

class Langues_model extends CI_Model
{
    public $name;
    public $niveau;

    function __construct()
    {
        parent::__construct();
        $this->table = "bp_langues";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, niveau,id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }


    public function insert_entry($name, $niveau, $id_candidat) //Insère les données saisies par l'utilisateur dans la table 'langues'
    {
        $langues = array(
            'name'                => $name,
            'niveau'              => $niveau,
            'id_candidats'        => $id_candidat
        );

        $this->db->insert('bp_langues', $langues);
    }
}