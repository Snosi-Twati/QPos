<?php

Class services extends CI_Model{  
     public function __construct() {
        $this -> load -> database();
    }
	
	function get_services() {
        $this -> db -> select('*');
        $this -> db -> from('services');
		
		$query = $this -> db -> get();
		
        $countries = array();
 
        if($query -> num_rows() == 1)
        {
            return $query->result();
            
            
        }else{
            return false;
	
	}
	
        }
}
   
   