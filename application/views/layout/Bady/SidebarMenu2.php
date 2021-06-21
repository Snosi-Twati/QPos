<!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">القائمة الرئيسية  </li>
            <?PHP if($this->session->userdata('Employee')==1||$this->session->userdata('InsurerEmployee')==1){?><li>
<!--                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>العملاء - مباشرين</span> <i class="fa fa-angle-left  pull-left"></i>
                    
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/AccountStatementInc"><i class="fa fa-circle-o"></i>كشف حساب</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/TheListOofBeneficiaries"><i class="fa fa-circle-o"></i> كشف بالمستفيدين</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/AddBeneficiary#AddBeneficiary"><i class="fa fa-circle-o"></i>ادراج مستفيد</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/AddBeneficiary#DataBeneficiary"><i class="fa fa-circle-o"></i> تعديل معلومات مستفيد</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/CardsOrder"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims"><i class="fa fa-circle-o"></i>كشف بتفصيل المطالبات</a></li>
                </ul> 
            </li><?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li>
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>العملاء - شركات تأمين</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                    <ul class="treeview-menu " style="display: NONE;">
                        <li><a href="<?PHP echo base_url(); ?>index.php/Claims/AccountStatementInc"><i class="fa fa-circle-o"></i>كشف حساب</a></li>
                        <li><a href="<?PHP echo base_url(); ?>index.php/Companies/ListOfCompanies"><i class="fa fa-circle-o"></i> كشف بالشركات</a></li>
                        <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/TheListOofBeneficiaries"><i class="fa fa-circle-o"></i>كشف بالمستفيدين</a></li>
                        <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/AddBeneficiary#AddBeneficiary"><i class="fa fa-circle-o"></i> ادراج مستفيد</a></li>
                        <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/AddBeneficiaries#AddBeneficiary"><i class="fa fa-circle-o"></i>ادراج مستفيدين</a></li>
                        <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/AddBeneficiary#DataBeneficiary"><i class="fa fa-circle-o"></i>تعديل معلومات مستفيد</a></li>
                        <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/CardsOrder"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                        <li><a href="<?PHP echo base_url(); ?>index.php/Claims"><i class="fa fa-circle-o"></i>كشف بتفصيل المطالبات</a></li>
                    </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li>
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>ادارة البطاقات</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/CardsOrderForAll"><i class="fa fa-circle-o"></i>طلب بطاقات لشركة</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/StopCardsForAll"><i class="fa fa-circle-o"></i>ايقاف بطاقات لشركة</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/StatusCardsForAll"><i class="fa fa-circle-o"></i>عرض بطاقات حسب الحالة</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/RenewCardsForAll"><i class="fa fa-circle-o"></i>تجديد تفعيل البطاقات</a></li>
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1||$this->session->userdata('ClinicEmployee')==1){ ?>
            <li >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>مصحات</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/AccountStatementInc"><i class="fa fa-circle-o"></i>كشف حساب</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/DataClaims"><i class="fa fa-circle-o"></i> ادراج مطالبة جديدة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>ادراج مطالبات جديدة</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/ViewDataClaims#EditClaim"><i class="fa fa-circle-o"></i>تعديل مطالبة</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims"><i class="fa fa-circle-o"></i>كشف بتفصيل المطالبات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/TheListOfBeneficiaryVisits"><i class="fa fa-circle-o"></i>استعلام عن مستفيد</a></li> 
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Beneficiary')==1||$this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>مستفيد</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Clinics/ListOfClinics"><i class="fa fa-circle-o"></i>الشبكة الصحية</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/DetectionVisitsServices"><i class="fa fa-circle-o"></i>كشف الزيارات</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>تنزيل تطبيق ميديكيت</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>كشف المنافع</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims"><i class="fa fa-circle-o"></i>كشف بتفصيل المطالبات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/TheListOfBeneficiaryVisits"><i class="fa fa-circle-o"></i>استعلام عن مستفيد</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/CardsOrder"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>مركز خدمة العملاء</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/AccountStatementInc"><i class="fa fa-circle-o"></i>كشف حساب مركز خدمة المعلاء</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/AccountStatementInc"><i class="fa fa-circle-o"></i>كشف حساب مستفيد</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/TheListOfBeneficiaryVisits"><i class="fa fa-circle-o"></i>استعلام عن عميل</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Clinics/ListOfClinics"><i class="fa fa-circle-o"></i>الشبكة الطبية</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>الخدمات الإضافية</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>كشف المنافع</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>مدير الشبكة الطبية</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>كشف حساب مدير الشبكة الطبية</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims"><i class="fa fa-circle-o"></i>كشف بالمطالبات</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>استعلام عن عميل</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>الشبكة الطبية</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>الخدمات الإضافية</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>كشف المنافع</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>مستشار مبيعات</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>كشف حساب مستشار مبيعات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Companies/ListOfCompanies"><i class="fa fa-circle-o"></i>كشف حساب العملاء</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>استعلام عن عميل</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>الشبكة الطبية</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>الخدمات الإضافية</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>كشف المنافع</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                    <i class="fa fa-co"></i> <span>طاقم الادخال</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/DataClaims"><i class="fa fa-circle-o"></i>ادراج مطالبات جديدة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>ادراج مطالبة جديدة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>ادخال الوثائق لمطالبة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>تعديل معلومات المصحة</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>ادخال مستفيدين</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/AddBeneficiary#AddBeneficiary"><i class="fa fa-circle-o"></i>ادخال مستفيد</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Beneficiary/CardsOrder"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>طاقم المراجعة الطبية</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims"><i class="fa fa-circle-o"></i>كشف بالمطالبات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Claims/ViewDataClaims#EditClaim"><i class="fa fa-circle-o"></i>تعديل مطالبة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>ادخال الوثائق لمطالبة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>تعديل معلومات المصحة</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>ادخال مستفيدين</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>ادخال مستفيد</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    
                </ul>
            </li>
            <?PHP }?>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>ادرة المستخدمين</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Users/User">        <i class="fa fa-circle-o"></i>اضافة مستخدم</a>         </li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Users/Group">       <i class="fa fa-circle-o"></i>اضافة مجموعة</a>         </li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Users/Permissions"> <i class="fa fa-circle-o"></i>اضافة صلاحيات</a>         </li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Users/LinkingUser"> <i class="fa fa-circle-o"></i>صلاحيات المجموعة</a>      </li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Login/ListUsers">   <i class="fa fa-circle-o"></i>قائمة المستخدمين</a>     </li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>ادخال الوثائق لمطالبة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>تعديل معلومات المصحة</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>ادخال مستفيدين</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>ادخال مستفيد</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li>
                    
                </ul>
            </li>
            <?PHP }?>
            <li >
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>عملة</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
            </li>
            <?PHP if($this->session->userdata('Employee')==1){ ?>
            <li >
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>اعدادات</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: NONE;">
                    <li><a href="<?PHP echo base_url(); ?>index.php/Contracts/getContracts">                             <i class="fa fa-circle-o"></i>عقود</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Companies/getCompaniesServicesPrices">  <i class="fa fa-circle-o"></i>اسعار خدمات المصحات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Accounts/getAccounts">                  <i class="fa fa-circle-o"></i>حسابات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Banks/getBanks">                     <i class="fa fa-circle-o"></i>بنوك</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/getBanks/getBanksBranches">    <i class="fa fa-circle-o"></i>فروع البنوك</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Cities/getCities">                    <i class="fa fa-circle-o"></i>مدن</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Countries/getCountries">                 <i class="fa fa-circle-o"></i>دول</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Currencies/getCurrencies">                <i class="fa fa-circle-o"></i>عملات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Departments/getDepartments">               <i class="fa fa-circle-o"></i>الاقسام</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Employees/getEmployees">                 <i class="fa fa-circle-o"></i>موطفين</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Jobs/getJobs">                      <i class="fa fa-circle-o"></i>وظائف</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Salaries/getSalaries">                  <i class="fa fa-circle-o"></i>مرتبات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Services/getServices">                  <i class="fa fa-circle-o"></i>خدمات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Stages/getStages">                    <i class="fa fa-circle-o"></i>مراحل</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Companies/getCompanies">                 <i class="fa fa-circle-o"></i>شركات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/Nationalities/getNationalities">             <i class="fa fa-circle-o"></i>جنسيات</a></li> 
                    <li><a href="<?PHP echo base_url(); ?>index.php/IssuesStatus/getIssuesStatus">             <i class="fa fa-circle-o"></i>نوع المشكلة</a></li>
                    
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>ادخال الوثائق لمطالبة</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>تعديل معلومات المصحة</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>ادخال مستفيدين</a></li>
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>ادخال مستفيد</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>طلب بطاقة </a></li> 
                </ul>
            </li>-->
            <?PHP }?>

            <?PHP
            $FunctionList=$this->Desg->FunctionList();
            foreach ($FunctionList as $key => $valueFun) { ?>
                <li >
                    <?PHP
                if($key=="ProcessControlDatabases"){
                }elseif($key=="UnauthorizedAccess"){
                }elseif($key=="pg404"){
                }elseif($key=="AccessDenied"){
                }else{
                    
                    ?>
                    
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span><?PHP echo $key; ?></span> <i class="fa fa-angle-left pull-left"></i>
                        </a>
                        <ul class="treeview-menu " style="display: NONE;">
                            <?php
                            foreach ($valueFun as $value) {
                            ?>
                                <li><a href="<?PHP echo base_url(); ?>index.php/<?PHP echo $key.''.$value ; ?>">             <i class="fa fa-circle-o"></i><?PHP echo $this->Desg->LebalName($key."".$value) ; ?></a></li>
                            <?PHP } ?> 
                        </ul> 
                    
            <?PHP
                }?>
                </li>
                    <?PHP
            } 
            ?>
           
        </ul>