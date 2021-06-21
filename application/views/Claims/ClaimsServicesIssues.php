<?PHP if($this->input->get('ClaimServiceID')) { ?>

<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ادراج مشكلة </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    $ViewFld['Issue']               ='Issue';
                    $hiddenField['IssueDate']       =date('Y-m-d');
                    $hiddenField['IssueTime']       =date('H:i:s');
                    $hiddenField['IssuedByID']      =$this->session->userdata('ContactID');
                    //$ViewFld['IssuedByID']      ='IssuedByID';
                    $ViewFld['IssueStatusID']       ='IssueStatusID';
                    $ViewFld['TransferToID']        ='TransferToID';
                    $keepPOST['ClaimServiceID']     ='ClaimServiceID';
                    
                    //$this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                    //$this->Desg->LookUps($A,'IssuedByID','FirstName','ContactID','users',0);
                    //$cond[]
                    $this->Desg->LookUps($A,'TransferToID','FirstName','ContactID','users',0);
                    $this->Desg->LookUps($A,'IssueStatusID','IssueStatus','IssueStatusID','issuesstatus',0);
                    $this->Desg->Create_From_Tabels("claimsservicesissues",FALSE,FALSE,"ProcessControlDatabases/ProConDBin","حفظ",$A,$ViewFld, $keepPOST,$hiddenField);  
                    ?>
                
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row"> 
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">الملاحظات و الردود عليها</h3>
            </div><!-- /.box-header -->
                <?PHP
                
                $this->load->model("Pros");     
                $cond['ClaimServiceID']=$this->input->get('ClaimServiceID');
                $Creater=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claimsservicesissues','*',$cond);
                $this->Desg->ViewDataLineTime($Creater,'IssueDate','IssueTime','IssuedByID','IssueStatusID','TransferToID','Issue');  
                
                ?>
                <!-- row -->
        </div>
    </div>  
</section>
        <?PHP } ?>

<?PHP if($this->input->get('ClaimID')){ ?>
<section class="content">
            
        <div class="row">
            <div class="col-xs-12">
              
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> تفاصيل المطالبة </h3>
                </div><!-- /.box-header -->
                    <div class="box-body fa-b ">
                        <?PHP 
                        /////////////////////////////////////////////
                        $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                        $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                        $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                        ////////////////////////////////////////////
                        //$this->Desg->ExCol($ArrCol,'تعديل'          ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','Claims/DataClaimsDetailsList?List=edit',' fa-pencil-square-o','');
                        //$this->Desg->ExCol($ArrCol,'اعتماد طبي'     ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-check-circle-o','');
                        $this->Desg->ExCol($ArrCol,'اضافة ملاحظة'   ,'claimsservicesissues' ,'ClaimServiceID'   ,'ClaimServiceID','Claims/ClaimsServicesIssues','fa-plus-circle','Yellow');
                        ////////////////////////////////////////////
                        $Fld['ClaimServiceID']              ='ClaimServiceID';
                        $Fld['ServiceID']                   ='ServiceID';
                        $Fld['ClinicServiceAmount']         ='ClinicServiceAmount';
                        $Fld['ServiceDate']                 ='ServiceDate';
                        $Fld['ServiceTime']                 ='ServiceTime';
                        $Fld['CurrencyID']                  ='CurrencyID';
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','InsurerEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar);    
                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $CondCD['MedicalApprovalBy']        =   '0';
                            if($this->input->post('ClaimID'))
                                $CondCD['ClaimID']              =   $this->input->post('ClaimID');
                            else
                                $CondCD['ClaimID']             =   $this->input->get('ClaimID');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,$CondCD);
                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar);    
                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $Cond['BeneficiaryID']  =   $this->session->userdata('ContactID');

                            $CCD                    =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claims','ClaimID',$Cond);

                            $CondCD=$this->Pros->Make_Value_in_SQL_IN($CCD,'ClaimID');

                            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,'ClaimID'.$CondCD); 

                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','AreaManager'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar); 

                        }
                        ///////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','SalesAgent'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar); 

                        }
                        ///////////////////////////////////////////
                        ?>    
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                
                <?PHP
                if($this->input->post('ClaimServiceID')!=NULL)  {
                ?>
                
                <div class="box" <?PHP if($this->input->get('List')!='edit'){ ?> style="display: none; " <?PHP } ?> >
                    <div class="box-header">
                      <h3 class="box-title">تعديل مطالبة </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
                            $Tbl['Tbl']=array('claimsdetails');
                            $Arry=array(
                                -1=>"الكفيل",
                                1 => "اب",
                                2 => "ام",
                                3 => "زوج",
                                4 => "ابن"
                            );
                            $this->Desg->LookUpsFrmAry($A,'RelationToBeneficiary',"dropdown",$Arry);
                            $this->session->set_userdata($Tbl);
                            $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                            $this->Desg->LookUps($A,'CompanyID','CompanyArabicName','CompanyID','companies',0);
//                            $ViewFld['FirstName']               ='FirstName';
//                            $ViewFld['FatherName']              ='FatherName';
//                            $ViewFld['GrandFatherName']         ='GrandFatherName';
//                            $ViewFld['FamilyName']              ='FamilyName';
//                            $ViewFld['Department']              ='Department';
//                            $ViewFld['RelationToBeneficiary']   ='RelationToBeneficiary';
//                            $ViewFld['sex']                     ='sex';
//                            $ViewFld['Job']                     ='Job';
//                            $ViewFld['DateOfBirth']             ='DateOfBirth';
//                            $ViewFld['CityID']                  ='CityID';
//                            $ViewFld['Phone']                   ='Phone';
//                            $ViewFld['Email']                   ='Email';
//                            $ViewFld['AddressLine1']            ='AddressLine1';
//                            $ViewFld['AddressLine2']            ='AddressLine2';
//                            $ViewFld['Photo']                   ='Photo';
//                            $ViewFld['ParentID']                = 'ParentID';
//                            $ViewFld['CompanyID']               = 'CompanyID'  ;
//                            $hiddenField['ContactID']           =$this->input->post('IDedit');
//                            $hiddenField['BeneficiaryID']       =$this->input->post('IDedit');
                            $ViewFld=FALSE;
                            $hiddenField=FALSE;
                            $this->Desg->Create_From_Tabels( "claimsdetails",'ClaimServiceID',$this->input->post('ClaimServiceID'),"Processestransaction/UpDateDB","حفظ",$A,$ViewFld,FALSE,$hiddenField); 
                            //$this->Desg->Create_From_Tabels( "users",'ContactID',$this->input->post('IDedit'),FALSE,"حفظ",$A,$ViewFld);  
                        
                        ?>
                    </div>
                </div>
                <?PHP } ?>
                
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->    
<?PHP } ?>

<section class="content">       
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">مطالبات عليها ملاحظات</h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    <?PHP 
                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    
                    $this->Desg->ExCol($ArrCol,'تفاصيل','claims','ClaimID','ClaimID','Claims/ClaimsServicesIssues','fa-info','');
                    //$ArrCol=FALSE;
                    $VFld['ClaimID']             ='ClaimID';
                    $VFld['BeneficiaryID']       ='BeneficiaryID';
                    $VFld['ClinicID']            ='ClinicID';
                    $VFld['ClaimDate']           ='ClaimDate';
                    $VFld['ClinicClaimAmount']   ='ClinicClaimAmount';
                    $VFld['CurrencyID']          ='CurrencyID';
                    $VFld['FinancialState']      ='FinancialState';
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee','ContactID',$this->session->userdata('ContactID')) =='1'){
                        if(isset($CompanyIDAry))
                            unset($CompanyIDAry);
                        if(isset($CondCD))
                            unset($CondCD); 
                        //var_dump($ArrCol);
                        $CompanyIDAry=$this->Pros->Get_Value_Filed_AQ(
                                                        'companiesemployees',
                                                        'CompanyID'     ,
                                                        'EmployeeID'    ,
                                                        $this->session->userdata('ContactID'));
                        $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                        $CondCD     =   "ClinicID ".$CondCD;  
                        //$this->Desg->ExCol($ArrCol,'اضافة خدمة جديدة','claimsdetails','ClaimID','ClaimID','Claims/EnterDataClaimsDetails','fa-plus','red');
                        //$CondCD=FALSE;
                        //$ArrCol=FAlse;
                        $this->Desg->ViewDataWithExRowWithMultiCond('viewclaimsservicesissues',$ArrCol,$VFld,$Ar,$CondCD);  
                    }
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary','ContactID',$this->session->userdata('ContactID')) =='1'){
                        if(isset($CondCD))
                            unset($CondCD);
                        $CondCD ['BeneficiaryID like']  =   $this->session->userdata('ContactID');
                        //$CondCD=FALSE;
                        $this->Desg->ViewDataWithExRowWithMultiCond('viewclaimsservicesissues',$ArrCol,$VFld,$Ar,$CondCD);  
                    }
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users','InsurerEmployee' ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                        
                        if(isset($CompanyIDAry))
                            unset($CompanyIDAry);
                        
                        $CompanyIDAry   =   $this->Pros->Get_Value_Filed_AQ(
                                                'companiesemployees',
                                                'CompanyID'     ,
                                                'EmployeeID'    ,
                                                $this->session->userdata('ContactID'));
                                      
                        if(isset($CondCD))
                            unset($CondCD);
                        
                        $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                        $CondCD     =   "Party2CompanyID ".$CondCD;
                        
                        $InsurerCompanyCondCD['ContractID'] =$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                        $InsurerCompanyCondCD=FALSE;
                        $this->Desg->ViewDataWithExRowWithMultiCond('viewclaimsservicesissues',$ArrCol,$VFld,$Ar, $InsurerCompanyCondCD);
                        
                    }
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Employee'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                        if(isset($CompanyIDAry))
                            unset($CompanyIDAry);
                        
                        $CompanyIDAry   =   $this->Pros->Get_Value_Filed_AQ(
                                                'companiesemployees',
                                                'CompanyID'     ,
                                                'EmployeeID'    ,
                                                $this->session->userdata('ContactID'));
                        
                        if(isset($CondCD))
                            unset($CondCD);
                        
                        $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                        $CondCD     =   "Party2CompanyID ".$CondCD;
                        
                        $CompanyCondCD['ContractID']    =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                       $CompanyCondCD=FALSE;
                        $this->Desg->ViewDataWithExRowWithMultiCond('viewclaimsservicesissues',$ArrCol,$VFld,$Ar,$CompanyCondCD); 
                    }
                    ?>    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">الملاحظات و الردود عليها</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    
                    $this->Desg->SwitchDataTo($Ar,'IssuedByID','users','FirstName','ContactID');
                    $this->Desg->SwitchDataTo($Ar,'IssueStatusID','issuesstatus','IssueStatus','IssueStatusID');
                    $this->Desg->SwitchDataTo($Ar,'TransferToID','users','FirstName','ContactID');
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                        $Cond['BeneficiaryID']  =   $this->session->userdata('ContactID');
                        $CCD                    =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claims','ClaimID',$Cond);
                        $str="";
                        if($CCD)
                            foreach ($CCD as $key => $value) {
                                $str.="".$value['ClaimID'].",";
                            } 
                        if($str!="")
                        $CondCD                 =   "ClaimID IN (".substr($str, 0, strlen($str)-1).")";
                        else
                        $CondCD = "ClaimID IN (-1)";
                        /////////////////////////////////////////////////////////////////////////////
                        $CCD                    =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claimsdetails','ClaimServiceID',$CondCD);
                        $str="";
                        if($CCD)
                            foreach ($CCD as $key => $value) {
                                $str.="".$value['ClaimServiceID'].",";
                            }
                        //var_dump($str);
                        if($str!="")
                        $CondCD                 =   "ClaimServiceID IN (".substr($str, 0, strlen($str)-1).")";
                        else
                        $CondCD = "ClaimServiceID IN (-1)";
                        $this->Desg->ViewDataWithExRowWithMultiCond('claimsservicesissues',FALSE,FALSE,$Ar,$CondCD);  
                    }

                    if($this->Pros->Get_JustValue_Filed_AQ('users','InsurerEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'
                            ||$this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'
                            ||$this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                                             
                        $CondCD                = ' IssuedByID ='.$this->session->userdata('ContactID').' or TransferToID = '.$this->session->userdata('ContactID').' '  ;
                        $this->Desg->ViewDataWithExRowWithMultiCond('claimsservicesissues',FALSE,FALSE,$Ar,$CondCD);  
                    }
                    
                    ?>
                
            </div>
        </div>
    </div>


