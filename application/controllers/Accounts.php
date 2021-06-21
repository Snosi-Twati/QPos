<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounts
 *
 * @author Coder001
 */
class Accounts extends CI_Controller{
    
    private $params =   array(
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


    //put your code here
    public function getAccounts(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/AccountsData',$this->params,FALSE);
        
    }
    
    public function transactionvoucherheader() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/transactionvoucherheader',$this->params,FALSE);
    }
    
    public function transactionvoucherdetails() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/transactionvoucherdetails',$this->params,FALSE);
    }
    
    public function vouchertypes() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/vouchertypes',$this->params,FALSE);
    }
    
    
    
    public function callrecieptvouchers() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/callrecieptvouchers',$this->params,FALSE);
    }
    
     public function bankrecieptvouchers() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        //$this->layouts->set_title('Home Page');
        $this->load->view('Accounts/bankrecieptvouchers',$this->params,FALSE);
    }
    
     public function cashrecieptvouchers() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        //$this->layouts->set_title('Home Page');
        $this->load->view('Accounts/cashrecieptvouchers',$this->params,FALSE);
    }
    
    public function callpaymentvouchers() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/callpaymentvouchers',$this->params,FALSE);
    }
    
    public function bankpaymentvouchers() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        //$this->layouts->set_title('Home Page');
        $this->load->view('Accounts/bankpaymentvouchers');
    }
    
    public function cashpaymentvouchers() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        //$this->layouts->set_title('Home Page');
        $this->load->view('Accounts/cashpaymentvouchers');
    }
    
    public function accountsreportingtypes() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/accountsreportingtypes',$this->params,FALSE);
    }
    
    public function accountreportingtypes() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/accountreportingtypes',$this->params,FALSE);
    }
    
    public function accountreportingtypeheadings() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/accountreportingtypeheadings',$this->params,FALSE);
    }
    
    public function generalledger() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/generalledger',$this->params,FALSE);
    }
    
    public function AuditBalance() {
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Accounts/AuditBalance',$this->params,FALSE);
    }
    
}
