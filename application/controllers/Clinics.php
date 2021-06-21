<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clinics
 *
 * @author Coder001
 */
class Clinics extends CI_Controller{
    
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
    
    public function ListOfClinics() {
        $this->Access->AccessUser();
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Clinics/ListOfClinics',$this->params,FALSE);
    }
    
    public function ClinicsDetails() {
        
       $this->Access->AccessUser();
        $this->load->library('Layouts');
        
                if($this->input->post('ServiceID')!=null){
                    
                    $cond['ServiceID']  =   $this->input->post('ServiceID');
                    $ComSer             =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesservicesprices','*',$cond);
                    $CondSql            =   $this->Pros->Make_Value_in_SQL_IN($ComSer,'CompanyID');
                    $CondSql ='CompanyID '.$CondSql.' and CompanyType = 1';

                }else{
                    
                    $CondSql['CompanyID']      =   -1;
                    
                }
                    
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Clinics/ClinicsDetails',$this->params,array(
                    'Clinics'              =>      $this->Pros->Get_Filed_AQ_Multi_Cond_Ary(
                            'companies',
                            '*',
                            $CondSql))
                        );
    }
    
    public function ServicesPrices() {
        
        
        
    }
}
