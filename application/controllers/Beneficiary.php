<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Beneficiary
 *
 * @author Snosi
 */
class Beneficiary extends CI_Controller{
    
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
    
//    public function index() {
//        $this->Access->AccessUser();
//        $this->load->model('Desg');
//        $this->load->library('Layouts');
//                $this->layouts->set_title('Home Page');
//                $this->layouts->view('Beneficiary/BeneficiaryData',array(
//                     
//                     
//                     
//                     
//                     
//                     
//                    //'MainContent'       =>      'layout/Bady/MainContent',
//                     
//                     
//                     
//                    
//                ),FALSE);        
//    }
//    
//    public function DetectionVisitsServices() {
//        $this->Access->AccessUser();
//        $this->load->model('Desg');
//        $this->load->library('Layouts');
//                $this->layouts->set_title('Home Page');
//                $this->layouts->view('Claims/DetectionVisitsServices',array(
//                     
//                     
//                     
//                     
//                     
//                     
//                    //'MainContent'       =>      'layout/Bady/MainContent',
//                     
//                     
//                     
//                    
//                ),FALSE);        
//    }
//    
    public function TheListOofBeneficiaries() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/TheListOofBeneficiaries',$this->params,FALSE);        
    }
    
    public function AddBeneficiary() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/AddBeneficiary',$this->params,FALSE);        
    }
    
    public function AddBeneficiaries() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/AddBeneficiaries',$this->params,FALSE);        
    }
    
//    public function TheListOfBeneficiaryVisits() {
//        $this->Access->AccessUser();
//        $this->load->model('Desg');
//        $this->load->library('Layouts');
//                $this->layouts->set_title('Home Page');
//                $this->layouts->view('Claims/TheListOfBeneficiaryVisits',array(
//                     
//                     
//                     
//                     
//                     
//                     
//                    //'MainContent'       =>      'layout/Bady/MainContent',
//                     
//                     
//                     
//                    
//                ),FALSE);        
//    } 
     
    public function CardsOrder() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Beneficiary/CardsOrder',$this->params,FALSE);        
    }
    
    public function CardsStatus() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Beneficiary/CardsStatus',$this->params,FALSE);        
    }
    
    
    public function CardsOrderForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Beneficiary/CardsOrderForAll',$this->params,FALSE);        
    }
    
    public function StopCardsForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Beneficiary/StopCardsForAll',$this->params,FALSE);        
    }
    
    public function StatusCardsForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Beneficiary/StatusCardsForAll',$this->params,FALSE);        
    }
    
    public function RenewCardsForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Beneficiary/RenewCardsForAll',$this->params,FALSE);        
    }
    
    
}
