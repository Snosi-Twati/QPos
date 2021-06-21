<section class="content">
        

    
        <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">تعديل السقف للمستفيد</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
 $ViewFld['AllowedAmount']      ='AllowedAmount';
 $hiddenField['BeneficiaryID']                =$this->input->get('BeneficiaryID');
 $ar=$this->input->get('BeneficiaryID') ;              

 // $this->Desg->Create_From_Tabels( "insurerbeneficiaries",'BeneficiaryID',$ar,"ProcessControlDatabases/UpDateRow",FALSE,TRUE,$hiddenField); 
 $this->Desg->Create_From_Tabels( "insurerbeneficiaries",'BeneficiaryID',$ar,"ProcessControlDatabases/EditBeneficiaryAllowedAmount","حفظ",TRUE,$ViewFld,FALSE,$hiddenField);
 ?>
 </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->