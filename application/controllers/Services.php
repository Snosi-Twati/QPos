<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Services
 *
 * @author Coder001
 */
class Services extends CI_Controller{
    
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
    
    public function getServices(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Services/ServicesData',$this->params,FALSE);
        
    }
    
    public function ServicesandDiagnosis(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
            $states = $this->db->get("services")->result();
          
        $this->layouts->view('Services/ServicesandDiagnosis',$this->params, array('states' => $states ));
    }
    
    public function add_diagnosiswithservice()
    { 
        $DiagnosisID=$this->session->userdata('KEY');
        $Service_list =$this->input->post('ServiceID');
        foreach($Service_list as $Service) {
            $data= array(
                'DiagnosisID' => $DiagnosisID,
                'ServiceID' => $Service
            );

            $this->db->insert('diagnosiswithservices',$data);
        }
        if($this->load->model("Processestransaction"))
        {
            redirect($this->input->post('Url')."?Do=Yes");
        }else{
            redirect($this->input->post('Url')."?Do=No");
        }
    
    }
}
