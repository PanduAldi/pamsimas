<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="http://localhost/assets/cosmo.min.css">
	<link rel="stylesheet" href="http://localhost/assets/font-awesome/css/font-awesome.min.css">

	<script src="http://localhost/assets/jQuery-2.1.4.min.js"></script>
	<script src="http://localhost/assets/assets/bootstrap/js/bootstrap.min.js"></script>
	
	<style>
		body 
		{
			margin-top : 50px;
			background-color: grey;
			color : white;
		}	

		.login-box {
			width: 500px;
			margin-left : 320px; 
			color : black;
		}	

		.border-form{
			border-width: 2px;
			
		}

		@media(max-width: 768px){
			.login-box {
				width: 100%;
				margin-left :0px;
			}
		}
	</style>

</head>
<body>
	<div class="container login">
		<div class="header" align="center">
			<h3>Selamat Datang di SIPP <br> Sistem Informasi Pembayaran PAMSIMAS <br> BPSPAMS TIRTA ALAMI</h3>
		</div>
		<div class="login-box">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="info">
						<?php echo $this->session->flashdata('info'); ?>
					</div>
					<h4 align="center" class="text-login"> Silahkan Login Terlebih Dahulu</h4>
					<form action="" method="POST" class="border-form">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
							</div>	
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
							</div>	
						</div>
						<div class="form-group">
							<button type="submit" name="login" class="btn btn-primary"> <i class="fa fa-sign-in"></i> Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>

			<p><small><center>Copyright @ <?php echo date("Y") ?> PAMSIMAS. Developed By IT Team</center></small></p>
	</div>


</body>

<script>
	$(document).ready(function(){
		$('.info').delay(3000).fadeOut(500);
	
		$("#klik").click(function(){
			$("#list").toggle(400);
		});

		$(".form-control")[0].focus();
	});
</script>
</html>