<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">نوع الوظيفة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
//                $this->Desg->LookUps($A,'NationalityID','Nationality','NationalityID','nationalities',0);
//                $this->Desg->LookUps($A,'DepartmentID','DepartmentName','DepartmentID','departments',0);
//                $this->Desg->LookUps($A,'JobID','JobTitle','JobID','jobs',0);
//                $this->Desg->LookUps($A,'EmploymentTypeID','EmploymentType','EmploymentTypeID','employmenttypes',0);
                $this->Desg->Create_From_Tabels_Insrt("employmenttypes","","حفظ"); 
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">نوع الوظيفة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->ViewData("employmenttypes");   
                ?>
                
            </div>
        </div>
    </div>
</section>