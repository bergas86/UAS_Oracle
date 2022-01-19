<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id_pnjl = $_POST['id_pnjl'];
  $nm_pnjl = $_POST['nm_pnjl'];
  $no_pnjl = $_POST['no_pnjl'];
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  penjual  SET NM_PNJL ='".$nm_pnjl."', NO_PNJL ='".$no_pnjl."' WHERE ID_PNJL ='".$id_pnjl."'";;
	$statement = oci_parse($con,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($con) ;
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data penjual berhasil diubah'); window.location.href='penjual.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data penjual gagal diubah'); window.location.href='penjual.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: penjual.php'); 
}