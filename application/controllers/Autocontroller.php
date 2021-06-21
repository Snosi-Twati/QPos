<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class autocontroller extends CI_Controller {


	public function index()
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
        
        public function ex()
        {
            
			$states = $this->db->get("companies")->result();
            $this->load->view('autoview', array('states' => $states )); 
			
        }
		public function exx()
        {
          $Service_list =$this->input->post('CompanyID');  
		  echo $Service_list ;
			
			
        }
		
		

}