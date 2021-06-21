<section class="content ">
    <div class="row ">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">شركات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <?PHP
                $this->Desg->LookUps_Form_With_DropDown($A,'companies','CompanyID','CompanyArabicName','CompanyID',"CompanyID");
                $AryC["CompanyID like"]="%%";
                //var_dump($AryC);    
                $this->Desg->Create_Form_With_DropDown($A,"","عرض",$AryC);
                
                 


                ?>

            </div>
        </div>
    </div>
    <?PHP  if($this->input->post('CompanyID')){ ?>
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">عقود الشركة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
               
                    $AryContract["BeneficiaryCompanyID"]=$this->input->post('CompanyID');
                    $this->Desg->LookUps_Form_With_DropDown($AryContractID,'contracts','ContractID','ReferenceNumber','ContractID',"ContractID");
                    $this->Desg->Create_Form_With_DropDown($AryContractID,"","عرض",$AryContract); 
                 
                ?>
                
            </div>
        </div>
    </div>
    <?PHP } ?>
    
    <?PHP  if($this->input->post('ContractID')){ ?>
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">طلب بطاقات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?PHP 
               
                    $heidden['CompanyID']   =   $this->input->post('CompanyID');
                    $heidden['Url']         =   uri_string();
                    $data=array(
                        'name'=>'buttnncard',
                        'type'=>'submit'
                    );
                    echo form_open('ProcessControlDatabases/CardsOrderForAll','',$heidden);
                    
                   
                ?>
                <div class="col-md-4">
                    <div class="input-group" style="margin: 4px;">
                        <?PHP echo form_button($data, 'طلب بطاقات للشركة المذكورة بناء على العقد', 'class="btn btn-primary"'); ?>
                    </div>
                </div>
                <?PHP    
                   echo form_close();
                    
                ?>
            </div>
        </div>
    </div>
    <?PHP } ?>
</section>