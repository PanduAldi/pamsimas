<div class="table-pelanggan">
	<table class="table table-bordered" id="datatable">
		<thead>
			<tr>
				<td>No Pelanggan</td>
				<td>Nama</td>
				<td>Alamat</td>
				<td>Gologan</td>
				<td>Telepon</td>
				<td>#</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pelanggan as $p): ?>
				<tr class="id-<?php echo $p->no_pelanggan ?>">
					<td><?php echo $p->no_pelanggan ?></td>
					<td><?php echo $p->nama ?></td>
					<td><?php echo $p->alamat ?></td>
					<td>
						<?php  
							$d = $this->m_apps->get_id('golongan', 'id_gol', $p->id_golongan)->row();
							echo $d->nama_gol;
						?>
					</td>
					<td><?php echo $p->telp ?></td>
					<td>
						<a href="javascript:edit_pelanggan(<?php echo $p->no_pelanggan ?>)"  class="btn btn-primary"><i class="fa fa-edit"></i></a>
						<a href="javascript:void(0)" onclick="hapus('<?php echo site_url('hapus_pelanggan') ?>', <?php echo $p->no_pelanggan ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<!-- Modal edit -->
<div class="modal fade" id="edit_pelanggan" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">Edit Pelanggan</div>
			<div class="modal-body">
				<div class="edit_success"></div>
				<input type="hidden" name="no_pelanggan">
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
			</div>
			<div class="modal-footer">
				<button onclick="edi()" class="btn btn-primary">Edit Data</button>	
				<a class="btn btn-default" data-dismiss="modal" >Tutup</a>
			</div>
		</div>
	</div>
</div>

<script>

	function edit_pelanggan(id)
	{
		$(function(){		
			$("#edit_pelanggan").modal("show");
		
			$.ajax({
				url : "<?php echo site_url('cari_pelanggan') ?>",
				type : "POST",
				data : { no_pelanggan : id },
				dataType : "JSON",
				success : function(data){
					$("input[name=no_pelanggan]").val(data.no_pelanggan);
					$("input[name=nama]").val(data.nama);
					$("textarea[name=alamat]").val(data.alamat);
					$("input[name=telp]").val(data.telp);
				}
			})
		})
	}

	function edit(){
		$(function(){
			var nama = $("input[name=nama]").val();
			var alamat = $("textarea[name=alamat]").val();
			var telp = $("input[name=telp]").val();
		
			$.ajax({
				url  : "<?php echo site_url('edit_pelanggan') ?>",
				type : "POST",
				data : {
					id : $("input[name=no_pelanggan]"),
					nama : nama,
					alamat : alamat,
					telp : telp
				},
				success : function(data){
					$(".edit_success").html(data);
					$(".edit_success").delay(2000).hide(500);
				}
			})
		})
	}

</script>