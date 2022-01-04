
<p>
	<a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<a href="<?= base_url('admin/produk/excel') ?>" class="btn btn-outline-success shadow float-right ml-2"> Excel <i class="fa fa-file-excel"> </i></a>

 <a href="<?= base_url('admin/produk/print') ?>" class="btn btn-outline-secondary shadow float-right ml-2"> Print <i class="fa fa-print"> </i></a>


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
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($produk as $produk){ ?>
		<tr>
			<td><?= $no++ ?></td>
			
				
			</td>
			<td><?= $produk->nama_produk ?></td>
			<td><?= $produk->nama_kategori ?></td>
			<td><?= number_format($produk->harga,'0',',',',') ?></td>
			<td>
				

				<a href="<?= base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<?php include('delete.php') ?>
			</td>

		</tr>
		<?php } ?>
	</tbody>
</table>
					


