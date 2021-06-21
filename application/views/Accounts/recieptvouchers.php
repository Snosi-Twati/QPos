<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حسابات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    if(!$this->input->post('PaymentMethodID')){
                        
                        $Arry=array(
                                    ''=>"طريقة الدفع",
                                    1 => "نقدي",
                                    2 => "بنكي"
                                    );
                        $this->Desg->LookUpsFrmAry              ($A,'PaymentMethodID',"dropdown",$Arry);
                        $this->Desg->LookUps                    ($A,'AccountNumberPaidTo','AccountName','AccountNumber','accounts',0);
                        $hiddenField['EmployeeID']          =       $this->session->userdata('ContactID');
                        $ViewFld['VoucherNumber']           =       'VoucherNumber';
                        $ViewFld['VoucherDate']             =       'VoucherDate';
                        $ViewFld['Amount']                  =       'Amount';
                        $ViewFld['AccountNumberPaidTo']     =       'AccountNumberPaidTo';
                        $ViewFld['PaymentMethodID']         =       'PaymentMethodID';
                        $ViewFld['Remarks']                 =       'Remarks';
                        $this->Desg->Create_From_Tabels("paymentvouchers",FALSE,FALSE,'Accounts/recieptvouchers','نفد',$A,$ViewFld,FALSE,$hiddenField);  
                        
                    }elseif($this->input->post('PaymentMethodID')==2){
                        
                        $Arry=array(
                                    ''=>"طريقة الدفع",
                                    1 => "نقدي",
                                    2 => "بنكي"
                                    );
                        $this->Desg->LookUpsFrmAry              ($A,'PaymentMethodID',"dropdown",$Arry);
                        $this->Desg->LookUps                    ($A,'AccountNumberPaidTo','AccountName','AccountNumber','accounts',0);
                        $this->Desg->LookUps                    ($A,'BankID','BankArabicName','BankID','banks',0);
                        $hiddenField['EmployeeID']          =       $this->session->userdata('ContactID');
                        $ViewFld['VoucherNumber']           =       'VoucherNumber';
                        $ViewFld['VoucherDate']             =       'VoucherDate';
                        $ViewFld['Amount']                  =       'Amount';
                        $ViewFld['AccountNumberPaidTo']     =       'AccountNumberPaidTo';
                        $ViewFld['PaymentMethodID']         =       'PaymentMethodID';
                        $ViewFld['Remarks']                 =       'Remarks';
                        $ViewFld['ChequeDate']              =       'ChequeDate';
                        $ViewFld['ChequeNumber']            =       'ChequeNumber';
                        $ViewFld['BankID']                  =       'BankID';
                        $this->Desg->Create_From_Tabels_GETPOST("recieptvouchers",FALSE,FALSE,'ProcessControlDatabases/recieptvouchers','قبض',$A,$ViewFld,FALSE,$hiddenField);
                        
                    }
                    ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حسابات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->ViewData("recieptvouchers");  
                    ?>
                
            </div>
        </div>
    </div>
</section>