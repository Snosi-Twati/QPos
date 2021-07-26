<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">منتج</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                $this->Desg->LookUps($A,'unit_id','unit_name','id','unit',0);
                $this->Desg->LookUps($A,'category_id','category_name','id','category',0);
                $this->Desg->LookUps($A,'cor_id','country_name','id','country',0);
                
//                $A=false;
                $this->Desg->Create_From_Tabels_With_Ajax("product",false,false,"ProcessControlDatabases/ProConDBinByAjax","حفظ",$A);  
                ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">قائمة منتجات</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <?PHP
                //$this->load->model('Desg');
                $this->Desg->ViewData("product");  
                ?>
                
            </div>
        </div>
    </div>
</section>