<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">الجنسيات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->load->model('Desg');
                $this->Desg->Create_From_Tabels_Insrt("nationalities","","حفظ",0);  
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">الجنسيات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->load->model('Desg');
                $this->Desg->ViewData("nationalities");  
                ?>
                
            </div>
        </div>
    </div>
</section>