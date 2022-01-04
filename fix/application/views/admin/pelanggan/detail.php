<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/pelanggan') ?>" title="Kembali" class="btn btn-info btn-sm">
			<i class="fa fa-backward"></i> Kembali
		</a>
	</div>
</p>
<div class="clearfix"></div>
<hr>

<table class="table table-bordered">
	<tbody>
         <tr>
           <th>Nama Pelanggan</th>
           <td> <?php echo $pelanggan->nama_pelanggan ?></td>
         </tr>

		<tr>
			<th>Nomor Identitas</th>
			<td><?php echo $pelanggan->no_identitas ?></td>
		</tr>
        <tr>
			<th width="20%">Kategori Pelanggan</th>
			<td><?php echo $pelanggan->nama_kategoripelanggan ?></td>
		</tr>
        <tr>
			<th width="20%">Nama Perusahaan</th>
			<td><?php echo $pelanggan->nama_perusahaan ?></td>
		</tr>
		<tr>
			<th width="20%">Hp</th>
			<td><?php echo $pelanggan->hp ?></td>
		</tr>
		<tr>
			<th width="20%">Telepon Kantor</th>
			<td><?php echo $pelanggan->telepon_kantor ?></td>
		</tr>
		<tr>
			<th width="20%">No Rekening</th>
			<td><?php echo $pelanggan->no_rekening ?></td>
		</tr>
		<tr>
			<th width="20%">Alamat Kantor</th>
			<td><?php echo $pelanggan->alamat ?></td>
		</tr>
		<tr>
			<th width="20%">Kota</th>
			<td><?php echo $pelanggan->kota ?></td>
		</tr>
		<tr>
			<th width="20%">Provinsi</th>
			<td><?php echo $pelanggan->provinsi ?></td>
		</tr>
		<tr>
			<th width="20%">Keterangan</th>
			<td><?php echo $pelanggan->keterangan ?></td>
		</tr>
		<tr>
			<th width="20%">IUPB</th>
			<td><?php echo $pelanggan->iupb ?></td>

		</tr>
	
		<tr>
			<th width="20%">NIB</th>
			<td><?php echo $pelanggan->nib ?></td>
		</tr>
		<tr>
			<th width="20%">SIUP</th>
			<td><?php echo $pelanggan->siup ?></td>
		</tr>
	</tbody>
</table>
