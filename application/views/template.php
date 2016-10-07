<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ucwords($title) ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="http://localhost/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/assets/font-awesome/css/font-awesome.min.css">
	
	<!-- datatables -->
	<link rel="stylesheet" href="http://localhost/assets/datatables/dataTables.bootstrap.css">

	<!-- jQuery Bootstrap -->
	<script src="http://localhost/assets/jQuery-2.1.4.min.js"></script>
	<script src="http://localhost/assets/bootstrap/js/bootstrap.min.js"></script>
	
	<style>
		body{
			margin-top : 15px;
			background : url("<?php echo base_url('img/background.jpg') ?>") center center no-repeat fixed;
		}

		#sidebar
		{
			height: 100%;
			border-right-width: 1px;
			border-right-style: dashed;
		}

		.header {
			width : 100%;
			height : 200px;
			border-width : 1px;
			border-style: solid;
			border-color : #DDDDDD;
			color : white;
			padding-left : 10px;
			background-color: white;
		}

		.content-wrap .panel {
			border-radius: 0px; 
		}

		.tanggal{
			margin-top : 10px;
			margin-bottom : 10px;
			margin-left : 10px;
		}

		.content { 
			margin-top : 10px;
		}

		.title 
		{
			width :100%;
			display: block;
			background-color: #DDDDDD;
		}

		@media (max-width : 768px) {
			#sidebar {
				display: none;
			}
		}
	</style>

</head>
<body>
	<div class="container">
		<div class="header">
			<?php echo $_header ?>
		</div>
		<div class="content-wrap">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<!-- sidebar -->
						<div class="col-lg-3">
							<div id="sidebar">
								<?php echo $_sidebar ?>		
							</div>
						</div>
						<!-- End sidebar -->
						
						<!-- COntent -->
						<div class="col-lg-9">
							<legend><?php echo ucwords($title) ?></legend>
							<div class="content container-fluid">
								<?php echo $_content ?>	
							</div>
						</div>
					</div>	
				</div>
				<div class="panel-footer">
					<small><b><center> Copyright @ <?php echo date('Y') ?>. PAMSIMAS. Powered By. Bootstrap</center></b></small>
				</div>
			</div>
		</div>
	</div>


	<script src="http://localhost/assets/datatables/jquery.dataTables.min.js"></script>
	<script src="http://localhost/assets/datatables/dataTables.bootstrap.min.js"></script>	

	<script>	
		$(function(){
			$("#datatable").dataTable();
		})
	</script>
		
	<script>

	  function hapus(link, id)
	  {
	  	$(document).ready(function(){
	  		$.ajax({
	  			url : link,
	  			type : "POST",
	  			data : {id : id},
	  			success : function(){
	  				$(".id-"+id).fadeOut(500);
	  			}
	  		})
	  	})
	  }
	</script>
</body>
</html>