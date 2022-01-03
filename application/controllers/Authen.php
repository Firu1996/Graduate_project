<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data['title'] = 'เข้าสู่ระบบ';
		$data['menu'] = 'login';
		if($this->session->userdata('logged_in')){
			redirect();
		}else{
			
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

	        if ($this->form_validation->run() == FALSE)
	        {
	            $this->load->view('authen/view_index',$data);
	        }
	        else
	        {
	            // echo '<pre>';
	            // print_r($_POST);
	            // echo '</pre>';
	            // exit;

	           

	            $check=$this->user_model->check_login($_POST['username'],$_POST['password']);

	            if(!empty($check)){
	            	$userdata=array(
	            		"logged_in"=>TRUE,
	            		"user_id"=>$check['user_id'],
	            		"user_username"=>$check['user_username'],
	            	);
	            	$this->session->set_userdata($userdata);
					$this->session->set_flashdata('login_success',TRUE);
	            	redirect('home');
	            	

	            }else{
	            	$this->session->set_flashdata('password_wrong',TRUE);
	            	redirect('Authen');
	            }
	        }
	    }
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('Authen');
	}

}

