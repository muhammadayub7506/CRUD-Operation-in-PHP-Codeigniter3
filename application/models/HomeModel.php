<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{

    public function add_data($post)
    {
        // $post['userid'] = mt_rand(11111,99999);
        // $post['uname'] = $postdata['username'];
        // $post['pass'] = $postdata['password'];
        // $post['uemail'] = $postdata['email'];
        $q = $this->db->insert('register', ['name' => $post['name'], 'email' => $post['email'], 'phone' => $post['phone'], 'language' => $post['language'], 'gender' => $post['gender'], 'qualification' => $post['qualification'], 'image' => $post['image']]);
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    public function update_data($post)
    {
        if($post['image'] != ''){
            $q = $this->db->where('id', $post['id'])->update('register', ['name' => $post['name'], 'email' => $post['email'], 'phone' => $post['phone'], 'language' => $post['language'], 'gender' => $post['gender'], 'qualification' => $post['qualification'], 'image' => $post['image']]);
            if ($q) {
                return true;
            } else {
                return false;
            }
        }
        else {
            $q = $this->db->where('id', $post['id'])->update('register', ['name' => $post['name'], 'email' => $post['email'], 'phone' => $post['phone'], 'language' => $post['language'], 'gender' => $post['gender'], 'qualification' => $post['qualification']]);
            if ($q) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function all_data($id = '')
    {
        if ($id != '') {
            $q = $this->db->where('id', $id)->get('register');
            if ($q->num_rows()) {
                return $q->row();
            }
        } else {
            $q = $this->db->get('register');
            if ($q->num_rows()) {
                return $q->result();
            }
        }

    }
    public function delete_data($id){
        $q= $this->db->where('id', $id)->delete('register');
        if($q){
            return true;
        }
    }

    // ---------------------------------------------------------------
    // these code is for queries and fetching data from database.....
    // public function queries(){
    //     // $q = $this->db->query('select * from users ); // This is the normal query for selecting the data in codeigniter....

    //     // return $this->db->select('count(userid)')->where('uname', 'shoib')->get('users')->row(); // This is called active records through which we can shorten our query and these active records are working properly as the normal query do....
    //     //showing how many rows are here in table through active records and query.....
    //     //  return $this->db->get('users')->num_rows();
    //     // return $q->result_array();
    //     // return $q->row();
    // }
    // ----------------------------------------------------------------
    // These were functions of addition and subtraction the values using model and showing in view page by loading the model in controller....
    // public function sum(){
    //     $a = 10;
    //     $b = 57;
    //     return $a + $b;
    // }
    // public function sub(){
    //     $a = 100;
    //     $b = 57;
    //     return $a - $b;
    // }
}
