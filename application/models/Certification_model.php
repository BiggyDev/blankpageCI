<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:05
 */

class Certification_model extends CI_Model
{

    public $name;
    public $description;
    public $date;
    public $duree;

    function __construct()
    {
        parent::__construct();
        $this->table = "bp_certifications";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, name, description, date, duree, id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }

    public function insert_entry($name, $description, $date, $duree, $id_candidat) //Insère les données saisies par l'utilisateur dans la table 'certifications'
    {
        $certification = array(

            'name'                => $name,
            'description'         => $description,
            'date'                => $date,
            'duree'               => $duree,
            'id_candidats'        => $id_candidat
        );

        $this->db->insert('bp_certifications', $certification);
    }
}

/* End of file Certification_model.php */
/* Location: ./application/models/Certification_model.php */