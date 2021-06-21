<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ميزان المراجعة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->SwitchDataTo($Ar,'CridtToAccount','CridtToAccount','Amount','AccountNumber');
                    $this->Desg->SwitchDataTo($Ar,'DibtFromAccount','DibtFromAccount','Amount','AccountNumber');
                    //$this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                   // $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                    $this->Desg->ViewDataWithExRowWithMultiCond("AuditBalance",FALSE,FALSE,$Ar);  
                    ?>
                
            </div>
        </div>
    </div>
</section>