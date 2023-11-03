<?php
$ambil = $koneksi->query("SELECT * FROM users WHERE id_users='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM users WHERE id_users='$_GET[id]'");

echo "<script>alert('users terhapus');</script>";
echo "<script>location='index.php?halaman=users';</script>";

?>