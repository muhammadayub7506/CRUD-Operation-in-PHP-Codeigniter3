<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crudcontroller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('homemodel');
    }
    public function index(){
        $data['title'] = 'Insert Info';
        $data['page']  = 'insert';
        $this->load->view('template', $data);

    }
    public function add_data(){
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('language', 'language', 'required');
        if(empty($_FILES['image']['name'])){
            $this->form_validation->set_rules('image', 'image/document', 'required');
                                                                                            
        }
        if($this->form_validation->run()){
            $post = $this->input->post();
            $config['upload_path'] = './uploads';
            $config['allowed_types'] ='*';
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $data = $this->upload->data();
            $post['image'] = $data['file_name'];
            $check = $this->homemodel->add_data($post);
            if($check){
                $this->session->set_flashdata('successMsg', 'Data inserted successfully');
                redirect('Crudcontroller/all_data');
            }else{

            }
            
        }else{
            $data['title'] = 'Insert Info';
            $data['page']  = 'insert';
            $this->load->view('template', $data);
        }
    }
    
    public function all_data($id=''){
        if($id!=''){
            $data['arr'] = $this->homemodel->all_data($id);
            $data['title'] = 'Insert Info';
            $data['page']  = 'insert';
            $this->load->view('template', $data);
            // print_r($data['arr']);
            // die();
            // $this->load->view('all_data', $data);
        }else{
            $data['arr'] = $this->homemodel->all_data();
            $data['title'] = 'Home';
            $data['page']  = 'all_data';
            $this->load->view('template', $data);
        }
    }

    // public function update_data(){
    //     $this->form_validation->set_rules('name', 'Full Name', 'required');
    //     $this->form_validation->set_rules('email', 'email', 'required|valid_email');
    //     $this->form_validation->set_rules('phone', 'phone', 'required');
    //     $this->form_validation->set_rules('language', 'language', 'required');
    //     if($this->form_validation->run()){
    //         $post = $this->input->post();
    //         $config['upload_path'] = './uploads';
    //         $config['allowed_types'] ='*';
    //         $this->load->library('upload', $config);
    //         $this->upload->do_upload('image');
    //         $data = $this->upload->data();
    //         $post['image'] = $data['file_name'];

    //         // if(empty($post['image'])){
    //         //     $post['image'] = $post['image_old'];
    //         // }
    //         // else{
    //         //     $post['image'] = $data['file_name'];
    //         // }

    //         $check = $this->homemodel->update_data($post);
    //         if($check){
    //             $this->session->set_flashdata('successMsg','Record Updated Successfully');
    //             redirect('Crudcontroller/all_data');
    //         }else{

    //         }
            
    //     }else{
    //         $id = $this->input->post('id');
    //         $data['arr'] = $this->homemodel->all_data($id);
    //         $data['title'] = 'Update Info';
    //         $data['page']  = 'insert';
    //         $this->load->view('template', $data);
    //     }

    // }

    public function update_data(){
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('language', 'language', 'required');
        
        if($this->form_validation->run()){
            $post = $this->input->post();
            $old_filename = $post['image_old'];
            $new_filename = $_FILES['image']['name'];
            
            if (!empty($new_filename)) {
                // Upload new image
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    // Delete the old image file
                    if (file_exists('./uploads/' . $old_filename)) {
                        unlink('./uploads/' . $old_filename);
                    }
                    $data = $this->upload->data();
                    $post['image'] = $data['file_name'];
                } else {
                    $this->session->set_flashdata('errorMsg', $this->upload->display_errors());
                    redirect('Crudcontroller/all_data');
                }
            } else {
                // If no new image uploaded, keep the old image
                $post['image'] = $old_filename;
            }
            
            $check = $this->homemodel->update_data($post);
            if($check){
                $this->session->set_flashdata('successMsg','Record Updated Successfully');
                redirect('Crudcontroller/all_data');
            } else {
                // Handle update error
                $this->session->set_flashdata('errorMsg', 'Failed to update record');
                redirect('Crudcontroller/all_data');
            }
        } else {
            $id = $this->input->post('id');
            $data['arr'] = $this->homemodel->all_data($id);
            $data['title'] = 'Update Info';
            $data['page']  = 'insert';
            $this->load->view('template', $data);
        }
    }
    public function delete_data($id){
        $check = $this->homemodel->delete_data($id);
        if($check){
            redirect('Crudcontroller/all_data');
        }
    }

}
?>