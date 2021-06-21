<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_subj
 *
 * @author Snosi
 */
class Map_model extends CI_Model{
    
	
function  Get_location($id)
    {
		
			$query = "select * from cities 
			join companies on companies.CityID=cities.CityID
			where cities.CityID=$id and companies.CompanyType=1" ;
	$query =$this->db->query($query);
      
	return $query->result();
	
	}
	
    
}
