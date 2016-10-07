<?php echo $this->session->flashdata('info'); ?>
<div class="col-lg-6">
	<form action="" method="post">
		<div class="form-group">
			<label for="" class="control-label">Nama</label>
			<input type="text" class="form-control" name="nama" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="text" name="username" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<div class="input-group">
				<input type="password" name="password" id="password" class="form-control" requried>
				<span class="input-group-btn">
					<button type="button" class="btn btn-success" id="lihat"><i class="fa fa-eye"></i></button>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Level</label>
			<select name="level" class="form-control" id="" required>
				<option value="">-- Pilih Level --</option>
				<?php  
					$level = array('1' => 'admin', "2" => "bendahara", "3" => "ketua");

					foreach ($level as $key => $value)
					{
						echo "<option value='".$key."'> ".$value." </option>";
					}
				?> 
			</select>
		</div>
		<div class="form-group">
			<div class="well well-sm">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan Data</button>
				<a href="<?php echo site_url('user') ?>" class="btn btn-danger">Batal</a>
			</div>
		</div>
	</form>
</div>

<script>
	$(function(){
		$("#lihat").click(function(){

			var d = $("#password").attr("type");

			if (d == "password")
			{
				$("#password").attr("type", "text"); 
			}
			else
			{
				$("#password").attr("type", "password"); 	
			}
		});
	})
</script>