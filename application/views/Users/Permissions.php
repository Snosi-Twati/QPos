<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">صلاحيات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?PHP
                $this->Desg->LookUps($A,'GroupsID','GroupName','GroupID','usersgroups',0);
                 //
                $FunctionList=$this->Desg->FunctionList();
               
                foreach ($FunctionList as $key => $valueFun) {
                    foreach ($valueFun as $value) {
                        $stut[$key."".$value] =   $this->Desg->LebalName($key."".$value) ;
                    }                 
                }
                
                
                $this->Desg->LookUpsFrmAry($A,'PermissionsID','dropdown',$stut);
                //var_dump($A);
                $this->Desg->Create_From_Tabels_Insrt("permissionsgroups","","حفظ",$A);  
                ?>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">صلاحيات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?PHP
                $this->Desg->ViewData("permissionsgroups");  
                ?>
            </div>
        </div>
    </div>
</section>

