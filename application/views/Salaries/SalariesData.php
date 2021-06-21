<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">مرتبات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                $this->Desg->LookUps($A,'JobID','JobTitle','JobID','jobs',0);
                $this->Desg->LookUps($A,'DepartmentID','DepartmentName','DepartmentID','departments',0);
                $this->Desg->LookUps($A,'Nationality','Nationality','NationalityID','nationalities',0);
                $this->Desg->LookUps($A,'Country','CountryName','CountryID','countries',0);
                $this->Desg->LookUps($A,'AccountNumber','AccountName','AccountNumber','accounts',0);
                $this->Desg->Create_From_Tabels_Insrt("salaries","","حفظ",$A);  
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">مرتبات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->load->model('Desg');
                $this->Desg->ViewData("salaries");  
                ?>
                
            </div>
        </div>
    </div>
</section>