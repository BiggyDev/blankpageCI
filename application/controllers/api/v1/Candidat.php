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
        // Charge tout les modeles

        parent::__construct();
        $this->load->database();
        $this->load->model("Candidat_model");
        $this->load->model("Certification_model");
        $this->load->model("Competencestech_model");
        $this->load->model("Experiences_model");
        $this->load->model("Formation_model");
        $this->load->model("Infos_model");
        $this->load->model("Interet_model");
        $this->load->model("Reseaux_model");
        $this->load->model("Savoiretre_model");
    }

    public function index(){
        $dataCandidat= $this->Candidat_model->get_all();

        if ($dataCandidat->num_rows() > 0){
            foreach ($dataCandidat->result() as $row){
                $result[] = $this->view(intval($row->id), false);
            }
            echo json_encode($result);
        }
        else{
            header("HTTP/1.0 204 No Content");
            echo json_encode("204: no products in the database");
        }
    }

    public function view($id, $echo = true){

        $dataCandidat = $this->Candidat_model->get_one($id);
        $dataCertification = $this->Certification_model->get_one($id);
        $dataCompetencestech = $this->Competencestech_model->get_one($id);
        $dataExperience = $this->Experiences_model->get_one($id);
        $dataFormation = $this->Formation_model->get_one($id);
        $dataInfos = $this->Infos_model->get_one($id);
        $dataInteret = $this->Interet_model->get_one($id);
        $dataReseaux = $this->Reseaux_model->get_one($id);
        $dataSavoirEtre = $this->Savoiretre_model->get_one($id);

        $local= function ($candidat,$certification,$competences,$experience,$formation,$info,$interet,$reseaux,$savoir){

            foreach ($candidat->result() as $row) {
                $result[] = array("id" => intval($row->id), "name" => $row->name, "email" => $row->email,"created_at"=> $row->created_at);
            }

            foreach ($certification->result() as $row){
                $result["nomcertif"]=$row->name;
                $result["descriptioncertif"]=$row->description;
                $result["datecertif"]=$row->date;
                $result["dureecertif"]=$row->duree;
            }

            foreach ($competences->result() as $row){
                $result["namecompetence"]=$row->name;
                $result["niveaucompentence"]=$row->niveau;
            }

            foreach ($experience->result() as $row){
                $result["entreprisexp"]=$row->entreprise;
                $result["intitulexp"]=$row->intitule;
                $result["date_debutxp"]=$row->date_debut;
                $result["dureexp"]=$row->duree;
                $result["descriptionxp"]=$row->description;
                $result["adressexp"]=$row->adresse;
                $result["cpxp"]=$row->cp;
                $result["villexp"]=$row->ville;
            }
            foreach ($formation->result() as $row){
                $result["ecoleformation"]=$row->ecole;
                $result["adresseformation"]=$row->adresse;
                $result["cpformation"]=$row->cp;
                $result["villeformation"]=$row->ville;
                $result["diplomeformation"]=$row->diplome;
                $result["datedebutformation"]=$row->datedebut;
                $result["dureeformation"]=$row->duree;
                $result["mentionformation"]=$row->mention;
            }
            foreach ($info->result() as $row){
                $result["ageinfo"]=$row->age;
                $result["sexeinfo"]=$row->sexe;
                $result["adresseinfo"]=$row->adresse;
                $result["cpinfo"]=$row->cp;
                $result["villeinfo"]=$row->ville;
                $result["portableinfo"]=$row->portable;
                $result["permisinfo"]=$row->permis;
                $result["vehiculeinfo"]=$row->vehicule;
                $result["pictureinfo"]=$row->picture;
                $result["bioinfo"]=$row->bio;
                $result["portfolioinfo"]=$row->portfolio;
                $result["moreinfo"]=$row->more;
                $result["mobiliteinfo"]=$row->mobilite;
                $result["rayoninfo"]=$row->rayon;
            }
            foreach ($interet->result() as $row){
                $result["nameinteret"]= $row->name;
                $result["descriptioninteret"]= $row->description;
            }
            foreach ($reseaux->result() as $row){
                $result["namereseau"]= $row->name;
                $result["lienreseau"]= $row->lien;
            }
            foreach ($savoir->result() as $row){
                $result["namesavoir"]=$row->name;
            }


            return $result;
        };

        if ($dataCandidat->num_rows() > 0) {
                $result = $local($dataCandidat,$dataCertification, $dataCompetencestech,$dataExperience,$dataFormation,$dataInfos,$dataInteret,$dataReseaux,$dataSavoirEtre);
                if($echo){
                    echo json_encode($result);
                }else{
                    return $result;
                }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode("404 : Product #$id not found");
        }
    }
}

/* End of file Candidat.php */
/* Location: ./application/controllers/Candidat.php */