<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation'); //initializing the form_validation library

		//setting up all the requirements rules to fill up the login form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) //this block prevent from invalid fill up
		{
				$this->load->view('login_form');
		}
		else
		{
			$data = array( //data that we get from the login form
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
	
				);

			//Transfering data to Model
			$this->load->model('user_model'); //loading the user_model
			$data['userArray'] = $this->user_model->form_login($data); //calling the form_login function we also
																	   //save the return data inside the array

			if($data['userArray'][0]['username'] != ""){ //checking for the valid login

				$this->load->view('homepage', $data); //loading the homepage if we get valid login 
			}
		
			$data['message'] = 'Login Successfully';
			
		}

	}
}