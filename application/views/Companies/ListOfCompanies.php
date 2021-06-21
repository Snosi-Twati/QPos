<section class="content">
        <div class="row">
            <div class="col-xs-12">  
                <?PHP for($i=0;$i<rand(10,40);$i++){?>
                <div class="box box-primary collapsed-box">
                    
                    <div class="box-header with-border">
                        <h3 class="box-title"  style="width: 100%;"> <div class="col-md-3" >المؤسسة  <?PHP echo rand(10,400); ?></div><div class="col-md-6" >مدة العقد  <?PHP echo rand(1,30); ?>/<?PHP echo rand(1,12); ?>/<?PHP echo rand(2016,2014); ?> الي <?PHP echo rand(1,30); ?>/<?PHP echo rand(1,12); ?>/<?PHP echo rand(2016,2014); ?> </div></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                        </div>
                    </div>
                    
                    <div class="box-body">
                  
                    <div class="col-xs-12">
                        <div class="col-md-2" >
                            <div class="input-group">
                                <label>مطالبات مسددة</label>
                                <input class="form-control" type="number" value="<?PHP echo rand(10,400); ?>" disabled="true">
                            </div>
                        </div>
                        <div class="col-md-1" >
                            <label>تفاصيل</label>
                            <?PHP echo form_open("Claims/AccountStatementInc")?>
                            <div class="input-group">
                                <button class="btn btn-primary fa fa-bars"   ></button>
                            </div>
                            <?PHP echo form_close(); ?>
                        </div>
                        <div class="col-md-2" >
                            <label>تفصيل الدفعات</label>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-money"   ></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-md-2" >
                            <div class="input-group">
                                <label>مطالبات طور الادخال</label>
                                <input class="form-control" type="number"  value="<?PHP echo rand(10,400); ?>" disabled="true">
                            </div>
                        </div>
                        <div class="col-md-1" >
                            <label>تفاصيل</label>
                            <?PHP echo form_open("Claims/AccountStatementInc")?>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-bars"   ></button>
                            </div>
                            <?PHP echo form_close(); ?>
                            
                        </div>
                        <div class="col-md-2" >
                            <label>تفصيل الدفعات</label>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-money"   ></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-md-2" >
                            <div class="input-group">
                                <label>مطالبات طور المراجعةل</label>
                                <input class="form-control" type="number"  value="<?PHP echo rand(10,400); ?>" disabled="true">
                            </div>
                        </div>
<!--                        <div class="col-md-1" >-->
                            <div class="col-md-1" >
                            <label>تفاصيل</label>
                            <?PHP echo form_open("Claims/AccountStatementInc")?>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-bars"   ></button>
                            </div>
                            <?PHP echo form_close(); ?>
                        </div>
                        <!--</div>-->
                        <div class="col-md-2" >
                            <label>تفصيل الدفعات</label>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-money"   ></button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12">
                        <div class="col-md-2" >
                            <div class="input-group">
                                 <label>مطالبات متوقفة</label>
                                <input class="form-control" type="number"  value="<?PHP echo rand(10,400); ?>" disabled="true">
                            </div>
                        </div>
                        <!--<div class="col-md-1" >-->
                            <div class="col-md-1" >
                            <label>تفاصيل</label>
                            <?PHP echo form_open("Claims/AccountStatementInc")?>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-bars"   ></button>
                            </div>
                            <?PHP echo form_close(); ?>
                        </div>
                        <!--</div>-->
                        <div class="col-md-2" >
                            <label>تفصيل الدفعات</label>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-money"   ></button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12">
                        <div class="col-md-2" >
                            <div class="input-group">
                                 <label>مطالبات لم تسدد بعد</label>
                                <input class="form-control" type="number"  value="<?PHP echo rand(10,400); ?>" disabled="true">
                            </div>
                        </div>
                        <!--<div class="col-md-1" >-->
                            <div class="col-md-1" >
                            <label>تفاصيل</label>
                            <?PHP echo form_open("Claims/AccountStatementInc")?>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-bars"   ></button>
                            </div>
                            <?PHP echo form_close(); ?>
                        </div>
                        <!--</div>-->
                        <div class="col-md-2" >
                            <label>تفصيل الدفعات</label>
                            <div class="input-group">
                                    <button class="btn btn-primary fa fa-money"   ></button>
                            </div>
                        </div>
                    </div>       
                        
                    </div>       
                </div>
                    <!-- /.item -->
                <?PHP } ?>    
                  
                <!-- /.box-body -->
                
              </div>
           </div>
    
    </section><!-- /.content -->