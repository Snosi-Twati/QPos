<section class="content">
    
        <?PHP

            $this->Desg-> LookUps_Form_With_DropDown($name,'contracts','ContractID','ReferenceNumber','ContractID','contracts');
            $CondAry    =   $this->Desg->CheckNoContract();
            
//            $Cond['EmployeeID']     =$this->session->userdata('ContactID');
//            
//            $CondAry                =$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees','CompanyID',$Cond);
//            
//            //  var_dump($CondAry);
//            
//            $CondVl                 =$this->Pros->Make_Value_in_SQL_IN($CondAry,'CompanyID');
//            
//            //var_dump($CondVl);
//            
//            $AryCond4contracts                ="BeneficiaryCompanyID ".$CondVl;
//            
//            $CondAry                =$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','*',$AryCond4contracts );
//            
//            //var_dump($CondAry[0]['ContractID']);
            
        ?>
    
        <?PHP if( sizeof($CondAry)>1 ){ ?>
    
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">اختر العقد لعرض المستفيدين </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP 
                            
                            $CondVl                 =$this->Pros->Make_Value_in_SQL_IN($CondAry,'ContractID');
                            
                            $CondVl="ContractID ".$CondVl;
                            
                            $this->Desg->Create_Form_With_DropDown($name,"Beneficiary/AddBeneficiary?List=show","عرض",$CondVl,FALSE); 
                            
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <?PHP } ?>
    
       
        <div class="row" id="AddBeneficiary">
            <div class="col-xs-12">
                <?PHP
                
                //$this->Desg-> LookUps_Form_With_DropDown($name,'contracts','BeneficiaryCompanyID','ReferenceNumber','ContractID','contracts');
                 unset($Cond);     
              //$this->Desg-> LookUps_Form_With_DropDown($name,'contracts','BeneficiaryCompanyID','ReferenceNumber','ReferenceNumber','contracts');
                $Cond['EmployeeID']     =$this->session->userdata('ContactID');
                $CondAry                =$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees','CompanyID',$Cond);

                $CondVl                 =$this->Pros->Make_Value_in_SQL_IN($CondAry,'CompanyID');
                //var_dump($CondVl);
                $AryCond                ="BeneficiaryCompanyID ".$CondVl;
                
                //$CondAry    =   $this->Desg->CheckNoContract();
                
                if(sizeof($CondAry)>1){ ?>
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">اختر العقد لاضافة المستفيد </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP 
                        
//                        $this->Desg-> LookUps_Form_With_DropDown($name,'companies','CompanyID','CompanyArabicName','CompanyID','CompanyID');
//                        $Cond['EmployeeID']=$this->session->userdata('ContactID');
//                        $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees','CompanyID',$Cond);
//                        $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'CompanyID');
//                        //$AryCond="CompanyID".$CondVl;
//                        //$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('','',$Cond);
//                        //$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('','',$Cond)
//                        //$this->Desg->Create_Form_With_DropDown($name,$ActionTo,$btn,$AryCond,$keepPOST);
//                         $AryCond                ="CompanyID like '%%' ";//.$CondVl;
                        
//                        unset($Cond);
//                  if($this->input->post('CompanyID')!=NULL)
//                  {
//                        $Cond['CompanyID']=$this->input->post('CompanyID');
//                        $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
//                        $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
//                        $AryCond="ContactID".$CondVl;
//                  }else{
//                      
//                      $Cond['CompanyID']=$CondAry[0]['CompanyID'];
//                      //var_dump($Cond);
//                        $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
//                        $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
//                        
//                        $AryCond="ContactID".$CondVl;
//                      //$AryCond="ContactID IN(-1)";
//                  }
                  
                        $this->Desg->Create_Form_With_DropDown($name,"Beneficiary/AddBeneficiary?List=add","عرض",$AryCond,FALSE); ?>
                    </div>
                </div>
                
                <?PHP
                }
                
                    unset($Cond);
                    $Cond['StratDate <=']     =   date('Y-m-d');
                    $Cond['EndDate >=']       =   date('Y-m-d');
                    if($this->input->post('ContractID')){
                        $Cond['ContractID']         =   $this->input->post('ContractID');
                        $CondAry                    =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','*',$Cond);
                    }else{
                        //var_dump($CondAry);
                        $Cond['BeneficiaryCompanyID']=$CondAry[0]['CompanyID'];
//                        var_dump($Cond);
//                        $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
//                        $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
//                        $Cond['BeneficiaryCompanyID']         =   $this->input->post('BeneficiaryCompanyID');
                        $CondAry                    =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','*',$Cond);
                    }
                    
                if($CondAry!=FALSE)  {
                ?>
                
                <div class="box collapsed-box"  >
                    
                          <div class="box-header">
                <h3 class="box-title"> ادخال مستفيد </h3>    
                <div class="box-tools pull-right">
            <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
             </div> 
          
            </div><!-- /.box-header -->
         
                    <div class="box-body">
                        <?PHP
                            $Tbl['Tbl']=array('users','insurerbeneficiaries');
                            $this->session->set_userdata($Tbl);
                            $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                            $this->Desg->LookUps($A,'CompanyID','CompanyArabicName','CompanyID','companies',0);
                            $Arry=array(
                                1 => "اب",
                                2 => "ام",
                                3 => "زوج",
                                4 => "ابن"
                            );
                            $this->Desg->LookUpsFrmAry($A,'RelationToBeneficiary',"dropdown",$Arry);
                            $ViewFld['FirstName']               ='FirstName';
                            $ViewFld['FatherName']              ='FatherName';
                            $ViewFld['GrandFatherName']         ='GrandFatherName';
                            $ViewFld['FamilyName']              ='FamilyName';
                            $ViewFld['Department']              ='Department';
                            $ViewFld['sex']                     ='sex';
                            $ViewFld['Job']                     ='Job';
                             //$ViewFld['RelationToBeneficiary']                     ='RelationToBeneficiary';
                             $ViewFld['AllowedAmount']           ='AllowedAmount';
                            $ViewFld['DateOfBirth']             ='DateOfBirth';
                            $ViewFld['CityID']                  ='CityID';
                            $ViewFld['Phone']                   ='Phone';
                            $ViewFld['Email']                   ='Email';
                            $ViewFld['AddressLine1']            ='AddressLine1';
                            $ViewFld['AddressLine2']            ='AddressLine2';
                            $ViewFld['Photo']                   ='Photo';
                            $hiddenField['ParentID']                ='-1';
                            $hiddenField['RelationToBeneficiary']   ='-1';
                            $hiddenField['CompanyID']                       = $CondAry[0]['BeneficiaryCompanyID']  ;
                            $hiddenField['ContractID']                       = $CondAry[0]['ContractID']  ;
                            $hiddenField['Status']                          =   1;
                            //$hiddenField['AllowedAmount']                   =   0;
                            $hiddenField['BeneficiaryCoveragePercentage']   =   $CondAry[0]['BeneficiaryShare'];
                            
                            $this->Desg->Create_From_Tabels( "insurerbeneficiaries",'','',"ProcessControlDatabases/EnterDataBeneficiary",FALSE,$A,$ViewFld,FALSE,$hiddenField); 
                            $this->Desg->Create_From_Tabels( "users",'','',FALSE,"حفظ",$A,$ViewFld);  
                        
                        ?>
                    </div>
                </div>
                <?PHP } ?>
                <?PHP
                if($this->input->post('BeneficiaryID')!=NULL)  {
                ?>
                
                <div class="box"  >
                    <div class="box-header">
                      <h3 class="box-title">اضافة مكفول</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
                            $Tbl['Tbl']=array('users','insurerbeneficiaries');
                            $Arry=array(
                                1 => "اب",
                                2 => "ام",
                                3 => "زوج",
                                4 => "ابن"
                            );
                            $this->Desg->LookUpsFrmAry($A,'RelationToBeneficiary',"dropdown",$Arry);
                            $this->session->set_userdata($Tbl);
                            $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                            $this->Desg->LookUps($A,'CompanyID','CompanyArabicName','CompanyID','companies',0);
                            $ViewFld['FirstName']               ='FirstName';
                            $ViewFld['FatherName']              ='FatherName';
                            $ViewFld['GrandFatherName']         ='GrandFatherName';
                            $ViewFld['FamilyName']              ='FamilyName';
                            $ViewFld['Department']              ='Department';
                            $ViewFld['sex']                     ='sex';
                            $ViewFld['RelationToBeneficiary']   ='RelationToBeneficiary';
                            $ViewFld['Job']                     ='Job';
                            $ViewFld['DateOfBirth']             ='DateOfBirth';
                            $ViewFld['CityID']                  ='CityID';
                            $ViewFld['Phone']                   ='Phone';
                            $ViewFld['Email']                   ='Email';
                            $ViewFld['AddressLine1']            ='AddressLine1';
                            $ViewFld['AddressLine2']            ='AddressLine2';
                            $ViewFld['Photo']                   ='Photo';
                            $ViewFld['AllowedAmount']           ='AllowedAmount';
                            $hiddenField['ParentID']                        =   $this->input->post('BeneficiaryID');
                            $condCom['BeneficiaryID']                       =   $this->input->post('BeneficiaryID');
                            $condCom['Status']                              =   1;
                            $hiddenField['CompanyID']                       =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('insurerbeneficiaries','CompanyID',$condCom);
                            $CondContract['StratDate <=']                   =   date('Y-m-d');
                            $CondContract['EndDate >=']                     =   date('Y-m-d');
                            $CondContract['BeneficiaryCompanyID']           =  $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('insurerbeneficiaries','CompanyID',$condCom);
                            $hiddenField['ContractID']                      =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts','ContractID',$CondContract);
                            $hiddenField['Status']                          =   1;
                            //$hiddenField['AllowedAmount']                   =   0;
                            $hiddenField['BeneficiaryCoveragePercentage']   =   $this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('contracts','BeneficiaryShare',$CondContract);
                            
                            $this->Desg->Create_From_Tabels( "insurerbeneficiaries",'','',"ProcessControlDatabases/EnterDataBeneficiary",FALSE,$A,$ViewFld,FALSE,$hiddenField); 
                            $this->Desg->Create_From_Tabels( "users",'','',FALSE,"حفظ",$A,$ViewFld);  
                        
                        ?>
                    </div>
                </div>
                <?PHP } ?>
                 <?PHP
                if($this->input->post('IDedit')!=NULL)  {
                ?>
                
                <div class="box"  >
                    <div class="box-header">
                      <h3 class="box-title">تعديل مستفيد</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
                            $Tbl['Tbl']=array('users','insurerbeneficiaries');
                            $Arry=array(
                                -1=>"الكفيل",
                                1 => "اب",
                                2 => "ام",
                                3 => "زوج",
                                4 => "ابن"
                            );
                            $this->Desg->LookUpsFrmAry($A,'RelationToBeneficiary',"dropdown",$Arry);
                            $this->session->set_userdata($Tbl);
                            $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                            $this->Desg->LookUps($A,'CompanyID','CompanyArabicName','CompanyID','companies',0);
                            $ViewFld['FirstName']               ='FirstName';
                            $ViewFld['FatherName']              ='FatherName';
                            $ViewFld['GrandFatherName']         ='GrandFatherName';
                            $ViewFld['FamilyName']              ='FamilyName';
                            $ViewFld['Department']              ='Department';
                            $ViewFld['RelationToBeneficiary']   ='RelationToBeneficiary';
                            $ViewFld['sex']                     ='sex';
                            $ViewFld['Job']                     ='Job';
                            $ViewFld['DateOfBirth']             ='DateOfBirth';
                            $ViewFld['CityID']                  ='CityID';
                            $ViewFld['Phone']                   ='Phone';
                            $ViewFld['Email']                   ='Email';
                            $ViewFld['AddressLine1']            ='AddressLine1';
                            $ViewFld['AddressLine2']            ='AddressLine2';
                            $ViewFld['Photo']                   ='Photo';
                            $ViewFld['ParentID']                = 'ParentID';
                            $ViewFld['CompanyID']               = 'CompanyID'  ;
                             $ViewFld['AllowedAmount']           ='AllowedAmount';
                            $hiddenField['ContactID']           =$this->input->post('IDedit');
                            $hiddenField['BeneficiaryID']       =$this->input->post('IDedit');
                            $this->Desg->Create_From_Tabels( "insurerbeneficiaries",'BeneficiaryID',$this->input->post('IDedit'),"ProcessControlDatabases/EditDataBeneficiary",FALSE,$A,$ViewFld,FALSE,$hiddenField); 
                            $this->Desg->Create_From_Tabels( "users",'ContactID',$this->input->post('IDedit'),FALSE,"حفظ",$A,$ViewFld);  
                        
                        ?>
                    </div>
                </div>
                <?PHP } ?>
            </div>
        </div>
    
    
    <div class="row" >
        
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
//var_dump($CondAry);
                  unset($Cond);
                  if($this->input->post('ContractID')!=NULL)
                  {
                        $Cond['ContractID']     =   $this->input->post('ContractID');
                        $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
                        $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
                        $AryCond=" ContactID".$CondVl;
                  }else{
                      //var_dump($CondAry);
                        $Cond['ContractID']     =   $CondAry[0]['ContractID'];
                      //
                        $CondAry                =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('insurerbeneficiaries','BeneficiaryID',$Cond);
                        $CondVl                 =   $this->Pros->Make_Value_in_SQL_IN($CondAry,'BeneficiaryID');
                       
                        $AryCond=" ContactID".$CondVl;
                         //var_dump($AryCond);
                      //$AryCond="ContactID IN(-1)";
                  }

                  $this->Desg->ViewDataWithExRowWithMultiCond('users',$ArrCol,$Fld,FALSE,$AryCond);
                  ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
            
        </div><!-- /.col -->
        
    </div><!-- /.row -->
       
</section><!-- /.content -->