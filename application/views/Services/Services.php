<section class="content">
         
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">قائمة بالخدمات </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              
                               <?PHP 
							    $Fld['CompanyID']             ='CompanyID';
								$Fld['ServiceID']             ='ServiceID';
								$Fld['Price']                        ='Price';
								$this->Desg->SwitchDataTo($Flds,'ServiceID','services','ServiceArabicName','ServiceID');
								$this->Desg->SwitchDataTo($Flds,'CompanyID','companies','CompanyArabicName','CompanyID');
								
								$this->Desg->ViewDataWithExRowWithMultiCond('companiesservicesprices',False,$Fld,$Flds); 
								
								
								?>  
                            </div><!-- /.form-group -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        </section><!-- /.content -->