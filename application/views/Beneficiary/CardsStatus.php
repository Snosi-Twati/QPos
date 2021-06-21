<section class="content">
    
<?PHP

    $this->Desg->ExColWithValue($Butn,' تجميد ','تجميد بطاقات','beneficiariescards','ContactID','BeneficiaryID','CardStatus',1,'Printed','1','ProcessControlDatabases/EditDataCardsOrder?CardStatus=-1','fa-stop','');
    $this->Desg->ExColWithValue($Butn,' تفعيل','تفعيل بطاقات','beneficiariescards','ContactID','BeneficiaryID','CardStatus',-1,'Printed','1','ProcessControlDatabases/EditDataCardsOrder?CardStatus=1','fa-wifi','');
    $Fld['Name']='Name';
    $Fld['Department']      ='Department';
    $Fld['Job']             ='Job';
    $Fld['DateOfBirth']     ='DateOfBirth';
    $EmployeeID['EmployeeID']=$this->session->userdata('ContactID');
    $CompanyID['CompanyID']=$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('companiesemployees','CompanyID',$EmployeeID);
    if ($CompanyID){
        $this->session->set_userdata($CompanyID);
        $Cond['CompanyID']=$CompanyID['CompanyID'];
        $CondAry                        =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
        $CondVl                         =   $this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
        $AryCond                        =   "ContactID".$CondVl;
    }else{
        $AryCond                        =   "ContactID IN(-1)";
    }
?>
    
<div class="row">
    <div class="col-xs-12 ">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">قائمة مستفيدين</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            <?php
                $this->Desg->ViewDataWithExRowWithMultiCond('beneficiariesinfo',FALSE,$Fld,FALSE,$AryCond,$Butn);
                ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
</section>