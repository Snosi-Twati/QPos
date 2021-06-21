<div id="VwSymptoms">
    <div class="row">
        <div class="col-xs-12" >
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">الاعراض</h3>
                </div>      <!-- /.box-header -->
                <div class="box-body">
                    
                    <?PHP 
                    
                    $datav['ClaimID']=$this->input->get('ClaimID');
                    
                    $ary = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('SymptomsWithClaim','SymptomsID',$datav);
                    if(is_array($ary))
                    foreach ($ary as $key => $value) {
                        
                        $dataid1['SymptomsID']=$value['SymptomsID'];

                        $btndata2[]=array(

                            'TID'       =>      'Claim',
                            'ID'        =>      'add',
                            'Title'     =>     $this->Pros-> Get_JustValue_Filed_AQ_Multi_Cond('Symptoms','SymptomsName',$dataid1)
                            );
                    }
                      
                    if( isset($btndata2) )
                        $this->Desg->ListButton($btndata2);
                    
                    ?>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>