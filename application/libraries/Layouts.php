<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Layout
 *
 * @author Snosi
 */
class Layouts {
    //put your code here
    
    private $CI;
    
    private $layout_title;
    
    private $layout_description;
    
    public $Logo='layout/Header/Logo';
    
    private $Message='layout/Header/Message';
     
    private $Notifications='layout/Header/Notifications';
       
    private $Tasks='layout/Header/Tasks';
     
    private $UserAccount='layout/Header/UserAccount';
      
    private $ContentHeader='layout/Bady/ContentHeader';
    
    private $SearchForm='layout/Bady/SearchForm';
    
    private $SidebarMenu='layout/Bady/SidebarMenu';

    private $SidebarUserPanel='layout/Bady/SidebarUserPanel';

    public function __construct() {
        $this->CI =& get_instance();
    }
    
    public function set_title($title)
    {
        $this->layout_title = $title;
    }
    
    public function set_description($description)
    {
        $this->layout_description = $description;
    }
    
    public function view($view_name , $layouts= array(),$params = array(), $default = true)
    {
        if(Is_array($layouts)&& count($layouts)>=1)
        {
            foreach ($layouts as $layout_key => $layout) 
            {
                $header_params[$layout_key]=$this->CI->load->view($layout,$params,TRUE);
            }
        }
        if($default==TRUE)
        {
            $header_params['layout_title']          =$this->layout_title;
            
            $header_params['layout_description']    =$this->layout_description;
            
            $this->CI->load->view('layout/Header/Header',$header_params);
            
            $this->CI->load->view('Bady',$header_params);
            
            $this->CI->load->view($view_name,$header_params);
            
            $this->CI->load->view('layout/Footer/Footer',$header_params);
        }
        else 
        {
            $this->CI->load->view($view_name,$params);
        }    
    }
}