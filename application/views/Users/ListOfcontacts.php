<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">بيانات المستخدم</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
		
                <?PHP
 
				  $this->Desg->ExCol($ArrCol,'تعديل','users','ContactID','IDedit','Users/ListOfusers?List=edit','fa-info','Green');
                        $Fld['FirstName']               ='FirstName';
                        $Fld['FatherName']              ='FatherName';
                        $Fld['GrandFatherName']         ='GrandFatherName';
                        $Fld['sex']                     ='sex';
                        $Fld['Department']              ='Department';
                        $Fld['Job']                     ='Job';
                        $Fld['DateOfBirth']             ='DateOfBirth';
                        $Fld['CityID']                  ='CityID';
                        $Fld['Phone']                   ='Phone';
                        $Fld['Email']                   ='Email';
                        $Fld['AddressLine1']            ='AddressLine1';
                        $Fld['AddressLine2']            ='AddressLine2';
                        $Fld['Photo']                   ='Photo';
                        $Fld['FamilyName']              ='FamilyName';
                        $Fld['Employee']                ='Employee';
						$Fld['Customer']               ='Customer';
                        $Fld['InsurerEmployee']         ='InsurerEmployee';
                        $Fld['ClinicEmployee']          ='ClinicEmployee';
                        $Fld['AreaManager']             ='AreaManager';
                        $Fld['AreaManagerPercentage']   ='AreaManagerPercentage';
                        $Fld['SalesAgent']              ='SalesAgent';
                        $Fld['SalesAgentPercentage']    ='SalesAgentPercentage';
						$this->Desg->ViewDataWithExRowWithMultiCond("users",FALSE,$Fld,FALSE,FALSE);  
						?>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">بيانات وظيفية</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
					
                      
						 $this->Desg->SwitchDataTo($Ar,'DepartmentID','departments','DepartmentName','DepartmentID');
					     $this->Desg->SwitchDataTo($Ar,'NationalityID','nationalities','Nationality','NationalityID');
						 $this->Desg->SwitchDataTo($Ar,'JobID','jobs','JobTitle','JobID');
						 $this->Desg->SwitchDataTo($Ar,'EmploymentTypeID','employmenttypes','EmploymentType','EmploymentTypeID');
                    
					  // $this->Desg->ExCol($ArrCol,'تعديل','employees','EmployeesID','IDedit','Users/ListOfusers?List=edit','fa-info','Green');
                        $Fld['EmployeesID']                         ='EmployeesID';
						$Fld['NationalityID']                       ='NationalityID';
                        $Fld['NickName']                            ='ClinicEmployee';
                        $Fld['IdentificationDocumentTypeID']        ='IdentificationDocumentTypeID';
                        $Fld['IdentificationDocumentNumber']        ='IdentificationDocumentNumber';
                        $Fld['IdentificationDocumentPhoto']         ='IdentificationDocumentPhoto';
                        $Fld['DepartmentID']                        ='DepartmentID';
                        $Fld['JobID']                               ='JobID';
                        $Fld['BasicSalary']                         ='BasicSalary';
                        $Fld['NickName']                            ='ClinicEmployee';
                        $Fld['EmploymentTypeID']                    ='EmploymentTypeID';
                        $Fld['MaritalStatus']                       ='MaritalStatus';
                        $Fld['NumberOfChildren']                    ='NumberOfChildren';
			
						 $this->Desg->ViewDataWithExRowWithMultiCond("employees",FALSE,$Fld,$Ar,FALSE);  

                    

                    // $this->Desg->Create_From_Tabels( "employees",FALSE,FALSE,FALSE,FALSE,$A,$Fld);    
                    ?>
					</pre>
                
            </div>
        </div>
        
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">بيانات الشركة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                       // $this->Desg->LookUps($A,'CompanyID','CompanyArabicName','CompanyID','companies',0);
                        
                        $Fld['CompanyID']                       ='CompanyID';
                        
                        
                      //  $this->Desg->Create_From_Tabels( "companiesemployees",FALSE,FALSE,FALSE,FALSE,$A,$ViewFld);    
                    ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">مجموعة المنيمي اليها</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                       // $this->Desg->LookUps($A,'GroupID','GroupName','GroupID','usersgroups',0);
                        $Fld['GroupID']                       ='GroupID';
                        //$this->Desg->Create_From_Tabels( "linkingusergroup",FALSE,FALSE,FALSE,FALSE,$A,$ViewFld);    
                    ?>
                
            </div>
        </div>
         <div class="box">
            <div class="box-header">
                <h3 class="box-title">بيانات الدخول</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                    <?PHP
                        $hiddenField['UserID']                              ='UserID';
                        $hiddenField['ExpirationDate']                       ='ExpirationDate';
                        $hiddenField['LastLoginDate']                       ='LastLoginDate';
                        $hiddenField['LastLoginTime']                       ='LastLoginTime';
                        $Fld['UserName']                       ='UserName';
                        $Fld['PassWord']                       ='PassWord';
                        $Fld['AllowLogin']                       ='AllowLogin';
                       // $Tbls['Tbl']=array('users','employees','companiesemployees','linkingusergroup','users');
                       // $this->session->set_userdata($Tbls);
                       // $this->Desg->Create_From_Tabels( "users",FALSE,FALSE,FALSE,"أدخال البيانات",$A,$ViewFld,$hiddenField);   
                    ?>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">قائمة المستخدمين</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->ViewData("users");  
                    ?>
            </div>
        </div>
		
		<div>
		
		 <?PHP
                if($this->input->post('IDedit')!=NULL)  {
                ?>
                
                <div class="box" <?PHP if($this->input->get('List')!='edit'){ ?> style="display: none; " <?PHP } ?> >
                    <div class="box-header">
                      <h3 class="box-title">تعديل </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
                            $Tbl['Tbl']=array('users','users');
                           // $this->Desg->LookUpsFrmAry($A,'RelationToBeneficiary',"dropdown",$Arry);
                            $this->session->set_userdata($Tbl);
                            $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                            $this->Desg->LookUps($A,'CompanyID','CompanyArabicName','CompanyID','companies',0);
                           
                        $ViewFld['FirstName']               ='FirstName';
                        $ViewFld['FatherName']              ='FatherName';
                        $ViewFld['GrandFatherName']         ='GrandFatherName';
                        $ViewFld['sex']                     ='sex';
                        $ViewFld['Department']              ='Department';
                        $ViewFld['Job']                     ='Job';
                        $ViewFld['DateOfBirth']             ='DateOfBirth';
                        $ViewFld['CityID']                  ='CityID';
                        $ViewFld['Phone']                   ='Phone';
                        $ViewFld['Email']                   ='Email';
                        $ViewFld['AddressLine1']            ='AddressLine1';
                        $ViewFld['AddressLine2']            ='AddressLine2';
                        $ViewFld['Photo']                   ='Photo';
                        $ViewFld['FamilyName']              ='FamilyName';
                        $ViewFld['Employee']                ='Employee';
						$ViewFld['Customer']               ='Customer';
                        $ViewFld['InsurerEmployee']         ='InsurerEmployee';
                        $ViewFld['ClinicEmployee']          ='ClinicEmployee';
                        $ViewFld['AreaManager']             ='AreaManager';
                        $ViewFld['AreaManagerPercentage']   ='AreaManagerPercentage';
                        $ViewFld['SalesAgent']              ='SalesAgent';
                        $ViewFld['SalesAgentPercentage']    ='SalesAgentPercentage';
                        $hiddenField['ContactID']           =$this->input->post('IDedit');
                          
                           
                          $this->Desg->Create_From_Tabels( "users",'ContactID',$this->input->post('IDedit'),FALSE,"حفظ",$A,$ViewFld);  
                        
                        ?>
                    </div>
                </div>
                <?PHP } ?>
		
		</div>
    </div>
</section>
