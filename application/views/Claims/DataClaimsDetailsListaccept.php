<section class="content">
            
        <div class="row">
            <div class="col-xs-12">
              
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">بيانات المطالبات </h3>
                </div><!-- /.box-header -->
                    <div class="box-body fa-b ">
                        <?PHP 
                        /////////////////////////////////////////////
                        $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                        $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                        $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                        ////////////////////////////////////////////
                        //$this->Desg->ExCol($ArrCol,'تعديل'          ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','Claims/DataClaimsDetailsList?List=edit',' fa-pencil-square-o','');
                        $this->Desg->ExCol($ArrCol,'موافقة'     ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-check-circle-o','');
                        $this->Desg->ExCol($ArrCol,'مرفوض'      ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-stop','');
                        //$this->Desg->ExCol($ArrCol,'اضافة ملاحظة'   ,'claimsservicesissues' ,'ClaimServiceID'   ,'ClaimServiceID','Claims/ClaimsServicesIssues','fa-plus-circle','Yellow');
                        ////////////////////////////////////////////
                        $Fld['ClaimServiceID']              ='ClaimServiceID';
                        $Fld['ServiceID']                   ='ServiceID';
                        $Fld['ClinicServiceAmount']         ='ClinicServiceAmount';
                        $Fld['ServiceDate']                 ='ServiceDate';
                        $Fld['ServiceTime']                 ='ServiceTime';
                        $Fld['CurrencyID']                  ='CurrencyID';
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','InsurerEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar);    
                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $CCD                    =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('listofserviceaccept','ClaimServiceID');
                            $CondCD=$this->Pros->Make_Value_in_SQL_IN($CCD,'ClaimServiceID');
                            
                            //$CondCD['MedicalApprovalBy']        =   '0';
//                            if($this->input->post('ClaimID'))
//                                $CondCD['ClaimID']              =   $this->input->post('ClaimID');
//                            else
//                                $CondCD['ClaimID']              =   $this->input->get('ClaimID');
                            $CondCD='ClaimServiceID'. $CondCD;
                            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,$CondCD);
                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar);    
                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Beneficiary'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $Cond['BeneficiaryID']  =   $this->session->userdata('ContactID');

                            $CCD                    =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claims','ClaimID',$Cond);

                            $CondCD=$this->Pros->Make_Value_in_SQL_IN($CCD,'ClaimID');

                            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,'ClaimID'.$CondCD); 

                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','AreaManager'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar); 

                        }
                        ///////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','SalesAgent'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){

                            $this->Desg->ViewDataWithExRow('claimsdetails',$ArrCol,$Fld,$Ar); 

                        }
                        ///////////////////////////////////////////
                        ?>    
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                
                <?PHP
                if($this->input->post('ClaimServiceID')!=NULL)  {
                ?>
                
                <div class="box" <?PHP if($this->input->get('List')!='edit'){ ?> style="display: none; " <?PHP } ?> >
                    <div class="box-header">
                      <h3 class="box-title">تعديل مطالبة </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
                            $Tbl['Tbl']=array('claimsdetails');
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
//                            $ViewFld['FirstName']               ='FirstName';
//                            $ViewFld['FatherName']              ='FatherName';
//                            $ViewFld['GrandFatherName']         ='GrandFatherName';
//                            $ViewFld['FamilyName']              ='FamilyName';
//                            $ViewFld['Department']              ='Department';
//                            $ViewFld['RelationToBeneficiary']   ='RelationToBeneficiary';
//                            $ViewFld['sex']                     ='sex';
//                            $ViewFld['Job']                     ='Job';
//                            $ViewFld['DateOfBirth']             ='DateOfBirth';
//                            $ViewFld['CityID']                  ='CityID';
//                            $ViewFld['Phone']                   ='Phone';
//                            $ViewFld['Email']                   ='Email';
//                            $ViewFld['AddressLine1']            ='AddressLine1';
//                            $ViewFld['AddressLine2']            ='AddressLine2';
//                            $ViewFld['Photo']                   ='Photo';
//                            $ViewFld['ParentID']                = 'ParentID';
//                            $ViewFld['CompanyID']               = 'CompanyID'  ;
//                            $hiddenField['ContactID']           =$this->input->post('IDedit');
//                            $hiddenField['BeneficiaryID']       =$this->input->post('IDedit');
                            $ViewFld=FALSE;
                            $hiddenField=FALSE;
                            $this->Desg->Create_From_Tabels( "claimsdetails",'ClaimServiceID',$this->input->post('ClaimServiceID'),"Processestransaction/UpDateDB","حفظ",$A,$ViewFld,FALSE,$hiddenField); 
                            //$this->Desg->Create_From_Tabels( "users",'ContactID',$this->input->post('IDedit'),FALSE,"حفظ",$A,$ViewFld);  
                        
                        ?>
                    </div>
                </div>
                <?PHP } ?>
                
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->