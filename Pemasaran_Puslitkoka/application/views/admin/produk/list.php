
<p>
	<a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-success btn-lg">
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
				<a href="<?= base_url('admin/produk/gambar/'.$produk->id_produk) ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i>Gambar (<?php echo $produk->total_gambar ?>)</a>

				<a href="<?= base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<?php include('delete.php') ?>
			</td>

		</tr>
		<?php } ?>
	</tbody>
</table>
					

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>

<script>  
$(document).ready(function() {
    var table = $('example1').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( 'example_wrapper .col-md-6:eq(0)' );
} );

</script>

