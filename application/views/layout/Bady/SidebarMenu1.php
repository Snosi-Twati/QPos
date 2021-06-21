<!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">القائمة الرئيسية  </li>
            

            <?PHP
            $FunctionList   =   $this->Desg->FunctionList();
            
            foreach ($FunctionList as $key => $valueFun) { 
            
                if($key=="ProcessControlDatabases"){
                }elseif($key=="UnauthorizedAccess"){
                }elseif($key=="pg404"){
                }elseif($key=="Login"){
                }elseif($key=="Main"){
                }elseif($key=="AccessDenied"){
                }elseif($key=="AccessDenied"){
                }else{
                    
                    
                   echo "<li >
                            <a href=\"#\">
                                <i class=\"fa fa-dashboard\"></i> <span>" .$this->Desg->LebalName($key)."</span> <i class=\"fa fa-angle-left pull-left\"></i>
                            </a>
                            <ul class=\"treeview-menu \" style=\"display: NONE;\">";
                                foreach ($valueFun as $value) {

                                    echo    "<li>"
                                                ."<a href=\"". base_url() ."". $key."/".$value.".aspx\">"
                                                    . "<i class=\"fa fa-circle-o\">"
                                                    . "</i> " .$this->Desg->LebalName($key."".$value) .""
                                                ."</a>"
                                           ."</li>";
                                } 
                   echo     "</ul> 
                        </li>";
                }        
            } 
            ?>
           
        </ul>
          <!-- End sidebar menu: : style can be found in sidebar.less -->