<!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu ">
            <li class="header">القائمة الرئيسية  </li>
            
            <?PHP 
            $this->session->set_userdata('user_id',1)

            //if($this->Pros->Get_JustValue_Filed_AQ('users','Customer'     ,'ContactID',$this->session->userdata('ContactID')) =='1' || 1==1 ){?>
            <li>
                <a href="#">
                  <i class="fa fa-building"></i> <span>مبيعات</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Operations/POS"><i class="fa fa-circle-o"></i> نقطة بيع </a></li>
                    
                </ul>
                <a href="#">
                  <i class="fa fa-building"></i> <span>زبون / مورد</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Agent"><i class="fa fa-circle-o"></i> بيانات </a></li>
                    
                </ul>
                <a href="#">
                  <i class="fa fa-building"></i> <span>منتجات</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Products/Product"><i class="fa fa-circle-o"></i> منتج </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Products/Prices"><i class="fa fa-circle-o"></i> اسعار </a></li>
                </ul>
                <a href="#">
                  <i class="fa fa-building"></i> <span>مخازن</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Warehouses/Warehouse"><i class="fa fa-circle-o"></i> مخزن </a></li>
                    
                </ul> 
                
                
               <a href="#">
                  <i class="fa fa-building"></i> <span> اعدادات </span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Settings/Unit"><i class="fa fa-circle-o"></i> وحدات </a></li>
                     <li><a href="<?PHP echo base_url(); ?>Settings/Countries"><i class="fa fa-circle-o"></i> دولة </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Settings/Cities"><i class="fa fa-circle-o"></i> مدن </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Settings/Category"><i class="fa fa-circle-o"></i> فئات </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Settings/Currencies"><i class="fa fa-circle-o"></i> عملات </a></li>
                </ul>  
                
                
                <a href="#">
                  <i class="fa fa-building"></i> <span>ادارة المستخدمين</span> <i class="fa fa-angle-left  pull-left"></i>
                </a>
                <ul class="treeview-menu " style="display: none;">
                    <li><a href="<?PHP echo base_url(); ?>Users/User"><i class="fa fa-circle-o"></i> اضافة مستخدمين </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Group"><i class="fa fa-circle-o"></i> اضافة مجموعة </a></li>
                    <li><a href="<?PHP echo base_url(); ?>Users/Permissions"><i class="fa fa-circle-o"></i> اضافة صلاحيات لمجموعة </a></li>
                </ul> 
            </li>
                <?PHP //}?>


            
           
        </ul>