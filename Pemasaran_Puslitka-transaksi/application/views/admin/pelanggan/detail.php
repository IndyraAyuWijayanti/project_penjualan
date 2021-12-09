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
			<th width="20%">Nama Pelanggan</th>
			<th><?php echo $pelanggan->nama_pelanggan ?></th>
		</tr>
		<tr>
			<th width="20%">Nomor Identitas</th>
			<th><?php echo $pelanggan->no_identitas ?></th>
		</tr>
        <tr>
			<th width="20%">Kategori Pelanggan</th>
			<th><?php echo $pelanggan->nama_kategoripelanggan ?></th>
		</tr>
        <tr>
			<th width="20%">Nama Perusahaan</th>
			<th><?php echo $pelanggan->nama_perusahaan ?></th>
		</tr>
		<tr>
			<th width="20%">Hp</th>
			<th><?php echo $pelanggan->hp ?></th>
		</tr>
		<tr>
			<th width="20%">Telepon Kantor</th>
			<th><?php echo $pelanggan->telepon_kantor ?></th>
		</tr>
		<tr>
			<th width="20%">No Rekening</th>
			<th><?php echo $pelanggan->no_rekening ?></th>
		</tr>
		<tr>
			<th width="20%">Alamat Kantor</th>
			<th><?php echo $pelanggan->alamat ?></th>
		</tr>
		<tr>
			<th width="20%">Kota</th>
			<th><?php echo $pelanggan->kota ?></th>
		</tr>
		<tr>
			<th width="20%">Provinsi</th>
			<th><?php echo $pelanggan->provinsi ?></th>
		</tr>
		<tr>
			<th width="20%">Keterangan</th>
			<th><?php echo $pelanggan->keterangan ?></th>
		</tr>
		<tr>
			<th width="20%">IUPB</th>
			<th><?php echo $pelanggan->iupb ?></th>
		</tr>
		<tr>
			<th width="20%">NIB</th>
			<th><?php echo $pelanggan->nib ?></th>
		</tr>
		<tr>
			<th width="20%">SIUP</th>
			<th><?php echo $pelanggan->siup ?></th>
		</tr>
	</tbody>
</table>
