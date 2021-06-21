<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حسابات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP   
                $this->Desg->ExCol($CallModal   ,'سند قبض نقدي'          ,'claimsdetails'        ,'PaymentMethodID'   ,'1','Accounts/cashrecieptvouchers','','');
                $this->Desg->ExCol($CallModal   ,'سند قبض بنكي'          ,'claimsdetails'        ,'PaymentMethodID'   ,'2','Accounts/bankrecieptvouchers','','');
                $this->Desg->ModelCaller($CallModal);     
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