<section class="content">
       
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> ترقيم المطالبات</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP
            $this->Desg->LookUps($A, 'CompanyID', 'CompanyArabicName', 'CompanyID', 'companies', 0);
            $this->Desg->LookUps($A, 'box', 'box_no', 'id', 'boxs', 0);
            $ViewFd['CompanyID'] = 'CompanyID';
            $ViewFd['box'] = 'box';

            $this->Desg->Create_From_Tabels_With_Ajax('productioncode_serial', false, false, 'ProcessControlDatabases/ClaimNumbering', 'اصدار ترقيم', $A, $ViewFd, false, false);
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
$ViewFd=false;
            $this->Desg->ViewDataWithExRowWithMultiCond('productioncode_serial', false, $ViewFd);
            ?>
        </div>
    </div>
</section>