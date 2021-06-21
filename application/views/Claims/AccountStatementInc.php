<section class="content">       
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> حالة المطالبات </h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    
                    <?PHP 
                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    $this->Desg->PassToChartjs($ChartjsG,"FinancialSituation",FALSE,'ClinicClaimAmount');
                    $this->Desg->ExCol($ArrCol,'تفاصيل','claims','ClaimID','ClaimID','Claims','fa-info','Yellow');
                    $ArrCol=FALSE;
                    $VFld['ClinicID']           ='ClinicID';
                    $VFld['FinancialState']     ='FinancialState';
                    $VFld['ApprovedAmount']     ='ApprovedAmount';
                   
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee','ContactID',$this->session->userdata('ContactID')) =='1'){
                        if(isset($CompanyIDAry))
                            unset($CompanyIDAry);
                        if(isset($CondCD))
                            unset($CondCD);
                        echo "5555";
                        $CompanyIDAry=$this->Pros->Get_Value_Filed_AQ('companiesemployees',
                                                            'CompanyID'     ,
                                                        'EmployeeID',$this->session->userdata('ContactID'));
                        
                        $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                        
                        $CondCD     =   "ClinicID ".$CondCD;  
                        
                        $this->Desg->ExCol($ArrCol,'اضافة خدمة جديدة','claimsdetails','ClaimID','ClaimID','Claims/EnterDataClaimsDetails','fa-plus','red');
                        $CondCD=FALSE;
                        $ArrCol=FAlse;
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystate',$ArrCol,$VFld,$Ar,$CondCD,FALSE,FALSE,FALSE,$ChartjsG);  
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary','ContactID',$this->session->userdata('ContactID')) =='1'){
                        if(isset($CondCD))
                            unset($CondCD);
                        $CondCD ['BeneficiaryID like']  =   $this->session->userdata('ContactID');
                        $CondCD=FALSE;
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystate',$ArrCol,$VFld,$Ar,$CondCD);  
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
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystate',$ArrCol,$VFld,$Ar, $InsurerCompanyCondCD,FALSE,FALSE,FALSE,$ChartjsG);
                        
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Customer'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        $VFld=FALSE;
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystate',$ArrCol,$VFld,$Ar,$CompanyCondCD,FALSE,FALSE,FALSE,$ChartjsG); 
                        
                       //$this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystateForClinic',$ArrCol,$VFld,$Ar,$CompanyCondCD); 
                    }
                    ?>    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<section class="content">       
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> حالة المطالبات بحسب المصحات  </h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    <?PHP 
                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    
                    $this->Desg->ExCol($ArrCol,'تفاصيل','claims','ClaimID','ClaimID','Claims','fa-info','Yellow');
                    $ArrCol=FALSE;
                    $VFld['ClinicID']           ='ClinicID';
                    $VFld['FinancialState']     ='FinancialState';
                    $VFld['ApprovedAmount']     ='ApprovedAmount';
                   $this->Desg->PassToChartjs($Chartjs,"ClinicID","FinancialSituation",'ApprovedAmount','companies','CompanyArabicName','CompanyID');
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee','ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        $CondCD=FALSE;
                        $ArrCol=FAlse;
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystateForClinic',$ArrCol,$VFld,$Ar,$CondCD,FALSE,FALSE,FALSE,$Chartjs);  
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary','ContactID',$this->session->userdata('ContactID')) =='1'){
                        if(isset($CondCD))
                            unset($CondCD);
                        $CondCD ['BeneficiaryID like']  =   $this->session->userdata('ContactID');
                        $CondCD=FALSE;
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystateForClinic',$ArrCol,$VFld,$Ar,$CondCD,FALSE,FALSE,FALSE,$Chartjs);
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
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystateForClinic',$ArrCol,$VFld,$Ar, $InsurerCompanyCondCD,FALSE,FALSE,FALSE,$Chartjs);
                        
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Customer'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        $VFld=FALSE;
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystateForClinic',$ArrCol,$VFld,$Ar,$CompanyCondCD,FALSE,FALSE,FALSE,$Chartjs);
                        
                        //$this->Desg->ViewDataWithExRowWithMultiCond('groupclaimsbystateForClinic',$ArrCol,$VFld,$Ar,$CompanyCondCD); 
                    }
                    ?>    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<section class="content">       
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> بحث عن مطالبة بالتاريخ </h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    
                    <?PHP 
                    echo form_open(uri_string());
                        ?>
                        
                            
                        <div class="col-md-4">
                            <div class="input-group" style="margin: 4px;">
                                <span class="input-group-addon">
                                    <label for="BeneficiaryID">من تاريخ</label>
                                </span>
                                <input type="date" name="ClaimDateFrom" value="" id="BeneficiaryID" class="form-control">
                                <span class="input-group-addon"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group" style="margin: 4px;">
                                <span class="input-group-addon">
                                    <label for="BeneficiaryID">الي تاريخ</label>
                                </span>
                                <input type="date" name="ClaimDateTo" value="" id="BeneficiaryID" class="form-control">
                                <span class="input-group-addon"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group" style="margin: 4px;">
                                <button type="submit" class="btn btn-primary">بحث</button>
                            </div>
                        </div>
                        
                        <?php
                        echo form_close();
                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    
                    $this->Desg->ExCol($ArrCol,'تفاصيل','claims','ClaimID','ClaimID','Claims','fa-info','Yellow');
                    
                    $Fld['ClaimID']             ='ClaimID';
                    $Fld['BeneficiaryID']       ='BeneficiaryID';
                    $Fld['ClinicID']            ='ClinicID';
                    $Fld['ClaimDate']           ='ClaimDate';
                    $Fld['ClinicClaimAmount']   ='ClinicClaimAmount';
                    $Fld['CurrencyID']          ='CurrencyID';
                    $Fld['FinancialState']      ='FinancialState';
                    if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee','ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        //$ArrCol=FALSE;
                        
                        $CondCD = $CondCD." and ClaimDate >= '" .$this->input->post('ClaimDateFrom'). " 00:00:00' and ClaimDate <= '" .$this->input->post('ClaimDateTo'). " 00:00:00' ";
                        
                        
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD);  
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary','ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        
                        $InsurerCompanyCondCD['ContractID'] =$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar, $InsurerCompanyCondCD);
                        
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Customer'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CompanyCondCD); 
                    }
                    
                    ?>    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content --><!-- /.content -->
<section class="content">       
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">بيانات المطالبات </h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    <?PHP 
                    
                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    
                    $this->Desg->ExCol($ArrCol,'تفاصيل','claims','ClaimID','ClaimID','Claims','fa-info','Yellow');
                    $ArrCol=FALSE;
                    $Fld['ClaimID']             ='ClaimID';
                    $Fld['BeneficiaryID']       ='BeneficiaryID';
                    $Fld['ClinicID']            ='ClinicID';
                    $Fld['ClaimDate']           ='ClaimDate';
                    $Fld['ClinicClaimAmount']   ='ClinicClaimAmount';
                    $Fld['CurrencyID']          ='CurrencyID';
                    
                    if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee','ContactID',$this->session->userdata('ContactID')) =='1'){
                        if(isset($CompanyIDAry))
                            unset($CompanyIDAry);
                        if(isset($CondCD))
                            unset($CondCD);
                        $CompanyIDAry=$this->Pros->Get_Value_Filed_AQ('companiesemployees',
                                                        'CompanyID'     ,
                                                        'EmployeeID',$this->session->userdata('ContactID'));
                        $CondCD     =   $this->Pros->Make_Value_in_SQL_IN($CompanyIDAry,'CompanyID');
                        $CondCD     =   "ClinicID ".$CondCD;  
                        //$this->Desg->ExCol($ArrCol,'اضافة خدمة جديدة','claimsdetails','ClaimID','ClaimID','Claims/EnterDataClaimsDetails','fa-plus','red');
                        $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CondCD);  
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary','ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        
                        $InsurerCompanyCondCD['ContractID'] =$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts' ,'ContractID' ,$CondCD);
                        
                        $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar, $InsurerCompanyCondCD);
                        
                    }
                    if($this->Pros->Get_JustValue_Filed_AQ('users'   ,'Customer'        ,'ContactID',$this->session->userdata('ContactID')) =='1'){
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
                        $this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,$Ar,$CompanyCondCD); 
                    }
                    
                    ?>    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content --><!-- /.content -->
