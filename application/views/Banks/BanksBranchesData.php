<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">فروع البنوك</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                $this->Desg->LookUps($A,'BankID','BankArabicName','BankID','banks',0);
                $this->Desg->Create_From_Tabels_Insrt("banksbranches","","حفظ",$A);  
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">فروع البنوك</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->load->model('Desg');
                $this->Desg->ViewData("banksbranches");  
                ?>
                
            </div>
        </div>
    </div>
</section>