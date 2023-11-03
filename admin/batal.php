<?php
$id_pembelian = $_GET['id'];


$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

$koneksi->query("UPDATE pembelian SET status_pembelian='Batal'
    WHERE id_pembelian='$id_pembelian'");

    echo"<script>alert('data pembelian sudah terupdate');</script>";
    echo"<script>location='index.php?halaman=pembelian';</script>";
?>