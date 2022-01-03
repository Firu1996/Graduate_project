<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('user_id') OR $this->session->userdata('user_id')!=1){
			redirect('authen');
		}else{
			$this->user_id=$this->session->userdata('user_id');
		}
	}

	public function index()
	{
		$data['title']='จัดการข้อมูลสมาชิก';
		$data['menu']='user';
        $data['user']=$this->user_model->get_all_user();
		$this->load->view('user/view_index',$data);
	}

	public function create()
	{
		$data['title']='เพิ่มสมาชิก';
		$data['menu']='user';
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user_tbl.user_username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		if ($this->form_validation->run() == FALSE)
        {
        	$data['zone']=$this->zone_model->get_all_zone();
        	$this->load->view('user/view_create', $data);
        }else{

        	// echo '<pre>';
        	// print_r($_POST);
        	// echo '</pre>';
        	// exit;
        	$arr=array(
        		      "user_username"=>$this->input->post('username'),
        		      "user_password"=>md5($this->input->post('password')),
        		      "user_name"=>$this->input->post('name')
        	       );

        	$this->user_model->insert_user($arr);

        	$last=$this->user_model->last_user_id();

        	$user_id=$last['user_id'];

        	$zone=$this->input->post('zone');
        	foreach ($zone as $z) {

        		$zone_id=$z['id'];
        		$arr=array(
        				"user_id"=>$user_id,
        				"zone_id"=>$zone_id
        			);
        		$this->zone_user_model->insert_zone_user($arr);

        	}

        	$this->session->set_flashdata('save_success',TRUE);
        	
        	redirect(site_url('user'));
        }
	}

	public function edit($user_id)
	{
                $data['title']='แก้ไขสมาชิก';
				$data['menu']='user';
                $this->form_validation->set_rules('username', 'Username', 'required');
		
				if ($this->form_validation->run() == FALSE){
                    $data['zone']=$this->zone_model->get_zone_with_user($user_id);
                    $data['user']=$this->user_model->get_user_by_id($user_id);
                	$this->load->view('user/view_edit', $data);
                }else{

                	// echo '<pre>';
                	// print_r($_POST);
                	// echo '</pre>';
                	// exit;
                	$arr=array(
                			"user_username"=>$this->input->post('username'),
                			"user_name"=>$this->input->post('name')
                		);

                	if($this->input->post('password') AND $this->input->post('password')!=''){
                		$arr['user_password']=md5($this->input->post('password'));
                	}

                	$this->user_model->update_user($user_id,$arr);


                	$zone=$this->input->post('zone');
                    $this->zone_user_model->delete_zone_user_with_user($user_id);

                	foreach ($zone as $z) {

                		$zone_id=$z['id'];
                		$arr=array(
                				"user_id"=>$user_id,
                				"zone_id"=>$zone_id
                			);
                                $this->zone_user_model->insert_zone_user($arr);

                	}

                	$this->session->set_flashdata('save_success',TRUE);
                	redirect(site_url('user'));
                }
	}

	public function delete($user_id)
	{
        $this->user_model->delete_user($user_id);
		$this->zone_user_model->delete_zone_user_with_user($user_id);
		$this->session->set_flashdata('delete_success',TRUE);
		redirect(site_url('user'));
	}

	

}

