<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حسابات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    $this->Desg->LookUps($A,'AccountParentNumber','AccountName','AccountNumber','accounts',0);
                    $this->Desg->Create_From_Tabels_Insrt("accounts","","حفظ",$A);  
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
                    $this->Desg->ViewData("accounts");  
                    ?>
                
            </div>
        </div>
    </div>
</section>