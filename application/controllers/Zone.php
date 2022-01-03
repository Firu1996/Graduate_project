<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zone extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(!$this->session->userdata('user_id')){
			redirect('authen');
		}else{
			$this->user_id=$this->session->userdata('user_id');
		}
	}

	public function index()
	{
		$data['title']='จัดการโซนและอุปกรณ์';
		$data['menu']='zone';
		$data['zone']=$this->zone_model->get_all_zone();
		$this->load->view('zone/view_index',$data);	
	}

	public function display($zone_id)
	{
		$data['title']='ดูโซน';
		$data['menu']='zone';
		
        $data['zone']=$this->zone_model->zone_display_by_id($zone_id);
		$this->load->view('zone/view_display',$data);	
	}

	public function create()
	{
		$data['title']='เพิ่มโซนและอุปกรณ์';
		$data['menu']='zone';
		$this->form_validation->set_rules('zone_name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('zone/view_create', $data);
        }else{

        	// echo '<pre>';
        	// print_r($_POST);
        	// echo '</pre>';
        	// exit;
        	$arr=array(
						"zone_deviceName"=>$this->input->post('zone_deviceName'),
        				"zone_code"=>$this->input->post('zone_code'),
        				"zone_mac_rasp"=>$this->input->post('zone_mac_rasp'),
        				"zone_mac_mcu"=>$this->input->post('zone_mac_mcu'),
						"zone_name"=>$this->input->post('zone_name'),
						"zone_maxloud"=>$this->input->post('zone_maxloud')
        			);

        	$this->zone_model->insert_zone($arr);

        	$this->session->set_flashdata('save_success',TRUE);
        	redirect(site_url('zone'));
        }
	}

	public function edit($zone_id)
	{
		$data['title']='แก้ไขโซนและอุุปกรณ์';
		$data['menu']='zone';
        $this->form_validation->set_rules('zone_name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
        {
        	$data['zone'] = $this->zone_model->get_zone_by_id($zone_id);
        	$this->load->view('zone/view_edit', $data);
        }else{

        	// echo '<pre>';
        	// print_r($_POST);
        	// echo '</pre>';
        	// exit;
        	$arr=array(
						"zone_deviceName"=>$this->input->post('zone_deviceName'),
        				"zone_code"=>$this->input->post('zone_code'),
        				"zone_mac_rasp"=>$this->input->post('zone_mac_rasp'),
        				"zone_mac_mcu"=>$this->input->post('zone_mac_mcu'),
						"zone_name"=>$this->input->post('zone_name'),
						"zone_maxloud"=>$this->input->post('zone_maxloud')
        			);

        	$this->zone_model->update_zone($zone_id,$arr);

        	$this->session->set_flashdata('save_success',TRUE);
        	redirect(site_url('zone'));
        }
	}

	public function delete($zone_id)
	{
        $this->zone_model->delete_zone($zone_id);
		$this->zone_user_model->delete_zone_user_with_zone($zone_id);
		$this->session->set_flashdata('delete_success',TRUE);
		redirect(site_url('zone'));
	}


}

