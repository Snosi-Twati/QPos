<section class="content">
            
        
        <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">بيانات المطالبات </h3>
                </div><!-- /.box-header -->
                <div class="box-body fa-b ">
                  <?PHP 
                    /////////////////////////////////////////////
                    $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    ////////////////////////////////////////////
                    $this->Desg->ExCol($ArrCol,'تفاصيل'         ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','Claims/DataClaimsDetails','fa-bars','');
                    $this->Desg->ExCol($ArrCol,'اضافة ملاحظة'   ,'claimsservicesissues' ,'ClaimServiceID'   ,'ClaimServiceID','Claims/ClaimsServicesIssues','fa-plus-circle','Yellow');
                    ////////////////////////////////////////////
                    $Fld['ClaimServiceID']      ='ClaimServiceID';
                    $Fld['ServiceID']           ='ServiceID';
                    $Fld['NumberValue']         ='NumberValue';
                    $Fld['ServiceDate']         ='ServiceDate';
                    $Fld['ServiceTime']         ='ServiceTime';
                    $Fld['CurrencyID']          ='CurrencyID';
                    ////////////////////////////////////////////
                    if($this->Pros->Get_JustValue_Filed_AQ('users','InsurerEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                        
                        $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar);    
                    }
                    ////////////////////////////////////////////
                    if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                        
                        $this->Desg->ExCol($ArrCol,'اعتماد طبي'   ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-check','');
                        
                        $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar);    
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
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->