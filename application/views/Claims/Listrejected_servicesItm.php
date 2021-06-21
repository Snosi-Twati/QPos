
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">مرفوضات</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP 

            $this->Desg->SwitchDataTo($Ar,'ClaimServiceID','list_dtl_service','ServiceName','ClaimServiceID');
            $this->Desg->SwitchDataTo($Ar,'rj_id','reasons_for_rejection_view','reasons','id');
                        
            
            $ViewFd['ClaimServiceID']           ='ClaimServiceID';
            $ViewFd['rj_id']                    ='rj_id';

            $cond['ClaimID']=$this->input->get('ClaimID');
            $ser=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('claimsdetails','ClaimServiceID',$cond);
            $condrj=" ClaimServiceID ".$this->Pros->Make_Value_in_SQL_IN($ser,'ClaimServiceID');
            $this->Desg->ViewDataWithExRowWithMultiCond('rejected_services',false,$ViewFd,$Ar,$condrj);
           
                      
            ?>
        </div>
    </div>
