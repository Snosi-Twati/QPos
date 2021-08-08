

    <div class="col-md-6" id="ListItems" style="overflow:scroll; height:300px;">
        <div class="box">
            <div class="box-header">
                <?PHP
                $bill_cond['stat'] = 0;
                $bill_cond['destination_to'] = $this->session->userdata('user_id');
                $bill_cond['cr_bill'] = 'bill';
                $Cond['bill_no'] = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('bills', 'id', $bill_cond);
                $cnd['id'] = $Cond['bill_no'];
                ?>
                <h3 class="box-title">عناصر الفاتورة  --- وقيمتها : <?PHP echo $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('bills', 'amount', $cnd); ?> </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <?PHP
                $bill_cond['stat'] = 0;
                $bill_cond['destination_to'] = $this->session->userdata('user_id');
                $Cond['bill_no'] = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('bills', 'id', $bill_cond);
                $fld['product_id'] = 'product_id';
                $fld['quantity'] = 'quantity';
                $fld['price'] = 'price';
                $fld['total_items'] = 'total_items';
                $fld['unit_id'] = 'unit_id';
                $fld['Expiration'] = 'Expiration';
                //$Col['']

                $DivLoadD['id'] = '#ItemBill';
                $DivLoadD['url'] = 'Operations/ListItems';
                $this->Desg->ExCol($Col,'+','purchase','id','id','ProcessControlDatabases/addItemOne','','green',true,'add',$DivLoadD);
                $this->Desg->ExCol($Col,'-','purchase','id','id','ProcessControlDatabases/delItemOne','','red',true,'del',$DivLoadD);
                $this->Desg->ViewDataWithExRowWithMultiCond("purchase",$Col, $fld, false, $Cond);
                ?>

            </div>
        </div>
    </div>
    <div class="col-md-6" id="ListBills" style="overflow:scroll; height:300px;">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">فواتير اليوم</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <?PHP
                unset($Cond);
                $Cond['last_update like'] = "" . date('Y-m-d') . "%";
                $Cond['destination_to'] = $this->session->userdata('user_id');
                $Cond['cr_bill'] = 'bill';
                $fld['id'] = 'id';
                $fld['customer_id'] = 'customer_id';
                $fld['amount'] = 'amount';
                $fld['discount'] = 'discount';
                $fld['create_date'] = 'create_date';
                $fld['last_update'] = 'last_update';
                $this->Desg->ViewData("bills", $fld, false, $Cond);
                ?>

            </div>
        </div>
    </div>

