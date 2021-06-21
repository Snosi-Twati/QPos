
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">مطالبة جديدة</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP
            $data['user_id'] = '10000022';
            $data['user_name'] = 'snosi';
            $this->session->set_userdata($data);
            //$this->session->userdata('user_id');
            //var_dump($this->session->userdata);
            $this->Desg->LookUps($A, 'BeneficiaryID', 'FirstName', 'ContactID', 'beneficiaries_info', "Search");
            $this->Desg->LookUps($A, 'ClinicID', 'ClinicArabicName', 'ClinicID', 'Clinic', 0);
            $this->Desg->LookUps($A, 'CompanyID', 'CompanyArabicName', 'CompanyID', 'companies', 0);
            $cndprose['assigned_to'] = $this->session->userdata('user_id');
            $cndprose['state'] = 1;
            $this->Desg->LookUpsWithCond($A, 'ProductionCode', 'ProductionCode', 'ProductionCode', 'productioncode_serial', $cndprose, 0);
//          $this->Desg->LookUps($A,'Contribution_type','Contribution_type','id','Contribution_type',0);
            $ViewFd['ProductionCode'] = 'ProductionCode';
            $ViewFd['BeneficiaryID'] = 'BeneficiaryID';
            $ViewFd['ClinicID'] = 'ClinicID';
            $ViewFd['CompanyID'] = 'CompanyID';
            $ViewFd['auth_num'] = 'auth_num';
            $ViewFd['ClaimDate'] = 'ClaimDate';
            $ViewFd['ClinicClaimAmount'] = 'ClinicClaimAmount';

            $ReloadDiv['id'] = '#ServicesItm';
            $ReloadDiv['url'] = 'Claims/AddServicesItmToClaims';

            $this->Desg->Create_From_Tabels_With_Ajax('claims', false, false, 'ProcessControlDatabases/AddClaim', 'اضافة مطالبة', $A, $ViewFd, false, false, $ReloadDiv);
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


                    $this->Desg->Create_From_Tabels_With_Ajax('claims_Diagnostics', false, false, 'ProcessControlDatabases/AddDiagnostics', 'اضافة تشخيص', $A, $ViewFd, false);
                    ?>
                </div>
            </div>  
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">اضافة خدمات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP
                    unset($A);
                    $this->Desg->LookUps($A, 'ServiceID', 'ServiceArabicName', 'ServiceID', 'services', 0);

                    $ViewFd['InvoiceNumber'] = 'InvoiceNumber';
                    $ViewFd['ServiceID'] = 'ServiceID';
                    $ViewFd['ClinicServiceAmount'] = 'ClinicServiceAmount';
                    $ViewFd['ApprovedServiceAmount'] = 'ApprovedServiceAmount';
                    $ViewFd['rejectedServiceAmount'] = 'rejectedServiceAmount';

                    $hiddenField['ClaimID'] = $this->Tpa->ClaimIDVaild();
                    $ReloadDiv['id'] = '#ServicesList';
                    $ReloadDiv['url'] = 'Claims/ListServicesItmClaims';

                    $this->Desg->Create_From_Tabels_With_Ajax('claimsdetails', false, false, 'ProcessControlDatabases/AddClaimDetails', 'اضافة خدمة', $A, $ViewFd, false, $hiddenField, $ReloadDiv);
                    ?>
                </div>
            </div>
            <div id="ServicesList">

            </div>
        </div>

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">سبب رفض الخدمة</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP
                    unset($A);
                    $cond_lkup['ClaimID'] = $this->Tpa->ClaimIDVaild();
                    $this->Desg->LookUpsWithCondFAndV($A, 'ClaimServiceID', 'ServiceName', 'ClaimServiceID', 'list_dtl_service', 'ClaimID', $cond_lkup['ClaimID'], "Search");
                    $this->Desg->LookUps($A, 'rj_id', 'reasons', 'id', 'reasons_for_rejection_view', "Search");

                    $ViewFd['ClaimServiceID'] = 'ClaimServiceID';
                    $ViewFd['rj_id'] = 'rj_id';

                    $hiddenField['update_by'] = $this->session->userdata('user_id');
                    $hiddenField['create_by'] = $this->session->userdata('user_id');
                    $hiddenField['update_by'] = $this->session->userdata('user_id');
                    $hiddenField['create_by'] = $this->session->userdata('user_id');

                    $ReloadDiv['id'] = '#rejectedList';
                    $ReloadDiv['url'] = 'Claims/Listrejected_servicesItm';
//$ReloadDiv = false;
                    $this->Desg->Create_From_Tabels_With_Ajax('rejected_services', false, false, 'ProcessControlDatabases/ProConDBinByAjax', 'اضافة خدمة', $A, $ViewFd, false, $hiddenField, $ReloadDiv);
                    ?>
                </div>
            </div>
            <div id="rejectedList">

            </div>
        </div> 
    </div>


    <div class="row">
        <div class="col-md-10">
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

                    $this->Desg->ViewDataWithExRowWithMultiCond('claims', false, $ViewFd, $Ar);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box" id="filesupload">
                <div class="box-header">
                    <h3 class="box-title">تحميل ملف</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP
                    $id['id'] = 'upload_file';
                    $ActionTo = 'Claims/UploadClaimFiles';
                    echo form_open_multipart($ActionTo, $id);
                    ?>



                    <!--<div class="col-md-2">-->
                    <div class="input-group" style="margin: 4px;">
                        <span class="input-group-addon"><label for="ملف المطالبة">ملف المطالبة</label></span>
                        <input type="file" name="Arc_Claim_file" id="work_method_file" size="150" required="required" class="form-control" accept=".pdf" />
                        <span class="input-group-addon"></span>
                    </div>
                    <!--<div class="col-md-4">-->
                        <div class="input-group" style="margin: 4px;">
                            <span class="input-group-addon"></span>
                            <input type="submit" name="submit" id="submit"  class="form-control" style="background: #00ca6d "/>
                            <span class="input-group-addon"></span>
                        </div>
                    <!--</div>-->
                    <!--</div>-->
                    <?PHP
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">اغلاق المطالبة</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP
                    unset($ViewFd);
                    $ViewFd['ClinicID'] = 'ClinicID';
                    $this->Desg->Create_From_Tabels_With_Ajax('productioncode_serial', false, false, 'ProcessControlDatabases/CloseClaimID', 'اغلاق مطالبة', false, $ViewFd);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>