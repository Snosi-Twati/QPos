<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">انواع المؤسسات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
//                    $this->Desg->LookUps($A,'CompanyType','CompanyTypeName','CompanyTypeID','companytype',0);
//                    $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                    $this->Desg->Create_From_Tabels_Insrt("companytype","","حفظ");  
                    ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">انواع المؤسسات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->ViewData("companytype");  
                    ?>
                
            </div>
        </div>
    </div>
</section>