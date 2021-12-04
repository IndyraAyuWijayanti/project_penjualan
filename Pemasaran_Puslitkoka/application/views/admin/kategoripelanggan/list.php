
<p>
	<a href="<?= base_url('admin/kategoripelanggan/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>


<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success alert-dismissible">';
	echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>';
	echo $this->session->flashdata('sukses');
	echo'</div>';
}
?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>NO</th>
			<th>KATEGORI PELANGGAN</th>
			<th>SLUG</th>
			<th>URUTAN</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($kategoripelanggan as $kategoripelanggan){ ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $kategoripelanggan->nama_kategoripelanggan ?></td>
			<td><?= $kategoripelanggan->slug_kategoripelanggan ?></td>
			<td><?= $kategoripelanggan->urutan ?></td>
			<td>
				<a href="<?= base_url('admin/kategoripelanggan/edit/'.$kategoripelanggan->id_kategoripelanggan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?= base_url('admin/kategoripelanggan/delete/'.$kategoripelanggan->id_kategoripelanggan) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>

		</tr>
		<?php } ?>
	</tbody>
</table>
					