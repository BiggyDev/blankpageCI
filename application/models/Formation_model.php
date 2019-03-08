<?php
/**
 * Created by PhpStorm.
 * User: Baptiste ANGOT
 * Date: 23/01/2019
 * Time: 10:16
 */


class Formation_model extends CI_Model
{
    public $ecole;
    public $adresse;
    public $cp;
    public $ville;
    public $diplome;
    public $datedebut;
    public $duree;
    public $mention;

    function __construct()
    {
        parent::__construct();
        $this->table = "bp_formation";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, ecole, adresse,cp,ville,diplome,datedebut,duree,mention_commentaires,id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }

    public function insert_entry($ecole, $adresse, $cp, $ville, $diplome, $datedebut, $duree, $mention, $id_candidat) //Insère les données saisies par l'utilisateur dans la table 'formations'
    {
        $formation = array(

            'ecole'                         => $ecole,
            'adresse'                       => $adresse,
            'cp'                            => $cp,
            'ville'                         => $ville,
            'diplome'                       => $diplome,
            'datedebut'                     => $datedebut,
            'duree'                         => $duree,
            'mention_commentaires'          => $mention,
            'id_candidats'                  => $id_candidat
        );

        $this->db->insert('bp_formation', $formation);
    }
}

/* End of file Formation_model.php */
/* Location: ./application/models/Formation_model.php */