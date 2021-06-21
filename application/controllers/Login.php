<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Coder001
 */
class Login extends CI_Controller {

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

    //put your code here
    public function index() {

        $class = $this->router->fetch_class();
        $method = $this->router->fetch_method();

        $this->load->model('Desg');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('LogUsers/Login', FALSE, FALSE, FALSE);
    }

    public function check() {


        $cond['UserName'] = $this->input->post('UserName');
        $cond['PassWord'] = md5($this->input->post('PassWord'));
        $cond['AllowLogin'] = '1';
        if ($this->Pros->UserName('users', 'UserID', $cond)) {
            $data['ContactID'] = $this->Pros->UserName('users', 'UserID', $cond);
            //$this->session->set_userdata('cr',$data);
            $_SESSION['ContactID']  =   $data['ContactID'];
            //$this->session->userdata('ContactID');
            //var_dump($_SESSION);
            //die;
            redirect(base_url() . 'Main');
        } else {
            redirect(base_url() . 'Login');
        }
    }

    public function End() {


        $this->session->sess_destroy();
        //readdir();
        redirect(base_url());
    }

    //put your code here
    public function ListUsers() {

        $this->load->model('Desg');
        $this->load->model('Pros');
        $this->load->library('Layouts');
        $this->layouts->set_title('Home Page');
        $this->layouts->view('LogUsers/ListUsers', $this->params, FALSE);
        //$this->session->sess_destroy();
        if ($this->input->get('ContactID')) {
            $Cod['UserID'] = $this->input->get('ContactID');
            $ID = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('linkingusergroup', 'GroupID', $Cod);
            // die($ID);
            if ($ID == FALSE) {
                $FunctionList = $this->Desg->FunctionList();
                foreach ($FunctionList as $key => $valueFun) {
                    foreach ($valueFun as $value) {
                        $stut[$key . "" . $value] = $key . "" . $value;
                    }
                }
                $UserData = $this->Pros->Get_Value_Filed_AQ('users', '*', 'ContactID', $this->input->get('ContactID'));
                foreach ($UserData[0] as $key => $value) {
                    $stut[$key] = $value;
                }
                $this->session->set_userdata($stut);
                redirect(base_url());
            } else {
                $CodA['GroupsID'] = $ID;
                $ID = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('permissionsgroups', 'PermissionsID', $CodA);

                foreach ($ID as $key => $value) {
                    $stut[$value['PermissionsID']] = $value['PermissionsID'];
                }
                $UserData = $this->Pros->Get_Value_Filed_AQ('users', '*', 'ContactID', $this->input->get('ContactID'));
                foreach ($UserData[0] as $key => $value) {
                    $stut[$key] = $value;
                }
                $this->session->set_userdata($stut);
                redirect(base_url());
            }
        }
    }

}
