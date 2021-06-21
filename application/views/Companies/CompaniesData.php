<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">شركات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    $this->Desg->LookUps($A,'CompanyType','CompanyTypeName','CompanyTypeID','companytype',0);
                    $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                    $this->Desg->Create_From_Tabels_Insrt("companies","ProcessControlDatabases/ProConDBinCompany","حفظ",$A);  
                    ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">شركات</h3>
                
              <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
             </div> 
          
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    
                              $Cond['EmployeeID']     =$this->session->userdata('ContactID');
            $CondAry                =$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('companiesemployees','CompanyID',$Cond);
            $ComId['CompanyID']=$CondAry   ;
           
            $Con                =$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('companies','CompanyType',$ComId);
            //echo $Con ;
          
           $AryCond['CompanyType'] = $Con;
                    
                    $this->Desg->ExCol($ArrCol,'تعديل'         ,'companies'        ,'CompanyID'   ,'CompanyID','Settings/getCompanies',' fa-pencil-square-o','');
                    //$this->load->model('Desg');
                    $Fld['CompanyArabicName']="CompanyArabicName";
                    $Fld['CompanyEnglishName']="CompanyEnglishName";
                    $Fld['Phone']="Phone";
                    $Fld['Email']="Email";
                    //$Fld['']="";
                    $this->Desg->ViewDataWithExRowWithMultiCond('companies',$ArrCol,$Fld,FALSE,$AryCond);
                    //$this->Desg->ViewData("companies");  
                    ?>
                
            </div>
        </div>
        <?PHP
        echo var_dump($this->input->get('CompanyID'));
            if($this->input->get('CompanyID')!=NULL)  {
                
                ?>
                
                <div class="box" <?PHP if($this->input->get('CompanyID')==NULL){ ?> style="display: none; " <?PHP } ?> >
                    <div class="box-header">
                      <h3 class="box-title">تعديل شركة </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
                            $Tbl['Tbl']=array('companies');
                           
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
                             $hiddenField['CompanyID'] = $this->input->get('CompanyID');
                            $this->Desg->Create_From_Tabels( "companies",'CompanyID',$this->input->post('CompanyID'),"ProcessControlDatabases/EditDataCompanies","حفظ",$A,$ViewFld,FALSE,$hiddenField); 
                            //$this->Desg->Create_From_Tabels( "users",'ContactID',$this->input->post('IDedit'),FALSE,"حفظ",$A,$ViewFld);  
                        
                        ?>
                    </div>
                </div>
                <?PHP } ?>
    </div>
</section>