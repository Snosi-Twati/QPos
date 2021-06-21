<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حالة المشكلة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP

                $this->Desg->Create_From_Tabels_Insrt("issuesStatus","","حفظ",FALSE);
                
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">حالة المشكلة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP

                $this->Desg->ViewData("issuesStatus");
                
                ?>
                
            </div>
        </div>
    </div>
</section>