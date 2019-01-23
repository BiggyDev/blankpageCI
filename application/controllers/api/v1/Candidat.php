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
        parent::__construct();
        $this->load->database();
        $this->load->model("Candidat_model");
    }

    public function index(){
        $data= $this->Candidat_model->get_all();

        if ($data->num_rows() > 0){
            foreach ($data->result() as $row){
                $result[] = array("id" => intval($row->id), "name" => $row->name, "email" => $row->email,"created_at"=> $row->created_at);
            }
            echo json_encode($result);
        }
        else{
            header("HTTP/1.0 204 No Content");
            echo json_encode("204: no products in the database");
        }
    }

    public function view($id){
        $data = $this->Candidat_model->get_one($id);

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $result[] = array("id" => intval($row->id), "name" => $row->name, "email" => $row->email,"created_at"=> $row->created_at);
            }
            echo json_encode($result);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode("404 : Product #$id not found");
        }
    }
}

/* End of file Candidat.php */
/* Location: ./application/controllers/Candidat.php */