<section class="content">
    <div class="row">
    <?PHP 
        $this->Desg-> LookUps_Form_With_DropDown($name,'services','ServiceID','ServiceArabicName','ServiceID','ServiceID');
        //$Cond['EmployeeID']=$this->session->userdata('ContactID');
        $AryCond['ParentID !=']  =   '0';
        $this->Desg->Create_Form_With_DropDown($name,"Clinics/ClinicsDetails","تخصصات",$AryCond,FALSE);
    ?>  
        
        
        
    <?PHP
//        if($this->input->post('CountryID')!=null){
//            if(isset($AryCond))
//                unset($AryCond);
//            if(isset($name))
//                unset($name);
//            $this->Desg-> LookUps_Form_With_DropDown($name,'cities','CityID','CityName','CityID','CityID');
//            //$Cond['EmployeeID']=$this->session->userdata('ContactID');
//            $AryCond['CountryID']  =   $this->input->post('CountryID');
//            $this->Desg->Create_Form_With_DropDown($name,"Clinics/ClinicsDetails","عرض المصحات  ",$AryCond,FALSE);
//        }
    ?>
    </div>
    <div class="row">
                <?PHP 
                
                if($Clinics){ ?>
                <!-- Left col -->
                <div class="col-md-9">
                    <!-- MAP & BOX PANE -->
                    <?PHP foreach ($Clinics as $key => $value) { ?>
                    <div class="box box-primary collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?PHP echo $value['CompanyArabicName'].'-'.$value['CompanyEnglishName']; ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="pad">
                                      <!-- Map will be created here -->
                                        <div id="world-map-markers" style="height: 455px;  ">
                                            
                                           <?PHP echo $value['GooGleMaps']; ?> 
                                        </div>
                                    </div>
                                </div><!-- /.col EL TRON CARD PRINTERP420i M-->
                                <div class="col-md-3 col-sm-4">
                                    <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                        
                                        
                                        <div class="description-block">
                                            <div class="sparkbar pad" data-color="#fff"><canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas></div>
                                                <h5 class="description-header">عنوان :1 <?PHP echo $value['AddressLine1']; ?></h5>
                                                <h5 class="description-header">عنوان:2 <?PHP echo $value['AddressLine2']; ?></h5>
                                           
                                        </div><!-- /.description-block -->
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- /.row -->
                    <?PHP } ?>
                </div>
                <!-- /.col -->
                <?PHP } ?>
    </div>
</section>