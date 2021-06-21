<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserManagment
 *
 * @author Coder001
 */
class UserManagment extends CI_Controller{
    
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
   
    public function ListControllers() 
    {
        $controllers = array();
        $this->load->helper('file');

        // Scan files in the /application/controllers directory
        // Set the second param to TRUE or remove it if you 
        // don't have controllers in sub directories
        $files = get_dir_file_info(APPPATH.'controllers', FALSE);

        // Loop through file names removing .php extension
        foreach ( array_keys($files) as $file ) {
            if ( $file != 'index.html' )
                $controllers[] = str_replace('.php', '', $file);
        }
        //var_dump($controllers); // Array with all our controllers

    }
    
    
    
}
