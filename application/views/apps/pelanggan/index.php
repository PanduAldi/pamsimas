<div class="table-pelanggan">
	<table class="table table-bordered" id="datatable">
		<thead>
			<tr>
				<td>No Pelanggan</td>
				<td>Nama</td>
				<td>Alamat</td>
				<td>Gologan</td>
				<td>Telepon</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pelanggan as $p): ?>
				<tr>
					<td><?php echo $p->no_pelanggan ?></td>
					<td><?php echo $p->nama ?></td>
					<td><?php echo $p->Alamat ?></td>
					<td>
						<?php  
							$d = $this->m_apps->get_id('golongan', 'id_golongan', $p->id_golongan)
						?>
					</td>
					<td><?php echo $p->telp ?></td>
					<td>
						<a href="javascript:void(0)" onclick="hapus('<?php echo site_url('hapus_pelanggan') ?>', <?php echo $p->no_pelanggan ?>)"></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>