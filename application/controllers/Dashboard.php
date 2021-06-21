<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of Claims
 *
 * @author Snosi 
 * 
 */

class Dashboard extends CI_Controller {
    
    
    public $Clm;
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
    
    public function index()
    {
        //var_dump($_POST);
        $this->Access->AccessUser();
        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view( 'Dashboard/Dashboard',$this->params,FALSE );
    }
        
}
