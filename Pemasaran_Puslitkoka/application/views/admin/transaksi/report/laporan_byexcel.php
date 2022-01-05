<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<center>
    <h2>LAPORAN PENJUALAN</h2>
</center>
<br />
<table class="table">
    <thead>
        <tr>
            <th align="center">Kode Transaksi</th>
            <th align="center">Tanggal Transaksi</th>
            <th align="center">Nama Pelanggan</th>
            <th align="center">Nama Produk</th>
            <th align="center">Alamat Pengiriman</th>
            <!-- <th align="center">No Telpon</th> -->
            <th align="center">Jenis Pembayaran</th>
            <th align="center">Harga</th>
            <th align="center">Jumlah</th>
            <th align="center">Subtotal</th>
            <th align="center">Ongkir</th>
            <th align="center">Diskon</th>
            <th align="center">Total</th>
            <th align="center">Bayar</th>
            <!-- <th align="center">Status Pembayaran</th> -->
            <th align="center">Tanggal Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        <?php
	if (!empty($excel)) {
        foreach ($excel as $row) {
        ?>
        <tr>
            <td class="text-center"><?= $row->kode_transaksi; ?></td>
            <td class="text-center"><?= $row->tanggal_transaksi; ?></td>
            <td class="text-center"><?= $row->nama_pelanggan; ?></td>
            <td class="text-center"><?= $row->nama_produk; ?></td>
            <td class="text-center"><?= $row->pengiriman; ?></td>
            <!-- <td class="text-center"><?= $row->no_telp; ?></td> -->
            <td class="text-center">
                <?php if ($row->id_jenis_pembayaran == '1') { ?>
                Cash
                <?php } elseif ($row->id_jenis_pembayaran == '2') { ?>
                <span>Angsuran</span>
                <?php } ?>
            </td>
            <td class="text-center"><?= $row->harga; ?></td>
            <td class="text-center"><?= $row->jumlah; ?></td>
            <td class="text-center"><?= $row->sub_total; ?></td>
            <td class="text-center"><?= $row->ongkir; ?></td>
            <td class="text-center"><?= $row->diskon; ?></td>
            <td class="text-center"><?= $row->total; ?></td>
            <td class="text-center"><?= $row->bayar; ?></td>
            <!-- <td class="text-center">
                <?php if ($row->id_jenis_pembayaran == '1') { ?>
                <?php if ($row->total == $row->bayar) { ?>
                <span>Lunas</span>
                <?php } else { ?>
                <span>Belum Lunas</span>
                <?php } ?>
                <?php } elseif ($row->id_jenis_pembayaran== '2') { ?>
                <?php if ($row->total == $row->totalbayar) { ?>
                <span>Lunas</span>
                <?php } else { ?>
                <span>Belum Lunas</span>
                <?php } ?>
                <?php } ?>
            </td> -->
            <td class="text-center"><?= $row->tanggal_pembayaran; ?></td>
        </tr>
        <?php }; ?>

        <?php } else {  ?>

        <center><?php echo "Belum Ada data" ?></center>

        <?php } ?>

    </tbody>
</table>