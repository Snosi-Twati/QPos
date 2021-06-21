<html lang="en">

<head>

    <title>Jquery Select2 - Select Box with Search Option</title>  

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</head>

<body>

<div style="width:520px;margin:0px auto;margin-top:30px;height:500px;">

  <h2>Select Box with Search Option Jquery Select2.js</h2>
  
  
  
                              <div class="form-group">
               
            
             
          
       <?php echo form_open(base_url()."autocontroller/exx"); ?>
                    

                   <select class="myselect" style="width:500px;"  name="CompanyID" onchange="jsFunction(this.value);"  >
                                 <option value="">--- Select Company ---</option>
	                     <?php
                        foreach ($states as $key => $value) {
                            echo "<option value='".$value->CompanyID."'>".$value->CompanyArabicName."</option>";
                        }
						 
                    ?> 
                  </select>
               <button class="btn btn-primary"style="width:100px;">Submit</button>
                <?php echo form_close(); ?> 
    
				
				
				

<script type="text/javascript">
function jsFunction(value)
{
    alert(value);
}



      $(".myselect").select2({
	   placeholder: "Search And Select ",
       allowClear: true
	});



</script>


</script>

</body>

</html>