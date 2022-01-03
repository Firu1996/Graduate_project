<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function insert_user($arr)
	{
		$this->db->insert('user_tbl',$arr);
	}

	public function update_user($user_id,$arr)
	{
		$this->db->where('user_id',$user_id)->update('user_tbl',$arr);
	}

	public function delete_user($user_id)
	{
		$this->db->where('user_id',$user_id)->delete('user_tbl');
		
	}

	public function check_password($user_id,$password)
	{
		return $this->db->where('user_id',$user_id)->where('user_password',md5($password))->get('user_tbl')->row_array();
	}

	public function last_user_id()
	{
		$sql="SELECT user_id FROM user_tbl ORDER BY user_id DESC LIMIT 0,1";
        return $this->db->query($sql)->row_array();
	}
	public function check_login($username,$password)
	{
		$where=array(
	           	"user_username"=>$username,
	            "user_password"=>md5($password),
	        );
	    return $this->db->where($where)->get('user_tbl')->row_array();
	}

	public function get_all_user()
	{
		return $this->db->get('user_tbl')->result_array();
	}

	public function get_user_by_id($user_id)
	{
		return $this->db->where('user_id',$user_id)->get('user_tbl')->row_array();
	}
	

}

