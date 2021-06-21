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
class MedicateMdl extends CI_Model{
    
    /*
     * This Function Generate Card  
     * 
     */
    function GenerateCard($CompanyID)
    {
        $BeneficiariesID=$this->InsurerBeneficiaries($CompanyID);
        
        $BeneficiariesIDs=$this->GenerateCardNumbers($CompanyID,$BeneficiariesID);
        $this->InsertCards('beneficiariescards', $BeneficiariesIDs);
    }
    
    
    /*
     * This Function Generate Card Numbers  
     *  
     */
    function GenerateCardNumbers($CompanyID,$BeneficiariesID)
    {
     $this->load->model('Pros');
        
        foreach ($BeneficiariesID as $key => $value) {
            
            $Comp=intval($CompanyID);
            $card=intval($CompanyID)*100000000;
             //var_dump($card);
            $card=$card+intval($value['BeneficiaryID']);
            //var_dump($card);
            //die();
            $card.= "00";            
            
            for(;;){
                $card++;
                $cfld['BeneficiaryID']  =       $value['BeneficiaryID'];
                $cfld['CardID']         =       $card;
                $cfld['CardStatus']     =       0;
                
                //$cfld['CardID']         =       $card;
                if($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('beneficiariescards', 'BeneficiaryID', $cfld))
                {
                    break;
                }else{
                    unset($cfld);
                    $cfld['BeneficiaryID']  =       $value['BeneficiaryID'];
                    $cfld['CardID']         =       $card;
                    $cfld['CardStatus']     =       1;
                
                   if($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('beneficiariescards', 'BeneficiaryID', $cfld))
                    {                    
                       break;  
                    }else{
                        unset($cfld);
                        $cfld['BeneficiaryID']  =       $value['BeneficiaryID'];
                        $cfld['CardID']         =       $card;
                        $cfld['CardStatus']     =       2;
                         
                        if($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('beneficiariescards', 'BeneficiaryID', $cfld))
                        {  
                            break;    
                        }else{
                            
                            unset($cfld);
                            $cfld['BeneficiaryID']  =       $value['BeneficiaryID'];
                            $cfld['CardID']         =       $card;
                             
                            if($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('beneficiariescards', 'BeneficiaryID', $cfld))
                            {
                                break;    
                            }else{
                                
                                $Ary[]=array(
                                    'CardID'        =>      $card                           ,
                                    'BeneficiaryID' =>      $value['BeneficiaryID']         ,
                                    'CardIssueDate' =>      date('Y-m-d')                   ,
                                    'CardStatus'    =>      0                               ,
                                    'Printed'       =>      0                               ,
                                    'PrintedDate'   =>      NULL                            ,
                                    'Delivered'     =>      0                               ,
                                    'DeliveredDate' =>      NULL
                                );                               
                                
                                break;   
                            }
                        }    
                    }
                   
                }
            }
        }
        if(isset($Ary)&& (sizeof($Ary)>0))
        {
            return $Ary;  
        
        }
        else{
            
           return 0;
        }
      
    }
    
    /*
     * This Function Insert Cards  
     * 
     */
    function InsertCards($Tbl,$data)
    {
        $datau['Message']    =   'عدد البطاقات المنجزة';
        $this->session->set_userdata('$datau');
        $this->ProConDBinMultoRow($Tbl,$data);
    }
    
    /*
     * This Function Insert Cards  
     * 
     */
    function InsertOneCard($Tbl,$data)
    {
        
        $this->ProConDBin($Tbl,$data);
    }
    
    /*
     * This Function Insurer Beneficiaries  
     *  
     */
    function InsurerBeneficiaries($CompanyID)
    {
        $this->load->model('Pros');
        $cfld['CompanyID']  =   $CompanyID;
        
       return $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries', 'BeneficiaryID', $cfld);
      
    }
    
    public function ProConDBin($Tbl,$data)
    {
        //$this->Access->AccessUser();
        $this->load->model("Pros"); 

        $this->load->model("Processestransaction");
        if($this->Processestransaction->InsertDB($Tbl,$data)==TRUE)
        {
            redirect($this->input->post('Url')."?Do=Yes");
        }else{
            redirect($this->input->post('Url')."?Do=No");
        }
    }
    
    public function ProConDBinMultoRow($Tbl,$data)
    {
        //$this->Access->AccessUser();
        $this->load->model("Pros"); 
        $this->load->model("Processestransaction");
       
        
        unset( $_SESSION['rows']);
         if(is_array($data)&& !empty($data))
            {
        if($this->Processestransaction->InsertDBMultiTable($Tbl,$data)==TRUE)
        {
            redirect($this->input->post('Url')."?Do=Yes");
        }
            
        }else{
          //  var_dump($_SESSION['rows']);
          //$this->session->unset_userdata($datau);
         redirect($this->input->post('Url')."?Do=No");
        }
     
    
    }
    
    public function InfoBoxBeneficiary($Beneficiary='') 
    {
        if($this->Pros->Get_JustValue_Filed_AQ('beneficiariescards','CardStatus'     ,'CardID',$Beneficiary)==0)
        {
            $CardStatus='لم تصدر بعد';   
        }
        if($this->Pros->Get_JustValue_Filed_AQ('beneficiariescards','CardStatus'     ,'CardID',$Beneficiary)==1)
        {
            $CardStatus='تعمل فعالة';     
        }
        if($this->Pros->Get_JustValue_Filed_AQ('beneficiariescards','CardStatus'     ,'CardID',$Beneficiary)==2)
        {
            $CardStatus='موقوفة';     
        }
        if($this->Pros->Get_JustValue_Filed_AQ('beneficiariescards','CardStatus'     ,'CardID',$Beneficiary)==3)
        {
            $CardStatus='ضائعة';     
        }
        if($this->Pros->Get_JustValue_Filed_AQ('beneficiariescards','CardStatus'     ,'CardID',$Beneficiary)==4)
        {
            $CardStatus='متلفة';     
        }
        echo "<div class=\"box\">
        <div class=\"box-header\">
            <h3 class=\"box-title\">معلومات</h3>
        </div><!-- /.box-header -->
        <div class=\"box-body\">";
        $Beneficiary=substr($Beneficiary, 4, 8);
        echo "  <div class=\"col-md-4\">
                    <div class=\"input-group\" style=\"margin: 4px;\">
                        <div class=\"pull-right image\">
                            <img src=\"http://localhost/TPA/style/dist/img/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
                        </div>
                    </div>
                </div>";
        echo "  <div class=\"col-md-4\">
                    <div class=\"input-group\" style=\"margin: 4px;\"><h3> الاسم :".
                    $this->Pros->Get_JustValue_Filed_AQ('users','FirstName'     ,'ContactID',$Beneficiary)." ".$this->Pros->Get_JustValue_Filed_AQ('users','FamilyName'     ,'ContactID',$Beneficiary)
                ."  </h3></div>
                
                    <div class=\"input-group\" style=\"margin: 4px;\"><h3>حالة البطاقة : ".
                    $CardStatus
                ."  </h3></div>"; 
        echo "</div>
        </div>";
    }
    
    public function InfoBoxBeneficiaryFull($Beneficiary='') 
    {
        
        echo "<div class=\"box\">
        <div class=\"box-header\">
            <h3 class=\"box-title\">معلومات</h3>
        </div><!-- /.box-header -->
        <div class=\"box-body\">";
        
        echo "  <div class=\"col-md-4\">
                    <div class=\"input-group\" style=\"margin: 4px;\">
                        <div class=\"pull-right image\">
                            <img src=\"http://localhost/TPA/style/dist/img/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
                        </div>
                    </div>
                </div>";
        echo "  <div class=\"col-md-4\">
                    <div class=\"input-group\" style=\"margin: 4px;\"><h3> الاسم :".
                    $this->Pros->Get_JustValue_Filed_AQ('users','FirstName'     ,'ContactID',$Beneficiary)." ".$this->Pros->Get_JustValue_Filed_AQ('users','FamilyName'     ,'ContactID',$Beneficiary)
                ."  </h3></div>";
        echo "    <div class=\"input-group\" style=\"margin: 4px;\"><h3>الجنس: ";
        
                    if($this->Pros->Get_JustValue_Filed_AQ('users','sex'     ,'ContactID',$Beneficiary)=="1")
                        echo "Male";
                    elseif($this->Pros->Get_JustValue_Filed_AQ('users','sex'     ,'ContactID',$Beneficiary)=="2")
                        echo "Female";
                    else
                        echo "None";
                    
                echo "  </h3></div>";
                echo "</div>";
                echo "    <div class=\"input-group\" style=\"margin: 4px;\"><h3>العمر: ";
                echo $this->Pros->Get_JustValue_Filed_AQ('users','DateOfBirth'     ,'ContactID',$Beneficiary); 
                echo "  </h3></div>";
                echo "</div>";
                $Arry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('GetDiagnosisForBeneficiaryID','DiagnosisName,DiagnosisTypeName');
                
                echo "<h3>تاريخ الطبي:  </h3>";
                foreach ($Arry as $keyArry => $valueArry) {
                    
                
                echo "    <div class=\"input-group\" style=\"margin: 4px;\"><h3> ";
                echo $valueArry['DiagnosisTypeName'].":".$valueArry['DiagnosisName']; 
                
                echo " </h3></div>";
                
                }
                echo "</div>";
    }
    
    public function OpenClaimsFromClinic( $ClaimID=false ) 
    {
       
        $CondAry['ClaimID']=$ClaimID;
        $ClaimData=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claims','*',$CondAry);
        if($ClaimData)
        {
            redirect("Claims/AddClaimsWithServicesFromClinic?Diagnosis=add&ClaimID=".$ClaimData[0]['ClaimID']."&CompanyID=".$ClaimData[0]['ClinicID']."");
        }
        
    }
    
}
