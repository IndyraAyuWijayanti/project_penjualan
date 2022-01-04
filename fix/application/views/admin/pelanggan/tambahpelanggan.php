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
	echo form_open_multipart(base_url('admin/pelanggan/tambahpelanggan'), ' class="form-horizontal"');
?>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nama Pelanggan</label>
	<div class="col-md-5">
		<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan"
			value="<?php echo set_value('nama_pelanggan'); ?>" required>
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nomor Identitas</label>
	<div class="col-md-5">
		<input type="text" name="no_identitas" class="form-control" placeholder="Nomor Identitas"
			value="<?php echo set_value('no_identitas'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Kategori Pelanggan</label>
	<div class="col-md-5">
		<select name="id_kategoripelanggan" class="form-control">
			<?php foreach ($kategoripelanggan as $kategoripelanggan) { ?>
			<option value="<?php echo $kategoripelanggan->id_kategoripelanggan ?>">
				<?php echo $kategoripelanggan->nama_kategoripelanggan ?>
			</option>
			<?php } ?>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Nama Perusahaan</label>
	<div class="col-md-5">
		<input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan"
			value="<?php echo set_value('nama_perusahaan'); ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">HP</label>
	<div class="col-md-5">
		<input type="text" name="hp" class="form-control" placeholder="HP"
			value="<?php echo set_value('hp'); ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Telepon Kantor</label>
	<div class="col-md-5">
		<input type="text" name="telepon_kantor" class="form-control" placeholder="Telepon Kantor"
			value="<?php echo set_value('telepon_kantor'); ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">No Rekening</label>
	<div class="col-md-5">
		<input type="text" name="no_rekening" class="form-control" placeholder="No Rekening"
			value="<?php echo set_value('no_rekening'); ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Alamat Kantor</label>
	<div class="col-md-5">
		<input type="text" name="alamat" class="form-control" placeholder="Alamat Kantor"
			value="<?php echo set_value('alamat'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Kota</label>
	<div class="col-md-5">
		<input type="text" name="kota" class="form-control" placeholder="Kota"
			value="<?php echo set_value('kota'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Provinsi</label>
	<div class="col-md-5">
		<input type="text" name="provinsi" class="form-control" placeholder="provinsi"
			value="<?php echo set_value('provinsi'); ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Keterangan</label>
	<div class="col-md-5">
		<input type="text" name="keterangan" class="form-control" placeholder="Keterangan"
			value="<?php echo set_value('keterangan'); ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Upload gambar IUPB</label>
	<div class="col-md-5">
		<input type="file" name="iupb" class="form-control" required="">
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Upload gambar NIB</label>
	<div class="col-md-5">
		<input type="file" name="nib" class="form-control" required="required">
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2 col-form-label control-label">Upload gambar SIUP</label>
	<div class="col-md-5">
		<input type="file" name="siup" class="form-control" required="required">
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