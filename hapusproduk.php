<?php 
session_start();

$id_produk=$_GET["id"];
unset($_SESSION["cart"][$id_produk]);

echo "<script>alert('produk dihapus');</script>";
echo "<script>location='cart.php';</script>";

?>

