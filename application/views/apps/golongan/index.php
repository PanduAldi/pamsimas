<div class="info">
	<?php echo $this->session->flashdata('info'); ?>
</div>

<a href="<?php echo site_url('tambah_golongan') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Golongan</a><br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Golongan</th>
			<th>Tarif</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($gol as $g): ?>
			<tr class="id-<?php echo $g->id_gol ?>">
				<td><?php echo $no++ ?></td>
				<td><?php echo $g->nama_gol ?></td>
				<td><?php echo $g->tarif ?></td>
				<td>
					<a href="<?php echo site_url('edit_golongan/'.$g->id_gol) ?>" class="btn btn-primary" alt="Edit"><i class="fa fa-edit"></i> Edit</a>
					<a href="javascript:void(0)" onclick="hapus('<?php echo site_url('hapus_golongan') ?>', <?php echo $g->id_gol ?>)" class="btn btn-danger hapus"><i class="fa fa-trash"></i> Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script>

	$(function(){
		$(".info").delay(2000).fadeOut(100);
	})
</script>