<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxAction
 *
 * @author Snosi
 */
class AjaxActionCon extends CI_Controller{
    
    function FillSelectJS($tbl,$SFld,$VFld){
        $result = $this->db->where($SFld,$VFld)->get($tbl)->result();
	echo json_encode($result);
    }
    
    
    public function FillSearchSelectJS()
    {
            $json = [];

            $this->load->database();


            if(!empty($this->input->get("q"))){
                    $this->db->like('CompanyArabicName', $this->input->get("q"));
                    $query = $this->db->select('CompanyID,CompanyArabicName as text')
                                            ->limit(10)
                                            ->get("companies");
                    $json = $query->result();
            }


            echo json_encode($json);
    }
    
    public function FillMapWithSelect($tbl,$SFld,$VFld,$name,$Phone,$Email,$lat,$log,$lat_city,$lng_city) { 
   
        $locations=array();
	    $result = $this->db->where($SFld,$VFld)->get($tbl)->result_array();
		

		foreach ($result as $key)
		{
                    //var_dump($key);
                    $locations[]=
                        array(     
                            'name'      =>      $key[   $name       ],
                            'Phone'     =>      $key[   $Phone      ],
                            'Email'     =>      $key[   $Email      ],
                            'lat'       =>      $key[   $lat        ], 
                            'lng'       =>      $key[   $log        ], 
                            'lat_city'  =>      $key[   $lat_city   ], 
                            'lng_city'  =>      $key[   $lng_city   ] 
                            );
                }
        /* Convert data to json */
        echo json_encode( $locations );
    }
    
    
       public function SearchSelectDB($Tbl,$IdFld,$VFld,$FCod=FALSE,$VCod=FALSE,$FCod2nd=FALSE,$VCod2nd=FALSE)
    {
            $json = [];

            if(!empty($this->input->get("q"))){
               if ($FCod!=FALSE){
                    $this->db->where($FCod,$VCod);
                   
                }
                
                $this->db->like($VFld, $this->input->get("q"));
                $query = $this->db->select(''.$IdFld.'  as ID,'.$VFld.' as text')
                                        ->limit(20)
                                        ->get($Tbl);
                $json = $query->result_array();
            }                

            echo json_encode($json); 
    }
    
       public function SearchSelectWhitCon2nd($Tbl,$IdFld,$VFld,$FCod=FALSE,$VCod=FALSE,$FCod2nd=FALSE,$VCod2nd=FALSE)
    {
       
            $json = [];

            if(!empty($this->input->get("q"))){
               if ($FCod!=FALSE){
                    $this->db->where($FCod,$VCod);
                    if($FCod2nd!=FALSE)
                        $this->db->where($FCod2nd,$VCod2nd);
                }
                
                $this->db->like($VFld, $this->input->get("q"));
                $query = $this->db->select(''.$IdFld.'  as ID,'.$VFld.' as text')
                                        ->limit(20)
                                        ->get($Tbl);
                $json = $query->result_array();
            }                
            
            echo json_encode($json); 
            
    } 
    
}
