<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">مدن</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                $this->Desg->LookUps($A,'CountryID','CountryName','CountryID','countries',0);
                $this->Desg->Create_From_Tabels_Insrt("vender_client","","حفظ",$A);  
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">مدن</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->load->model('Desg');
                $this->Desg->ViewData("vender_client");  
                ?>
                
            </div>
        </div>
    </div>
</section>