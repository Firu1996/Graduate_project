<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zone_model extends CI_Model {

	public function insert_zone($arr)
	{
		$this->db->insert('zone_tbl',$arr);
	}

	public function update_zone($zone_id,$arr)
	{
		$this->db->where('zone_id',$zone_id)->update('zone_tbl',$arr);
	}

	public function delete_zone($zone_id)
	{
		$this->db->where('zone_id',$zone_id)->delete('zone_tbl');
		
	}

	public function get_all_zone()
	{
		$sql="SELECT z.* FROM zone_tbl as z";
        return $this->db->query($sql)->result_array();
	}

	public function get_zone_by_id($zone_id)
	{
		return $this->db->where('zone_id',$zone_id)->get('zone_tbl')->row_array();
	}

	public function get_zone_with_user($user_id)
	{
		$sql="SELECT z.* , zu.user_id
            FROM zone_tbl as z
            LEFT JOIN zone_user_tbl as zu ON zu.zone_id = z.zone_id AND zu.user_id = '$user_id'
            ";
        return $this->db->query($sql)->result_array();
	}

    public function zone_display_by_id($zone_id)
    {
        $sql="SELECT z.* 
                ,(SELECT log_count FROM log_tbl WHERE zone_id = z.zone_id ORDER BY log_id DESC LIMIT 0,1) as log_count
                ,(SELECT temp_total FROM temperature_tbl WHERE zone_id = z.zone_id ORDER BY temp_id DESC LIMIT 0,1) as temp_total
                ,(SELECT loud_total FROM loudness_tbl WHERE zone_id = z.zone_id ORDER BY loud_id DESC LIMIT 0,1) as loud_total
                FROM zone_tbl as z
                LEFT JOIN zone_user_tbl as zu ON zu.zone_id = z.zone_id
                WHERE z.zone_id=$zone_id";
        
        return $this->db->query($sql)->row_array();
    }

    public function zone_display_home($user_id='')
    {
        if($user_id=='' OR $user_id=="1"){
            $sql="SELECT z.*
                    ,(SELECT log_count FROM log_tbl WHERE zone_id = z.zone_id ORDER BY log_id DESC LIMIT 0,1) as log_count 
                    ,(SELECT temp_total FROM temperature_tbl WHERE zone_id = z.zone_id ORDER BY temp_id DESC LIMIT 0,1) as temp_total 
                    ,(SELECT loud_total FROM loudness_tbl WHERE zone_id = z.zone_id ORDER BY loud_id DESC LIMIT 0,1) as loud_total
                    FROM zone_tbl as z";
        }else{
            $sql="SELECT z.*
                    ,(SELECT log_count FROM log_tbl WHERE zone_id = z.zone_id ORDER BY log_id DESC LIMIT 0,1) as log_count
                    ,(SELECT temp_total FROM temperature_tbl WHERE zone_id = z.zone_id ORDER BY temp_id DESC LIMIT 0,1) as temp_total
                    ,(SELECT loud_total FROM loudness_tbl WHERE zone_id = z.zone_id ORDER BY loud_id DESC LIMIT 0,1) as loud_total         
                    FROM zone_user_tbl as zu
                    LEFT JOIN zone_tbl as z ON z.zone_id = zu.zone_id
                    WHERE zu.user_id = '$user_id'";
        }
        
        return $this->db->query($sql)->result_array();
    }

	
	
	

}

