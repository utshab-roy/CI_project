<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                
        }

        public function index() //default function for this controller
        {
                $this->load->view('upload_form', array('error' => ' ' )); //initially this function will call
        }

        public function do_upload()
        {
                //setting up the configuration for upload
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile')) //getting the file name and calling the do_upload func.
                {
                        $error = array('error' => $this->upload->display_errors()); 

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        //this block is for successfully upload the pic
                        $data = array('upload_data' => $this->upload->data()); 

                        $file_array = $this->upload->data('file_name');// getting file name of that perticular pic

                        $picname = array('name'=> $file_array); // saving is to picname variable for insering into DB

                        $this->db->insert('images', $picname); // inserting the pic name into database images table

                        $this->watermark_maker($data['upload_data']['full_path']); //calling the watermark function 
                        //inside the perameter we pass the full path of the image to perform the watermark making

                        $this->load->view('upload_success', $data); //loading the upload_success view page
                }
        }

        public function view_photos() //this function let us view all the uploaded pic 
        {
                $this->load->model('user_model'); //loading user_model

                $data['images'] = $this->user_model->get_images(); //calling get_images function inside usermodel

                $this->load->view('photos_view', $data); //loading the photo_view page
        }


        public function watermark_maker($path) //this function let us make the watermark on pic
	{
                //setting up the configuration of the watermarker
                $config['source_image'] = $path;
                $config['wm_text'] = 'Not for sale';
                $config['wm_type'] = 'text';
                $config['wm_font_path'] = './system/fonts/texb.ttf';
                $config['wm_font_size'] = '70';
                $config['wm_font_color'] = '0000FF';
                $config['wm_vrt_alignment'] = 'middle';
                $config['wm_hor_alignment'] = 'center';
                $config['wm_padding'] = '20';

                $this->load->library('image_lib'); //loading the image_lib
                
                $this->image_lib->initialize($config); //initializing the configuration 

                if (!$this->image_lib->watermark()) { //calling the watermark and also checking for errors
                echo $this->image_lib->display_errors();
                } else {
                echo 'Successfully updated image with watermark'; //prints for Successfully watermark
                }
	}
}
?>