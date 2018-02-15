<?php
class User_model extends CI_Model{
// function __construct() {
// parent::__construct();
// }
    function form_insert($data){

        // Inserting in Table(users) of Database(ci_project_login)
        $this->db->insert('users', $data);
    }

    function form_login($data){

        // Checking for the login imformation form the users table
        $query = $this->db->get_where('users', array('username'=>$data['username'], 'password'=>$data['password']));
        
        //if the given username and password is same as in the data base then this block will execute
        if($query->result_array()){
            
            return $query->result_array(); //returnig the row of that perticular user how have been logged in

        }
        //wrong password or username has been given
        else{
            echo anchor('login', 'try to log in again!!!'); //redirecting to the login page
        }

    }

    function get_images(){

        //this query will retrive all the image name from the images table
        $query = $this->db->query('SELECT name FROM images');

        return $query->result_array();

    }
    
}
?>