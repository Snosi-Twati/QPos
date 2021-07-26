<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cities
 *
 * @author Coder001
 */
class Operations extends CI_Controller {

    //put your code here
    private $params = array(
        'Logo' => 'layout/Header/Logo',
        'Message' => 'layout/Header/Message',
        'Notifications' => 'layout/Header/Notifications',
        'Tasks' => 'layout/Header/Tasks',
        'UserAccount' => 'layout/Header/UserAccount',
        'ContentHeader' => 'layout/Bady/ContentHeader',
        //                    'MainContent'       =>      'layout/Bady/MainContent',
        'SearchForm' => 'layout/Bady/SearchForm',
        'SidebarMenu' => 'layout/Bady/SidebarMenu',
        'SidebarUserPanel' => 'layout/Bady/SidebarUserPanel'
    );

    public function POS() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->params['SuspendedBills']='Operations/SuspendedBills';
        $this->params['Pay']='Operations/Pay';
        $this->params['AddItems']='Operations/AddItems';
//        $params['AddItems']=$this->load->view('Operations/AddItems','',true);
        $this->params['ItemBill']='Operations/ListItems';
        $this->layouts->view('Operations/POS', $this->params, FALSE);
    }
    
    public function Pay() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->params['SuspendedBills']='Operations/SuspendedBills';
        $this->params['AddItems']='Operations/AddItems';
//        $params['AddItems']=$this->load->view('Operations/AddItems','',true);
        $this->params['ItemBill']='Operations/ListItems';
        $this->layouts->view('Operations/POS', $this->params, FALSE);
    }
    
    public function PurchaseBills() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $params['SuspendedBills']=$this->load->view('Operations/SuspendedBills','',true);
        $params['AddItems']=$this->load->view('Operations/AddItems','',true);
        $params['ListItems']=$this->load->view('Operations/ListItems','',true);
        
        $this->load->view('Operations/PurchaseBills',$params);
    }
    
    
    
    public function ListItems() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->view('Operations/ListItems');
    }
    
    public function AddItems() {
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $params['ItemBill']= $this->load->view('Operations/ListItems','',true);
        //$params['ItemBill3']=55;
        $this->load->view('Operations/AddItems',$params);
    }

}
