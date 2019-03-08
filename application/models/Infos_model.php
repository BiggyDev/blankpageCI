<?php
/**
 * Created by PhpStorm.
 * User: yamna
 * Date: 23/01/2019
 * Time: 10:04
 */

class Infos_model extends CI_Model
{
    protected $age;
    protected $sexe;
    protected $adresse;
    protected $cp;
    protected $ville;
    protected $portable;
    protected $permis;
    protected $vehicule;
    protected $bio;
    protected $portfolio;
    protected $more;

    function __construct()
    {
        parent::__construct();
        $this->table = "bp_infos";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_if_permis(){
        $this->db->select("id_candidats")
            ->from($this->table)
            ->where("permis is not null", null);
        return $this->db->get()->result_array();
    }

    function get_one($id)
    {
        $this->db->select("id, age, sexe, adresse, cp, ville, portable, permis, vehicule, bio, portfolio, more, id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }


    public function insert_entry($age, $sexe, $adresse, $cp, $ville, $portable, $permis, $vehicule, $bio, $portfolio, $more, $id_candidat) //Insère les données saisies par l'utilisateur dans la table 'infos'
    {
        $infos = array(

            'age'               => $age,
            'sexe'              => $sexe,
            'adresse'           => $adresse,
            'cp'                => $cp,
            'ville'             => $ville,
            'portable'          => $portable,
            'permis'            => $permis,
            'vehicule'          => $vehicule,
            'bio'               => $bio,
            'portfolio'         => $portfolio,
            'more'              => $more,
            'id_candidats'      => $id_candidat
        );

        $this->db->insert('bp_infos', $infos);
    }
}

/* End of file Infos_model.php */
/* Location: ./application/models/Infos_model.php */