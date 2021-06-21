<section class="content">
    
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Customer'          ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">كشف المنافع</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                $this->Desg->SwitchDataTo($Ar,'ContractID','contracts','ReferenceNumber','ContractID');
                //$Fld['CompanyID']                   ='CompanyID';
                $Fld['ServiceID']                   ='ServiceID';
                $Fld['ServicePrice']                ='ServicePrice';
//                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
//                $Fld['InsurerPercentage']           ='InsurerPercentage';
//                $Fld['AllowedAmount']               ='AllowedAmount';
                $CompanyID=$this->Pros->Get_JustValue_Filed_AQ('companiesemployees',
                                                        'CompanyID'         ,
                                                        'EmployeeID'        ,
                                                        $this->session->userdata('ContactID'));
                $CondCD=$this->Pros->Make_Value_in_SQL_IN(
                        $this->Pros->Get_Value_Filed(
                                'contracts',
                                'ContractID',
                                'BeneficiaryCompanyID',
                                $CompanyID)
                        ,'ContractID');
                $CondCD='ContractID '.$CondCD;
               // var_dump($CondCD);
                //$CondCD['CompanyID like']="%%";
                $this->Desg->ViewDataWithExRowWithMultiCond('contractservices',FALSE,FALSE,$Ar,$CondCD);
                //$this->Desg->ViewDataWithExRowWithMultiCond("contractservices",FALSE,$Fld,$Ar,FALSE);   
                
                ?>
                
            </div>
        </div> 
        <?PHP } ?>
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'          ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
                        <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">بحث عن مستفيد محدد</h3>
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

          <?php 
                if($this->input->post('BeneficiaryID')!=null)
                    $this->MedicateMdl->InfoBoxBeneficiary($this->input->post('BeneficiaryID'));
            
                if($this->input->post('BeneficiaryID')!=null){
                ?>

                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">كشف المنافع</h3>
                </div> 
                <div class="box-body">

                    <?PHP
                    //$this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                    $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                    //$Fld['CompanyID']                   ='CompanyID';
                    $Fld['ServiceID']                   ='ServiceID';
                    $Fld['ServicePrice']                ='ServicePrice';
    //                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
    //                $Fld['InsurerPercentage']           ='InsurerPercentage';
    //                $Fld['AllowedAmount']               ='AllowedAmount';
                    $CondCD['CompanyID like']="%%";
                    $this->Desg->ViewDataWithExRowWithMultiCondEnterData('contractservices',FALSE,$Ar,FALSE);
                    //$this->Desg->ViewDataWithExRowWithMultiCond("contractservices",FALSE,$Fld,$Ar,FALSE);  
                    ?>

                </div>
            </div>
                <?PHP 
                } ?>
        <?PHP } ?>
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'    ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
        
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">بحث عن مستفيد محدد</h3>
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

          <?php 
                if($this->input->post('BeneficiaryID')!=null)
                    $this->MedicateMdl->InfoBoxBeneficiary($this->input->post('BeneficiaryID'));
            
                if($this->input->post('BeneficiaryID')!=null){
                ?>

                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">كشف المنافع</h3>
                </div> 
                <div class="box-body">

                    <?PHP
                    //$this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                    $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                    //$Fld['CompanyID']                   ='CompanyID';
                    $Fld['ServiceID']                   ='ServiceID';
                    $Fld['ServicePrice']                ='ServicePrice';
    //                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
    //                $Fld['InsurerPercentage']           ='InsurerPercentage';
    //                $Fld['AllowedAmount']               ='AllowedAmount';
                    $CondCD['CompanyID like']="%%";
                    $this->Desg->ViewDataWithExRowWithMultiCondEnterData('contractservices',FALSE,$Ar,FALSE);
                    //$this->Desg->ViewDataWithExRowWithMultiCond("contractservices",FALSE,$Fld,$Ar,FALSE);  
                    ?>

                </div>
            </div>
                <?PHP 
                } ?>
        <?PHP    } ?>
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'  ,'ContactID',$this->session->userdata('ContactID')) =='1' ){ ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">كشف المنافع </h3>
                <br><br><h3 class="box-title">
            السقف : <?PHP echo $this->Pros->Get_JustValue_Filed_AQ('insurerbeneficiaries',
                                                        'AllowedAmount'         ,
                                                        'BeneficiaryID'        ,
                                                        $this->session->userdata('ContactID')); ?> - القيمة المتبقية من السقف : <?PHP 
                                                        
                                                         echo $this->Pros->Get_JustValue_Filed_AQ('insurerbeneficiaries',
                                                        'AllowedAmount'         ,
                                                        'BeneficiaryID'        ,
                                                        $this->session->userdata('ContactID'))-$this->Pros->Get_JustValue_Filed_AQ('serviceAmount',
                                                        'sum(ClinicServiceAmount)'         ,
                                                        'BeneficiaryID'        ,
                                                        $this->session->userdata('ContactID')); 
                                                        
                                                        ?>
            </h3></div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                $this->Desg->SwitchDataTo($Ar,'ContractID','contracts','ReferenceNumber','ContractID');
                //$Fld['CompanyID']                   ='CompanyID';
                $Fld['ServiceID']                   ='ServiceID';
                $Fld['ServicePrice']                ='ServicePrice';
                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
                $Fld['InsurerPercentage']           ='InsurerPercentage';
                $Fld['AllowedAmount']               ='AllowedAmount';
                $CompanyID=$this->Pros->Get_JustValue_Filed_AQ('insurerbeneficiaries',
                                                        'ContractID'         ,
                                                        'BeneficiaryID'        ,
                                                        $this->session->userdata('ContactID'));
                unset($CondCD);
                $CondCD['ContractID']=$CompanyID;
               // var_dump($CondCD);
                //$CondCD['CompanyID like']="%%";
                $this->Desg->ViewDataWithExRowWithMultiCond('contractservices',FALSE,FALSE,$Ar,$CondCD);
                //$this->Desg->ViewDataWithExRowWithMultiCond("contractservices",FALSE,$Fld,$Ar,FALSE);   
                
                ?>
                
            </div>
        </div>
        <?PHP } ?>
    </div>
</section>