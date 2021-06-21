<section class="content">       
    
    <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">بيانات المطالبات </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>رقم المطلبة</th>
                            <th>تاريخ المطالبة</th>
                            <th>المستفيد</th>
                            <th>المصحة</th>
                            <th>المبلغ</th>
                            <th>العملة</th>
                            <th>حصة المستفيد</th>
                            <th>حصة الشركة</th>
                            <th>الحالة</th>
                            <th>تفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP for($i=0 ;$i< rand(10,5000);$i++){?>
                        <tr>

                            <td>Trident <?PHP echo rand(10,5000); ?> </td>
                            <td>Internet Explorer 4.0 <?PHP echo rand(10,5000); ?></td>
                            <td>Win 95+ <?PHP echo rand(10,5000); ?></td>
                            <td> 4 <?PHP echo rand(10,5000); ?></td>
                            <td>X <?PHP echo rand(10,5000); ?></td>
                            <td>Trident<?PHP echo rand(10,5000); ?></td>
                            <td>Internet Explorer 4.0 <?PHP echo rand(10,5000); ?></td>
                            <td>Win 95+ <?PHP echo rand(10,5000); ?></td>
                            <td> 
                                <?PHP if(rand(10,5000)%2){?> <a class="fa fa-check-circle" style="color:  #00ca6d; font-size: 28px;" ></a><?PHP }else{ ?> <a class="fa  fa-exclamation-circle" style="color:  #dd4b39; font-size: 28px;" ></a> <?PHP } ?>
                            </td>
                            <td> 
                                <?PHP echo form_open('Claims/ViewDataClaims#EditClaim'); ?>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary fa fa-bars"   ></button>
                                </div>
                                <?PHP echo form_close(); ?>
                            </td>
                        </tr>
                        <?PHP } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>رقم المطلبة</th>
                        <th>تاريخ المطالبة</th>
                        <th>المستفيد</th>
                        <th>المصحة</th>
                        <th>المبلغ</th>
                        <th>العملة</th>
                        <th>حصة المستفيد</th>
                        <th>حصة الشركة</th>
                        <th>الحالة</th>
                        <th>تفاصيل</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->