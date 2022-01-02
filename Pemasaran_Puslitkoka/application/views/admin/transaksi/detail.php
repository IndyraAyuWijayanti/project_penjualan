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
            <th width="20%">Nama Produk</th>
            <th><?php echo $transaksi->nama_produk ?></th>
        </tr>

        <tr>
            <td>Harga</td>
            <td>: <?php echo number_format($transaksi->harga) ?></td>
        </tr>

        <tr>
            <td>Jumlah Produk</td>
            <td>: <?php echo number_format($transaksi->jumlah) ?></td>
        </tr>

        <tr>
            <td>Ongkir</td>
            <td>: <?php echo number_format($transaksi->ongkir) ?></td>
        </tr>

        <tr>
            <td>Diskon</td>
            <td>: <?php echo number_format($transaksi->diskon) ?></td>
        </tr>


        <tr>
            <td>Alamat Pengiriman</td>
            <td>: <?php echo $transaksi->alamat_pengiriman ?></td>
        </tr>


        <!-- <tr>
            <td>Status Pembayaran</td>
            <td>: <?php echo $transaksi->status_pembayaran ?></td>
        </tr> -->


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
            <td>: <?php echo number_format($transaksi->bayar) ?></td>
        </tr>

        <tr>
            <th width="20%">Bank</th>
            <th><?php echo $transaksi->nama_bank ?></th>
        </tr>


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
        <?php $i=1; foreach($dataTransaksi as $transaksi){ ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $transaksi->kode_produk ?></td>
            <td><?php echo $transaksi->nama_produk ?></td>
            <td><?php echo number_format($transaksi->jumlah) ?></td>
            <td><?php echo number_format($transaksi->harga) ?></td>
            <td><?php echo number_format($transaksi->sub_total) ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>


<hr>

<!-- <table class="table table-bordered" width="100%">
    <thead>
        <tr class="bg-success">

            <th>Total Jumlah Produk</th>
            <th>Total Tagihan</th>
            <th>Total Pembayaran</th>

        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($dataTransaksi as $transaksi){ ?>
        <tr>


            <td><?php echo number_format($transaksi->total_jumlahproduk) ?></td>
            <td><?php echo number_format($transaksi->total_tagihan) ?></td>
            <td><?php echo number_format($transaksi->total_pembayaran) ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table> -->