<div class="user">
	<div class="info">
		<?php echo $this->session->flashdata('info') ?>
	</div>
	<div id="tambah">
		<a href="<?php echo site_url('tambah_user') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a><br><br>
	</div>

	<div id="table">
		<table class="table table-bordered" id="datatable">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($user->result() as $u): ?>
					<tr class="id-<?php echo $u->id_user ?>">
						<td><?php echo $no++ ?></td>
						<td><?php echo $u->nama ?></td>
						<td><?php echo $u->email ?></td>
						<td>
							<a href="javascript:void(0)" onclick="hapus('<?php echo site_url('hapus_user') ?>', <?php echo $u->id_user ?>)"class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(function(){
		$(".info").delay(2000).fadeOut(100);
	})
</script>