<p class="pull-right">
<div class="btn-group pull-right">
    <a href="<?php echo base_url('admin/transaksi/cetak/'.$transaksi->kode_transaksi) ?>" target="_blank" title="Cetak"
        class="btn btn-success btn-sm">
        <i class="fa fa-print"></i> Cetak
    </a>
</div>
<div class="btn-group pull-right">
    <a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm">
        <i class="fa fa-backward"></i> Kembali
    </a>
</div>
</p>
<div class="clearfix"></div>
<hr>
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
<table class="table table-bordered">
    <thead>

        <tr>
            <td>Tanggal Transaksi</td>
            <td>: <?php echo date('d-m-Y',strtotime($transaksi->tanggal_transaksi)) ?>
            </td>
        </tr>

        <tr>
            <th width="20%">Nama Pelanggan</th>
            <th><?php echo $transaksi->nama_pelanggan ?></th>
        </tr>
        <tr>
            <th width="20%">KODE TRANSAKSI</th>
            <th><?php echo $transaksi->kode_transaksi ?></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th width="20%">Nomor SPK</th>
            <td> <?php echo $transaksi->nomor_spk ?></td>
        </tr>

        <tr>
            <td>Ongkir</td>
            <td>: <?php echo 'Rp'.number_format($transaksi->ongkir) ?></td>
        </tr>

        <tr>
            <td>Diskon</td>
            <td>: <?php echo 'Rp'.number_format($transaksi->diskon) ?></td>
        </tr>

        <tr>
            <td>Total</td>
            <td>: <?php echo 'Rp'.number_format($transaksi->total) ?></td>
        </tr>

        <tr>
            <td>Alamat Pengiriman</td>
            <td>: <?php echo $transaksi->alamat_pengiriman ?></td>
        </tr>

        <?php if ($transaksi->id_jenis_pembayaran == 1){?>
        <tr>
            <td>Tanggal Bayar </td>
            <td>: <?php echo date('d-m-Y',strtotime($transaksi->tanggal_pembayaran)) ?>
            </td>
        </tr>

        <tr>
            <td>Bukti Bayar </td>
            <td>: <?php if($transaksi->bukti_pembayaran =="") { echo 'Belum ada'; }else {
                                ?>
                <img src="<?php echo base_url('assets/upload/image/'.$transaksi->bukti_pembayaran) ?>"
                    class="img img-thumbnail" width="200">
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td>Jumlah Bayar</td>
            <td>: <?php echo 'Rp'.number_format($transaksi->bayarnya) ?></td>
        </tr>

        <tr>
            <th width="20%">Bank</th>
            <th><?php echo $transaksi->nama_bank ?></th>
        </tr>
        <?php }elseif ($transaksi->id_jenis_pembayaran == 2) {
            
        }?>

    </tbody>
</table>

<hr>

<table class="table table-bordered" width="100%">
    <thead>
        <tr class="bg-success">
            <th>NO</th>
            <th>KODE PRODUK</th>
            <th>NAMA PRODUK</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
            <th>SUBTOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($dataTransaksi as $dataTransaksi){ ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $dataTransaksi->kode_produk ?></td>
            <td><?php echo $dataTransaksi->nama_produk ?></td>
            <td><?php echo number_format($dataTransaksi->jumlah) ?></td>
            <td><?php echo number_format($dataTransaksi->harga) ?></td>
            <td><?php echo number_format($dataTransaksi->sub_total) ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>

<hr>
<?php if ($transaksi->id_jenis_pembayaran == 2){?>
<?php 
if ($transaksi->total != $transaksi->totalbayar) {?>
<a href="<?php echo base_url('admin/transaksi/tambahangsuran' . "/" . $transaksi->kode_transaksi) ?>"
    class="btn btn-success btn-sm btn-show-add">
    <span class="icon text-white-50">
        <i class="fa fa-plus"></i>
    </span>
    <span class="text">Bayar Angsuran</span>
</a>
<?php } ?>
<p>
<table class="table table-bordered" width="100%">
    <thead>
        <tr class="bg-success">
            <th>Angsuran Ke</th>
            <th>Nominal Bayar</th>
            <th>Bank</th>
            <th>Bukti Bayar</th>
            <th>Tanggal Bayar</th>

        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($aa as $bb){ ?>
        <tr>
            <td><?php echo $bb['angsuran_ke'] ?></td>
            <td><?php echo number_format($bb['bayar']) ?></td>
            <?php if ($bb['id_bank']  == 1) { ?>
            <td>Tunai</td>
            <?php } else if ($bb['id_bank'] == 2) {?>
            <td>BRI </td>
            <?php } else if ($bb['id_bank'] == 3) {?>
            <td>Mandiri </td>
            <?php } ?>
            <td> <img src="<?php echo base_url('assets/upload/image/'.$bb['bukti_bayar']) ?>" height="100" width="100">
            </td>
            <td><?php echo $bb['tanggal_bayar_angsuran']?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
<?php }?>