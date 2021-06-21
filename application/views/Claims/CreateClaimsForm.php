<section class="content ">
    
    <div class="box" id='DivIdToPrint'>
        
        <div class="box-header">
            <h3 class="box-title"> نموذج مطالبة - Claim Form </h3>
        </div><!-- /.box-header -->
        
        <div class="box-body"  >
            <div  class="col-xs-12">
                <div class="col-xs-4" style="direction: rtl; text-align: center;">
                        <img alt="MediCate#<?PHP echo $this->input->get('CodeClaim'); ?>" src="<?PHP echo base_url(); ?>barcode.php?text=<?PHP  echo $this->input->get('ClaimID'); ?>" width="180px" title="MediCate#<?PHP echo $this->input->get('CodeClaim'); ?>" />
                <?PHP echo $this->input->get('CodeClaim'); ?>
                </div>

                <div class="col-xs-4" style="direction: rtl; text-align: center;">
                        <img alt="MediCate#<?PHP echo $this->input->get('CodeClaim'); ?>" src="<?PHP echo base_url(); ?>barcode.php?text=<?PHP  echo $this->input->get('ClaimID'); ?>" width="180px" title="MediCate#<?PHP echo $this->input->get('CodeClaim'); ?>" />
                <?PHP echo $this->input->get('CodeClaim'); ?>
                </div>

                <div class="col-xs-4" style="direction: rtl; text-align: center;">
                        <img alt="MediCate#<?PHP echo $this->input->get('CodeClaim'); ?>" src="<?PHP echo base_url(); ?>barcode.php?text=<?PHP  echo $this->input->get('ClaimID'); ?>" width="180px" title="MediCate#<?PHP echo $this->input->get('CodeClaim'); ?>" />
                <?PHP echo $this->input->get('CodeClaim'); ?>
                </div>
            </div>
            
            <div class="col-xs-12" >
                <?PHP      

                $this->MedicateMdl->InfoBoxBeneficiaryFull($this->Pros->Get_JustValue_Filed_AQ('claims','BeneficiaryID' ,'ClaimID',$this->input->get('ClaimID'))); 

                ?>
            </div>
        </div>
        
    </div>
    
</section>
