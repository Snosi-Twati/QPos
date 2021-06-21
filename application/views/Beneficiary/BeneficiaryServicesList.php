<section class="content">
    <div class="row">
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'  ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">عقد المنافع</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP
                        $CondLookUps['CompanyType'] = 1;
                        $this->Desg->LookUpsWithCond($A,'CompanyID','CompanyArabicName','CompanyID','companies',$CondLookUps);
                        $this->Desg->LookUpsWithCond($A,'ContractID','ReferenceNumber','ContractID','contracts',$CondLookUps);
                        $this->Desg->LookUps($A,'ServiceID','ServiceArabicName','ServiceID','services',0);
                        $this->Desg->Create_From_Tabels_Insrt("companiesservicesprices","","حفظ",$A);  
                    ?>   
                </div>
            </div>
        <?PHP } ?>
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Customer'  ,'ContactID',$this->session->userdata('ContactID')) =='1'||1==1){ ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">كشف المنافع</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                $this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName' ,'ServiceID');
                $Fld['CompanyID']                   ='CompanyID';
                $Fld['ServiceID']                   ='ServiceID';
                $Fld['ServicePrice']                ='ServicePrice';
                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
                $Fld['InsurerPercentage']           ='InsurerPercentage';
                $Fld['AllowedAmount']               ='AllowedAmount';
                $CondCD['CompanyID']="%%";
                $this->Desg->ViewDataWithExRowWithMultiCond("companiesservicesprices",FALSE,$Fld,$Ar,FALSE);  
                ?>
                
            </div>
        </div>
        <?PHP } ?>
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'  ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">كشف المنافع</h3>
            </div> /.box-header 
            <div class="box-body">
                
                <?PHP
                $this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                $Fld['CompanyID']                   ='CompanyID';
                $Fld['ServiceID']                   ='ServiceID';
                $Fld['ServicePrice']                ='ServicePrice';
                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
                $Fld['InsurerPercentage']           ='InsurerPercentage';
                $Fld['AllowedAmount']               ='AllowedAmount';
                $CondCD['CompanyID like']="%%";
                $this->Desg->ViewDataWithExRowWithMultiCond("companiesservicesprices",FALSE,$Fld,$Ar,FALSE);  
                ?>
                
            </div>
        </div>
        <?PHP } ?>
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'  ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
<!--        <div class="box">
            <div class="box-header">
                <h3 class="box-title">كشف المنافع</h3>
            </div> /.box-header 
            <div class="box-body">
                
                <?PHP
                $this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                $Fld['CompanyID']                   ='CompanyID';
                $Fld['ServiceID']                   ='ServiceID';
                $Fld['ServicePrice']                ='ServicePrice';
                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
                $Fld['InsurerPercentage']           ='InsurerPercentage';
                $Fld['AllowedAmount']               ='AllowedAmount';
                $CondCD['CompanyID like']="%%";
                $this->Desg->ViewDataWithExRowWithMultiCond("companiesservicesprices",FALSE,$Fld,$Ar,FALSE);  
                ?>
                
            </div>
        </div>-->
        <?PHP } ?>
    </div>
</section>