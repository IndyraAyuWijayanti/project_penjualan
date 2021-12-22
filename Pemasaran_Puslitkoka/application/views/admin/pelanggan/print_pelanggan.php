<!DOCTYPE html>
<html>
<head>
	<title> Print Data Pelanggan</title>
</head>
<body>
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

	<script type="text/javascript">
		window.print();
	</script>

</div>
</body>
</html>