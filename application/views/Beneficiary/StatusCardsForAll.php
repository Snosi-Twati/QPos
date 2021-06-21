<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">اختيار الشركات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP 
                       
                   // $this->Desg-> LookUps_Form_With_DropDown($name,'companies','CompanyID','CompanyArabicName','CompanyID',"CompanyID");
                    $Cond['EmployeeID']=$this->session->userdata('ContactID');
                    $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees','CompanyID',$Cond);
                    var_dump($CondAry) ; 
                    $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'CompanyID');
                    $AryCond="CompanyID".$CondVl;
                     //if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee','ContactID',$this->session->userdata('ContactID')) =='1')
                    if($AryCond==1001)
                      { 
                      $this->Desg-> LookUps_Form_With_DropDown($name,'companies','CompanyID','CompanyArabicName','CompanyID','CompanyID');
                      $Cond=false;
                      var_dump($Cond);
                      $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','Party2CompanyID',$Cond); 
                      
                      $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'Party2CompanyID');
                      $AryCond="CompanyID".$CondVl;
                      $this->Desg->Create_Form_With_DropDown($name,"","عرض",$AryCond,FALSE); 
                    }
                    else{
                  
                    $this->Desg-> LookUps_Form_With_DropDown($name,'companies','CompanyID','CompanyArabicName','CompanyID',"CompanyID");  
                    //$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('','',$Cond);
                    //$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('','',$Cond)
                    //$this->Desg->Create_Form_With_DropDown($name,$ActionTo,$btn,$AryCond,$keepPOST);
                    
                     $this->Desg->Create_Form_With_DropDown($name,"","عرض",$AryCond,FALSE); 
                    }
                    //$this->Desg->Create_Form_With_DropDown($name,"","عرض",$AryCond,FALSE); 
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 fa fa-question-circle">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة مستفيدين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?PHP
//                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
//                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
//                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');

                    //$this->Desg->ExCol($ArrCol,'تفاصيل','users','ContactID','Claims','fa-info','Green');
                    //$this->session->set_userdata($this->input->post('CompanyID'));
                    
                    //$this->Desg->ExCol($ArrCol,'مطالبات','Claims','ContactID','BeneficiaryID','Claims/AccountStatementInc','fa-info','Green');
                    //$this->Desg->ExColWithValue($Butn,' بطاقة  ','بطاقة اول مرة','beneficiariescards','ContactID','BeneficiaryID',FALSE,FALSE,FALSE,FALSE,'ProcessControlDatabases/CardsOrder','fa-plus','');
                    $this->Desg->ExColWithValue($Butn,'','معلق' ,'beneficiariescards','ContactID','BeneficiaryID','CardStatus',"0"      ,'Printed','0',FALSE,'fa-question-circle' ,'');
                    $this->Desg->ExColWithValue($Butn,'','يعمل' ,'beneficiariescards','ContactID','BeneficiaryID','CardStatus',"1"      ,'Printed','1',FALSE,'fa-check-circle-o'  ,'');
                    $this->Desg->ExColWithValue($Butn,'','موقوف','beneficiariescards','ContactID','BeneficiaryID','CardStatus',"2"      ,'Printed','1',FALSE,'fa-stop'            ,'');
                    $this->Desg->ExColWithValue($Butn,'','متلف' ,'beneficiariescards','ContactID','BeneficiaryID','CardStatus',"3 or 4" ,'Printed','1',FALSE,'fa-recycle'         ,'');
                    //var_dump($Butn);
                    $Fld['FirstName']       ='FirstName';
                    $Fld['FamilyName']      ='FamilyName';
                    $Fld['Department']      ='Department';
                    $Fld['Job']             ='Job';
                    $Fld['DateOfBirth']     ='DateOfBirth';
                    $Fld['Phone']           ='Phone';


    //                    $Fld['FirstName']='FirstName';
    //                    $Fld['FirstName']='FirstName';
    //                    $Fld['FirstName']='FirstName';
    //                    $this->Desg->ViewData("users",$Fld);
                    unset($Cond);
                    if($this->input->post('CompanyID')  !=  NULL)
                    {   
                        $CompanyID['CompanyID']         =   $this->input->post('CompanyID');
                        $this->session->set_userdata($CompanyID);
                        $Cond['CompanyID']              =   $this->input->post('CompanyID');
                        $CondAry                        =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
                        $CondVl                         =   $this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
                        $AryCond                        =   "ContactID".$CondVl;
                    }else{
                        $AryCond                        =   "ContactID IN(-1)";
                    }
                    
                    $this->Desg->ViewDataWithExRowWithMultiCond('users',FALSE,$Fld,FALSE,$AryCond,$Butn);
                    ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>