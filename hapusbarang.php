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
 $sql2="delete from barang WHERE `kodebarang` = '".$kodebarangdicari."'";
 $q2=$koneksi->query($sql2);
 echo "
	<script>window.location.href='caribarang.php';</script>";
} 
?>