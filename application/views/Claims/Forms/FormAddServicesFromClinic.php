<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


    
    
        <?PHP
        
        
        

        $ViewFd['ServiceID']            =   'ServiceID';
        //$ViewFd['ClinicServiceAmount']  =   'ClinicServiceAmount';
        $ViewFd['Quantity']             =   'Quantity';
        $ViewFd['Dose']                 =   'Dose';
        $ViewFd['Days']                 =   'Days';
        $hiddenField['ClaimID']         =   $this->input->get('ClaimID');
        $hiddenField['InvoiceNumber']   =   $this->input->get('InvoiceNumber');
        $hiddenField['CompanyID']       =   $this->input->get('CompanyID');
        $hiddenField['DiagnosisID']     =   $this->input->get('DiagnosisID');
        $hiddenField['ParentID']        =   $this->input->get('ParentID');
        
        //$this->Desg->LookUps($A,'ServiceID','ServiceArabicName','ServiceID','services',0);
        
        $Cond['ParentID']               =   $this->input->get('ParentID');
        
        
        
        $this->Desg->LookUpsWithCond($A,'ServiceID','ServiceArabicName','ServiceID','services',$Cond);
        
        $btn["type"]="button";
        $btn["title"]="اضافة  خدمات";
        
        $this->Desg->Create_From_Tabels('claimsdetails',FALSE,FALSE,'Claims/AddClaimsWithServicesFromClinic',$btn,$A,$ViewFd,FALSE,$hiddenField);

        
        ?>


