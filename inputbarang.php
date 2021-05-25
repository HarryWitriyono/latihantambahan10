<!DOCTYPE html>
<html lang="en">
<head>
  <title>Input Rekord Barang Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Input Rekord Barang Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="kodebarang">Kode Barang:</label>
      <input type="text" class="form-control" id="kodebarang" placeholder="Ketik kode barang" name="kodebarang">
    </div>
    <div class="form-group">
      <label for="namabarang">Nama Barang:</label>
      <input type="text" class="form-control" id="namabarang" placeholder="Ketik nama barang" name="namabarang">
    </div>
    <div class="form-group">
      <label for="jumlah">Jumlah Stok Barang:</label>
      <input type="number" class="form-control" id="jumlah" placeholder="Ketik jumlah barang" name="jumlah">
    </div>
	<div class="form-group">
      <label for="satuan">Satuan Barang:</label>
      <input type="text" class="form-control" id="satuan" placeholder="Ketik satuan barang" name="satuan">
    </div>
	<div class="form-group">
      <label for="hargasatuan">Harga Satuan Barang:</label>
      <input type="number" class="form-control" id="hargasatuan" placeholder="Ketik harga satuan barang" name="hargasatuan">
    </div>
	<div class="form-group">
      <label for="tanggalkedaluarsa">Tanggal Kedaluarsa:</label>
      <input type="date" class="form-control" id="tanggalkedaluarsa" title="Tentukan tanggal kedaluarsa barang" name="tanggalkedaluarsa">
    </div>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
	<button class="btn btn-success" name="bcari">Cari Barang</button>
  </form>
</div>
</body>
</html>
<?php 
if (isset($_POST['bcari'])) {
	echo "<script>window.location.href='caribarang.php';</script>";
	exit();
}
 if (isset($_POST['bsimpan'])) {
	$kodebarang=$_POST['kodebarang'];
	$namabarang=$_POST['namabarang'];
	$jumlah=$_POST['jumlah'];
	$satuan=$_POST['satuan'];
	$hargasatuan=$_POST['hargasatuan'];
	$tanggalkedaluarsa=$_POST['tanggalkedaluarsa'];
	if (empty($kodebarang)) {
		echo "Kode barang harus diisi !";
		exit();
	}
	
	$koneksi=new mysqli("localhost","root","","tokoumb");
    $sql="INSERT INTO `barang` (`kodebarang`, `namabarang`, `jumlah`, `satuan`, `hargasatuan`, `tanggalkedaluarsa`) VALUES ('".$kodebarang."', '".$namabarang."', '".$jumlah."', '".$satuan."', '".$hargasatuan."', '".$tanggalkedaluarsa."');";	
	$q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord barang sudah tersimpan !";
    } else {
      echo "Rekord barang gagal tersimpan !";
    }	  
 }
 include ("daftarbarang.php");
?>