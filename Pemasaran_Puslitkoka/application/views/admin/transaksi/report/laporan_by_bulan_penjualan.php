<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan bulan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        margin-left: 10px;
        margin-right: 10px;
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }

    @media print {
        @page {
            size: landscape
        }
    }
    </style>
</head>

<body class="A4">

    <?php
    if ($bulanawal == "1") {
        $bl1 = "Januari";
    }elseif ($bulanawal == "2") {
        $bl1 = "Februari";
    }elseif ($bulanawal == "3") {
        $bl1 = "Maret";
    }elseif ($bulanawal == "4") {
        $bl1 = "April";
    }elseif ($bulanawal == "5") {
        $bl1 = "Mei";
    }elseif ($bulanawal == "6") {
        $bl1 = "Juni";
    }elseif ($bulanawal == "7") {
        $bl1 = "Juli";
    }elseif ($bulanawal == "8") {
        $bl1 = "Agustus";
    }elseif ($bulanawal == "9") {
        $bl1 = "September";
    }elseif ($bulanawal == "10") {
        $bl1 = "Oktober";
    }elseif ($bulanawal == "11") {
        $bl1 = "November";
    }elseif ($bulanawal == "12") {
        $bl1 = "Desember";
    }


    if ($bulanakhir == "1") {
        $bl2 = "Januari";
    }elseif ($bulanakhir == "2") {
        $bl2 = "Februari";
    }elseif ($bulanakhir == "3") {
        $bl2 = "Maret";
    }elseif ($bulanakhir == "4") {
        $bl2 = "April";
    }elseif ($bulanakhir == "5") {
        $bl2 = "Mei";
    }elseif ($bulanakhir == "6") {
        $bl2 = "Juni";
    }elseif ($bulanakhir == "7") {
        $bl2 = "Juli";
    }elseif ($bulanakhir == "8") {
        $bl2 = "Agustus";
    }elseif ($bulanakhir == "9") {
        $bl2 = "September";
    }elseif ($bulanakhir == "10") {
        $bl2 = "Oktober";
    }elseif ($bulanakhir == "11") {
        $bl2 = "November";
    }elseif ($bulanakhir == "12") {
        $bl2 = "Desember";
    }

?>
    <center>
        <h2>LAPORAN PENJUALAN</h2>
        <h4>Berdasarkan Periode Bulan</h4>
        <h4><?php echo $bl1." - ".$bl2." - ".$tahun ?></h4>
    </center>
    <br />
    <table class="table">
        <tr>
            <th>Kode Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Nama Produk</th>
            <th>Alamat Pengiriman</th>
            <!-- <th>No Telpon</th> -->
            <th>Jenis Pembayaran</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Ongkir</th>
            <th>Diskon</th>
            <th>Total</th>
            <th>Bayar</th>
            <!-- <th>Status Pembayaran</th> -->
            <th>Tanggal Pembayaran</th>
        </tr>
        <?php
        foreach ($bybulan as $row) {
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
    </table>

    <script>
    window.print();
    </script>
</body>

</html>