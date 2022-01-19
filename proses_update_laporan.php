<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id_laporan = $_POST['id_laporan'];
  $nm_brng = $_POST['nm_brng'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];
 
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  laporan  SET NM_BRNG ='".$nm_brng."', STOK ='".$stok."', HARGA ='".$harga."' WHERE ID_LAPORAN ='".$id_laporan."'";
	$statement = oci_parse($con,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($con) ;
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Laporan Pembeli berhasil diubah'); window.location.href='laporan.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Laporan gagal diubah'); window.location.href='laporan.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: laporan.php'); 
}