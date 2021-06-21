<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">بيانات المستخدم</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?PHP
                        $this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                        $hiddenField['EmploymentOrEntryDate']       =date('Y-m-d H:i:s');
                        $hiddenField['CreateUserDate']      =date('Y-m-d');
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
                        $ViewFld['InsurerEmployee']         ='InsurerEmployee';
                        $ViewFld['ClinicEmployee']          ='ClinicEmployee';
                        $ViewFld['AreaManager']             ='AreaManager';
                        $ViewFld['AreaManagerPercentage']   ='AreaManagerPercentage';
                        $ViewFld['SalesAgent']              ='SalesAgent';
                        $ViewFld['SalesAgentPercentage']    ='SalesAgentPercentage';
                        $ViewFld = false;
                        $this->Desg->Create_From_Tabels_With_Ajax( "users",FALSE,FALSE,'ProcessControlDatabases/ProConDBinByAjax','ادخال مستخدم',$A,$ViewFld,FALSE,$hiddenField);  
                ?>
            </div>
        </div>
        

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">مجموعة المنيمي اليها</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                        $this->Desg->LookUps($A,'GroupID','GroupName','GroupID','usersgroups',"Search");
                        $this->Desg->LookUps($A,'UserID','full_name','user_id','users_v',"Search");
                        $ViewFld['GroupID']                       ='GroupID';
                        $ViewFld['UserID']                       ='UserID';
                        
                        $this->Desg->Create_From_Tabels( "linkingusergroup",FALSE,FALSE,'ProcessControlDatabases/ProConDBinByAjax','ربط مستخدم بمجموعة',$A,$ViewFld);    
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
    </div>
</section>
