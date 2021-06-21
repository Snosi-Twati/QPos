<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

<div id="plupload_container">

	<div id="body">
            
            <?php echo form_open('');?>
            <input type="text" name="name"/>
		

		<div id="filelist">Your browser doesn't have Flashs, Silverlight or HTML5 support.</div>
		<div id="container">
			<div class="form-group">
				<a id="uploadFile" name="uploadFile" href="javascript:;">Select file</a>
			</div>

			<div class="form-group">
				<a id="upload" href="javascript:;" class="btn btn-danger">Upload files</a>
			</div>
		</div>
		<input type="hidden" id="file_ext" name="file_ext" value="<?=substr( md5( rand(10,100) ) , 0 ,10 )?>">
		<div id="console"></div>
                <input type="submit" name="submit"/>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<script type="text/javascript">
	BASE_URL = "<?php echo base_url();?>"
</script>

<!--<script src="<?=base_url();?>public/js/plupload/jquery.ui.plupload/css/jquery.ui.plupload"></script>-->
<script src="<?=base_url();?>public/js/plupload/plupload.full.min.js"></script>


<script type="text/javascript" src="<?=base_url();?>public/js/application.js"></script>
</body>
</html>