<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user_id')){
			redirect('authen');
		}else{
			$this->user_id=$this->session->userdata('user_id');
		}
	}
	public function change_password()
	{
		$data['title']='เปลี่ยนรหัสผ่าน';
		$data['menu']='user';
        $this->form_validation->set_rules('password', 'Password', 'required|callback_password_check|min_length[6]');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('renew_password', 'Confirm New Password', 'required|matches[new_password]');
		
		if ($this->form_validation->run() == FALSE)
        {
        	$data['user']=$this->user_model->get_user_by_id($this->user_id);

        	$this->load->view('profile/view_change_password', $data);
        }else{

        	// echo '<pre>';
        	// print_r($_POST);
        	// echo '</pre>';
        	// exit;
        	$arr=array(
        			"user_password"=>md5($this->input->post('new_password')),
        		);

        	$this->user_model->update_user($this->user_id,$arr);


        	
        	$this->session->set_flashdata('change_success',TRUE);
        	redirect(site_url('profile/change_password'));
        }
	}

	public function password_check($password)
	{
		$check=$this->user_model->check_password($this->user_id,$password);

		if(!empty($check)){
			return TRUE;
		}else{
			$this->form_validation->set_message('password_check', 'The Old password is incorrect.');
			$this->session->set_flashdata('change_error',TRUE);
			return FALSE;
		}
	}

}

