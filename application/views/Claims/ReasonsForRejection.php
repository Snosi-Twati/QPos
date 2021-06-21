<section class="content ">
    <?PHP //if($this->Pros->Get_JustValue_Filed_AQ('users','Employee','ContactID',$this->session->userdata('ContactID')) =='1'){?>
    <div class="row ">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">اختر الاسباب</h3>
            </div><!-- /.box-header -->
            <div class="box-body"> 
                
                <?PHP 
                $hidden['ClaimServiceID']   =       $this->input->get('ClaimServiceID');
                $hidden['TBL']              =       'claimsdetails';
                echo    form_open("ProcessControlDatabases/FinancialApprovalBy",'',$hidden);
                //var_dump($ReasonsForRejection);
                ?>
                <?PHP if (isset($ReasonsForRejection)&&sizeof($ReasonsForRejection)>=1&&$ReasonsForRejection){ ?>
                <?PHP foreach ($ReasonsForRejection as $key => $value) { ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <span class="input-group-addon"><label for="ServiceID"><?PHP echo $value['ReasonsRejectionName'] ?></label>
                            <input name ="<?PHP echo $value['ReasonsRejectionID'] ?>" value="<?PHP echo $value['ReasonsRejectionID'] ?>" type="checkbox" class="minimal checkbox-toggle" ></span>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <?PHP }?>
                <div class="col-md-2">
                    <div class="input-group" style="margin: 4px;" >
                        <button type="submit" class="btn btn-primary" >رفض للاسباب اعلاه</button>;
                    </div>
                </div>
                <?PHP } ?>
                <?PHP echo    form_close(); ?>
                
            </div>
        </div>
    </div>
    <?PHP //} ?>
</section>