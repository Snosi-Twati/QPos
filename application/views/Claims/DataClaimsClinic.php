<section class="content ">
    <?PHP
    if($this->input->post('BeneficiaryID')!=null)
            $this->MedicateMdl->InfoBoxBeneficiary($this->input->post('BeneficiaryID'));
    ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">مطالبة جديدة</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?PHP 
            
            if($this->input->post('BeneficiaryID')==null){
                $ViewFld['BeneficiaryID']               =   'BeneficiaryID';
                $this->Desg->Create_From_Tabels('claims',FALSE,FALSE,'Claims/DataClaimsClinic',"تاكد من البطاقة",FALSE,$ViewFld,FALSE,FALSE);
            }elseif($this->input->post('BeneficiaryID')!=null){
                $cardstatus=$this->Pros->Get_JustValue_Filed_AQ(    'cardstatus',
                                                                    'CardStatusName'     ,

                                                                    'CardStatusID',$this->Pros->Get_JustValue_Filed_AQ(
                                                                            'beneficiariescards',
                                                                            'CardStatus'     ,
                                                                            'CardID',$this->input->post('BeneficiaryID')));
                $type=$this->Pros->Get_JustValue_Filed_AQ('beneficiariescards',
                                                    'CardStatus'     ,
                                                    'CardID',$this->input->post('BeneficiaryID'));
                if($type==1){
                    $this->Pros->Messagealert($type,$cardstatus);
                    $cflds['StratDate <=']          =   date('Y-m-d');
                    $cflds['EndDate >=']            =   date('Y-m-d');
                    $cflds['BeneficiaryCompanyID']  =   substr($this->input->post('BeneficiaryID'), 0, 4);
                    $contracts                      =   $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','*',$cflds);

//                    $cflds['ContractID']=$this->input->post('ContractID');
//                    $contracts = $this->Pros->Get_Filed_AQ_Multi_Cond_Ary('contracts','*',$cflds);

                    //hidden Field
                    $hiddenField['BeneficiaryCompanyID']    =   $contracts[0]['BeneficiaryCompanyID'];
                    $hiddenField['ContractID']              =   $contracts[0]['ContractID'];
                    $hiddenField['ClaimDate']               =   date('Y-m-d H:i:s');
                    $hiddenField['CurrencyID']              =   $contracts[0]['LocalCurrencyPercentage'];
                    $hiddenField['BeneficiaryShare']        =   $contracts[0]['BeneficiaryShare'];
                    $hiddenField['ClientShare']             =   $contracts[0]['Party2Share'];
                    if( $this->Pros->Get_JustValue_Filed_AQ('users','ClinicEmployee'     ,'ContactID',$this->session->userdata('ContactID'))==1)
                        $hiddenField['ClinicID']            =   $this->Pros->Get_JustValue_Filed_AQ('companiesemployees','CompanyID','EmployeeID',$this->session->userdata('ContactID'));
                    
                    $hiddenField['BeneficiaryID']           =   $this->input->post('BeneficiaryID');
                    //View Field
                    //$typ['CompanyType']                     =   1;
                    $typ='CompanyType in (1,2)';
                    $ViewFld['BeneficiaryID1']              =   'BeneficiaryID1';
                    $this->Desg->LookUpsWithCond($A,'ClinicID','CompanyArabicName','CompanyID','companies',$typ);
                    //$FldFrg
                    //$this->Desg->LookUps($FldFrg,'ClinicID','CompanyArabicName','CompanyID','companies',0);
                    if( $this->Pros->Get_JustValue_Filed_AQ('users','Employee'     ,'ContactID',$this->session->userdata('ContactID'))==1)
                        $ViewFld['ClinicID']               =   'ClinicID';
                        $ViewFld['ProductionCode']         =   'ProductionCode';
                        $this->Desg->Create_From_Tabels('claims',FALSE,FALSE,'ProcessControlDatabases/DataClaimsClinic',"مطالبة جديدة",$A,$ViewFld,FALSE,$hiddenField);

                }else{
                    $type=FALSE;
                    $this->Pros->Messagealert($type,$cardstatus);
                }
                ?>

            <?PHP
                }
            ?>
        </div>
    </div>
</section>