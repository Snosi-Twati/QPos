<section class="content"> 
    
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    
                    <?PHP
                    if($this->input->get('ClaimID')==NULL){
                        $btndata[]=array(
                            'Url'=> "Claims/AddClaimsWithServices?" ,
                            'TID'   =>  'Claim',
                            'ID'    =>  'add',
                            'Title'=>'مطالبة'
                        );
                    }elseif($this->input->get('ClaimID')!=NULL){
                    
                        $btndata[]=array(
                            'Url'=> "Claims/AddClaimsWithServices?ClaimID=".$this->input->get('ClaimID')."&" ,
                            'TID'=>'Diagnosis',
                            'ID'=>'add',
                            'Title'=>'تشخيص'
                        );
                        
                        $btndata[]=array(
                            'Url'=> "Claims/AddClaimsWithServices?ClaimID=".$this->input->get('ClaimID')."&" ,
                            'TID'=>'Symptoms',
                            'ID'=>'add',
                            'Title'=>'أعراض'
                        );

                        $btndata[]=array(
                            'Url'=> "Claims/AddClaimsWithServices?ClaimID=".$this->input->get('ClaimID')."&" ,
                            'TID'=>'Services',
                            'ID'=>'add',
                            'Title'=>'خدمات المطالبة'
                        );

                        $btndata[]=array(
                            'Url'=> "Claims/AddClaimsWithServices?ClaimID=".$this->input->get('ClaimID')."&" ,
                            'TID'=>'SaveClaim',
                            'ID'=>'save',
                            'Title'=>'حفط المطالبة'
                        );
                        
//                        $btndata[]=array(
//                            'Url'=> "Claims/AddClaimsWithServices?" ,
//                            'TID'   =>  'Claim',
//                            'ID'    =>  'add',
//                            'Title'=>'سجل المستفيد'
//                        );
                    } 
                    $data['ClaimID']=$this->input->get('ClaimID');
                    $this->Desg->ExCol($AryButtons,"سجل المستفيد","-1","BeneficiaryID",$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims','BeneficiaryID',$data) ,"Claims/ViewDataClaimsByBeneficiaryID",0,0);
                    
                    $this->Desg->Create_From_Buttons($btndata);
                    $this->Desg->ModelCaller($AryButtons);
                    ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    
        <?PHP if($this->input->get('Diagnosis')=='add'){ ?>
    <div class="row">
        
        <div class="col-xs-12" >
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">تشخيص</h3>
                    
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <?PHP
                    $ViewFld['DiagnosisID'] ='DiagnosisID';
                    $this->Desg->LookUps($A,'DiagnosisID','DiagnosisName','DiagnosisID','diagnosis',0);
                    $hiddenField['ClaimID']     =   $this->input->get('ClaimID');
                    $hiddenField['CompanyID']   =   $this->input->get('CompanyID');
                    $this->Desg->Create_From_Tabels('claimsdiagnosis',FALSE,FALSE,'ProcessControlDatabases/DataDiagnosis',"اختر التشخيص",$A,$ViewFld,FALSE,$hiddenField);
                    
                    ?>
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            
        </div><!--         /.col -->
        
    </div><!-- /.row --> 
    <?PHP }?>
    
    <?PHP if($this->input->get('Symptoms')=='add'){ ?>
    <div class="row">
        
        <div class="col-xs-12" >
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">أعراض</h3>
                    
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <?PHP
                    $ViewFld['SymptomsID'] ='SymptomsID';
                    $this->Desg->LookUps($A,'SymptomsID','SymptomsName','SymptomsID','Symptoms',0);
                    $hiddenField['ClaimID']     =   $this->input->get('ClaimID');
                    $hiddenField['CompanyID']   =   $this->input->get('CompanyID');
                    $this->Desg->Create_From_Tabels('SymptomsWithClaim',FALSE,FALSE,'ProcessControlDatabases/DataSymptoms',"اختر الأعراض",$A,$ViewFld,FALSE,$hiddenField);
                    
                    ?>
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            
        </div><!--         /.col -->
        
    </div><!-- /.row --> 
    <?PHP }?>
    
    <?PHP if($this->input->get('ClaimID')!=NULL ){ 
    $Condinfo['ClaimID']= $this->input->get('ClaimID'); ?> 
    <div class="row">
        <div class="col-xs-12" >
        <?PHP      
        
        $this->MedicateMdl->InfoBoxBeneficiaryFull($this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims','BeneficiaryID',$Condinfo)); 
            
        ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">تشخيصات</h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    
                    <?PHP 
                    
                    $datav['ClaimID']=$this->input->get('ClaimID');
                    
                    $ary = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claimsdiagnosis','DiagnosisID',$datav);
                    if(is_array($ary))
                    foreach ($ary as $key => $value) {
                        
                        $dataid['DiagnosisID']=$value['DiagnosisID'];

                        $btndata1[]=array(

                            'TID'       =>      'Claim',
                            'ID'        =>      'add',
                            'Title'     =>     $this->Pros-> Get_JustValue_Filed_AQ_Multi_Cond('diagnosis','DiagnosisName',$dataid)
                            );
                    }
                      
                    if( isset($btndata1) )
                        $this->Desg->ListButton($btndata1);
                    
                    ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    <?PHP } ?>
    
    <?PHP if($this->input->get('ClaimID')!=NULL ){ ?>
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">الاعراض</h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    
                    <?PHP 
                    
                    $datav['ClaimID']=$this->input->get('ClaimID');
                    
                    $ary = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('SymptomsWithClaim','SymptomsID',$datav);
                    if(is_array($ary))
                    foreach ($ary as $key => $value) {
                        
                        $dataid1['SymptomsID']=$value['SymptomsID'];

                        $btndata2[]=array(

                            'TID'       =>      'Claim',
                            'ID'        =>      'add',
                            'Title'     =>     $this->Pros-> Get_JustValue_Filed_AQ_Multi_Cond('Symptoms','SymptomsName',$dataid1)
                            );
                    }
                      
                    if( isset($btndata2) )
                        $this->Desg->ListButton($btndata2);
                    
                    ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    <?PHP } ?>
    
    <?PHP if($this->input->get('Claim')=='add'){ ?>
    <div class="row">
        
        <div class="col-xs-12" >
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">بيانات المطالبة</h3>
                     
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    <?PHP
    if($this->input->post('BeneficiaryID')!=null)
            $this->MedicateMdl->InfoBoxBeneficiary($this->input->post('BeneficiaryID'));
    ?>
                    <?PHP
                    
            
            if($this->input->post('BeneficiaryID')==null){
                $ViewFld['BeneficiaryID']               =   'BeneficiaryID';
                $this->Desg->Create_From_Tabels('claims',FALSE,FALSE,'Claims/AddClaimsWithServices?Claim=add',"تاكد من البطاقة",FALSE,$ViewFld,FALSE,FALSE);
            }elseif($this->input->post('BeneficiaryID')!=null){
                $cardstatus=$this->Pros->Get_JustValue_Filed_AQ(    'cardstatus',
                                                                    'CardStatusName'     ,

                                                                    'CardStatusID',$this->Pros->Get_JustValue_Filed_AQ(
                                                                            'beneficiariescards',
                                                                            'CardStatus'     ,
                                                                            'CardID',$this->input->post('BeneficiaryID')));
                $type=$this->Pros->Get_JustValue_Filed_AQ('beneficiariescards',
                                                    'CardStatus'     ,
                                                    'CardID',$this->input->post('BeneficiaryID'));
                if($type==1){
                    $this->Pros->Messagealert($type,$cardstatus);
                    $cflds['StratDate <=']          =   date('Y-m-d');
                    $cflds['EndDate >=']            =   date('Y-m-d');
                    $cflds['BeneficiaryCompanyID']  =   substr($this->input->post('BeneficiaryID'), 0, 4);
                    $contracts                      =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','*',$cflds);

//                    $cflds['ContractID']=$this->input->post('ContractID');
//                    $contracts = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','*',$cflds);

                    //hidden Field
                    $hiddenField['BeneficiaryCompanyID']    =   $contracts[0]['BeneficiaryCompanyID'];
                    $hiddenField['ContractID']              =   $contracts[0]['ContractID'];
                    $hiddenField['ClaimDate']               =   date('Y-m-d H:i:s');
                    $hiddenField['CurrencyID']              =   $contracts[0]['LocalCurrencyPercentage'];
                    $hiddenField['BeneficiaryShare']        =   $contracts[0]['BeneficiaryShare'];
                    $hiddenField['ClientShare']             =   $contracts[0]['Party2Share'];
                    if( $this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'     ,'ContactID',$this->session->userdata('ContactID'))==1)
                        $hiddenField['ClinicID']            =   $this->Pros->Get_JustValue_Filed_AQ('companiesemployees','CompanyID','EmployeeID',$this->session->userdata('ContactID'));
                    
                    $hiddenField['BeneficiaryID']           =   $this->input->post('BeneficiaryID');
                    //View Field
                    //$typ['CompanyType']                     =   1;
                    $typ='CompanyType in (1,2)';
                    $ViewFld['BeneficiaryID1']              =   'BeneficiaryID1';
                    $this->Desg->LookUpsWithCond($A,'ClinicID','CompanyArabicName','CompanyID','companies',$typ);
                    //$FldFrg
                    //$this->Desg->LookUps($FldFrg,'ClinicID','CompanyArabicName','CompanyID','companies',0);
                    if( $this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID'))==1)
                        $ViewFld['ClinicID']               =   'ClinicID';
                        $ViewFld['ProductionCode']         =   'ProductionCode';
                        $this->Desg->Create_From_Tabels('claims',FALSE,FALSE,'ProcessControlDatabases/DataClaims',"مطالبة جديدة",$A,$ViewFld,FALSE,$hiddenField);

                }else{
                    $type=FALSE;
                    $this->Pros->Messagealert($type,$cardstatus);
                }
                ?>

            <?PHP
                }
            ?>
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            
        </div><!-- /.col -->
        
    </div><!-- /.row --> 
    <?PHP }?>
    

    
    <?PHP if($this->input->get('ServicesType')=='addC'){ ?>
    <div class="row">
        
        <div class="col-xs-12" >
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">اختر نوع الخدمة</h3>
                    
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <?PHP
                    $hiddenField['ClaimID']     =   $this->input->get('ClaimID');
                    $hiddenField['CompanyID']   =   $this->input->get('CompanyID');
                    $this->Desg->LookUps($A,'ServiceArabicName','ServiceArabicName','ServiceArabicName','services',0);
                    $this->Desg->LookUps($A,'ServiceEnglishName','ServiceEnglishName','ServiceEnglishName','services',0);
                    $this->Desg->Create_From_Tabels('services',FALSE,FALSE,'Claims/AddClaims',"نوع الخدمة   ",$A);
                    
                    ?>
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            
        </div><!--         /.col -->
        
    </div><!-- /.row --> 
    
    <?PHP }?>
    
    <?PHP if($this->input->get('Services')=='add'){ ?>
    <div class="row">
        
        <div class="col-xs-12" >
            
            <?PHP if($this->input->get('Services')=='add'){?>
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">فاتورة</h3>
                    
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <?PHP
                    
                    $ViewFld['InvoiceNumber']               =   'InvoiceNumber';
                    $this->Desg->Create_Form_InputFrmGet('InvoiceNumber','Claims/AddClaimsWithServices',"فتح فاتورة خدمات",TRUE);
                    //$this->Desg->Create_From_Tabels('claimsdetails',FALSE,FALSE,'Claims/AddClaimsWithServices',"فتح فاتورة خدمات",FALSE,$ViewFld);
                    
                    ?>
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            
            <?PHP } ?>
            <?PHP if($this->input->get('InvoiceNumber')!=NULL ){?>
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">انواع الخدمة</h3>
                    
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <?PHP
                    
                    $Cnd['ParentID']               =   -1;
                    
                    $this->Desg->LookUps_Form_With_DropDown($arry,"services",'ParentID','ServiceArabicName','ServiceID' ,'اختر نوع الخدمة');
                    $this->Desg->Create_Form_With_DropDownGet($arry,'Claims/AddClaimsWithServices',"اختر",$Cnd,TRUE);
                    //$this->Desg->Create_From_Tabels('claimsdetails',FALSE,FALSE,'Claims/AddClaimsWithServices',"فتح فاتورة خدمات",FALSE,$ViewFld);
                    
                    ?>
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            
            <?PHP } ?>
            <?PHP if( $this->input->get('InvoiceNumber')!=NULL){ ?>
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">خدمات</h3>
                    
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <?PHP
                    
                    $ViewFd['ServiceID']            =   'ServiceID';
                    $ViewFd['ClinicServiceAmount']  =   'ClinicServiceAmount';
                    $ViewFd['Quantity']             =   'Quantity';
                    $ViewFd['Dose']                 =   'Dose';
                    $ViewFd['Days']                 =   'Days';
                    $hiddenField['ClaimID']         =   $this->input->get('ClaimID');
                    $hiddenField['InvoiceNumber']   =   $this->input->get('InvoiceNumber');
                    $hiddenField['CompanyID']       =   $this->input->get('CompanyID');
                    $hiddenField['DiagnosisID']     =   $this->input->get('DiagnosisID');
                    //$hiddenField['ParentID']        =   $this->input->get('ParentID');
                    //$this->Desg->LookUps($A,'ServiceID','ServiceArabicName','ServiceID','services',0);
                    $Cond['ParentID']               =   $this->input->get('ParentID');
                    $this->Desg->LookUpsWithCond($A,'ServiceID','ServiceArabicName','ServiceID','services',$Cond);
                    $this->Desg->Create_From_Tabels('claimsdetails',FALSE,FALSE,'ProcessControlDatabases/DataServices',"اضافة  خدمات",$A,$ViewFd,FALSE,$hiddenField);
                    
                    ?>
                <div  id="AddServices"></div> 
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            <?PHP } ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">بيانات الخدمات </h3>
                </div><!-- /.box-header -->
                    <div class="box-body fa-b ">
                        <?PHP 
                        /////////////////////////////////////////////
                        $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                        $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                        $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                        ////////////////////////////////////////////
                        //$this->Desg->ExCol($ArrCol,'تعديل'          ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','Claims/DataClaimsDetailsList?List=edit',' fa-pencil-square-o','');
                        //$this->Desg->ExCol($ArrCol,'موافقة'     ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-check-circle-o','');
                        //$this->Desg->ExCol($ArrCol,'مرفوض'      ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-stop','');
                        //$this->Desg->ExCol($ArrCol,'اضافة ملاحظة'   ,'claimsservicesissues' ,'ClaimServiceID'   ,'ClaimServiceID','Claims/ClaimsServicesIssues','fa-plus-circle','Yellow');
                        ////////////////////////////////////////////
                        $Fld['ClaimServiceID']              ='ClaimServiceID';
                        $Fld['ServiceID']                   ='ServiceID';
                        $Fld['ClinicServiceAmount']         ='ClinicServiceAmount';
                        $Fld['ServiceDate']                 ='ServiceDate';
                        $Fld['ServiceTime']                 ='ServiceTime';
                        $Fld['CurrencyID']                  ='CurrencyID';
                        ////////////////////////////////////////////
                        

                            $CondCD['ClaimID']=$this->input->get('ClaimID');

                            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',FALSE,$Fld,$Ar,$CondCD); 

                       
                        ///////////////////////////////////////////
                        ?>    
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            
        </div><!-- /.col -->
        
    </div><!-- /.row -->
    <?PHP }?>
    
</section><!-- /.content -->