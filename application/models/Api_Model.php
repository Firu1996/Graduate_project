<?php

   class Api_Model extends CI_Model {

    public function insert($zone_id,$temp_total,$loud_total,$zone_ip){
        $data = array(
            'zone_id' => $zone_id,
            'temp_time'=>date("Y-m-d"),
            'temp_total' => $temp_total,           
        );
        $query = $this->db->insert('temperature_tbl',$data);

        $data2 = array(
             'zone_id' => $zone_id,
             'loud_time'=>date("Y-m-d"),
             'loud_total'=> $loud_total,
        );
        $query = $this->db->insert('loudness_tbl',$data2);

        $this->db->select('zone_ip_mcu');
        $this->db->from('zone_tbl');
        $this->db->where('zone_id',$zone_id);
        $sql = $this->db->get()->row()->zone_ip_mcu;
        if ($sql > 0 && $sql != $zone_ip){

            $this->db->set('zone_ip_mcu',$zone_ip);
            $this->db->where('zone_id',$zone_id);
            $this->db->update('zone_tbl');
        
        }else{

            $this->db->set('zone_ip_mcu',$zone_ip);
            $this->db->where('zone_id',$zone_id);
            $this->db->update('zone_tbl');   

        }
        return true;
    }

    public function count($zone_id,$log_count,$log_status,$zone_ip){
        $data = array(
            'zone_id' => $zone_id,
            'log_time' => date("Y-m-d"),
            'log_count' => $log_count,
            'log_status' => $log_status,   
        );
        $query = $this->db->insert('log_tbl',$data);

        $this->db->select('zone_ip_rasp');
        $this->db->from('zone_tbl');
        $this->db->where('zone_id',$zone_id);
        $sql = $this->db->get()->row()->zone_ip_rasp;
        
        if ($sql > 0 && $sql != $zone_ip){
            $this->db->set('zone_ip_rasp',$zone_ip);
            $this->db->where('zone_id',$zone_id);
            $this->db->update('zone_tbl');
        }else{
            $this->db->set('zone_ip_rasp',$zone_ip);
            $this->db->where('zone_id',$zone_id);
            $this->db->update('zone_tbl');
        }

        return true;
     }

         public function readconfigmcu($Mac){

            $this->db->select('zone_id');
            $this->db->from('zone_tbl');
            $this->db->where('zone_mac_mcu',$Mac);
            return $this->db->get()->row()->zone_id;
         }

         public function readconfigpi($Mac){

            $this->db->select('zone_id');
            $this->db->from('zone_tbl');
            $this->db->where('zone_mac_rasp',$Mac);
            return $this->db->get()->row()->zone_id;
       }

       public function temp($Zone_id,$Temp,$Humid){
           $data1 = array(
               'Zone_id'=>$Zone_id,
               'Temp' =>$Temp,
               'Humid' =>$Humid,
               'Temp_time'=>date("Y-m-d"),   
           );
           $query = $this->db->insert('Temp',$data1);
           return true;
       }

       public function sentdata($item){
           $this->db->insert('Test', $data);
           if($this->db->affected_row() >= '1')
           {
               return TRUE;
           }
           return FALSE;
       } 

       public function getall_user(){
           $query = $this->db->get('User');
           return $query->result_array();
        
       }

       public function delete($id){
           $this->db->where('Data_id',$id);
           $this->db->delete('API');
           return TRUE;
       }

       public function update($id){
           $data = array(
               'User_name' => $this->input->post('User_name'),
               'User_lastname' => $this->input->post('User_lastname'),
               'User_tel' => $this->input->post('User_tel'),
               'User_address' => $this->input->post('User_address'),
           );
           $this->db->where('User',$id);
           $query = $this->db->update('User',$data);
           return true;
       }

    
   }