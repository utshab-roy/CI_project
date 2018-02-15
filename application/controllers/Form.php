<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');//initializing the form_validation library

                //setting up all the requirements rules to fill up the form
                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

                if ($this->form_validation->run() == FALSE) //this block will not let us sign up
                {
                        $this->load->view('registration_form');
                }
                else //all the required field has been fill up correctly
                {
                        //all the imformation we get from the user while sign up
                    $data = array(
                        'username' => $this->input->post('username'),
                        'first_name' => $this->input->post('firstname'),
                        'last_name' => $this->input->post('lastname'),
                        'password' => $this->input->post('password'),
                        'email' => $this->input->post('email'),
                        );

                    //Transfering data to Model
                    $this->load->model('user_model'); //loading the user_model
                    $this->user_model->form_insert($data); //calling form_insert function inside user_model
                    $data['message'] = 'Data Inserted Successfully';



                    $this->load->view('formsuccess'); //loading the formsuccess page
                }
        }
}