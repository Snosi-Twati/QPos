<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller
{
    
    public function Offers_show()
	{
	           
	            $this->load->model('Offers_model');
				$data['results'] = $this->Offers_model->showOffers();
                $this->load->view('offer',$data);
				 
    }
}

	
        