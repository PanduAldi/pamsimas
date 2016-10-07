 <div class="info">
 	<?php echo $this->session->flashdata('info'); ?>
 </div>
 <div class="alert alert-info">
 	Silahkan masukan password baru anda
 </div>

<div class="col-lg-6">
	<form action="" method="post" class="name">
		<div class="form-group">
			<label for="" class="control-label">Password Baru</label>
			<input type="password" name="new" class="form-control new">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Konfirmasi Password</label>
			<input type="password" name="conf" class="form-control conf">
		</div>
		<div class="form-group">
			<button type="submit" name="ganti" class="btn btn-primary">Ganti Password</button>
		</div>
	</form>
	
</div>


<script>
	$(function(){
		$(".name").submit(function(){
			var a = $(".new").val();
			var b = $(".conf").val();

			if(a != b)
			{
				alert("Konfirmasi password harus sama");
				return false;
			}
			else
			{
				return true;
			}
		});
	})
</script>

<script>
	$(function(){
		$(".info").delay(2000).fadeOut(500);
	})
</script>