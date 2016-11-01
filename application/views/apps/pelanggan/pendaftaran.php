<div class="error_validation">
	<?php  
		echo form_error('nama');
		echo form_error('alamat');
		echo form_error('telp');
		echo $this->session->flashdata('input_success');
	?>
</div>
<div class="col-md-6 well well-sm">
	<form action="" method="post">
		<div class="form-group">
			<label for="" class="control-label">NO Rekening :</label>
			<input type="text" class="form-control" name="no_rekening" value="<?php echo $no_rekening ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label"> Nama Pelanggan : </label>
			<input type="text" class="form-control" name="nama">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Alamat :</label>
			<textarea name="alamat" class='form-control' rows="5"></textarea>
		</div>
		<div class="form-gruop">
			<label for="" class="control-label">Telepon / HP :</label>
			<input type="text" class="form-control" name="telp">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Golongan :</label>
			<select name="id_golongan" class="form-control" id="">
				<option value=""> -- Pilih Golongan -- </option>
				<?php foreach ($golongan as $g): ?>
					<option value="<?php echo $g->id_gol ?>"> <?php echo $g->nama_gol ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
		</div>	
	</form>	
</div>

<div class="col-md-6">
	<div class="alert alert-info">
		<i class="fa fa-info-circle"></i> Isi Semua Form dengan benar
	</div>
</div>

<script>
	$(function(){
		$(".error_validation").delay(2000).hide(500);
	})
</script>