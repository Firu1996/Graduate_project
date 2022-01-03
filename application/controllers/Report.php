<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	       if(!$this->session->userdata('user_id') ){
                        redirect('authen');
                }else{
                        $this->user_id=$this->session->userdata('user_id');
                }
        }

	public function index()
	{
		$data['title']='ดูจำนวนคนแบบวัน';
		$data['menu']='report';
		$data['type']='day';

		$data['day']=date('Y-m-d');
		$data['select_zone']='';
		if(isset($_GET['day']) AND $_GET['day']!=''){
			$data['day']=$_GET['day'];
		}
		
		if(isset($_GET['z']) AND $_GET['z']!=''){
			$data['select_zone']=$_GET['z'];
		}

		
        $data['zone']=$this->zone_model->get_all_zone();

        $data['reports']=$this->report_model->zone_report_day($data['day'],$data['select_zone']);


		$this->load->view('report/view_index', $data);
	}

	public function range()
	{
		$data['title']='ดูจำนวนคนแบบช่วงวันที่ต้องการ';
		$data['menu']='report';
		$data['type']='range';

		$data['start']='';
		$data['end']='';
		$data['select_zone']='';
		if(isset($_GET['start']) AND $_GET['start']!=''){
			$data['start']=$_GET['start'];
		}
		if(isset($_GET['end']) AND $_GET['end']!=''){
			$data['end']=$_GET['end'];
		}
		if(isset($_GET['z']) AND $_GET['z']!=''){
			$data['select_zone']=$_GET['z'];
		}

        $data['zone']=$this->zone_model->get_all_zone();
		

        $data['reports']=$this->report_model->zone_report_range($data['start'],$data['end'],$data['select_zone']);

        $data['chart']=$this->report_model->report_of_range($data['start'],$data['end'],$data['select_zone']);
        // echo '<pre>';
        // print_r($data['chart']);
        // echo '</pre>';
        // exit;

		$this->load->view('report/view_range', $data);


	}

	public function month()
	{
		$data['title']='ดูจำนวนคนแบบเดือน';
		$data['menu']='report';
		$data['type']='month';

		$data['month']=date('Y-m');
		$data['y']=date('Y',strtotime($data['month']));
		$data['m']=date('m',strtotime($data['month']));
		$data['select_zone']='';

		if(isset($_GET['month']) AND $_GET['month']!=''){
			$data['month']=$_GET['month'];
			$data['y']=date('Y',strtotime($data['month']));
			$data['m']=date('m',strtotime($data['month']));
		}
		
		if(isset($_GET['z']) AND $_GET['z']!=''){
			$data['select_zone']=$_GET['z'];
		}

        $data['zone']=$this->zone_model->get_all_zone();

        $data['reports']=array();
        $data['chart']=array();
        if($data['month']!=''){
        	$data['reports']=$this->report_model->zone_report_month($data['m'],$data['y'],$data['select_zone']);

			$data['chart']=$this->report_model->report_day_of_month($data['m'],$data['y'],$data['select_zone']);
			 //echo '<pre>';
			 //echo $day_of_month=date('t',strtotime('2019-02'));
			 //print_r($data['chart']);
			 // echo '</pre>';
		}
		
		


		$this->load->view('report/view_month', $data);


	}

	public function year()
	{
		$data['title']='ดูจำนวนคนแบบปี';
		$data['menu']='report';
		$data['type']='year';

		$data['year']=date('Y');
		$data['select_zone']='';

		if(isset($_GET['year']) AND $_GET['year']!=''){
			$data['year']=$_GET['year'];
			
		}
		
		if(isset($_GET['z']) AND $_GET['z']!=''){
			$data['select_zone']=$_GET['z'];
		}

		$data['zone']=$this->zone_model->get_all_zone();
		$data['reports']=$this->report_model->zone_report_year($data['year'],$data['select_zone']);

		$data['chart']=$this->report_model->report_month_of_year($data['year'],$data['select_zone']);

		// echo '<pre>';
		// print_r($data['chart']);
		// echo '</pre>';
		$this->load->view('report/view_year', $data);


	}

}

