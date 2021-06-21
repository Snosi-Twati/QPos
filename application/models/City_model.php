<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
/**
 * Description of City_model
 *
 * @author Snosi
 */
class City_model extends CI_Model {
    
    public function __construct() {
        $this -> load -> database();
    }
   
    function get_cities($country = null){
        $this->db->select('NO_district, Name_district');
        echo "bbbbbbbbbbbbbbbbb";
        if($country != NULL){
            $this->db->where('NO_city', 1);
        }

        $query = $this->db->get('regst_district');

        $cities = array();

        if($query->result()){
            foreach ($query->result() as $city) {
                $cities[$city->NO_district] = $city->Name_district;
            }
            return $cities;
        }else{
            return FALSE;
        }
    }
} 
