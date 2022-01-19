<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id_laporan = $_POST['id_laporan'];
  $nm_brng = $_POST['nm_brng'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];

$query = "INSERT INTO laporan (ID_LAPORAN,NM_BRNG,STOK,HARGA) VALUES ('".$id_laporan."','".$nm_brng."','".$stok."','".$harga."')";
  $statement = oci_parse($con,$query);
  $r = oci_execute($statement,OCI_DEFAULT);
   $res = oci_commit($con);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Berhasil ditambahkan'); 
  window.location.href='laporan.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Gagal ditambahkan');
  window.location.href='laporan.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: laporan.php'); 
}