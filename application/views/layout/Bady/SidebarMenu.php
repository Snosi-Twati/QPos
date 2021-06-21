<!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">القائمة الرئيسية  </li>
            
            <?PHP //if($this->Pros->Get_JustValue_Filed_AQ('users','Customer'     ,'ContactID',$this->session->userdata('ContactID')) =='1' || 1==1 ){?>
            <li>
                
                <a href="#">
                  <i class="fa fa-building"></i> <span>مطالبات</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Claims/CreateBoxs"><i class="fa fa-circle-o"></i> اضافة صندوق </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Claims/ClaimNumbering"><i class="fa fa-circle-o"></i> ترقيم المطالبات  </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Claims/AssigningClaim"><i class="fa fa-circle-o"></i> توجيه المطالبات  </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Claims/CreateClaims"><i class="fa fa-circle-o"></i>ادخال مطالبة</a></li>
                    <li><a href="<?PHP echo base_url(); ?>Claims/ReviewClaim"><i class="fa fa-circle-o"></i>مراجعة مطالبة</a></li>
                    <li><a href="<?PHP echo base_url(); ?>Claims/ClaimsArchive"><i class="fa fa-circle-o"></i>ارشيف المطالبات</a></li>
                </ul> 
                <a href="#">
                  <i class="fa fa-building"></i> <span>ادارة المستخدمين</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Users/User"><i class="fa fa-circle-o"></i> اضافة مستخدمين </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Group"><i class="fa fa-circle-o"></i> اضافة مجموعة </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Permissions"><i class="fa fa-circle-o"></i> اضافة صلاحيات لمجموعة </a></li>
                </ul> 
                <a href="#">
                  <i class="fa fa-building"></i> <span>ادارة عقود</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Contracts/Contract"><i class="fa fa-circle-o"></i> عقد </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Group"><i class="fa fa-circle-o"></i> اضافة مجموعة </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Permissions"><i class="fa fa-circle-o"></i> اضافة صلاحيات لمجموعة </a></li>
                </ul> 
               <a href="#">
                  <i class="fa fa-building"></i> <span> اعدادات </span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Services/getServices"><i class="fa fa-circle-o"></i>خدمات</a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Group"><i class="fa fa-circle-o"></i> اضافة مجموعة </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Permissions"><i class="fa fa-circle-o"></i> اضافة صلاحيات لمجموعة </a></li>
                </ul> 
            </li>
                <?PHP //}?>


            
           
        </ul>