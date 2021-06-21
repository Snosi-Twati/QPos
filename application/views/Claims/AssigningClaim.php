    <section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">تعين مطالبات</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP
           
            //$this->session->userdata('user_id');
            //var_dump($this->session->userdata);
//            $this->Desg->LookUps($A, 'BeneficiaryID', 'FirstName', 'ContactID', 'beneficiaries_info', "Search");
//            $this->Desg->LookUps($A, 'ClinicID', 'ClinicArabicName', 'ClinicID', 'Clinic', 0);
//            $this->Desg->LookUps($A, 'CompanyID', 'CompanyArabicName', 'CompanyID', 'companies', 0);
            $cndprose['assigned_to'] = $this->session->userdata('user_id');
            $cndprose['state'] = 1;
            $this->Desg->LookUps($A, 'assigned_to', 'full_name', 'user_id', 'users_v', 0);
            $this->Desg->LookUps($A, 'state', 'status', 'id', 'status', 0);
//          $this->Desg->LookUps($A,'Contribution_type','Contribution_type','id','Contribution_type',0);
            $ViewFd['box'] = 'box';
            $ViewFd['state'] = 'state';
            $ViewFd['batch'] = 'batch';
            $ViewFd['assigned_to'] = 'assigned_to';
            

            //$ViewFd=false;

            $this->Desg->Create_From_Tabels_With_Ajax('productioncode_serial', false, false, 'ProcessControlDatabases/AssigningClaim', 'توجيه المطالبة', $A, $ViewFd, false, false);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">اضافة تشخيص على الطالبة</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP
                    $this->Desg->LookUps($A, 'diagnosticscode', 'diagnosticsname', 'diagnosticscode', 'Diagnostics_v', "Search");
                    //$this->Desg->LookUps($A, 'ClaimID', 'ProductionCode', 'ClaimID', 'claims', "Search");

                    $ViewFd['diagnosticscode'] = 'diagnosticscode';
                    //$ViewFd['ClaimID'] = 'ClaimID';
                    //$hiddenField['ClaimID'] = $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims', 'ClaimID', $pc_cond);


                    $this->Desg->ViewDataWithExRowWithMultiCond('state_claims');
                    ?>
                </div>
            </div>  
        </div>
     </div>

    
</section>