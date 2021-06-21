

<!--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>-->
<!--<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">-->



 <?PHP 
        $hiddenField['BeneficiaryID']           =   $this->input->post('BeneficiaryID');
        //View Field
        //$typ['CompanyType']                     =   1;
        //$typ    =   '1';
        $ViewFld['CountryName']              =   'CountryName';
        $this->Desg->LookUps($A,'CountryName','CountryName','CountryID','countries',0);
        echo $this->Desg->Create_From_Tabels('countries',FALSE,FALSE,'ProcessControlDatabases/CreateClaims',"مطالبة جديدة",$A,$ViewFld);
    ?>
<?php
$attributes = array('method' => 'GET');
echo form_open('map/Maps', $attributes);
?>
<div class="panel-body">

   
    
    
    
    <div class="form-group">
        <label for="title">Select Country:</label>
            <select id="f_state" name="f_state" class="form-control" style="width:350px">
                <option value="">--- Select Country Name ---</option>
                <?php
                foreach ($countries as $key => $value) {
                    echo "<option value='".$value->CountryID."'>".$value->CountryName."</option>";
                }
                ?>
            </select>
    </div>

    <div class="form-group">
        <label for="title">Select City :</label>
            <select name="city"  id ="city" class="form-control" style="width:350px">

            </select>


        
    </div>

</div>
<?PHP $this->AjaxAction->FillMapWithSelect('city','LocationCompany','CityID',1,'CompanyArabicName','Phone','Email','lat','log','lat_city','lng_city'); ?>
<?PHP $this->AjaxAction->FillSelectJS('cities','CountryID',0,'CityName','CityID','f_state','city'); ?>

