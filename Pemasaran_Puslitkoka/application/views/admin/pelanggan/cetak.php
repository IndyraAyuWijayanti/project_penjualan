
<html>
<head>
  <title>Cetak Data Pelanggan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>



					<body onload="print()">
     <div class="cetak">
					<table class="table table-bordered" id="example1">
    <thead>
      <tr>
      <tr class="bg-success">
        <th>NO</th>
        <th>NAMA</th>
        <th>NOMOR IDENTITAS</th>
        <th>KATEGORI PELANGGAN</th>
        <th>NAMA PERUSAHAAN</th>
              
              
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($pelanggan as $pelanggan){ ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $pelanggan->nama_pelanggan ?></td>
        <td><?php echo $pelanggan->no_identitas ?></td>
        <td><?php echo $pelanggan->nama_kategoripelanggan ?></td>
        <td><?php echo $pelanggan->nama_perusahaan ?></td>
        
        <td>
         
          

        </td>

      </tr>
      <?php } ?>
    </tbody>
  </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>