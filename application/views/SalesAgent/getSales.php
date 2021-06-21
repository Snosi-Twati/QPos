<section class="content">
        
    
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">عرض المطالبات </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP 
                        
                        $Cond['ContactID']=$this->session->userdata('ContactID');
					    $CondAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('users','ContactID',$Cond);
                        $CondVl=$this->Pros->Make_Value_in_SQL_IN($CondAry,'ContactID');
   						$Com="EmployeeID".$CondVl;
						
                        $salesAgen =$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('users','SalesAgent',$Cond);
						if($salesAgen==1)
					  {
					    $ComAry=$this->Pros->Get_Filed_AQ_Multi_Cond_Ary('companiesemployees','CompanyID',$Com);
                        $ComdVl=$this->Pros->Make_Value_in_SQL_IN($ComAry,'CompanyID');
                      	$AryCom="ClinicID".$ComdVl;
						$this->Desg->ExCol($ArrCol,'تفاصيل','claims','ClaimID','IDdetails','SalesAgent/getSales?List=details','fa fa-eye','Green');
						
						$Fld['ClaimID']         ='ClaimID';
						$Fld['ClaimDate']       ='ClaimDate';
						$Fld['ApprovedAmount']  ='ApprovedAmount';
						
				     	$this->Desg->ViewDataWithExRowWithMultiCond('claims',$ArrCol,$Fld,FALSE,$AryCom);  
						
						//$this->Desg->ViewData("claims",$Fld,FALSE,$AryCom);
						
						
						 ?>
						
						
						
			  <?PHP
                if($this->input->post('IDdetails')!=NULL) 
     			   {
                ?>
		          <div class="box" <?PHP if($this->input->get('List')!='details'){ ?> style="display: none; " <?PHP } ?> >
                    <div class="box-header">
                      <h3 class="box-title">عرض تفاصيل المطالبة  </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?PHP
						$Claim['ClaimID']=$this->input->post('IDdetails');
					  
					  $MedicalApproval=$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claimsdetails','MedicalApprovalBy',$Claim);
                      echo $MedicalApproval ;
					  if($MedicalApproval!=0)
					   {
						
						$this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
						$Fld['ClaimServiceID']               ='ClaimServiceID';
						$Fld['ServiceID']                    ='ServiceID';
						$Fld['TextValue']                    ='TextValue';
						$Fld['ApprovedServiceAmount']        ='ApprovedServiceAmount';
						$Fld['ServiceDate']                  ='ServiceDate';
						
						$this->Desg->ViewData("claimsdetails",$Fld,$Ar,$Claim);
						}
						
                        ?>
                    </div>
			     </div>
                <?PHP } ?>
                
                   
						
					 
                     
                
            </div>
        </div>
						
					<?PHP } ?>	
						
                 </div><!-- /.box-body -->
               </div><!-- /.box -->
            </div><!-- /.col -->
         </div><!-- /.row -->
</section><!-- /.content -->