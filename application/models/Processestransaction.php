<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProcessesTransaction
 *
 * @author Coder001
 */
class Processestransaction extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function InsertDB($Tbl,$data) 
    {
        if(isset($data['PassWord'])){
            $data['PassWord']= md5($data['PassWord']);  
        }
        $this->db->insert($Tbl, $data);
        ////////////////////////////////////////////////////////////////////////
        $affected_rows  =   $this->db->affected_rows();        
        if($affected_rows   >   0)
        { 
            $datau['rows']   =   $affected_rows;
            $this->session->set_userdata($datau);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function InsertDBMultiTable($Tbl,$data=NULL) 
    {//die('123');
        if($data!=NULL){
            $affected_rows  =   0;
            foreach ($data as $key => $value) 
            {
                if(isset($data['PassWord'])){
                    $data['PassWord']= md5($data['PassWord']);  
                }
                 var_dump($value);
                 die();
                $this->db->insert($Tbl, $value);
                ////////////////////////////////////////////////////////////////
                if($this->db->affected_rows($Tbl)   >  0)
                { 
                    $affected_rows++;
                    $datau['rows']   =   $affected_rows;
                    $this->session->set_userdata($datau);
                     return TRUE;
                }
                else
                {    
                    var_dump($affected_rows);
                   
                    $datau['rows']   =   $affected_rows; 
                    $this->session->set_userdata($datau);
                    return FALSE;  
                }      
            }
        }else{
            return FALSE;
        }
     }
    
    public function UpDateDB($Tbl,$data,$fld,$vfld) 
    {
        $this->db->where($fld,$vfld)->update($Tbl ,$data);
        ////////////////////////////////////////////////////////////////////////
        $affected_rows  =   $this->db->affected_rows();       
        if($affected_rows   >   0)
        { 
            $datau['rows']   =   $affected_rows;
            $this->session->set_userdata($datau);
            return TRUE;
        }
        else
            return FALSE;
    }
    
    public function UpDateDBMultiCond($Tbl,$data,$Cond) 
    {
        $this->db->where($Cond)->update($Tbl ,$data);
        ////////////////////////////////////////////////////////////////////////
        $affected_rows  =   $this->db->affected_rows();        
        if($affected_rows   >   0)
        { 
            $datau['rows']   =   $affected_rows;
            $this->session->set_userdata($datau);
            return TRUE;
        }
        else
        {    
            $datau['rows']   =   $affected_rows;
            $this->session->set_userdata($datau);
            return FALSE;
        }
    }
    
    public function DeleteDB($Tbl,$fld,$vfld) 
    {
        $this->db->where($fld,$vfld)->delete($Tbl);
        ////////////////////////////////////////////////////////////////////////
        $affected_rows  =   $this->db->affected_rows();        
        if($affected_rows   >   0)
        { 
            $datau['rows']   =   $affected_rows;
            $this->session->set_userdata($datau);
            return TRUE;
        }
        else
            return FALSE;
    } 
    
}
