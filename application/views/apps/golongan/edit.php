<?php echo $this->session->flashdata('info'); ?>
<div class="col-md-6">
	<form action="" method="post">
		<div class="form-group">
			<label for="" class="control-label">Nama Golongan :</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $gol->nama_gol ?>" placeholder="Masukan Nama Golongan">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Tarif :</label>
			<input type="text" class="form-control" name="tarif" value="<?php echo $gol->tarif ?>" placeholder="Masukan Tarif">
		</div>
		<div class="form-group">
			<div class="well well-sm">
				<button type="submit" class="btn btn-warning" name="edit">Edit Data</button>
				<a href="<?php echo site_url('golongan') ?>" class="btn btn-danger">Batal</a>
			</div>
		</div>
	</form>
</div>