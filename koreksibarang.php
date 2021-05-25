<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Rekord Barang Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php $koneksi=new mysqli("localhost","root","","tokoumb");
if (isset($_GET['kodebarang'])) {
 $kodebarangdicari=$_GET['kodebarang'];	
 $sql="SELECT * FROM `barang` WHERE `kodebarang` = '".$kodebarangdicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Rekord yang dicari tidak ditemukan !</h2>";
	 exit();
 }
} 
?>
<div class="container">
  <h2>Koreksi Rekord Barang Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="kodebarang">Kode Barang:</label>
      <input type="text" class="form-control" id="kodebarang" placeholder="Ketik kode barang" name="kodebarang" value="<?php echo $r['kodebarang'];?>" readonly>
    </div>
    <div class="form-group">
      <label for="namabarang">Nama Barang:</label>
      <input type="text" class="form-control" id="namabarang" placeholder="Ketik nama barang" name="namabarang" value="<?php echo $r['namabarang'];?>">
    </div>
    <div class="form-group">
      <label for="jumlah">Jumlah Stok Barang:</label>
      <input type="number" class="form-control" id="jumlah" placeholder="Ketik jumlah barang" name="jumlah" value="<?php echo $r['jumlah'];?>" >
    </div>
	<div class="form-group">
      <label for="satuan">Satuan Barang:</label>
      <input type="text" class="form-control" id="satuan" placeholder="Ketik satuan barang" name="satuan" value="<?php echo $r['satuan'];?>">
    </div>
	<div class="form-group">
      <label for="hargasatuan">Harga Satuan Barang:</label>
      <input type="number" class="form-control" id="hargasatuan" placeholder="Ketik harga satuan barang" name="hargasatuan" value="<?php echo $r['hargasatuan'];?>">
    </div>
	<div class="form-group">
      <label for="tanggalkedaluarsa">Tanggal Kedaluarsa:</label>
      <input type="date" class="form-control" id="tanggalkedaluarsa" title="Tentukan tanggal kedaluarsa barang" name="tanggalkedaluarsa" value="<?php echo date('Y-m-d',strtotime($r['tanggalkedaluarsa']));?>">
    </div>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
  </form>
</div>
</body>
</html>
<?php 
 if (isset($_POST['bsimpan'])) {
	$kodebarang=$_POST['kodebarang'];
	$namabarang=$_POST['namabarang'];
	$jumlah=$_POST['jumlah'];
	$satuan=$_POST['satuan'];
	$hargasatuan=$_POST['hargasatuan'];
	$tanggalkedaluarsa=$_POST['tanggalkedaluarsa'];
	
	
    $sql="Update `barang` set `namabarang`='".$namabarang."', `jumlah`='".$jumlah."', `satuan`='".$satuan."', `hargasatuan`='".$hargasatuan."', `tanggalkedaluarsa`='".$tanggalkedaluarsa."' where kodebarang='".$kodebarang."';";	
	$q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord barang sudah tersimpan !";
    } else {
      echo "Rekord barang gagal tersimpan !";
    }	  
	echo "
	<script>window.location.href='caribarang.php';</script>";
 }
 
?>