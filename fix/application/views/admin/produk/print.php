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
            <th>KATEGORI</th>
            <th>HARGA</th>
            
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($produk as $produk){ ?>
        <tr>
            <td><?= $no++ ?></td>
            
                
            </td>
            <td><?= $produk->nama_produk ?></td>
            <td><?= $produk->nama_kategori ?></td>
            <td><?= number_format($produk->harga,'0',',',',') ?></td>

            </tr>
        <?php } ?>
    </tbody>
</table>


	
