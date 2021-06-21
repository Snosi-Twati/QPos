<section class="content">
    
        <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Customer'  ,'ContactID',$this->session->userdata('ContactID')) =='1'){ ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">قائمة المصحات</h3>
            </div>  
            <div class="box-body">
                
                <?PHP 
                
                    $this->Desg-> LookUps_Form_With_DropDown($name,'companies','CompanyID','CompanyArabicName','CompanyID','CompanyID');
                    $AryCond="CompanyType not in(3,4,5)";
                    $this->Desg->Create_Form_With_DropDown($name,"","عرض",$AryCond,FALSE); ?>
                
                ?>
                
            </div>
        </div>
        
        <div class="box collapsed-box">
            <div class="box-header">
                <h3 class="box-title">كشف المنافع</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
                </div> 
            </div>  
            <div class="box-body">
                
                <?PHP
                //$this->Desg->SwitchDataTo($Ar,'CompanyID','companies','CompanyArabicName','CompanyID');
                $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
//                $Fld['CompanyID']                   ='CompanyID';
                $Fld['ServiceID']                   ='ServiceID';
                $Fld['Price']                ='Price';
//                $Fld['BeneficiaryPercentage']       ='BeneficiaryPercentage';
//                $Fld['InsurerPercentage']           ='InsurerPercentage';
//                $Fld['AllowedAmount']               ='AllowedAmount';
                unset($CondCD);
                
                echo $this->input->post('CompanyID');
                $CondCD['CompanyID']=$this->input->post('CompanyID');
                //var_dump($CondCD);
                $this->Desg->ViewDataWithExRowWithMultiCond('companiesservicesprices',FALSE,$Fld,$Ar,$CondCD);
                //$this->Desg->ViewDataWithExRowWithMultiCondEnterData('companiesservicesprices',FALSE,$Ar,$Fld);
                //$this->Desg->ViewDataWithExRowWithMultiCond("contractservices",FALSE,$Fld,$Ar,FALSE);    
                ?>
                
            </div>
        </div>
        <?PHP } ?>
    <!--</div>-->
</section>