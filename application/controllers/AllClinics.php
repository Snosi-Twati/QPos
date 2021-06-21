<?php

class AllClinics  extends CI_Controller {

   /**
    * Manage __construct
    *
    * @return Response
   */
   public function __construct() { 
      parent::__construct();
      $this->load->database();
   }
    private $params=array(
                            'Logo'              =>      'layout/Header/Logo',
                            'Message'           =>      'layout/Header/Message',
                            'Notifications'     =>      'layout/Header/Notifications',
                            'Tasks'             =>      'layout/Header/Tasks',
                            'UserAccount'       =>      'layout/Header/UserAccount',
                            'ContentHeader'     =>      'layout/Bady/ContentHeader',
        //                    'MainContent'       =>      'layout/Bady/MainContent',
                            'SearchForm'        =>      'layout/Bady/SearchForm',
                            'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                            'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'

                        );
    

   /**
    * Manage index
    *
    * @return Response
   */
   public function AllClinics() {
	   
	$this->load->helper('form');
        $countries = $this->db->get("countries")->result();
        $this->layouts->view('Clinics/AllClinics ',$this->params, array('countries' => $countries ));
	  
   } 

    public function get_city($id) { 
        
        $result = $this->db->where("CountryID",$id)->get("cities")->result();
	echo json_encode($result);
  
    }
    
    public function get_companies($id) { 
   
         $locations=array();
	     $this->load->model('Map_model');
	     $result=$this->Map_model->Get_location($id);
		

		foreach ($result as $key)
		{
                $locations[]=
                    array(     
                        'name'=>$key->CompanyArabicName,
                        'Phone'=>$key->Phone,
                        'Email'=>$key->Email,
                        'lat'=>$key->lat, 
                        'lng'=>$key->log, 
                        'lat_city'=>$key->lat_city, 
                        'lng_city'=>$key->lng_city 
                        );
                }
        /* Convert data to json */
        echo json_encode( $locations );
    }

    function getdata(){

        $countries      =       $this->db->get("countries")->result();
        $this->layouts->view('Clinics/test',$this->params, array('countries' => $countries )); 

    }


          

} 

?>