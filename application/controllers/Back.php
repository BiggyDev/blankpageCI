<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 23/01/2019
 * Time: 19:14
 */

class Back extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Blank Page - Admin';

        $this->load->view('include/header', $data);
        $this->load->view('back/index', $data);
        $this->load->view('include/footer', $data);
    }

    public function candidats()
    {
        $data['title'] = 'Blank Page - Admin';

        $this->load->view('include/header', $data);
        $this->load->view('back/candidats', $data);
        $this->load->view('include/footer', $data);
    }
}