
    <div class="box">
        <div class="box-header">
            <?PHP
            $bill_cond['stat'] = 0;
            $bill_cond['destination_to'] = $this->session->userdata('user_id');
            $Cond['bill_no'] = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('bills', 'id', $bill_cond);
            $cnd['id'] = $Cond['bill_no'];
            ?>
            <h3 class="box-title">الفاتورة رقم : <?PHP echo @$Cond['bill_no']; ?> فعالة للعمل</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <?PHP
            $this->Desg->LookUps($A, 'product_id', 'product_name', 'id', 'product', 0);
            $this->Desg->LookUps($A, 'category_id', 'category_name', 'id', 'category', 0);
            $this->Desg->LookUps($A, 'cor_id', 'country_name', 'id', 'country', 0);

//                $A=false;
            $hiddenField['customer_id'] = -1;
            $hiddenField['amount'] = 0;
            $hiddenField['discount'] = 0;
//$hiddenField['create_date']=date('Y-m-d H:i:s');
//                $hiddenField['close_date']='';

            $hiddenField['create_user'] = $this->session->userdata('user_id');
            $hiddenField['update_user'] = $this->session->userdata('user_id');
            $hiddenField['stat'] = 0;
            $hiddenField['cr_bill'] = 'bill';
//                $hiddenField['']=;
//                $hiddenField['']=;
            unset($Fld);
            $Fld['product_id'] = 'product_id';
            $Fld['quantity'] = 'quantity';
            $Fld['Expiration'] = 'Expiration';
            $Fld['warehouse_id'] = 'warehouse_id';
            $DivLoad['id'] = '#ItemBill';
            $DivLoad['url'] = 'Operations/ListItems';
            $this->Desg->Create_From_Tabels_With_Ajax("purchase", false, false, "ProcessControlDatabases/AddItem", "اضافة عنصر +", $A, $Fld, false, false, $DivLoad);
            ?>

        </div>
    </div>

   

