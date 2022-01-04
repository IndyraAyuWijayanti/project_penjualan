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
<table class="table table-bordered" width="100%">
    <thead>
        <tr>
        <tr class="bg-success">
            <th>NO</th>
            <th>NOMOR PESANAN</th>
            <th>NO SPK</th>
            <th>NAMA PELANGGAN</th>
             <th>NAMA PENERIMA</th>
            <th>PRODUK</th>
            <th>JUMLAH ITEM</th>
            
            <!-- <th>STATUS PEMBAYARAN</th> -->
            <th width="15%">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($transaksi as $transaksi){ ?>
        <tr>
            <td><?= $no++ ?></td>

            <td><?= $transaksi->kode_transaksi ?></td>
            <td><?= $transaksi->nomor_spk ?></td>
            <td><?= $transaksi->nama_pelanggan ?></td>
            <td><?= $transaksi->nama_penerima ?></td>
            <td><?= $transaksi->nama_produk?></td>
            <td><?php echo number_format($transaksi->jumlah) ?></td>
           
            <!-- <td><?= $transaksi->status_pembayaran?></td> -->

            <td>
                <div class="btn-group">
                    <a href="<?php echo base_url('admin/transaksi/detailpengiriman/'.$transaksi->kode_transaksi) ?>"
                        class="btn btn-success btn-sm"><i class="fa fa-eye"></i>Detail</a>
                    <!-- <a href="<?php echo base_url('admin/transaksi/detailpengiriman/'.$transaksi->kode_transaksi) ?>"
                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a> -->
                </div>

                <div class="btn-group">
                    <a href="<?php echo base_url('admin/transaksi/editpengiriman/'.$transaksi->kode_transaksi) ?>"
                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                    <!-- <a href="<?php echo base_url('admin/transaksi/editpengiriman/'.$transaksi->kode_transaksi) ?>"
                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a> -->

                       
                </div>
                
            </td>
        </tr>
        <?php  } ?>
    </tbody>
</table>