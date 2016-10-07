<div class="info">
	<?php echo $this->session->flashdata('info'); ?>
</div>
<div class="alert	 alert-info">
	<i class="fa fa-info"></i> Silahkan ubah data diri anda 
</div>
<div class="col-lg-6">
	<form action="" method="POST">
		<div class="form-group">
			<label for="" class="control-label">Nama : </label>
			<input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email : </label>
			<input type="email" name="email" class="form-control" value="<?php echo $user->email ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Username : </label>
			<input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">
		</div>
		<div class="form-group">
			<div class="well well-sm">
				<button type="submit" name="edit_user" class="btn btn-primary">Edit User</button>
			</div>
			
		</div>
	</form>
</div>

<script>
	$(function(){
		$(".info").delay(2000).fadeOut(500);
	})
</script>