<section class="content">
            
        
        <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">زيارات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>رقم الزيارة</th>
                                <th>تاريخ الزيارة</th>
                                <th>سبب الزيارة</th>
                                <th>الخدمة</th>
                                <th>السعر</th>
                                <th>ملاحظة</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?PHP 
                            for($i=0 ;$i< rand(10,5000);$i++){
                            ?>
                            <tr>
                                <td> <?PHP echo rand(10,5000); ?> </td>
                                <td>Internet Explorer 4.0 <?PHP echo rand(10,5000); ?></td>
                                <td>Win 95+ <?PHP echo rand(10,5000); ?></td>
                                <td> Trident <?PHP echo rand(10,5000); ?></td>
                                
                                <td><?PHP echo rand(10,500); ?></td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-primary fa fa-plus" >
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?PHP } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>رقم الزيارة</th>
                                <th>تاريخ الزيارة</th>
                                <th>سبب الزيارة</th>
                                <th>الخدمة</th>
                                <th>السعر</th>
                                <th>ملاحظة</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->