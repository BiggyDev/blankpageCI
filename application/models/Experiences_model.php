<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:21
 */

class Experiences_model extends CI_Model
{
    public $entreprise;
    public $intitule;
    public $date_debut;
    public $duree;
    public $description;
    public $adresse;
    public $cp;
    public $ville;

    function __construct()
    {
        parent::__construct();
        $this->table = "bp_experiences";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, entreprise, intitule,date_debut,duree,description,adresse,cp,ville,id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }

    public function insert_entry($entreprise, $intitule, $date_debut, $duree, $description, $adresse, $cp, $ville, $id_candidat) //Insère les données saisies par l'utilisateur dans la table 'experiences'
    {
        $experiences = array(

            'entreprise'       => $entreprise,
            'intitule'         => $intitule,
            'date_debut'       => $date_debut,
            'duree'            => $duree,
            'description'      => $description,
            'adresse'          => $adresse,
            'cp'               => $cp,
            'ville'            => $ville,
            'id_candidats'      => $id_candidat
        );

        $this->db->insert('bp_experiences', $experiences);
    }
}

/* End of file Experience_model.php */
/* Location: ./application/models/Experience_model.php */