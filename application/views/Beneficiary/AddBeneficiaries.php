<section class="content">
        
    
    
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">اختر الشركات لعرض المستفيدين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?PHP 

                        $this->Desg-> LookUps_Form_With_DropDown($name,'companies','CompanyID','CompanyArabicName','CompanyID','CompanyID');
                        $Cond['EmployeeID']=$this->session->userdata('ContactID');
                        $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees','CompanyID',$Cond);
                        $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'CompanyID');
                        $AryCond="CompanyID".$CondVl;
                        //$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('','',$Cond);
                        //$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('','',$Cond)
                        //$this->Desg->Create_Form_With_DropDown($name,$ActionTo,$btn,$AryCond,$keepPOST);
                        $this->Desg->Create_Form_With_DropDown($name,"Beneficiary/AddBeneficiaries?List=show","عرض",$AryCond,FALSE); 

                    ?>

                </div>
            </div>
        </div>
    </div>
    
    <div class="row" >
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">ملف المستفدين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <div class="col-md-6" >
                        <div class="input-group">
                        <?PHP 
                        echo form_open_multipart('');
                             echo form_upload('','','class="form-control" required="required"');
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary fa fa-files-o" > رفع الملف</button>
                        </div>
                    </div>
                    <?PHP
                        echo form_close();
                    ?>
                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
    
    
    <div class="row" <?PHP if($this->input->get('List')!='show'){ ?> style="display: none; " <?PHP } ?>>
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">قائمة مستفيدين</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <?PHP
//                    $this->Desg->SwitchDataTo($Ar,'ClinicID','companies','CompanyArabicName','CompanyID');
//                    $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
//                    $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');

                //$this->Desg->ExCol($ArrCol,'تفاصيل','users','ContactID','Claims','fa-info','Green');
                $this->Desg->ExCol($ArrCol,'تعديل','Claims','ContactID','IDedit','Beneficiary/AddBeneficiary?List=edit','fa-info','Green');
                $this->Desg->ExCol($ArrCol,'اضافة مكفول','Claims','ContactID','BeneficiaryID','Beneficiary/AddBeneficiary?List=show','fa-plus','Green');
                $Fld['FirstName']       ='FirstName';
                $Fld['FamilyName']      ='FamilyName';
                $Fld['Department']      ='Department';
                $Fld['Job']             ='Job';
                $Fld['DateOfBirth']     ='DateOfBirth';
                $Fld['Phone']           ='Phone';
                $Fld['CityID']          ='CityID';
                $Fld['ParentID']        ='ParentID';
//                    $Fld['FirstName']='FirstName';
//                    $Fld['FirstName']='FirstName';
//                    $Fld['FirstName']='FirstName';
//                    $this->Desg->ViewData("users",$Fld);
                unset($Cond);
                if($this->input->post('CompanyID')!=NULL)
                {
                    $Cond['CompanyID']=$this->input->post('CompanyID');
                    $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
                    $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
                    $AryCond="ContactID".$CondVl;
                }else{
                    $AryCond="ContactID IN(-1)";
                }

                $this->Desg->ViewDataWithExRowWithMultiCond('users',$ArrCol,$Fld,FALSE,$AryCond);
                ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->