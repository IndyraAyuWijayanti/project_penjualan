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
        float: center;
    }

    .cetak {
        width: 19cm;
        height: 27cm;
        padding: 1cm;
    }

    .table {
        border: solid thin #000;
        border-collapse: collapse;
    }

    td,
    th {
        padding: 3mm 6mm;
        text-align: left;
        vertical-align: top;
    }

    .td1,
    .tr1 {
        padding: 3mm 6mm;
        text-align: left;
        vertical-align: top;
        border: solid thin #000;
    }

    hr {
        border: solid thin #000;
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

    .table {
        border: solid thin #000;
        border-collapse: collapse;
    }

    .td,
    .th {
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
        <table class="table" width="100%">
            <tbody>
                <?php foreach($tgltransaksi as $tgltransaksi){ ?>
                <tr>
                    <td><img src="<?= base_url() ?>assets/admin/dist/img/puslit.png" width="30px"></td>
                    <td class="td1"> Pusat
                        Penelitian Kopi dan
                        Kakao Indonesia<br>Jl. PB. Sudirman 90. Jember</td>
                    <td class="td1">Surat Perintah<br>Penyerahan Barang (DO)</td>
                    <td class="td1">No. DO
                        <?php echo $tgltransaksi->kode_transaksi ?><br>Tgl.
                        DO<?php echo $tgltransaksi->tanggal_transaksi ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <table class="table" width="100%">
            <tbody>
                <?php $i=1; foreach($transaksipelanggan as $transaksipelanggan){ ?>
                <tr>
                    <td class="td1">Diserahkan kepada :
                        <?php echo $transaksipelanggan->id_pelanggan.'|'.$transaksipelanggan->nama_pelanggan ?><br>
                        Penerima : <?php echo $transaksipelanggan->alamat_pengiriman ?>
                        <p>Jenis Barang</p>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
        <table class="table table-bordered" width="100%">

            <thead>
                <tr class="bg-success">
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php $i=1; foreach($dataTransaksi as $transaksi){ ?>
            <tbody>
                <tr class="tr">
                    <td class="td"><?php echo $i ?></td>
                    <td class="td"><?php echo $transaksi->nama_produk ?></td>
                    <td class="td"><?php echo number_format($transaksi->jumlah) ?></td>
                    <td class="td"><?php echo number_format($transaksi->harga) ?></td>
                    <td class="td"><?php echo number_format($transaksi->sub_total) ?></td>
                </tr>
            </tbody>
            <?php $i++; } ?>
            <tfoot>
                <?php foreach($pembayaran as $transaksii){ ?>

                <?php 
                function penyebut($nilai) {
                $nilai = abs($nilai);
                $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
                $temp = "";
                if ($nilai < 12) {
                    $temp = " ". $huruf[$nilai];
                } else if ($nilai <20) {
                    $temp = penyebut($nilai - 10). " Belas";
                } else if ($nilai < 100) {
                    $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
                } else if ($nilai < 200) {
                    $temp = " Seratus" . penyebut($nilai - 100);
                } else if ($nilai < 1000) {
                    $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
                } else if ($nilai < 2000) {
                    $temp = " Seribu" . penyebut($nilai - 1000);
                } else if ($nilai < 1000000) {
                    $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
                } else if ($nilai < 1000000000) {
                    $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
                } else if ($nilai < 1000000000000) {
                    $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
                } else if ($nilai < 1000000000000000) {
                    $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
                }     
                return $temp;
                }

                function terbilang($nilai) {
                if($nilai<0) {
                    $hasil = "Minus ". trim(penyebut($nilai));
                } else {
                    $hasil = trim(penyebut($nilai));
                }     		
                return $hasil;
                }
                $angka = $transaksi->total;
                ?>
                <tr>
                    <td class="td">Biaya pengiriman<br>Terbilang : <?=  terbilang($angka).' Rupiah';?> </td>
                    <td colspan='3'></td>
                    <td class="td">
                        <?php echo 'Rp'.number_format($transaksii->ongkir) ?><br>
                        <?php echo 'Rp'.number_format($transaksii->total) ?>
                    </td>
                </tr>
                <?php } ?>
            </tfoot>
        </table>
        <table class="table" width="100%">
            <tbody>
                <tr>
                    <td class="td1" align="center">Dibuat oleh<br>Kasub.Bag. Pemasaran</td>
                    <td class="td1" align="center">Diperiksa Oleh<br>Kasub.Bag Keuangan</td>
                    <td class="td1" align="center">Disetujui oleh<br>Pimpinan</td>
                    <td class="td1" align="center">Yang menyerahkan <br>Kasub. Bag Produksi BT</td>
                </tr>
                </tr>
                <tr>
                    <td class='td1' align="center">
                        <p align="center">
                        <p align="center">
                            <strong></strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong><strong><?='Dwi Nugroho, SP., M.Sc'?></strong></strong>
                        </p>
                    </td>
                    <td class='td1' align="center">
                        <p align="center">
                        <p align="center">
                            <strong></strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong><strong><?='Wahyudi Priandono, SE'?></strong></strong>
                        </p>
                    </td>
                    <td class='td1' align="center">
                        <p align="center">
                        <p align="center">
                            <strong></strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong><strong><?='Ir. Budi Sumartono, MP'?></strong></strong>
                        </p>
                    </td>
                    <td class='td1' align="center">
                        <p align="center">
                        <p align="center">
                            <strong></strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong>&nbsp;</strong>
                        </p>
                        <p align="center">
                            <strong><strong><?='Ir. Agus Saryono'?></strong></strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>