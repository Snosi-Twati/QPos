<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Companies
 *
 * @author Coder001
 */
class Companies extends CI_Controller{
    
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
    
    public function ListOfCompanies() 
    {
        $this->Access->AccessUser();
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Companies/ListOfCompanies',$this->params,FALSE);
    }
    
    public function AccountStatementInc() 
    {
        $this->Access->AccessUser();
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Companies/AccountStatementInc',$this->params,FALSE);
    }
    
    public function CompaniesServicesPrices() 
    {
        $this->Access->AccessUser();
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Companies/CompaniesServicesPricesData',$this->params,FALSE);
    }
    
    public function ClinicsServicesPrices() 
    {
        $this->Access->AccessUser();
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Companies/ClinicsServicesPricesData',$this->params,FALSE);
    }
    
    public function AddCompanies() 
    {
        $this->Access->AccessUser();
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Companies/AddCompanies',$this->params,FALSE);
    }
}
