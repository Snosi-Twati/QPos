<!--<div class="col-md-8" id="SuspendedBills" >-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">الدفع</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <?PHP
//            $this->Desg->LookUps($A, 'unit_id', 'unit_name', 'id', 'unit', 0);
            $this->Desg->LookUps($A, 'payment_methods_id', 'name', 'id', 'payment_methods', 0);
//            $this->Desg->LookUps($A, 'id', 'bill_state', 'id', 'bill_state', 0);

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
            $Fld['amount'] = 'amount';
            $Fld['payment_methods_id'] = 'payment_methods_id';
//            $DivLoad['id']      =   '#AddItems';
//            $DivLoad['url']     =   'Operations/AddItems';
            $DivLoad['id'] = '#PurchaseBills';
            $DivLoad['url'] = 'Operations/PurchaseBills';
            $this->Desg->Create_From_Tabels_With_Ajax("bills", false, false, "ProcessControlDatabases/Pay", "ادفع $ ", $A, $Fld, false, $hiddenField,$DivLoad);
            ?>

        </div>
    </div>
<!--</div>-->