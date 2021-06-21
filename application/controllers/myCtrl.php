<?php

class myCtrl extends CI_Controller{
    
    
    //put your code here
    public function any(){
	
	$this->load->model('db_data');
	
    $this->load->view('layout/myView/mybody');
	//$this->tem('layout/myView/mybody');
	
    
    }
	
	public function getUser(){	
   $this->load->model('db_data');
   //الأن رح اعمل foreach() لجلب البيانات من جدول category بحسب cat_id 
			//هذا واضح؟yes
	$where2 = array('username'=>'google');		
    $query = $this->db_data->dbSelect('emp',$where2);
		foreach($query as $any){
		    echo $any->username.'<br>';
			echo $any->cat_id.'<br>'; // هذا cat_id هو id الخاص بجدول category
			
			$where = array('id'=>$any->cat_id);
			
			$getCat = $this->db_data->dbSelect('category',$where);
			
			foreach($getCat as $data){
			echo '<center>'. $data->name.'</center>';
			}
		
				
			}
    }
	public function getCats(){	
    
    }
	
	 public function tem($test){
	  // هذا الكود هنا رح نستدعي header
      $this->load->view('layout/myView/header');
	 
// هنا سيكون body 
      $this->load->view($test);

	
	   // هذا الكود هنا رح نستدعي footer
	  $this->load->view('layout/myView/footer');
    }
}
