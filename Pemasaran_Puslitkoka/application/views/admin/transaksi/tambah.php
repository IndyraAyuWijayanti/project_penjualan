<?php
	//eror upload
	if(isset($error)){
		echo '<p class="alert laert-warning">';
		echo $error;
		echo '</p>';
	}
	
	//notif eror
	echo validation_errors('<div class="alert alert-warning">','</div>');

	//form open
	echo form_open_multipart(base_url('admin/transaksi/tambah'), ' class="form-horizontal"');
?>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nama Pelanggan</label>
	<div class="col-md-5">
		<select name="id_pelanggan" class="form-control">
			<?php foreach ($pelanggan as $pelanggan) { ?>
			<option value="<?php echo $pelanggan->id_pelanggan ?>">
				<?php echo $pelanggan->nama_pelanggan ?>
			</option>
			<?php } ?>
		</select>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Produk</label>
	<div class="col-md-5">
		<select name="id_produk" class="form-control">
			<?php foreach ($produk as $produk) { ?>
			<option value="<?php echo $produk->id_produk ?>">
				<?php echo $produk->nama_produk ?>
			</option>
			<?php } ?>
		</select>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Harga</label>
	<div class="col-md-5">
		<input type="number" name="harga" class="form-control" placeholder="Harga"
			value="<?php echo set_value('harga'); ?>" required>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Qty</label>
	<div class="col-md-5">
		<input type="number" name="jumlah" class="form-control" placeholder="Qty"
			value="<?php echo set_value('jumlah'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Ongkir</label>
	<div class="col-md-5">
		<input type="number" name="ongkir" class="form-control" placeholder="Ongkir"
			value="<?php echo set_value('ongkir'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Diskon</label>
	<div class="col-md-5">
		<input type="number" name="diskon" class="form-control" placeholder="Diskon"
			value="<?php echo set_value('diskon'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Alamat Pengiriman</label>
	<div class="col-md-5">
		<input type="text" name="alamat_pengiriman" class="form-control" placeholder="Alamat Pengiriman"
			value="<?php echo set_value('alamat_pengiriman'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Status Pembayaran</label>
	<div class="col-md-5">
		<input type="text" name="status_pembayaran" class="form-control" placeholder="Status Pembayaran"
			value="<?php echo set_value('status_pembayaran'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Tanggal Bayar 1</label>
	<div class="col-md-5">
		<input type="date" name="tgl_bayar1" class="form-control" placeholder="Tanggal Bayar 1"
			value="<?php echo set_value('tgl_bayar1'); ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Upload gambar Bukti Bayar 1</label>
	<div class="col-md-5">
		<input type="file" name="bukti_bayar1" class="form-control" required="required">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Jumlah Bayar 1</label>
	<div class="col-md-5">
		<input type="number" name="jumlah_bayar1" class="form-control" placeholder="Jumlah Bayar 1"
			value="<?php echo set_value('jumlah_bayar1'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Bank 1</label>
	<div class="col-md-5">
		<select name="nama_bank1" class="form-control">

	<option value="BRI">BRI</option>
	<option value="MANDIRI">Mandiri</option>
	<option value="TUNAI">Tunai</option>
	
			
		</select>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Tanggal Bayar 2</label>
	<div class="col-md-5">
		<input type="date" name="tgl_bayar2" class="form-control" placeholder="Tanggal Bayar 2"
			value="<?php echo set_value('tgl_bayar2'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Upload gambar Bukti Bayar 2</label>
	<div class="col-md-5">
		<input type="file" name="bukti_bayar2" class="form-control" required="required">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Jumlah Bayar 2</label>
	<div class="col-md-5">
		<input type="number" name="jumlah_bayar2" class="form-control" placeholder="Jumlah Bayar 2"
			value="<?php echo set_value('jumlah_bayar2'); ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Bank 2</label>
	<div class="col-md-5">
		<select name="nama_bank2" class="form-control">

	<option value="BRI">BRI</option>
	<option value="MANDIRI">Mandiri</option>
	<option value="TUNAI">Tunai</option>
	
			
		</select>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Tanggal Bayar 3</label>
	<div class="col-md-5">
		<input type="date" name="tgl_bayar3" class="form-control" placeholder="Tanggal Bayar 3"
			value="<?php echo set_value('tgl_bayar3'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Upload gambar Bukti Bayar 3</label>
	<div class="col-md-5">
		<input type="file" name="bukti_bayar3" class="form-control" required="required">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Jumlah Bayar 3</label>
	<div class="col-md-5">
		<input type="number" name="jumlah_bayar3" class="form-control" placeholder="Jumlah Bayar 3"
			value="<?php echo set_value('jumlah_bayar3'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Bank 3</label>
	<div class="col-md-5">
		<select name="nama_bank3" class="form-control">

	<option value="BRI">BRI</option>
	<option value="MANDIRI">Mandiri</option>
	<option value="TUNAI">Tunai</option>
	
			
		</select>
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