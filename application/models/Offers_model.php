<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Offers_model extends CI_Model
{
 
    public function showOffers()
    {
	   $this->load->database();
	   $this -> db -> select('CompanyID,ServiceID,Price');
       $this -> db -> from('companiesservicesprices');
	   $query = $this -> db -> get();
	   $results = $query->result();
        return $results;
	   //return $query->result();  
	   
	     
			
	  //$this->db->join('companiesservicesprices', 'companies.CompanyID = companiesservicesprices.CompanyID',);
      // $this->db->join('services', 'services.ServicesID = companiesservicesprices.ServicesID',);
        
    }
}
?>
