<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">دول</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->LookUps($A,'GroupID','GroupName','GroupID','usersgroups',0);
                    $this->Desg->LookUps($A,'UserID','UserName','UserID','users',0);

                    
                    
                    
                    $this->Desg->Create_From_Tabels_Insrt("linkingusergroup","","حفظ",$A);  
                    ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">دول</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    
                    $this->Desg->SwitchDataTo($Ar,'UserID','users','UserName','UserID');
                    $this->Desg->SwitchDataTo($Ar,'GroupID','usersgroups','GroupName','GroupID');
                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    
//                    $this->Desg->ExCol($ArrCol,'تفاصيل','claimsdetails','ClaimServiceID','ClaimServiceID','Claims/DataClaimsDetails','fa-bars','');
//                    $this->Desg->ExCol($ArrCol,'اضافة ملاحظة','#','ClaimServiceID','ClaimServiceID','Claims','fa-plus-circle','Yellow');
                    
                    //$this->Desg->ExCol($ArrCol,'حدف','claims','ClaimID','#','Red');
                    
//                    $Fld['ClaimServiceID']  ='ClaimServiceID';
//                    $Fld['ServiceID']       ='ServiceID';
//                    $Fld['NumberValue']     ='NumberValue';
//                    $Fld['ClaimDate']           ='ClaimDate';
//                    $Fld['ClinicClaimAmount']   ='ClinicClaimAmount';
//                    $Fld['CurrencyID']          ='CurrencyID';
                    
                    //$this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar); 
                    $this->Desg->ViewDataWithExRow("linkingusergroup",FALSE,FALSE,$Ar);  
                    ?>
                
            </div>
        </div>
    </div>
</section>

