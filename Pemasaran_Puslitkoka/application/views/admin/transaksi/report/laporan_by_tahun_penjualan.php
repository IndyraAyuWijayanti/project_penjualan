<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan tahun</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    @page {
        size: landscape;
        margin: 27mm 16mm 27mm 16mm;
    }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
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
    </style>
</head>

<body class="A4">
    <center>
        <h2>LAPORAN PENJUALAN</h2>
        <h4>Berdasarkan Periode Tahun</h4>
        <h4><?php echo $tahun ?></h4>
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
        foreach ($bytahun as $row) {
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