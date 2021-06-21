<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">خدمات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                $this->Desg->LookUps($A,'ParentID','ServiceArabicName','ServiceID','services',0);
                $this->Desg->LookUps($A,'ServiceCategoryID','ServiceArabicName','ServiceID','services',0);
                $this->Desg->Create_From_Tabels_Insrt("services","","حفظ",$A);  
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">خدمات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                
                $this->Desg->ExCol($ArrCol      ,'موافقة'         ,'services'        ,'ServiceID'   ,'ServiceID','ProcessControlDatabases/ApprovedServiceAmount','fa-check-circle-o' ,'green');
                $this->Desg->ViewDataWithExRow("services",FALSE,FALSE,FALSE,FALSE,$ArrCol);  
                
                ?>
                
            </div>
        </div>
    </div>
</section>