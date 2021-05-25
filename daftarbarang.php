<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
$koneksi=new mysqli("localhost","root","","tokoumb");
$sql="SELECT * FROM `barang`";
$q=$koneksi->query($sql);
$r=$q->fetch_array();
if (empty($r)) {
	 echo "<h2>Rekord yang dicari tidak ditemukan !</h2>";
	 exit();
 }
?>
<div class="container">
  <h2>Tabel Barang</h2>
  <p>Daftar barang yang tersimpan di database adalah :</p>            
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
		<th>Satuan</th>
		<th>Harga Satuan</th>
		<th>Tanggal Kedaluarsa</th>
      </tr>
    </thead>
    <tbody>
	<?php do { 
	?>
      <tr>
        <td><?php echo $r['kodebarang'];?></td>
		<td><?php echo $r['namabarang'];?></td>
		<td><?php echo $r['jumlah'];?></td>
		<td><?php echo $r['satuan'];?></td>
		<td><?php echo $r['hargasatuan'];?></td>
		<td><?php echo $r['tanggalkedaluarsa'];?></td>
      </tr>
	<?php } while ($r=$q->fetch_array());
	?>
    </tbody>
  </table>
</div>

</body>
</html>