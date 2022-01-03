<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data['title']='หน้าแรก';
		$data['menu']='home';

		$data['zone']=$this->zone_model->zone_display_home($this->session->userdata('user_id'));

		$this->load->view('home/view_index',$data);	
	}

	public function display($zone_id)
	{
		$data['title']='Display Zone';
		$data['menu']='home';
        $data['zone']=$this->zone_model->zone_display_by_id($zone_id);
		
		$this->load->view('zone/view_display',$data);	
	}

}


