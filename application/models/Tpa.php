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
Class Tpa extends CI_Model
{
    
    function ClaimIDVaild() {
        //$this->load->library('session');
        //var_dump($this->session->userdata);
        $pc_cond['assigned_to'] = $this->session->userdata('user_id');
        $pc_cond['state'] = 1;
        //var_dump($pc_cond);
       ///die;
        $ProductionCode = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('productioncode_serial', 'ProductionCode', $pc_cond);
        //echo $ProductionCode;
        unset($pc_cond);
        $pc_cond['ProductionCode like'] = $ProductionCode;
        $ClaimID = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims', 'ClaimID', $pc_cond);
        //echo $ClaimID;
        return $ClaimID;
    }
    
     function ProductionCodeVaild() {
        //$this->load->library('session');
        //var_dump($this->session->userdata);
        $pc_cond['assigned_to'] = $this->session->userdata('user_id');
        $pc_cond['state'] = 1;
        //var_dump($pc_cond);
       ///die;
        $ProductionCode = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('productioncode_serial', 'ProductionCode', $pc_cond);
       
        return $ProductionCode;
    }
    
}