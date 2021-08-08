<!--<div class="col-md-8" id="SuspendedBills" >-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">قائمة الفواتير</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <?PHP
            $this->Desg->LookUps($A, 'unit_id', 'unit_name', 'id', 'unit', 0);
            $this->Desg->LookUps($A, 'category_id', 'category_name', 'id', 'category', 0);
            $cond['cr_bill']='cr';
            $this->Desg->LookUpsWithCond($A, 'id', 'bill_state', 'id', 'bill_state',$cond, 0);

//                $A=false;
            $hiddenField['customer_id'] = -1;
            $hiddenField['amount'] = 0;
            $hiddenField['discount'] = 0;
            //$hiddenField['create_date']=date('Y-m-d H:i:s');
//                $hiddenField['close_date']='';

            $hiddenField['create_user'] = $this->session->userdata('user_id');
            $hiddenField['update_user'] = $this->session->userdata('user_id');
            $hiddenField['stat'] = 0;
            
//                $hiddenField['']=;
//                $hiddenField['']=;
            unset($Fld);
            $Fld['id'] = 'id';
//            $DivLoad['id']      =   '#AddItems';
//            $DivLoad['url']     =   'Operations/AddItems';
            $DivLoad['id'] = '#PurchaseBillsCr';
            $DivLoad['url'] = 'Operations/PurchaseBillsCr';
            $this->Desg->Create_From_Tabels_With_Ajax("bill_state", false, false, "ProcessControlDatabases/MoveToBill", "انتقال الى  ", $A, $Fld, false, $hiddenField,$DivLoad);
            ?>

        </div>
    </div>
<!--</div>-->