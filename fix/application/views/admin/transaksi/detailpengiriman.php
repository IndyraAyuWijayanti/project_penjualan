<div class="btn-group pull-right">
    <a href="<?php echo base_url('admin/transaksi/pengiriman') ?>" title="Kembali" class="btn btn-info btn-sm">
        <i class="fa fa-backward"></i> Kembali
    </a>
</div>
</p>
<div class="clearfix"></div>
<hr>
<table class="table table-bordered">
    <thead>

        <tr>
            <th width="20%">NO PESANAN</th>
            <th><?php echo $transaksi->kode_transaksi ?></th>
        </tr>

        <tr>
            <th width="20%">Nomor SPK</th>
            <td> <?php echo $transaksi->nomor_spk ?></td>
        </tr>

        <tr>
            <th width="20%">Nama Pelanggan</th>
            <th><?php echo $transaksi->nama_pelanggan ?></th>
        </tr>

       
        
    </thead>
    <tbody>

         <tr>
            <th width="20%">Nama Penerima</th>
            <th><?php echo $transaksi->nama_penerima ?></th>
        </tr>

         <tr>
            <th width="20%">Nama Produk</th>
            <th><?php echo $transaksi->nama_produk ?></th>
        </tr>

        <tr>
            <td>Jumlah Item</td>
            <td>: <?php echo $transaksi->jumlah ?></td>
        </tr>

         <tr>
            <th width="20%">Alamat Pengiriman</th>
            <th><?php echo $transaksi->alamat_pengiriman ?></th>
        </tr>

         <tr>
            <th width="20%">No Resi</th>
            <th><?php echo $transaksi->no_resi ?></th>
        </tr>


        <tr>
            <td>Tanggal Diterima</td>
            <td>: <?php echo date('d-m-Y',strtotime($transaksi->tgl_diterima)) ?>
            </td>
        </tr>

        <tr>
            <th width="20%">Keterangan</th>
            <th><?php echo $transaksi->keterangan ?></th>
        </tr>

        <tr>
            <td>Dokumen Penerimaan </td>
            <td>: <?php if($transaksi->bukti_penerimaan =="") { echo 'Belum ada'; }else {
                                ?>
                <img src="<?php echo base_url('assets/upload/image/'.$transaksi->bukti_penerimaan) ?>"
                    class="img img-thumbnail" width="200">
                <?php } ?>
            </td>
        </tr>
      


    </tbody>
</table>

