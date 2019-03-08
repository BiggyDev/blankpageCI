<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23/01/2019
 * Time: 09:40
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Candidat extends CI_Controller{

    function __construct()
    {
        // Charge tout les modèles pour l'interaction en BDD
        parent::__construct();
        $this->load->database();
        $this->load->model("Candidat_model");
        $this->load->model("Certification_model");
        $this->load->model("Competencestech_model");
        $this->load->model("Experiences_model");
        $this->load->model("Formation_model");
        $this->load->model("Infos_model");
        $this->load->model("Interet_model");
        $this->load->model("Langues_model");
        $this->load->model("Reseaux_model");
        $this->load->model("Savoiretre_model");
    }

    // Index() permet de charger toutes les informations d'un candidat
    public function index(){
        $dataCandidat= $this->Candidat_model->get_all();        // Récupération de tout les candidats

        $result = array();
        if ($dataCandidat->num_rows() > 0){
            foreach ($dataCandidat->result() as $row){
                $result[] = $this->view(intval($row->id), false);   // Création d'un tableau avec les données de chaque candidat.
            }
            echo json_encode($result);

        }
        else{
            header("HTTP/1.0 204 No Content");
            echo json_encode("204: no products in the database");
        }
    }

    public function viewfilter(){
        $dataInfos = $this->Infos_model->get_if_permis();

        $result = array();
        foreach ($dataInfos as $idcandidat){
            $result[]= $this->view(intval($idcandidat['id_candidats']),false);
        }
        echo json_encode($result);
    }

    public function viewcomp(){
        $dataComp = $this->Competencestech_model->get_if_php();

        foreach ($dataComp as $idcandidat){
            $result[] = $this->view(intval($idcandidat['id_candidats']),false);
        }
        echo json_encode($result);
    }

    public function viewcom($comp){
        $dataComp = $this->Competencestech_model->get_if_comp($comp);

        if ($dataComp != null){
            foreach ($dataComp as $idcandidat){
                $result[] = $this->view(intval($idcandidat['id_candidats']),false);
            }
            echo json_encode($result);
        }
    }

    public function view($id, $echo = true){

        //Va dans les différents model pour aller chercher les informations d'un candidat par son ID.
        $dataCandidat = $this->Candidat_model->get_one($id);
        $dataCertification = $this->Certification_model->get_one($id);
        $dataCompetencestech = $this->Competencestech_model->get_one($id);
        $dataExperience = $this->Experiences_model->get_one($id);
        $dataFormation = $this->Formation_model->get_one($id);
        $dataInfos = $this->Infos_model->get_one($id);
        $dataInteret = $this->Interet_model->get_one($id);
        $dataLangues= $this->Langues_model->get_one($id);
        $dataReseaux = $this->Reseaux_model->get_one($id);
        $dataSavoirEtre = $this->Savoiretre_model->get_one($id);


        $local= function ($candidat,$certification,$competences,$experience,$formation,$info,$interet,$langues,$reseaux,$savoir) {
            $result = array();
            foreach ($candidat->result_array() as $row) {
                $result["id"] = $row['id'];
                $result["nomcandidat"] = $row['name'];
                $result["emailcandidat"] = $row['email'];
                $result["datecreationcandidat"] = $row['created_at'];
            }

            $i = 0;
//            $result['certif'] = array();
            foreach ($certification->result_array() as $row) {
                $result['certif'][$i]['nomcertif'] = $row['name'];
                $result['certif'][$i]["descriptioncertif"] = $row['description'];
                $result['certif'][$i]["datecertif"] = $row['date'];
                $result['certif'][$i]["dureecertif"] = $row['duree'];
                $i++;
            }
            $i = 0;

            foreach ($competences->result_array() as $row) {
                $result['comp'][$i]["namecompetence"] = $row['name'];
                $i++;
            }
            $i = 0;
            foreach ($experience->result_array() as $row) {
                $result['xp'][$i]["entreprisexp"] = $row['entreprise'];
                $result['xp'][$i]["intitulexp"] = $row['intitule'];
                $result['xp'][$i]["date_debutxp"] = $row['date_debut'];
                $result['xp'][$i]["dureexp"] = $row['duree'];
                $result['xp'][$i]["descriptionxp"] = $row['description'];
                $result['xp'][$i]["adressexp"] = $row['adresse'];
                $result['xp'][$i]["cpxp"] = $row['cp'];
                $result['xp'][$i]["villexp"] = $row['ville'];
                $i++;
            }
            $i = 0;
            foreach ($formation->result_array() as $row) {
                $result['formation'][$i]["ecoleformation"] = $row['ecole'];
                $result['formation'][$i]["adresseformation"] = $row['adresse'];
                $result['formation'][$i]["cpformation"] = $row['cp'];
                $result['formation'][$i]["villeformation"] = $row['ville'];
                $result['formation'][$i]["diplomeformation"] = $row['diplome'];
                $result['formation'][$i]["datedebutformation"] = $row['datedebut'];
                $result['formation'][$i]["dureeformation"] = $row['duree'];
                $result['formation'][$i]["mentionformation"] = $row['mention_commentaires'];
                $i++;
            }
            foreach ($info->result_array() as $row) {
                $result["ageinfo"] = $row['age'];
                $result["sexeinfo"] = $row['sexe'];
                $result["adresseinfo"] = $row['adresse'];
                $result["cpinfo"] = $row['cp'];
                $result["villeinfo"] = $row['ville'];
                $result["portableinfo"] = $row['portable'];
                $result["permisinfo"] = $row['permis'];
                $result["vehiculeinfo"] = $row['vehicule'];
                $result["bioinfo"] = $row['bio'];
                $result["portfolioinfo"] = $row['portfolio'];
                $result["moreinfo"] = $row['more'];
            }
            $i = 0;
            foreach ($interet->result_array() as $row) {
                $result['interet'][$i]["nameinteret"] = $row['name'];
                $result['interet'][$i]["descriptioninteret"] = $row['description'];
                $i++;
            }
            $i = 0;

            foreach ($langues->result_array() as $row) {
                $result['langues'][$i]['namelangue'] = $row['name'];
                $result['langues'][$i]['niveaulangue'] = $row['niveau'];

            }
            $i = 0;
            foreach ($reseaux->result_array() as $row) {
                $result['reseau']["linkedin"] = $row['linkedin'];
                $result['reseau']["facebook"] = $row['facebook'];
                $result['reseau']["twitter"] = $row['twitter'];
                $result['reseau']["dribble"] = $row['dribbble'];
                $result['reseau']["instagram"] = $row['instagram'];
                $result['reseau']["twitch"] = $row['twitch'];
            }
            $i = 0;
            foreach ($savoir->result_array() as $row) {
                $result['savoir'][$i]["namesavoir"] = $row['name'];
                $i++;
            }
            return $result;
        };

        if ($dataCandidat->num_rows() > 0) {
            $resultat = $local($dataCandidat,$dataCertification, $dataCompetencestech,$dataExperience,$dataFormation,$dataInfos,$dataInteret,$dataLangues,$dataReseaux,$dataSavoirEtre);
            // Encodage et affichage des informations du candidat si echo == true

            if($echo){

                echo json_encode($resultat);
            }else{
                return $resultat; // Sinon, on return le tableau (utilisation de ce tableau dans la fonction index)
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode("404 : Product #$id not found");
        }
    }
}

/* End of file Candidat.php */
/* Location: ./application/controllers/Candidat.php */