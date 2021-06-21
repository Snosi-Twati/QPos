<section class="content ">
    <?PHP if($this->Pros->Get_JustValue_Filed_AQ('users','Employee','ContactID',$this->session->userdata('ContactID')) =='1'){?>
    <div class="row ">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">ادخل رقم الفاتورة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?PHP 
                    if($this->input->get('ClaimID')&&$this->input->get('CompanyID'))
                    {
                        
                        $this->Desg->Create_Form_InputFrm('ProductionCode',"Claims/DataClaimsDetailsListByInvoiceNumber?ClaimID=".$this->input->get('ClaimID')."&CompanyID=".$this->input->get('CompanyID')."&InvoiceNumber=".$this->input->get('InvoiceNumber')."","فتح فاتورة",FALSE);
                    }elseif($this->input->post('ClaimID')&&$this->input->post('CompanyID')){
                        
                        $this->Desg->Create_Form_InputFrm('ProductionCode',"Claims/DataClaimsDetailsListByInvoiceNumber?ClaimID=".$this->input->get('ClaimID')."&CompanyID=".$this->input->post('CompanyID')."&InvoiceNumber=".$this->input->post('InvoiceNumber')."","فتح فاتورة",FALSE);
                    }else{
                        
                        $this->Desg->Create_Form_InputFrm('ProductionCode',"Claims/DataClaimsDetailsListByInvoiceNumber","فتح فاتورة",FALSE);
                    }

                ?>

            </div>
        </div>   
    </div>
    <?PHP } ?>
    <div class="box">
                <div class="box-header">
                    <h3 class="box-title">بيانات المطالبات </h3>
                </div><!-- /.box-header -->
                    <div class="box-body fa-b ">
                        
                        <?PHP 
                        /////////////////////////////////////////////
                        $this->Desg->SwitchDataTo($Ar,'ServiceID','services','ServiceArabicName','ServiceID');
                        $this->Desg->SwitchDataTo($Ar,'BeneficiaryID','users','FirstName','ContactID');
                        $this->Desg->SwitchDataTo($Ar,'CurrencyID','currencies','CurrencyName','CurrencyID');
                        ////////////////////////////////////////////
                        $this->Desg->ExCol($ArrCol      ,'موافقة'         ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/ApprovedServiceAmount','fa-check-circle-o' ,'green');
                        $this->Desg->ExCol($CallModal   ,'مرفوض'          ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','Claims/ReasonsForRejection'                    ,'fa-stop'          ,'red');
                        ////////////////////////////////////////////
                        $Fld['ClaimServiceID']      ='ClaimServiceID';
                        $Fld['ServiceID']           ='ServiceID';
                        $Fld['ClinicServiceAmount'] ='ClinicServiceAmount';
                        $Fld['ServiceDate']         ='ServiceDate';
                        $Fld['ServiceTime']         ='ServiceTime';
                        $Fld['CurrencyID']          ='CurrencyID';
                        ///////////////////////////////////////////
                        if($this->input->get('ClaimID')!=null)
                        {
                            $SDATA['ClaimID']               =   $this->input->get('ClaimID');
                            $this->session->set_userdata($SDATA);
                            $hiddenField['ClaimID']         =   $this->session->userdata('ClaimID');
                            $hiddenField['InvoiceNumber']   =   $this->input->get('InvoiceNumber');
                        }else{
                            $hiddenField['ClaimID']         =   $this->session->userdata('ClaimID');
                            $hiddenField['InvoiceNumber']   =   $this->input->get('InvoiceNumber');
                        }
                        
                        if($this->input->post('ProductionCode')  || $this->input->post('ClaimID')){
                            $hiddenField['InvoiceNumber']   =   $this->input->post('InvoiceNumber');
//                            $CondCD['InvoiceNumber']        =   $this->input->post('InvoiceNumber');
//                            $CondCD['or ClaimID']           =   $this->input->post('ClaimID');
                            if($this->input->post('ClaimID') && $this->input->post('ProductionCode')){
                                $ProductionCode     =   $this->input->post('ProductionCode');
                                $ClaimID            =   $this->input->post('ClaimID');
                                $CondCD=" ( ProductionCode  LIKE '".$ProductionCode."' or ClaimID   LIKE '".$ClaimID."' ) ";
                            }elseif($this->input->post('ProductionCode')){
                                $ProductionCode     =   $this->input->post('ProductionCode');
                                $CondCD="ProductionCode  LIKE '".$ProductionCode."' ";
                            }elseif($this->input->post('ClaimID')){
                                $ClaimID            =   $this->input->post('ClaimID');
                                $CondCD             =   " ClaimID   LIKE '".$ClaimID."'";
                            }
                            
                            $CondCDs['ClaimID']=$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims','ClaimID',$CondCD);
                            
                            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,$CondCDs,FALSE,FALSE,$CallModal);
                        }elseif($this->input->get('ProductionCode') || $this->input->get('ClaimID')){
                            $hiddenField['ProductionCode']   =   $this->input->get('ProductionCode');
//                            $CondCD['InvoiceNumber']        =   $this->input->get('InvoiceNumber');
//                            $CondCD['or ClaimID']           =   $this->input->get('ClaimID');
                             if($this->input->get('ClaimID') && $this->input->get('ProductionCode')){
                                $ProductionCode     =   $this->input->get('ProductionCode');
                                $ClaimID            =   $this->input->get('ClaimID');
                                 
                                $CondCD="ProductionCode  LIKE '".$ProductionCode."' or ClaimID  LIKE '".$ClaimID."'";
                            }elseif($this->input->get('ProductionCode')){
                                $ProductionCode     =   $this->input->get('ProductionCode');
                                $CondCD="ProductionCode  LIKE '".$ProductionCode."' ";
                            }elseif($this->input->get('ClaimID')){
                                $ClaimID            =   $this->input->get('ClaimID');
                                $CondCD             =   " ClaimID  LIKE '".$ClaimID."'";
                            }
                            $CondCDs['ClaimID']=$this->Pros->Get_JustValue_Filed_AQ_Multi_Cond('claims','ClaimID',$CondCD);
                            $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,$CondCDs,FALSE,FALSE,$CallModal);  
                        }
                        ////////////////////////////////////////////
                        ?>    
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
</section>