<section class="content">     
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">بحث عن زيارات مستفيد محدد</h3>
                    </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP echo form_open(); ?>
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary">بحــــــــــث</button>
                        </div><!-- /btn-group -->
                        <input name="BeneficiaryID" type="text" class="form-control">
                    </div> 
                    <?PHP echo form_close(); ?> 
                </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?php 
          if($this->input->post('BeneficiaryID')!=null){
            $this->MedicateMdl->InfoBoxBeneficiary($this->input->post('BeneficiaryID'));
          }
          ?>
          <div class="row">
            <div class="col-xs-12">
              
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">بيانات المطالبات </h3>
                </div>      <!-- /.box-header -->
                    <div class="box-body">
                        <?PHP 

                        $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
                        $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                        $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                        $this->Desg->ExCol($ArrCol,'تفاصيل المطالبة','claims','ClaimID','ClaimID','Claims/DataClaimsDetailsList','fa-info','Yellow');

                        $Fld['ClaimID']             ='ClaimID';
                        $Fld['BeneficiaryID']       ='BeneficiaryID';
                        $Fld['ClinicID']            ='ClinicID';
                        $Fld['ClaimDate']           ='ClaimDate';
                        $Fld['ClinicClaimAmount']   ='ClinicClaimAmount';
                        $Fld['CurrencyID']          ='CurrencyID';

                        if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'  ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                            if(isset($CompanyIDAry))
                                unset($CompanyIDAry);
                            if(isset($CondCD))
                                unset($CondCD);

                            $CompanyIDAry=$this->Pros->Get_Value_Filed_AQ('companiesemployees',
                                                            'CompanyID'     ,
                                                            'EmployeeID',$this->session->userdata('ContactID'));
                            if($this->input->post('BeneficiaryID')!=null){
                                $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                                $CondCD     =   "ClinicID ".$CondCD;
                                $CondCD     =   $CondCD." and BeneficiaryID = ".substr($this->input->post('BeneficiaryID'), 4, 8);  
                            
                                
                            }else{
                                $CondCD['BeneficiaryID']=-1;
                            }
                            var_dump($CondCD);
                            $this->Desg->ExCol($ArrCol,'اضافة خدمة جديدة','claimsdetails','ClaimID','ClaimID','Claims/EnterDataClaimsDetails','fa-plus','red');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD);  
                        }
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                            if(isset($CondCD))
                                unset($CondCD);
                            $CondCD ['BeneficiaryID like']  =   $this->session->userdata('ContactID');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD);  
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
                            
                            if($this->input->post('BeneficiaryID')!=null){
                                $InsurerCompanyCondCD['ContractID']         =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                                $InsurerCompanyCondCD['BeneficiaryID']      =   substr($this->input->post('BeneficiaryID'), 4, 8);
                            }else{
                                $InsurerCompanyCondCD['ContractID']=-1;  
                            }
                            
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar, $InsurerCompanyCondCD);

                        }
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
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

                            if($this->input->post('BeneficiaryID')!=null){
                                $CompanyCondCD['ContractID']        =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                                $CompanyCondCD['BeneficiaryID']     =   substr($this->input->post('BeneficiaryID'), 4, 8);
                            }else{
                                $CompanyCondCD['ContractID']=-1;
                            }
                            
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CompanyCondCD); 
                        }

                        ?>    
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
                
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->


