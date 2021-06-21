<section class="content">
 
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">إضافة شركة </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    $this->Desg->LookUps($A,'CompanyType','CompanyTypeName','CompanyTypeID','companytype',0);
                    $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                    $this->Desg->Create_From_Tabels_Insrt("companies","","حفظ",$A);  
                    ?>
                
            </div>
        </div>
		
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">قائمة بالشركات </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
			
			
                
                    <?PHP
					
                     $this->load->model('Desg');
					
					 $this->Desg->ExCol($ArrCol,'تعديل','companies','CompanyID','IDedit','Companies/AddCompanies?List=edit','fa fa-pencil-square-o','yellow');
                     $this->Desg->SwitchDataTo($Ar,'CityID','cities','CityName','CityID');
					 $this->Desg->SwitchDataTo($Ar,'CompanyType','companytype','CompanyTypeName','CompanyTypeID');    
		   
					 $Fld['CompanyArabicName']               ='CompanyArabicName';
					 $Fld['CompanyEnglishName']              ='CompanyEnglishName';
					 $Fld['Logo']                            ='Logo';
					 $Fld['Phone']                           ='Phone';
					 $Fld['Email']                           ='Email';
					 $Fld['CityID']                          ='CityID';
					 $Fld['AddressLine1']                    ='AddressLine1';
					 $Fld['AddressLine2']                    ='AddressLine2';
					 $Fld['CompanyType']                     ='CompanyType';
					 
				     $this->Desg->ViewDataWithExRowWithMultiCond("Companies",$ArrCol,$Fld,$Ar,FALSE);
					 

                      
                    ?>
                
            </div>
        </div>
		
		      
                 <?PHP
                if($this->input->post('IDedit')!=NULL)  {
                ?>
		          <div class="box" <?PHP if($this->input->get('List')!='edit'){ ?> style="display: none; " <?PHP } ?> >
                    <div class="box-header">
                      <h3 class="box-title">تعديل بيانات الشركة </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
						$Tbl['Tbl']=array('companies');
                            
                            $this->session->set_userdata($Tbl);
                            $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                            $this->Desg->LookUps($A,'CompanyTypeID','CompanyTypeName','CompanyTypeID','companytype',0);
                          
					         $ViewFld['CompanyArabicName']               ='CompanyArabicName';
					         $ViewFld['CompanyEnglishName']              ='CompanyEnglishName';
					         $ViewFld['Logo']                            ='Logo';
					         $ViewFld['Phone']                           ='Phone';
					         $ViewFld['Email']                           ='Email';
					         $ViewFld['CityID']                          ='CityID';
					         $ViewFld['AddressLine1']                    ='AddressLine1';
					         $ViewFld['AddressLine2']                    ='AddressLine2';
					         $ViewFld['CompanyType']                     ='CompanyType';
							 $hiddenField['CompanyID']                   =$this->input->post('IDedit');
                          
                            $this->Desg->Create_From_Tabels("companies",'CompanyID',$this->input->post('IDedit'),"ProcessControlDatabases/EditDataCompanies","حفظ",$A,$ViewFld,FALSE,$hiddenField);
                              
						   
                        ?>
                    </div>
			     </div>
                <?PHP } ?>
            </div>
    </div>
</section>