<link rel="stylesheet" href="../../plugins/select2/select2.min.css">
<section class="content">
         
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title"> </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="form-group">
                              
                               <?PHP 
				
                               $this->Desg->LookUps_Form_With_DropDown($A,'diagnosis','DiagnosisID','DiagnosisName','DiagnosisID','DiagnosisID');
                                 
			     $AryC["DiagnosisID like"]="%%";
                
                               //$this->Desg->Create_Form_With_DropDown_change_actionto($A,"Services/ServicesandDiagnosis?List=show","show",$AryC);
                               
                               $Diagnosis=$this->input->post('DiagnosisID');
                             
                               
                                ?>
                                
                            </div>
                </div>
            </div>
        </div>
    
                <div class="row" <?PHP if($this->input->get('List')=='show'){ ?> style="display: none; " <?PHP } ?>>
        
        <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">قائمة الخدمات </h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                   <div class="col-md-8">
                            <div class="form-group">
               
            
             
          
       <?php echo form_open(base_url()."Services/add_diagnosiswithservice"); ?>
                    
                 
                    <select multiple  name="ServiceID[]" class="myselect"   style="width:30%;" >
                   
                  <?php
                        foreach ($states as $key => $value) {
                            echo "<option value='".$value->ServiceID."'>".$value->ServiceArabicName."</option>";
                       
                            }
                            
                     ?>
                </select>
			<div>

                  <button class="btn btn-primary">Submit</button>
			</div>
                <?php echo form_close(); ?> 
         
                  
                            </div><!-- /.form-group -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</section>
<script type="text/javascript">
$(".myselect").mousedown(function(e){
    e.preventDefault();
    
    var select = this;
    var scroll = select.scrollTop;
    
    e.target.selected = !e.target.selected;
    
    setTimeout(function(){select.scrollTop = scroll;}, 0);
    
    $(select).focus();
}).mousemove(function(e){e.preventDefault()});
</script>

