<?php
/**
 * Created by PhpStorm.
 * User: yamna
 * Date: 23/01/2019
 * Time: 10:04
 */

class Reseaux_model extends CI_Model
{
    public $linkedin;
    public $facebook;
    public $twitter;
    public $dribbble;
    public $instagram;
    public $twitch;

    function __construct()
    {
        parent::__construct();
        $this->table = "bp_reseaux";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("id, linkedin, facebook, twitter, dribbble, instagram, twitch, id_candidats")
            ->from($this->table)
            ->where("id_candidats", $id);

        return $this->db->get();
    }

    public function insert_entry($linkedin, $facebook, $twitter, $dribbble, $instagram, $twitch, $id_candidat) //Insère les données saisies par l'utilisateur dans la table 'reseaux'
    {
        $reseaux = array(

            'linkedin'         => $linkedin,
            'facebook'         => $facebook,
            'twitter'          => $twitter,
            'dribbble'         => $dribbble,
            'instagram'        => $instagram,
            'twitch'           => $twitch,
            'id_candidats'     => $id_candidat
        );

        $this->db->insert('bp_reseaux', $reseaux);
    }
}

/* End of file Reseaux_model.php */
/* Location: ./application/models/Reseaux_model.php */