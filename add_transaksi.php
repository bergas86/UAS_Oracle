<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $KD_BRNG = $_POST['kd_brng'];
  $ID_PNJL = $_POST['id_pnjl'];
  $KD_FAKTUR = $_POST['kd_faktur'];
  $TGL_TRNSKS = $_POST['tgl_trnsks'];


$query = "INSERT INTO TRANSAKSI (KD_BRNG,ID_PNJL,KD_FAKTUR,TGL_TRNSKS) VALUES ('".$KD_BRNG."','".$ID_PNJL."','".$KD_FAKTUR."','".$TGL_TRNSKS."')";
  $statement = oci_parse($con,$query);
  $r = oci_execute($statement,OCI_DEFAULT);
   $res = oci_commit($con);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Berhasil ditambahkan'); 
  window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Gagal ditambahkan');
  window.location.href='transaksi.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}