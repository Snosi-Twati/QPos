<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">دول</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->Create_From_Tabels_Insrt("countries","","حفظ",0);  
                    ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">دول</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->ViewData("countries");  
                    ?>
                
            </div>
        </div>
    </div>
</section>