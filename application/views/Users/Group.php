<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">دول</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    //$this->Desg->LookUps($A,'UserID','FirstName','ContactID','users',0);
//                    $stut = array(
//                        '1'     =>  'مفعة',
//                        '2'     =>  'موقوفة',
//                        '3'     =>  'ضياع'
//                    );
//                    $this->Desg->LookUpsFrmAry($A,'CardStatus','dropdown',$stut);
                    $this->Desg->Create_From_Tabels_Insrt("usersgroups","","حفظ",0);  
                    ?>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">دول</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                    <?PHP
                    //$this->load->model('Desg');
                    $this->Desg->ViewData("usersgroups");  
                    ?>
                
            </div>
        </div>
    </div>
</section>

