<html>

<body>

<script type="text/javascript">
        window.print();
    </script>
<table class=table border="1">
    <thead>
      <tr>
     
        <th>NO</th>
        <th>NAMA</th>
        <th>NOMOR IDENTITAS</th>
        <th>KATEGORI PELANGGAN</th>
        <th>NAMA PERUSAHAAN</th>
        <th>HP</th>
        <th>TELEPON KANTOR</th>
        <th>NO REKENING</th>
        <th>ALAMAT KANTOR</th>
        <th>KOTA</th>
        <th>PROVINSI</th>
        <th>KETERANGAN</th>
        <th>IUPB</th>
        <th>NIB</th>
        <th>SIUP</th>
              
             
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($pelanggan as $pelanggan){ ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $pelanggan->nama_pelanggan ?></td>
        <td><?= $pelanggan->no_identitas ?></td>
        <td><?= $pelanggan->nama_kategoripelanggan ?></td>
        <td><?= $pelanggan->nama_perusahaan ?></td>
        <td><?= $pelanggan->hp ?></td>
        <td><?= $pelanggan->telepon_kantor ?></td>
        <td><?= $pelanggan->no_rekening ?></td>
        <td><?= $pelanggan->alamat ?></td>
        <td><?= $pelanggan->kota ?></td>
        <td><?= $pelanggan->provinsi ?></td>
        <td><?= $pelanggan->keterangan ?></td>
        <td><?= $pelanggan->iupb ?></td>
        <td><?= $pelanggan->nib ?></td>
        <td><?= $pelanggan->siup ?></td>
        
        </tr>
      <?php } ?>
    </tbody>
  </table>
  </body>
  </html>



	

