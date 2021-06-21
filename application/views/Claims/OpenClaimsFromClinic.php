<?PHP $this->MedicateMdl->OpenClaimsFromClinic($this->input->get('ClaimID')); ?>
<section class="content"> 
    
    <div class="row">
        
        <div class="col-xs-12" >
            
            
            <div class="box">
                
                <div class="box-header">
                    
                    <h3 class="box-title">مطالبة </h3>
                    
                </div>      <!-- /.box-header -->
                
                <div class="box-body">
                    
                    <?PHP
                    
                    $ViewFld['ClaimID']               =   'ClaimID';
                    $this->Desg->Create_Form_InputFrmGet('ClaimID','Claims/OpenClaimsFromClinic',"فتح مطالبة",TRUE);
                    //$this->Desg->Create_From_Tabels('claimsdetails',FALSE,FALSE,'Claims/AddServicesClaimsFromClinic',"فتح فاتورة خدمات",FALSE,$ViewFld);
                    
                    ?>
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
            
            
            
        </div><!-- /.col -->
        
    </div><!-- /.row -->
   
    
</section><!-- /.content -->