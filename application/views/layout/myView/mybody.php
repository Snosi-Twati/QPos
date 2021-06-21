<htmL>
 <head>
      <link rel="stylesheet" href="<?php echo base_url(); ?>style/plugins/colorpicker/bootstrap-colorpicker.min.css">

 </head>
 <body>
 <table class="table table-striped">
 <thead> 
<tr> 
	 <th>#</th>
	 <th><td>اسم الشركة</td></th>
	 <th><td>اسم المدينة</td></th>
 </tr>
 </thead>
	<tbody>
   
   <tr> 
   <?php
   $db_select = $this->db_data->dbSelect('companies');
   foreach($db_select as $key){
	
	$comId= $key->CompanyID;
	$cityId = $key->CityID;
   ?>
    <th scope="row">1</th> 
	
	<td></td> 
	<td><?php echo $row->CompanyArabicName?></td> 
	<td>
	<?php
	   $db_select = $this->db_data->dbSelect('cities');
	  
	   foreach($db_select as $keyC){
	echo $keyC->CityName;

	
	}
	?>
	</td> 
	
	</tr>


	<?php
	 }
	?>
	
	</tbody> 
 </table>



 </body>
</html>