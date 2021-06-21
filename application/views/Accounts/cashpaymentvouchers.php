<section class="content">
    
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حسابات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                    
                    <?PHP

                        //$this->Desg->LookUpsFrmAry              ($A,'PaymentMethodID',"dropdown",$Arry);
                        $this->Desg->LookUps                    ($A,'AccountNumberPaidTo','AccountName','AccountNumber','accounts',0);
                        $hiddenField['EmployeeID']          =       $this->session->userdata('ContactID');
                        $hiddenField['PaymentMethodID']     =       1;
                        $ViewFld['VoucherNumber']           =       'VoucherNumber';
                        $ViewFld['VoucherDate']             =       'VoucherDate';
                        $ViewFld['Amount']                  =       'Amount';
                        $ViewFld['AccountNumberPaidTo']     =       'AccountNumberPaidTo';
                        //$ViewFld['PaymentMethodID']         =       'PaymentMethodID';
                        $ViewFld['Remarks']                 =       'Remarks';
                        $this->Desg->Create_From_Tabels("paymentvouchers",FALSE,FALSE,'ProcessControlDatabases/paymentvouchers','دفع',$A,$ViewFld,FALSE,$hiddenField);  
                        
                   
                    ?>
                
            </div>
        </div>
        
    
</section>