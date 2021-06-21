<section class="content">       
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">سجل المستفيد </h3>
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
                        $Fld['ProductionCode']      ='ProductionCode';
                        $Fld['CurrencyID']          ='CurrencyID';

                        if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'  ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $CondCD ['BeneficiaryID']  =   $this->input->get('BeneficiaryID');
                            $this->Desg->ExCol($ArrCol,'اضافة خدمة جديدة','claimsdetails','ClaimID','ClaimID','Claims/EnterDataClaimsDetails','fa-plus','red');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD);  
                        }
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $CondCD ['BeneficiaryID']  =   $this->input->get('BeneficiaryID');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD);  
                        }
                        if($this->Pros->Get_JustValue_Filed_AQ('users','InsurerEmployee' ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $CondCD ['BeneficiaryID']  =   $this->input->get('BeneficiaryID');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar, $CondCD);

                        }
                        if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Employee'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $CondCD ['BeneficiaryID']  =   $this->input->get('BeneficiaryID');
                            $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD); 
                        }

                        ?>    
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script>
	initSample();
    </script>