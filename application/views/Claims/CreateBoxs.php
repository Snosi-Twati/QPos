<section class="content">
       
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">صندوق جديد</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP

            $ViewFd['box_no'] = 'box_no';
            $ViewFd['box_count'] = 'box_count';

            $this->Desg->Create_From_Tabels_With_Ajax('boxs', false, false, 'ProcessControlDatabases/ProConDBinByAjax', 'اضافة صندوق', false, $ViewFd, false, false);
            ?>
        </div>
    </div>
    




   
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">قائمة الصناديق</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP


            $ViewFd['box_no'] = 'box_no';
            $ViewFd['box_count'] = 'box_count';

            $this->Desg->ViewDataWithExRowWithMultiCond('boxs', false, $ViewFd);
            ?>
        </div>
    </div>
</section>