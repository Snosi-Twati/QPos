<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *  BPM
 *  BPNM
 *  bonita
 * @author Snosi
 */
Class User extends CI_Model
{
    function login($username, $password)
    {
       //var_dump($password);
       $this -> db -> select('*');
       $this -> db -> from('creat_acount');
       $this -> db -> where('acount_name', $username);
       $this -> db -> where('password', MD5($password));
       $this -> db -> limit(1);

       $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
            
            
        }else{
            return false;
            
        }
    }
}

