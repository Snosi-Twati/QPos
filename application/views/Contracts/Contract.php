<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">عقود</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                    <?PHP
           $Cond['CompanyType']     =5;
                    $this->Desg->LookUps($A,'Party2CompanyID','CompanyArabicName','CompanyID','companies',0);
                    $this->Desg->LookUps($A,'Party1CompanyID','CompanyArabicName','CompanyID','companies',0);
//                    $this->Desg->LookUpsWithCond($A,'NotaryID','CompanyArabicName','CompanyID','companies',$Cond);
//                    $this->Desg->LookUps($A,'ForeignCurrencyPercentage','CurrencyName','CurrencyID','currencies',0);
//                    $this->Desg->LookUps($A,'LocalCurrencyPercentage','CurrencyName','CurrencyID','currencies',0);
                    //var_dump($A);
                       $Arry=array(
                                1 => "فعال",
                                2 => "معلق ",
                                3 => "منتهي",
                                4 => "موقوف"
                            );
                     $this->Desg->LookUpsFrmAry($A,'ContractStatus',"dropdown",$Arry);
//                     var_dump($A['ContractStatus']);
//             $A =false;
                        // $this->Desg->Create_From_Tabels_Insrt("contracts","","حفظ",$A);  
                       $this->Desg->Create_From_Tabels_With_Ajax( "contracts","","",FALSE,"حفظ",$A); 
                    ?>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">عقود</h3>
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-header -->
            <div class="box-body">
                    <?PHP
                    $this->Desg->ViewData("contracts");  
                    ?>
            </div>
        </div>
    </div>
</section>