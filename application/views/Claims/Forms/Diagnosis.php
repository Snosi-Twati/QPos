<div id="VwDiagnosis">
        <div class="row">
            <div class="col-xs-12" >
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تشخيصات</h3>
                    </div>      <!-- /.box-header -->
                    <div class="box-body">

                        <?PHP 

                        $datav['ClaimID']=$this->input->get('ClaimID');

                        $ary = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claimsdiagnosis','DiagnosisID',$datav);
                        if(is_array($ary))
                        foreach ($ary as $key => $value) {

                            $dataid['DiagnosisID']=$value['DiagnosisID'];

                            $btndata1[]=array(

                                'TID'       =>      'Claim',
                                'ID'        =>      'add',
                                'Title'     =>     $this->Pros-> Get_JustValue_Filed_AQ_Multi_Cond('diagnosis','DiagnosisName',$dataid)
                                );
                        }

                        if( isset($btndata1) )
                            $this->Desg->ListButton($btndata1);

                        ?>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div>
    