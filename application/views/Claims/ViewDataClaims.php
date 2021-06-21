<section class="content">       
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">بيانات المطالبات </h3>
                </div>      <!-- /.box-header -->
                    <div class="box-body">
                        <?PHP 
                        $this->Desg->PassToChartjs($ChartjsG    ,"FinancialSituation",FALSE,'ClinicClaimAmount');
                        $this->Desg->SwitchDataTo($Ar           ,'ClinicID','companies','CompanyArabicName','CompanyID');
                        $this->Desg->SwitchDataTo($Ar           ,'BeneficiaryID','users','FirstName','ContactID');
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
                            $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                            $CondCD     =   "ClinicID ".$CondCD;  
                            $this->Desg->ExCol($ArrCol,'اضافة خدمة جديدة','claimsdetails','ClaimID','ClaimID','Claims/EnterDataClaimsDetails','fa-plus','red');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD,FALSE,FALSE,FALSE,$ChartjsG);  
                        }
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                            if(isset($CondCD))
                                unset($CondCD);
                            $CondCD ['BeneficiaryID like']  =   $this->session->userdata('ContactID');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD,FALSE,FALSE,FALSE,FALSE);  
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

                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar, $InsurerCompanyCondCD,FALSE,FALSE,FALSE,$ChartjsG);

                        }
                        if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Employee'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                            if(isset($CompanyIDAry))
                                unset($CompanyIDAry);

                            $CompanyIDAry   =   $this->Pros->Get_Value_Filed_AQ(
                                                    'companiesemployees',
                                                    'CompanyID'     ,
                                                    'EmployeeID'    ,
                                                    $this->session->userdata('ContactID') );

                            if(isset($CondCD))
                                unset($CondCD);

                            $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                            $CondCD     =   "Party2CompanyID ".$CondCD;

                            $CompanyCondCD['ContractID']    =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CompanyCondCD,FALSE,FALSE,FALSE,$ChartjsG); 
                        }

                        ?>    
                        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Customer'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                            if(isset($CompanyIDAry))
                                unset($CompanyIDAry);

                            $CompanyIDAry   =   $this->Pros->Get_Value_Filed_AQ(
                                                    'companiesemployees',
                                                    'CompanyID'     ,
                                                    'EmployeeID'    ,
                                                    $this->session->userdata('ContactID') );

                            if(isset($CondCD))
                                unset($CondCD);

                            $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                            $CondCD     =   "BeneficiaryCompanyID ".$CondCD;

                            $CompanyCondCD['ContractID']    =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CompanyCondCD,FALSE,FALSE,FALSE,FALSE); 
                        }

                        ?>
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->