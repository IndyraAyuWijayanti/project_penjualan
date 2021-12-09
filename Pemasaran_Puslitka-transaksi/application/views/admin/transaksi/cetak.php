<!DOCTYPE html>
<html>
<head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <title><?php echo $title ?></title>
       <style type="text/css" media="print">
            body {
                 font-family: Arial;
                 font-size: 12px;
            }
            .cetak {
                   width: 19cm;
                   height: 27cm;
                   padding: 1cm;
            }
            table {
                 border: solid thin #000;
                 border-collapse: collapse;
            }
            td, th {
                padding: 3mm 6mm;
                text-align: left;
                vertical-align: top;
            }
            th {
                background-color: #F5F5F5; 
                font-weight: bold;
            }
            h1 {
               text-align: center;
               font-size: 18px;
               text-transform: uppercase;
            }
       </style>
       <style type="text/css" media="screen">
       body {
                 font-family: Arial;
                 font-size: 12px;
            }
            .cetak {
                   width: 19cm;
                   height: 27cm;
                   padding: 1cm;
            }
            table {
                 border: solid thin #000;
                 border-collapse: collapse;
            }
            td, th {
                padding: 3mm 6mm;
                text-align: left;
                vertical-align: top;
            }
            th {
                background-color: #F5F5F5; 
                font-weight: bold;
            }
            h1 {
               text-align: center;
               font-size: 18px;
               text-transform: uppercase;
            }
       </style>
</head>
<body onload="print()">
     <div class="cetak">
        <h1>DETAIL TRANSAKSI <?php echo $site->namaweb ?></h1>
        <table class="table table-bordered">
                        <thead>
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
                                <th width="20%">Nama Produk</th>
                                <th><?php echo $transaksi->nama_produk ?></th>
                            </tr>

                             <tr>
                                <td>Harga</td>
                                <td>: <?php echo number_format($transaksi->harga) ?></td>
                            </tr>
                            
                            <tr>
                                <td>Jumlah Produk</td>
                                <td>: <?php echo number_format($transaksi->total_jumlahproduk) ?></td>
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
                                <th width="20%">Alamat Pengiriman</th>
                                <th><?php echo $transaksi->alamat_pengiriman ?></th>
                            </tr>



                            <tr>
                                <td>Status Pembayaran</td>
                                <td>: <?php echo $transaksi->status_pembayaran ?></td>
                            </tr>


                            <tr>
                                <td>Tanggal Bayar 1</td>
                                <td>: <?php echo date('d-m-Y',strtotime($transaksi->tgl_bayar1)) ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Bukti Bayar 1</td>
                                <td>: <?php if($transaksi->bukti_bayar1 =="") { echo 'Belum ada'; }else {
                                ?>
                                        <img src="<?php echo base_url('assets/upload/image/'.$transaksi->bukti_bayar1) ?>" class="img img-thumbnail" width="200"> 
                                 <?php } ?>
                                 </td>
                            </tr>

                             <tr>
                                <td>Jumlah Bayar 1</td>
                                <td>: <?php echo number_format($transaksi->jumlah_bayar1) ?></td>
                            </tr>

                             <tr>
                                <th width="20%">Bank 1</th>
                                <th><?php echo $transaksi->nama_bank ?></th>
                            </tr>


                            <tr>
                                <td>Tanggal Bayar 2</td>
                                <td>: <?php echo date('d-m-Y',strtotime($transaksi->tgl_bayar2)) ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Bukti Bayar 2</td>
                                <td>: <?php if($transaksi->bukti_bayar2 =="") { echo 'Belum ada'; }else {
                                ?>
                                        <img src="<?php echo base_url('assets/upload/image/'.$transaksi->bukti_bayar2) ?>" class="img img-thumbnail" width="200"> 
                                 <?php } ?>
                                 </td>
                            </tr>

                             <tr>
                                <td>Jumlah Bayar 2</td>
                                <td>: <?php echo number_format($transaksi->jumlah_bayar2) ?></td>
                            </tr>

                             <tr>
                                <th width="20%">Bank 2</th>
                                <th><?php echo $transaksi->nama_bank ?></th>
                            </tr>


                            <tr>
                                <td>Tanggal Bayar 3</td>
                                <td>: <?php echo date('d-m-Y',strtotime($transaksi->tgl_bayar3)) ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Bukti Bayar 3</td>
                                <td>: <?php if($transaksi->bukti_bayar3 =="") { echo 'Belum ada'; }else {
                                ?>
                                        <img src="<?php echo base_url('assets/upload/image/'.$transaksi->bukti_bayar3) ?>" class="img img-thumbnail" width="200"> 
                                 <?php } ?>
                                 </td>
                            </tr>

                             <tr>
                                <td>Jumlah Bayar 3</td>
                                <td>: <?php echo number_format($transaksi->jumlah_bayar3) ?></td>
                            </tr>

                             <tr>
                                <th width="20%">Bank 3</th>
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
                            <?php $i=1; foreach($transaksi as $transaksi){ ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $transaksi->kode_produk ?></td>
                                <td><?php echo $transaksi->nama_produk ?></td>
                                <td><?php echo number_format($transaksi->jumlah) ?></td>
                                <td><?php echo number_format($transaksi->harga) ?></td>
                                <td><?php echo number_format($transaksi->total_pembayaran) ?></td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                    </div>
</body>
</html>