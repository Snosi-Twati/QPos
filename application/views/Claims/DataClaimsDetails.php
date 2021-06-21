<section class="content">
    
         <?PHP  foreach ($claimsdetails as $value) { ?>
    <div class="row">
            <div class="col-xs-4">
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?PHP echo " CS. No.  ". $value['ClaimServiceID']; ?></h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-primary" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-info">
                                    <a href="javascript::;" class="product-title">  <?PHP echo $this->Pros->Get_JustValue_Filed_AQ('services','ServiceArabicName','ServiceID',$value['ServiceID']); ?> <span class="label label-warning pull-right" style="font-size: 18px;">$<?PHP echo $value['NumberValue']; ?></span></a>
                                    <span class="product-description">
                                        <?PHP echo $value['ServiceDate']; ?> - 
                                        <?PHP echo $value['ServiceTime']; ?>
                                    </span>
                                </div>
                            </li><!-- /.item -->
                        </ul>
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::;" class="uppercase"></a>
                    </div><!-- /.box-footer -->
                </div>
            </div>
            <div class="col-xs-8">
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border" style="padding:3px;">
                        <?php 
                            $hidden = array(
                                'ClaimServiceID'    =>      $value['ClaimServiceID'] ,
                                'TBL'               =>      'claimsdetails',
                                'Url'               =>      uri_string());
                            echo form_open('ProcessControlDatabases/MedicalApprovalBy','',$hidden); ?>
                            <button class="btn btn-primary " style="float: right; background-color:green;"  >
                            <i class="fa fa-check ">أعتماد طبي</i></button>  
                            <?php echo form_close(); ?>
                        <?php 
                            $hidden = array(
                                'ClaimServiceID'    =>      $value['ClaimServiceID'] ,
                                'TBL'               =>      'claimsservicesissues',
                                'Url'               =>      uri_string());
                            echo form_open('Claims/ClaimsServicesIssues.aspx','',$hidden); ?>
                            <button class="btn btn-primary " style="float: right; background-color: red;"  >
                            <i class="fa fa-pencil">ملاحظة</i></button>  
                            <?php echo form_close(); ?>
                        
                            <button class="btn btn-primary" data-widget="collapse">
                                
                              <i class="fa fa-plus"></i></button>
                            
                        
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <div class="grid-container">
                                <div class="grid-width-100">
                                    
                                        <?PHP echo $value['TextValue']; ?>
                                </div>
                            </div>
                        </ul>
                    </div><!-- /.box-body -->
                </div>
            </div>
    </div>
        <?PHP } ?>
    
    
</section><!-- /.content -->