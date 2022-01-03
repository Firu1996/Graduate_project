<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zone_user_model extends CI_Model {

	public function insert_zone_user($arr)
	{
		$this->db->insert('zone_user_tbl',$arr);
	}

	public function delete_zone_user_with_user($user_id)
	{
		$this->db->where('user_id',$user_id)->delete('zone_user_tbl');
		
	}

	public function delete_zone_user_with_zone($zone_id)
	{
		$this->db->where('zone_id',$zone_id)->delete('zone_user_tbl');
		
	}
	

}

