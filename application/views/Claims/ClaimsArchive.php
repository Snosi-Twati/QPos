
<section class="content">

    


    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة المطالبات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP
                    unset($A);
                    $this->Desg->LookUps($A, 'BeneficiaryID', 'FirstName', 'ContactID', 'beneficiaries_info', "Search");
                    $this->Desg->LookUps($A, 'ClinicID', 'ClinicArabicName', 'ClinicID', 'Clinic', 0);
//            $this->Desg->LookUps($A,'Contribution_type','Contribution_type','id','Contribution_type',0);
//            $this->Desg->LookUps($A,'Contribution_type','Contribution_type','id','Contribution_type',0);


                    $this->Desg->SwitchDataTo($Ar, 'ClinicID', 'Clinic', 'ClinicArabicName', 'ClinicID');
                    $this->Desg->SwitchDataTo($Ar, 'BeneficiaryID', 'beneficiaries_info', 'FirstName', 'ContactID');
                    $this->Desg->SwitchDataTo($Ar, 'CurrencyID', 'currencies', 'CurrencyName', 'CurrencyID');

                    $ViewFd['ProductionCode'] = 'ProductionCode';
                    $ViewFd['BeneficiaryID'] = 'BeneficiaryID';
                    $ViewFd['ClinicID'] = 'ClinicID';
                    $ViewFd['ClaimDate'] = 'ClaimDate';
                    $ViewFd['TPAReviewAmount'] = 'TPAReviewAmount';
                    $ViewFd['ClinicClaimAmount'] = 'ClinicClaimAmount';
                    $ViewFd['ApprovedAmount'] = 'ApprovedAmount';
                    $this->Desg->ExCol($exClo,'تحميل','claims_files','ClaimID','ClaimID','Claims/ClaimsDownload',' fa-pencil-square-o','');
                    $this->Desg->ViewDataWithExRowWithMultiCond('claims', false, $ViewFd, $Ar,false,$exClo);
                    ?>
                </div>
            </div>
        </div>

    </div>
</section>