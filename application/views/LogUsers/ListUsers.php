<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">قائمة المستخدمين</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?PHP echo form_open('Login/ListUsers?ContactID=10000003');?>
                <div class="col-md-3">
                    <div class="input-group" style="margin: 4px;">
                        <span class="input-group-addon">
                            <label for="ServiceID">
                                <a class="fa fa-user"></a>
                            </label>
                        </span>
                        <button type="submit" required="required" class="form-control btn btn-primary">مستخدم الشركة</button>
                            
                        <span class="input-group-addon"></span>
                    </div>
                
                </div>
                <?PHP echo form_close();?>
                <?PHP echo form_open('Login/ListUsers?ContactID=10000004');?>
                <div class="col-md-3">
                    <div class="input-group" style="margin: 4px;">
                        <span class="input-group-addon">
                            <label for="ServiceID">
                                <a class="fa fa-user"></a>
                            </label>
                        </span>
                        <button type="submit" required="required" class="form-control btn btn-primary">مستفيد من التامين</button>
                            
                        <span class="input-group-addon"></span>
                    </div>
                
                </div>
                <?PHP echo form_close();?>
                <?PHP echo form_open('Login/ListUsers?ContactID=10000005');?>
                <div class="col-md-3">
                    <div class="input-group" style="margin: 4px;">
                        <span class="input-group-addon">
                            <label for="ServiceID">
                                <a class="fa fa-user"></a>
                            </label>
                        </span>
                        <button type="submit" required="required" class="form-control btn btn-primary">مستخدم شركة تداوي</button>
                            
                        <span class="input-group-addon"></span>
                    </div>

                </div>
                <?PHP echo form_close();?>
                <?PHP echo form_open('Login/ListUsers?ContactID=10000013');?>
                <div class="col-md-3">
                    <div class="input-group" style="margin: 4px;">
                        <span class="input-group-addon">
                            <label for="ServiceID">
                                <a class="fa fa-user"></a>
                            </label>
                        </span>
                        <button type="submit" required="required" class="form-control btn btn-primary">مستخدم شركة مستفيدة</button>    
                        <span class="input-group-addon"></span>
                    </div>

                </div>
                <?PHP echo form_close();?>
                <?PHP echo form_open('Login/ListUsers?ContactID=10000012');?>
                <div class="col-md-3">
                    <div class="input-group" style="margin: 4px;">
                        <span class="input-group-addon">
                            <label for="ServiceID">
                                <a class="fa fa-user"></a>
                            </label>
                        </span>
                        <button type="submit" required="required" class="form-control btn btn-primary">مستخدم شركة تامين</button>    
                        <span class="input-group-addon"></span>
                    </div>

                </div>
                <?PHP echo form_close();?>
            </div>
        </div>
    </div>
</section>