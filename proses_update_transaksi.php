<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $kd_brng = $_POST['kd_brng'];
  $id_pnjl = $_POST['id_pnjl'];
  $kd_faktur = $_POST['kd_faktur'];
  $tgl_trnsks = $_POST['tgl_trnsks'];
  

 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  transaksi  SET KD_FAKTUR ='".$kd_faktur."', TGL_TRNSKS ='".$tgl_trnsks."'WHERE KD_BRNG ='".$kd_brng."'";
	$statement = oci_parse($con,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($con) ;
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data transaksi berhasil diubah'); window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data transaksi gagal diubah'); window.location.href='transaksi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}