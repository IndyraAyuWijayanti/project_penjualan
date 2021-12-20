<p>
	<a href="<?= base_url('admin/pelanggan/tambahpelanggan') ?>" class="btn btn-success btn-lg">
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
			<tr class="bg-success">
				<th>NO</th>
				<th>NAMA</th>
				<th>NOMOR IDENTITAS</th>
				<th>KATEGORI PELANGGAN</th>
				<th>NAMA PERUSAHAAN</th>
	            
	            <th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($pelanggan as $pelanggan){ ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $pelanggan->nama_pelanggan ?></td>
				<td><?= $pelanggan->no_identitas ?></td>
				<td><?= $pelanggan->nama_kategoripelanggan ?></td>
	            <td><?= $pelanggan->nama_perusahaan ?></td>
				
				<td>
					<a href="<?= base_url('admin/pelanggan/detail/'.$pelanggan->id_pelanggan) ?>" class="btn btn-success btn-xs"><i class="fa fa-trash-o"></i>Detail</a>

					<a href="<?= base_url('admin/pelanggan/edit/'.$pelanggan->id_pelanggan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

					<?php include('delete.php') ?>

					

				</td>

			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
					