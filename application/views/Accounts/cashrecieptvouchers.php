<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حسابات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    
                        $this->Desg->LookUps($A,'AccountNumberPaidBy','AccountName','AccountNumber','accounts',0);
                        $hiddenField['EmployeeID']          =       $this->session->userdata('ContactID');
                        $hiddenField['PaymentMethodID']     =       1;
                        $ViewFld['VoucherNumber']           =       'VoucherNumber';
                        $ViewFld['VoucherDate']             =       'VoucherDate';
                        $ViewFld['Amount']                  =       'Amount';
                        $ViewFld['AccountNumberPaidBy']     =       'AccountNumberPaidBy';
                        $ViewFld['Remarks']                 =       'Remarks';
                        $this->Desg->Create_From_Tabels("recieptvouchers",FALSE,FALSE,'ProcessControlDatabases/recieptvouchers','قبض',$A,$ViewFld,FALSE,$hiddenField);  
                        
                   
                    ?>
                
            </div>
        </div>
        
    </div>
</section>