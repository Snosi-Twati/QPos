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
                        $this->Desg->Create_Form_InputFrm('InvoiceNumber',"Claims/DataClaimsListInput?ClaimID=".$this->input->get('ClaimID')."&CompanyID=".$this->input->get('CompanyID')."&InvoiceNumber=".$this->input->get('InvoiceNumber')."","فتح فاتورة",FALSE);
                    }elseif($this->input->post('ClaimID')&&$this->input->post('CompanyID')){
                        $this->Desg->Create_Form_InputFrm('InvoiceNumber',"Claims/DataClaimsListInput?ClaimID=".$this->input->get('ClaimID')."&CompanyID=".$this->input->post('CompanyID')."&InvoiceNumber=".$this->input->post('InvoiceNumber')."","فتح فاتورة",FALSE);
                    }else{
                        $this->Desg->Create_Form_InputFrm('InvoiceNumber',"Claims/DataClaimsListInput?ClaimID=".$this->input->get('ClaimID')."","فتح فاتورة",FALSE);
                    }

                ?>

            </div>
        </div>
        
        
    </div>
    <?PHP } ?>
    
    <?PHP if( $this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee','ContactID',$this->session->userdata('ContactID')) =='1'){?>
    <div class="row ">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">ادخل رقم الفاتورة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?PHP
                
                    if($this->input->get('ClaimID')&&$this->input->get('CompanyID'))
                    {
                        $this->Desg->Create_Form_InputFrm('InvoiceNumber',"Claims/DataClaimsListInput?ClaimID=".$this->input->get('ClaimID')."&CompanyID=".$this->input->get('CompanyID')."&InvoiceNumber=".$this->input->get('InvoiceNumber')."","فتح فاتورة",FALSE);
                    }elseif($this->input->post('ClaimID')&&$this->input->post('CompanyID')){
                        $this->Desg->Create_Form_InputFrm('InvoiceNumber',"Claims/DataClaimsListInput?ClaimID=".$this->input->get('ClaimID')."&CompanyID=".$this->input->post('CompanyID')."&InvoiceNumber=".$this->input->post('InvoiceNumber')."","فتح فاتورة",FALSE);
                    }else{
                        $this->Desg->Create_Form_InputFrm('InvoiceNumber',"Claims/DataClaimsListInput?ClaimID=".$this->input->get('ClaimID')."","فتح فاتورة",FALSE);
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
                        $this->Desg->ExCol($ArrCol,'تعديل'         ,'claimsdetails'        ,'ClaimServiceID'   ,'ClaimServiceID','Claims/DataClaimsDetailsList?List=edit',' fa-pencil-square-o','');
                        $this->Desg->ExCol($ArrCol,'اضافة ملاحظة'   ,'claimsservicesissues' ,'ClaimServiceID'   ,'ClaimServiceID','Claims/ClaimsServicesIssues','fa-plus-circle','Yellow');
                        ////////////////////////////////////////////
                        $Fld['ClaimServiceID']      ='ClaimServiceID';
                        $Fld['ServiceID']           ='ServiceID';
                        $Fld['ClinicServiceAmount'] ='ClinicServiceAmount';
                        $Fld['ServiceDate']         ='ServiceDate';
                        $Fld['ServiceTime']         ='ServiceTime';
                        $Fld['CurrencyID']          ='CurrencyID';
                        ///////////////////////////////////////////
                        $DataKey = array(
                                'name'          => 'ClinicServiceAmount',
                                'id'            => 'ClinicServiceAmount',
                                'type'          => 'text',
                                'required'      => 'required',
                                'class'         => 'form-control',
                                'max'           => ''
                            );
                        
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
                        if($this->input->post('InvoiceNumber')){
                            $hiddenField['InvoiceNumber']   =   $this->input->post('InvoiceNumber');
                            $this->Desg->ViewDataWithExRowWithMultiCondEnterData('contractservices',FALSE,$Ar,FALSE,$DataKey,$hiddenField);
                        }elseif($this->input->get('InvoiceNumber')){
                            $hiddenField['InvoiceNumber']   =   $this->input->get('InvoiceNumber');
                            $this->Desg->ViewDataWithExRowWithMultiCondEnterData('contractservices',FALSE,$Ar,FALSE,$DataKey,$hiddenField);    
                        }
                        ////////////////////////////////////////////?>
                </div><!-- /.box-body -->
                </div><!-- /.box -->        
                        
                        <div class="box">
                <div class="box-header">
                    <h3 class="box-title">بيانات المطالبات </h3>
                </div><!-- /.box-header -->
                    <div class="box-body fa-b ">
                        <?PHP
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                            //$this->Desg->ExCol($ArrCol,'اعتماد طبي'   ,'claimsdetails' ,'ClaimServiceID'   ,'ClaimServiceID','ProcessControlDatabases/MedicalApprovalBy','fa-check','');
                            if($this->session->userdata('ClaimID')){
                                $cod['ClaimID']=$this->session->userdata('ClaimID');
                                $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,$cod); 
                            }          
                        }
                        ////////////////////////////////////////////
                        if($this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'     ,'ContactID',$this->session->userdata('ContactID')) =='1'){
                            if($this->session->userdata('ClaimID')){
                                $cod['ClaimID']=$this->session->userdata('ClaimID');
                                $this->Desg->ViewDataWithExRowWithMultiCond('claimsdetails',$ArrCol,$Fld,$Ar,$cod); 
                            }    
                        }
                        ////////////////////////////////////////////
                        
                        ?>    
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <?PHP if($hiddenField['InvoiceNumber']){ ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">اضافة </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <?PHP
                    $ViewFld['ServiceID']               ='ServiceID';
                    $ViewFld['TextValue']               ='TextValue';
                    $ViewFld['ClinicServiceAmount']     ='ClinicServiceAmount';
                    
                    if($this->input->get('ClaimID')!=null)
                    {
                        $SDATA['ClaimID']                       =$this->input->get('ClaimID');
                        $this->session->set_userdata($SDATA) ;
                        $hiddenField['ClaimID']                 =   $this->session->userdata('ClaimID');
                    }else{
                        $hiddenField['ClaimID']                 =   $this->session->userdata('ClaimID');
                    }
                    
                    $hiddenField['ServiceDate']         =date('Y-m-d');
                    $hiddenField['ServiceTime']         =date('H:i:s');
                    
                    if($this->input->post('ClaimID')!=null){
                        
                        $keepPOST['ClaimID']                ='ClaimID';
                    }else{
                        
                        $keepPOST                           =FALSE;
                        //$ViewFld['ClaimID']                 ='ClaimID';
                    }
                    //$this->Desg->LookUps($A,'CityID','CityName','CityID','cities',0);
                    $this->Desg->LookUps($A,'ServiceID','ServiceArabicName','ServiceID','services',0);
                    
                    $this->Desg->Create_From_Tabels("claimsdetails",FALSE,FALSE,"ProcessControlDatabases/ProConDBin","اضافة خدمة",$A,$ViewFld, $keepPOST,$hiddenField);  
                    ?>

            </div>
        </div>
        <?PHP } ?>
</section>