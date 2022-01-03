<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	

	public function zone_report_day($day,$zone_id='all')
	{
		if($zone_id=='all'){
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE DATE(log_time) = '{$day}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z 
        		";
		}else{
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE DATE(log_time) = '{$day}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z WHERE z.zone_id = '{$zone_id}'
        		";
		}
		
        return $this->db->query($sql)->result_array();
	}

	public function zone_report_range($start,$end,$zone_id='all')
	{
		if($zone_id=='all'){
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE DATE(log_time) >= '{$start}' 
        			AND DATE(log_time) <= '{$end}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z 
        		";
		}else{
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE DATE(log_time) >= '{$start}' 
        			AND DATE(log_time) <= '{$end}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z WHERE z.zone_id = '{$zone_id}'
        		";
		}
		
        return $this->db->query($sql)->result_array();
	}

    public function report_of_range($start,$end,$zone_id='all')
    {
        $datediff = strtotime($end) - strtotime($start);
        $range_day=round($datediff / (60 * 60 * 24))+1;
        // echo $range_day;
        // exit;

        $select='';
        for ($i=0; $i < $range_day; $i++) { 

            $day=date('Y-m-d',strtotime($start .' + '.$i.' day'));
            $select.= " , (
                        SELECT SUM(if(log_status='in',1,0)) 
                        FROM log_tbl 
                        WHERE zone_id = z.zone_id
                        AND DATE(log_time) = '{$day}'
                    ) as d".date('Ymd',strtotime($day));
        }

        if($zone_id=='all'){
            $sql="SELECT z.*
                $select
                FROM zone_tbl as z 
                ";
        }else{
            $sql="SELECT z.*
                $select
                FROM zone_tbl as z WHERE z.zone_id = '{$zone_id}'
                ";
        }

        // echo $sql;
        // exit;
        
        return $this->db->query($sql)->result_array();
    }

	public function zone_report_month($month,$year,$zone_id='all')
	{
		if($zone_id=='all'){
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE MONTH(log_time) = '{$month}' 
        			AND YEAR(log_time) = '{$year}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z 
        		";
		}else{
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE MONTH(log_time) = '{$month}' 
        			AND YEAR(log_time) = '{$year}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z WHERE z.zone_id = '{$zone_id}'
        		";
		}
		
        return $this->db->query($sql)->result_array();
	}

    public function report_day_of_month($month,$year,$zone_id='all')
    {

        $start=$year.'-'.$month.'-01';
        $end=date("t", strtotime($start));
        $select='';
        for ($i=1; $i <= $end; $i++) { 

            $day=$year.'-'.$month.'-'.str_pad($i, 2,'0',STR_PAD_LEFT); 
            $and = ", DATE(log_time) = '{$day}'";
            $select.= " , (
                    SELECT SUM(if(log_status='in',1,0)) 
                    FROM log_tbl 
                    WHERE zone_id = z.zone_id
                    AND DATE(log_time) = '{$day}'
                ) as d".$i;
        } 

        if($zone_id=='all'){
            $sql="SELECT z.*
                $select
                FROM zone_tbl as z 
                ";
        }else{
            $sql="SELECT z.*
                $select
                FROM zone_tbl as z WHERE z.zone_id = '{$zone_id}'
                ";
        }
        
        return $this->db->query($sql)->result_array();
    }



	public function zone_report_year($year,$zone_id='all')
	{
		if($zone_id=='all'){
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE YEAR(log_time) = '{$year}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z 
        		";
		}else{
			$sql="SELECT z.*
        		, (
        			SELECT SUM(if(log_status='in',1,0)) 
        			FROM log_tbl 
        			WHERE YEAR(log_time) = '{$year}' 
        			AND zone_id = z.zone_id
        		) as log_total
        		FROM zone_tbl as z WHERE z.zone_id = '{$zone_id}'
        		";
		}
		
        return $this->db->query($sql)->result_array();
	}

    public function report_month_of_year($year,$zone_id='all')
    {

        $select='';
        for ($month=1; $month <= 12; $month++) { 

            $select.= " , (
                    SELECT SUM(if(log_status='in',1,0)) 
                    FROM log_tbl 
                    WHERE zone_id = z.zone_id
                    AND MONTH(log_time) = '{$month}' 
                    AND YEAR(log_time) = '{$year}' 
                ) as d".$month;
        } 

        if($zone_id=='all'){
            $sql="SELECT z.*
                $select
                FROM zone_tbl as z 
                ";
        }else{
            $sql="SELECT z.*
                $select
                FROM zone_tbl as z WHERE z.zone_id = '{$zone_id}'
                ";
        }
        
        return $this->db->query($sql)->result_array();
    }
	

}

