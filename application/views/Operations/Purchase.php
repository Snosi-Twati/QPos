<section class="content">
    <div class="row">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">فتح فاتورة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <?PHP
                $this->Desg->LookUps($A, 'unit_id', 'unit_name', 'id', 'unit', 0);
                $this->Desg->LookUps($A, 'category_id', 'category_name', 'id', 'category', 0);
                $vc_Cond['id !=']='-1';
                $this->Desg->LookUpsWithCond($A, 'customer_id', 'full_name', 'id', 'vender_client',$vc_Cond, "Search");

//                $A=false;
                //$hiddenField['customer_id'] = -1;
                $hiddenField['amount'] = 0;
                $hiddenField['cr_bill'] = 'cr';
                $hiddenField['discount'] = 0;
                $hiddenField['destination_to'] = $this->session->userdata('user_id');
                //$hiddenField['create_date']=date('Y-m-d H:i:s');
//                $hiddenField['close_date']='';

                $hiddenField['create_user'] = $this->session->userdata('user_id');
                $hiddenField['update_user'] = $this->session->userdata('user_id');
                $hiddenField['stat'] = 0;
//                $hiddenField['']=;
//                $hiddenField['']=;
                $Fld['customer_id'] = 'customer_id';
                $DivLoad['id'] = '#PurchaseBillsCr';
                $DivLoad['url'] = 'Operations/PurchaseBillsCr';
                $this->Desg->Create_From_Tabels_With_Ajax("bills", false, false, "ProcessControlDatabases/AddPOS", "فتح فاتورة جديدة", $A, $Fld, false, $hiddenField, $DivLoad);
                ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="SuspendedBillsCr" >
            <?PHP echo $SuspendedBillsCr; ?>
        </div>
        <div class="col-md-12" id="Pay" >
            <?PHP echo $Pay; ?>
        </div>
        </div>
        <div class="row">
        <div  id="PurchaseBillsCr">

            <div class="col-md-12" id="AddItemsCr" >
                
                <?PHP echo $AddItemsCr; ?>
                <div id="ItemBillCr">
                    <?PHP echo $ItemBillCr; ?>
                </div>
            </div>
        </div>
    </div>

</section>