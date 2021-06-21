<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SendMail
 *
 * @author Snosi
 */
class SendMail extends CI_Model {
    function send_User_password($email,$name,$msg){
//        $config = Array( 
//            'protocol' => 'smtp', 
//            'smtp_host' => 'ssl://mail.idpsebhau.edu.ly', 
//            'smtp_port' => 465, 
//            'smtp_user' => 'system@idpsebhau.edu.ly', 
//            'smtp_pass' => 'Systemsebhau@@', ); 
// 
//        $this->load->library('email', $config); 
//        $config['protocol']    = 'smtp';
//        $config['smtp_host']    = 'ssl://idpsebhau.server.ly';
//        $config['smtp_port']    = '465';
//        $config['smtp_timeout'] = '7';
//        $config['smtp_user']    = 'system@idpsebhau.edu.ly';
//        $config['smtp_pass']    = 'Systemsebhau@@';
        $config['useragent']           = "CodeIgniter";
        $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']            = "smtp";
        $config['smtp_host']           = "localhost";
        $config['smtp_port']           = "25";
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->load->library('email');
        $this->email->initialize($config);
            //$this->load->library('email'
        $this->email->from('system@idpsebhau.edu.ly', 'System - النظام');
        $this->email->to($email,$name);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');
        $this->email->subject('System Mail - رسالة من نظام');
        $this->email->message($msg);
        if($this->email->send()){
            return TRUE;
        }else{
            echo $this->email->print_debugger();
            return FALSE;
            //die('xxxxxxxxxxxxxx');
        }
    }
}
