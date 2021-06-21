<?PHP 
//        $ary_fld=$this->Pros->Get_Name_Filed($this->input->get('Tbl'));
//
//        foreach ($ary_fld as $key => $value) {
//            
//                $data[$value->Field]=$this->input->post($value->Field);
//
//        }
//        
//        $this->load->model("Processestransaction");
//        if($this->Processestransaction->InsertDB($this->input->get('Tbl'),$data))
//        {
//            redirect("Claims/AddClaimsWithServicesFromClinic?Services=add&Do=Yes&ClaimID=".$this->input->post('ClaimID')."&CompanyID=".$this->input->post('CompanyID')."&InvoiceNumber=".$this->input->post('InvoiceNumber')."&ParentID=".$this->input->post('ParentID')."#AddServices");
//        }else{
//            redirect($this->input->post('Url')."?Do=No");
//        }
?>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">بيانات الخدمات </h3>
    </div><!-- /.box-header -->
    <div class="box-body fa-b ">

        <?PHP 
        /////////////////////////////////////////////
        $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
        $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
        $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
        ////////////////////////////////////////////
        
        //$this->Desg->ExCol($ArrCol,'تعديل'          ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','Claims/DataClaimsDetailsList?List=edit',' fa-pencil-square-o','');
        //$this->Desg->ExCol($ArrCol,'موافقة'     ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-check-circle-o','');
        //$this->Desg->ExCol($ArrCol,'مرفوض'      ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-stop','');
        //$this->Desg->ExCol($ArrCol,'اضافة ملاحظة'   ,'claimsservicesissues' ,'ClaimServiceID'   ,'ClaimServiceID','Claims/ClaimsServicesIssues','fa-plus-circle','Yellow');
        
        ////////////////////////////////////////////
        
        $Fld['ClaimServiceID']              ='ClaimServiceID';
        $Fld['ServiceID']                   ='ServiceID';
        $Fld['ClinicServiceAmount']         ='ClinicServiceAmount';
        $Fld['ServiceDate']                 ='ServiceDate';
        $Fld['ServiceTime']                 ='ServiceTime';
        $Fld['CurrencyID']                  ='CurrencyID';
        
        ////////////////////////////////////////////

            $CondCD['ClaimID']  =   $this->input->get('ClaimID');

            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',FALSE,$Fld,$Ar,$CondCD); 

        ///////////////////////////////////////////
        ?>  

    </div><!-- /.box-body -->
</div><!-- /.box -->
