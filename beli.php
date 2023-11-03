<?php
session_start();
//mendapatkan id produk dari url
$id_produk = $_GET['id'];


//+1
if(isset($_SESSION['cart'][$id_produk]))
{
    $_SESSION['cart'][$id_produk]+=1;
}
//selain itu blm ada
else
{
    $_SESSION['cart'][$id_produk] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
//pindah ke halaman keranjang
echo "<script>alert('produk telah masuk keranjang belanja');</script>";
echo "<script>location='cart.php';</script>";
?>