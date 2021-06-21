<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Settings
 *
 * @author Coder001
 */
class Settings extends CI_Controller{
    
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
    
    public function getCities(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Cities/CitiesData',$this->params,FALSE);
        
    }
    
    public function getCompanies(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Companies/CompaniesData',$this->params,FALSE);
    }
    
    public function getCompanyType(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Companies/CompanyType',$this->params,FALSE);
    }
    
    public function getCompaniesServicesPrices(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Companies/CompaniesServicesPricesData',$this->params,FALSE);
    }
    
    public function getCountries(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Countries/CountriesData',$this->params,FALSE);
        
    }
    
    public function getCurrencies(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Currencies/CurrenciesData',$this->params,FALSE);
        
    }
    
    public function getDepartments(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Departments/DepartmentsData',$this->params,FALSE);
        
    }
    
    public function getIssuesStatus(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('IssuesStatus/IssuesStatus',$this->params,FALSE);
        
    }
    
     public function getJobs(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Jobs/JobsData',$this->params,FALSE);
        
    }
    
    public function getServices(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Services/ServicesData',$this->params,FALSE);
        
    }
    
    public function getStages(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Stages/StagesData',$this->params,FALSE);
        
    }
    
    public function getBanks(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Banks/BanksData',$this->params,FALSE);
    }
    
    public function getBanksBranches(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('Banks/BanksBranchesData',$this->params,FALSE);
    }
    
     public function getNationalities(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Nationalities/NationalitiesData',$this->params,FALSE);
        
    }
    
     public function getEmploymentType(){
        
        $this->Access->AccessUser();
        $this->load->model('Desg');
//        $this->Desg->Create_From_Tabels("companies","","حفظ",0);
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Employees/EmploymentType',$this->params,FALSE);
        
    }
}
