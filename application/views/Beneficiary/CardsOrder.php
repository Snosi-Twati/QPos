<section class="content">
    
    
    
<?PHP  if( $this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID')) =='1' || $this->Pros->Get_JustValue_Filed_AQ('users','Customer'     ,'ContactID',$this->session->userdata('ContactID')) =='1' ){ ?>    
        <?PHP
//                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
//                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
//                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');

                    //$this->Desg->ExCol($ArrCol,'تفاصيل','users','ContactID','Claims','fa-info','Green');
                    //$this->session->set_userdata($this->input->post('CompanyID'));
                    $this->Desg->ExCol($ArrCol,'تعديل السقف المالي','insurerbeneficiaries','ContactID','BeneficiaryID','Beneficiary/CardsOrder',' fa-pencil-square-o','');
                    $this->Desg->ExCol($ArrCol,'مطالبات','Claims','ContactID','BeneficiaryID','Claims/AccountStatementInc','fa-info','');
                     
                     //$this->Desg->ExCol($ArrCol,'كشف المنافع','insurerbeneficiaries','ContactID','BeneficiaryID','Beneficiary/EditBeneficiary','fa-info','');
                    //$this->Desg->ExColWithValue($Butn,' بطاقة  ','بطاقة اول مرة','beneficiariescards','ContactID','BeneficiaryID',FALSE,FALSE,FALSE,FALSE,'ProcessControlDatabases/CardsOrder','fa-plus','');
                    $this->Desg->ExColWithValue($Butn,' بطاقة جديدة ','طلب بطاقة جديد','beneficiariescards','ContactID','BeneficiaryID','CardStatus','3 or 4','Printed','0','ProcessControlDatabases/CardsOrder','fa-plus','');
                    $this->Desg->ExColWithValue($Butn,' تبليغ عن فقدان ','ايقاف البطاقة','beneficiariescards','ContactID','BeneficiaryID','CardStatus',1,'Printed','1','ProcessControlDatabases/EditDataCardsOrder?CardStatus=2','fa-wifi','');
                    $this->Desg->ExColWithValue($Butn,' بدل تالف','اتلاف بطاقة','beneficiariescards','ContactID','BeneficiaryID','CardStatus',2,'Printed','1','ProcessControlDatabases/EditDataCardsOrder?CardStatus=3','fa-recycle','');
                    //var_dump($Butn);
//                    $Fld['FirstName']       ='FirstName';
//                    $Fld['FamilyName']      ='FamilyName';
                    $Fld['Name']='Name';
                    $Fld['Department']      ='Department';
                    $Fld['Job']             ='Job';
                    $Fld['DateOfBirth']     ='DateOfBirth';
                    $Fld['AllowedAmount']           ='AllowedAmount';
                    $Fld['ClinicClaimAmount'] ='ClinicClaimAmount';
                   // $Fld['ApproveAmount']  =  'ApprovedAmount' ;    
                    $Fld['Degree']     ='Degree';


    //                    $Fld['FirstName']='FirstName';
    //                    $Fld['FirstName']='FirstName';
    //                    $Fld['FirstName']='FirstName';
    //                    $this->Desg->ViewData("users",$Fld);
                    
                       // $CompanyID['CompanyID']         =   $this->input->post('CompanyID');
                        $EmployeeID['EmployeeID']   =   $this->session->userdata('ContactID');
                        
                        $CompanyID['CompanyID']     =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('companiesemployees','CompanyID',$EmployeeID);
                        if ($CompanyID){
                        $this->session->set_userdata($CompanyID);
                       // $Cond['CompanyID']              =   $this->input->post('CompanyID');
                        $Cond['CompanyID']=$CompanyID['CompanyID'];
                        //var_dump($Cond);
                        $CondAry                        =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
                        $CondVl                         =   $this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
                        $AryCond                        =   "ContactID".$CondVl;
                        }else{
                            $AryCond                        =   "ContactID IN(-1)";
                        }
                    ?>
    
<!--    
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">اختيار الشركات</h3>
                </div> /.box-header 
                <div class="box-body">
                    //<?PHP 
//                       
//                          $this->Desg->LookUps_Form_With_DropDown($name,'contracts','ContractID','ReferenceNumber','ContractID','ContractID');
//                          $Cond1['EmployeeID']=$this->session->userdata('ContactID');
//                          $CondAry1=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees','CompanyID',$Cond1);
//                           $CondVl1=$this->Pros->Make_Value_in_SQL_IN($CondAry1,'CompanyID');
//                           $AryCond1="BeneficiaryCompanyID".$CondVl1;
////                        //$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('','',$Cond);
////                        //$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('','',$Cond)
//// $this->Desg->Create_Form_With_DropDown($name,$ActionTo,$btn,$AryCond1,$keepPOST);
//                           $this->Desg->Create_Form_With_DropDown($name,"","عرض",$AryCond1,FALSE); 
//                    ?>
             </div>
            </div>
        </div>
    </div>-->



<?php   if($this->input->post('BeneficiaryID')!=NULL)  {
                 ?>
    <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">تعديل السقف للمستفيد</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
 $ViewFld['AllowedAmount']      ='AllowedAmount';
 $hiddenField['BeneficiaryID']                =$this->input->get('BeneficiaryID');
 $ar=$this->input->get('BeneficiaryID') ;              

 // $this->Desg->Create_From_Tabels( "insurerbeneficiaries",'BeneficiaryID',$ar,"ProcessControlDatabases/UpDateRow",FALSE,TRUE,$hiddenField); 
 $this->Desg->Create_From_Tabels( "insurerbeneficiaries",'BeneficiaryID',$ar,"ProcessControlDatabases/EditBeneficiaryAllowedAmount","حفظ",TRUE,$ViewFld,FALSE,$hiddenField);
 ?>
 </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?php } ?>
    
    <div class="row">
        <div class="col-xs-12 ">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة مستفيدين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
              <?php
                    $this->Desg->ViewDataWithExRowWithMultiCond('beneficiariesinfo',$ArrCol,$Fld,FALSE,$AryCond,$Butn);
                    ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    <?PHP  } ?>
    <?PHP  if($this->Pros->Get_JustValue_Filed_AQ('users','Customer'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
    <div class="row">
        <div class="col-xs-12 ">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة مستفيدين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
              <?php
              unset($Butn);
                    //$this->Desg->ExColWithValue($Butn,' بطاقة جديدة ','طلب بطاقة جديد','beneficiariescards','ContactID','BeneficiaryID','CardStatus','3 or 4','Printed','0','ProcessControlDatabases/CardsOrder','fa-plus','');
                    $this->Desg->ExColWithValue($Butn,' تبليغ عن فقدان ','ايقاف البطاقة','beneficiariescards','ContactID','BeneficiaryID','CardStatus',1,'Printed','1','ProcessControlDatabases/EditDataCardsOrder?CardStatus=2','fa-wifi','');
                    $this->Desg->ExColWithValue($Butn,' بدل تالف','اتلاف بطاقة','beneficiariescards','ContactID','BeneficiaryID','CardStatus',2,'Printed','1','ProcessControlDatabases/EditDataCardsOrder?CardStatus=3','fa-recycle','');
                    //var_dump($Butn);
//                    $Fld['FirstName']       ='FirstName';
//                    $Fld['FamilyName']      ='FamilyName';
                    $Fld['Name']                =   'Name';
                    $Fld['Department']          =   'Department';
                    $Fld['Job']                 =   'Job';
                    $Fld['DateOfBirth']         =   'DateOfBirth';
                    $Fld['AllowedAmount']       =   'AllowedAmount';
                    $Fld['ClinicClaimAmount']   =   'ClinicClaimAmount';
                   // $Fld['ApproveAmount']  =  'ApprovedAmount' ;    
                    $Fld['Degree']     ='Degree';
                    unset($AryCond);
                    $AryCond['ContactID']       =   $this->session->userdata('ContactID');
                    $this->Desg->ViewDataWithExRowWithMultiCond('beneficiariesinfo',FALSE,$Fld,FALSE,$AryCond,$Butn);
                    ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    <?PHP } ?>
    
</section>