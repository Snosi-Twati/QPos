<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MedicateMdl
 *
 * @author Coder001
 */
class Claims extends CI_Model{
    
    /*
     * This Function Generate Card  
     * 
     */
    function Claims($user_id)
    {
        $BeneficiariesID=$this->InsurerBeneficiaries($CompanyID);
        
        $BeneficiariesIDs=$this->GenerateCardNumbers($CompanyID,$BeneficiariesID);
        $this->InsertCards('beneficiariescards', $BeneficiariesIDs);
    }
    
    
}
