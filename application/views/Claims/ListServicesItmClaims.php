
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">خدمات المطالبة </h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP 

            $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
            
                        
            $ViewFd['InvoiceNumber']       ='InvoiceNumber';
            $ViewFd['ServiceID']        ='ServiceID';
            $ViewFd['ClinicServiceAmount']             ='ClinicServiceAmount';
            $ViewFd['ApprovedServiceAmount']            ='ApprovedServiceAmount';
            $ViewFd['rejectedServiceAmount']      ='rejectedServiceAmount';

            $cond['ClaimID']=$this->input->get('ClaimID');
            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',false,$ViewFd,$Ar,$cond);
           
                      
            ?>
        </div>
    </div>
