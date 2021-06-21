
<section class="content ">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">اضافة خدمات</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP 
            $this->Desg->LookUps($A,'ServiceID','ServiceArabicName','ServiceID','arc_services',0);
            
            
            $ViewFd['InvoiceNumber']                ='InvoiceNumber';
            $ViewFd['ServiceID']                    ='ServiceID';
            $ViewFd['ClinicServiceAmount']          ='ClinicServiceAmount';
            $ViewFd['ApprovedServiceAmount']        ='ApprovedServiceAmount';
            $ViewFd['rejectedServiceAmount']        ='rejectedServiceAmount';

            $ReloadDiv['id']    ='#ServicesList';
            $ReloadDiv['url']   ='Claims/ListServicesItmClaims';
            
            $this->Desg->Create_From_Tabels_With_Ajax('arc_claimsdetails',false,false,'ProcessControlDatabases/ProConDBinByAjax','اضافة مطالبة',$A,$ViewFd,false,false,$ReloadDiv);
           
            ?>
        </div>
    </div>
    <div id="ServicesList">
        
    </div>
</section>