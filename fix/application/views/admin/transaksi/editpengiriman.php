<?php
	//eror upload
	if(isset($error)){
		echo '<p class="alert alert-warning">';
		echo $error;
		echo '</div>';
	}
	//notif eror
	echo validation_errors('<div class="alert alert-warning">','</div>');

	//form open
	echo form_open_multipart(base_url('admin/transaksi/editpengiriman/'.$transaksi->kode_transaksi), ' class="form-horizontal"');
?>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nomor Pesanan</label>
	<div class="col-md-5">
	<input type="text" name="kode_transaksi" disabled class="form-control" placeholder="No Pesanan"
	value="<?php echo $transaksi->kode_transaksi ?>" >
	</div>
</div>

<div class="form-group row">

	<div class="col-md-5">
	<input type="hidden" name="kode_transaksiHidden"  class="form-control" placeholder="No Pesanan"
	value="<?php echo $transaksi->kode_transaksi ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">No SPK</label>
	<div class="col-md-5">
		<input type="text" name="nomor_spk" disabled class="form-control" placeholder="No SPK"
			value="<?php echo $transaksi->nomor_spk ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nama Pelanggan</label>
	<div class="col-md-5">
		<input type="text" name="nama_pelanggan" disabled class="form-control" placeholder="Nama Pelanggan"
			value="<?php echo $transaksi->nama_pelanggan ?>" >
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nama Penerima</label>
	<div class="col-md-5">
		<input type="text" name="nama_penerima" class="form-control" placeholder="Nama Penerima"
			value="<?php echo $transaksi->nama_penerima ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nama Produk</label>
	<div class="col-md-5">
		<input type="text" name="nama_produk" disabled class="form-control" placeholder="Nama Produk"
			value="<?php echo $transaksi->nama_produk ?>" >
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Jumlah Item</label>
	<div class="col-md-5">
		<input type="text" name="jumlah" disabled class="form-control" placeholder="Jumlah Item"
			value="<?php echo $transaksi->jumlah ?>" >
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Alamat Pengiriman</label>
	<div class="col-md-5">
		<input type="text" name="alamat_pengiriman" disabled class="form-control" placeholder="Alamat Pengiriman"
			value="<?php echo $transaksi->alamat_pengiriman ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">No Resi</label>
	<div class="col-md-5">
		<input type="text" name="no_resi" class="form-control" placeholder="No Resi"
			value="<?php echo $transaksi->no_resi ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Tanggal Diterima</label>
	<div class="col-md-5">
		<input type="date" name="tgl_diterima" class="form-control" placeholder="Tanggal Diterima"
			value="<?php echo $transaksi->tgl_diterima ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Keterangan</label>
	<div class="col-md-5">
		<input type="text" name="keterangan" class="form-control" placeholder="Keterangan"
			value="<?php echo $transaksi->keterangan ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Upload Dokumen Penerimaan</label>
	<div class="col-md-10">
		<input type="file" name="bukti_penerimaan" class="form-control">
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label"></label>
	<div class="col-md-5">
		<button class="btn btn-success btn-lg" name="submit" type="submit">
			<i class="fa fa-save"></i> Simpan
		</button>
		<button class="btn btn-info btn-lg" name="reset" type="reset">
			<i class="fa fa-times"></i> Reset
		</button>
	</div>
</div>
					
<?php echo form_close(); ?>