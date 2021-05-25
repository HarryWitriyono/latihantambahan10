<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cari Barang</h2>
  <p>Ketik kata kunci nama barang yang dicari:</p>
  <form method="post">
    <div class="form-group">
      <label for="namadicari">Nama Barang atau Kata kunci namanya:</label>
      <input type="text" class="form-control" id="namadicari" name="namadicari">
    </div>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Barang</button>
	<button class="btn btn-primary" name="binput">Input Barang Baru</button>
  </form>
</div>
<?php 
if (isset($_POST['binput'])) {
	echo "<script>window.location.href='inputbarang.php';</script>";
	exit();
}
$koneksi=new mysqli("localhost","root","","tokoumb");
if (isset($_POST['bcari'])) {
 $namadicari=$_POST['namadicari'];	
 $sql="SELECT * FROM `barang` WHERE `namabarang` LIKE '%".$namadicari."%'";
} else {
 $sql="SELECT * FROM `barang`";
} 
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
		<th>Koreksi</th>
		<th>Hapus<th>
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
		<td><a href="koreksibarang.php?kodebarang=<?php echo $r['kodebarang'];?>" class="btn btn-primary">Update</a></td>
		<td><a href="hapusbarang.php?kodebarang=<?php echo $r['kodebarang'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin akan menghapus barang <?php echo $r['kodebarang'];?> ?')">Delete</a></td>
      </tr>
	<?php } while ($r=$q->fetch_array());
	?>
    </tbody>
  </table>
</div>
</body>
</html>