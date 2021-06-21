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
class New_col extends CI_Controller{
  public function index() {
        $this->load->model('Desg');
        $this->load->library('Layouts');
               $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/BeneficiaryData',array(
                    'Logo'              =>      'layout/Header/Logo',
                  'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                   'Tasks'             =>      'layout/Header/Tasks',
                   'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                   'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                  
               ),FALSE);        
    }





    
//    public function index() {
//        $this->Access->AccessUser();
//        $this->load->model('Desg');
//        $this->load->library('Layouts');
//                $this->layouts->set_title('Home Page');
//                $this->layouts->view('Beneficiary/BeneficiaryData',array(
//                    'Logo'              =>      'layout/Header/Logo',
//                    'Message'           =>      'layout/Header/Message',
//                    'Notifications'     =>      'layout/Header/Notifications',
//                    'Tasks'             =>      'layout/Header/Tasks',
//                    'UserAccount'       =>      'layout/Header/UserAccount',
//                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
//                    //'MainContent'       =>      'layout/Bady/MainContent',
//                    'SearchForm'        =>      'layout/Bady/SearchForm',
//                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
//                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
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
//                    'Logo'              =>      'layout/Header/Logo',
//                    'Message'           =>      'layout/Header/Message',
//                    'Notifications'     =>      'layout/Header/Notifications',
//                    'Tasks'             =>      'layout/Header/Tasks',
//                    'UserAccount'       =>      'layout/Header/UserAccount',
//                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
//                    //'MainContent'       =>      'layout/Bady/MainContent',
//                    'SearchForm'        =>      'layout/Bady/SearchForm',
//                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
//                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
//                    
//                ),FALSE);        
//    }
//    
    public function TheListOofBeneficiaries() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/TheListOofBeneficiaries',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
    public function AddBeneficiary() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/AddBeneficiary',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
    public function AddBeneficiaries() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/AddBeneficiaries',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
//    public function TheListOfBeneficiaryVisits() {
//        $this->Access->AccessUser();
//        $this->load->model('Desg');
//        $this->load->library('Layouts');
//                $this->layouts->set_title('Home Page');
//                $this->layouts->view('Claims/TheListOfBeneficiaryVisits',array(
//                    'Logo'              =>      'layout/Header/Logo',
//                    'Message'           =>      'layout/Header/Message',
//                    'Notifications'     =>      'layout/Header/Notifications',
//                    'Tasks'             =>      'layout/Header/Tasks',
//                    'UserAccount'       =>      'layout/Header/UserAccount',
//                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
//                    //'MainContent'       =>      'layout/Bady/MainContent',
//                    'SearchForm'        =>      'layout/Bady/SearchForm',
//                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
//                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
//                    
//                ),FALSE);        
//    } 
    
    public function CardsOrder() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/CardsOrder',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
    public function CardsOrderForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/CardsOrderForAll',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
    public function StopCardsForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/StopCardsForAll',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
    public function StatusCardsForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/StatusCardsForAll',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
    public function RenewCardsForAll() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Beneficiary/RenewCardsForAll',array(
                    'Logo'              =>      'layout/Header/Logo',
                    'Message'           =>      'layout/Header/Message',
                    'Notifications'     =>      'layout/Header/Notifications',
                    'Tasks'             =>      'layout/Header/Tasks',
                    'UserAccount'       =>      'layout/Header/UserAccount',
                    'ContentHeader'     =>      'layout/Bady/ContentHeader',
                    //'MainContent'       =>      'layout/Bady/MainContent',
                    'SearchForm'        =>      'layout/Bady/SearchForm',
                    'SidebarMenu'       =>      'layout/Bady/SidebarMenu',
                    'SidebarUserPanel'  =>      'layout/Bady/SidebarUserPanel'
                    
                ),FALSE);        
    }
    
    
}
