<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * 
 * **
 * Description of ShowingVisitsServicesRevealed
 *
 * @author Snosi
 */
class ShowingVisitsServicesRevealed extends CI_Controller {
    
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
   
    public function index() {
        
        $this->Access->AccessUser();
        $this->load->library('Layouts');
                $this->layouts->set_title('Home Page');
                $this->layouts->view('Table/TableData',$this->params,FALSE);        
    }
}
