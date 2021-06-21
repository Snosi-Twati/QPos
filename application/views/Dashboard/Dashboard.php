<section class="content"> 
    
    <div class="row">
        <div class="col-xs-6" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">عدد المطالبات المقبولة و المرفوضة</h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    <?PHP $this->Desg->PassToChartjs($ChartjsG,"FinancialSituation",FALSE,"ClinicClaimAmount"); ?>
                     
                    <?PHP $this->Desg->Graphs("groupclaimsbystate",FALSE,$ChartjsG); ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        
        <div class="col-xs-6" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">القيمة المصروفة و المتبقية </h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    <?PHP $this->Desg->PassToChartjsByColmun($ChartjsGC,"Residual"); ?>
                    <?PHP $this->Desg->PassToChartjsByColmun($ChartjsGC,"Consumer"); ?> 
                    <?PHP $this->Desg->Graphs("ResidualAndConsumer",FALSE,FALSE,$ChartjsGC); ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        
        <div class="col-xs-6" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">اكتر عشر مزودين خدمات نشاطا</h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    <?PHP $this->Desg->PassToChartjs($ChartjsG,"CompanyName",FALSE,"CountOfClaims"); ?>
                     
                    <?PHP $this->Desg->Graphs("TopVenders",FALSE,$ChartjsG); ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        
        <div class="col-xs-6" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">اكتر عشر خدمات </h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    <?PHP $this->Desg->PassToChartjs($ChartjsG,"ServiceName",FALSE,"CountTime"); ?>
                     
                    <?PHP $this->Desg->Graphs("TopService",FALSE,$ChartjsG); ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    
</section><!-- /.content -->