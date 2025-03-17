<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function index()
    {
        $this->load->helpers('form');
        $this->load->view('form');
    }

    public function my_func()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'User Name', 'required',);
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if(empty($_FILES['document']['name'])){
            $this->form_validation->set_rules('document', 'image', 'required');
        }

        if ($this->form_validation->run()) {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] ='*';

            $this->load->library('upload', $config);

            $this->upload->do_upload('document');
            $data = $this->upload->data();
            $postdata = $this->input->post();
            $postdata['image'] = $data['file_name'];
            $this->load->model('homemodel');
            $this->homemodel->add_data($postdata);
        } else {

            $this->load->view('form');
        }
    }
    // -------------------------------------------- ------------------------
    // Making Custom Libraries and loading the data of that library.... 
    // public function index(){
    //     $this->load->library('custom');
    //     $this->custom->sum();
    // }

    // --------------------------------------------------------------------
    // Making custom helpers and display the data from helper...
    // public function index() {
    //     $array = array('name'=>'Muhammad Ayub', 'Work'=>'PhP development' );
    //     $array2 = array('name'=>' Salamat Khan', 'Work'=>'Abusing Peoples' );
    //     $this->load->helper('test');

    //     clean($array);
    //     clean($array2);
    // }

    // --------------------------------------------------------------------
    // Code of using helpers of codeigniter.....
    // public function index(){
    //     $this->load->helpers('form');
    //     echo form_input('username', 'Ayub');
    // }

    //---------------------------------------------------------------------
    // Taking active records in database.....
    // public function index() {
    //     $this->load->model('homemodel');
    //     $data = $this->homemodel->queries();
    //     // echo $data->uname;
    //     // echo "<pre>";
    //     print_r($data);
    //     // foreach($data as $val){
    //     //     echo "<br>". "Name:- " . $val['uname'];
    //     //     echo "<br>". "Email:- " . $val['uemail'];
    //     //     // echo "<br>". "Name:- " . $val->uname;
    //     //     // echo "<br>". "Email:- " . $val->uemail;

    //     // }
    // }
    //----------------------------------------------------------------------
    // Loading Model here and print the values on loading the model and shows results in view page.......
    //    public function index() {
    //     // $this->load->library('database');
    //     $this->load->model('homemodel');
    //     $data ['sum']= $this->homemodel->sum();
    //     $data ['sub']= $this->homemodel->sub();
    //     $this->load->view('homepage', $data);
    //    }

    // --------------------------------------------------------------------
    // Sending values using view models to show in the controller.....
    // public function index($name) {
    //     $data ['name'] = $name;
    //     $data ['value'] = "My Name";
    //     $this->load->view('homepage', $data);
    // }


    // --------------------------------------------------------------------
    // Sending dynamic values through url with the help of view model.....
    // public function myfunc($name = '') {
    //     // $data ['name'] = $name;
    //     $data ['status'] = array("Ayub", "Hangu", "23", "completed");
    //     $this->load->view('homepage', $data);
    // }


    //----------------------------------------------------------------
    //Extra functions for practical purposes.....
    // public function myfunc() {
    //     $var = "Codeigniter 3 ";
    //     echo $var;
    // }
    // public function coding() {
    //     $this->load->view('homepage');
    //     $var = "Codeigniter 3 learning";
    //     echo $var;
    // }
}
