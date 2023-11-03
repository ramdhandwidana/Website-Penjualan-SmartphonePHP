<?php include '../koneksi.php'; ?>
<h2>Profil</h2>
<br>

<?php
$id_admin = $_SESSION["admin"]["id_admin"];

            
$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin' ");
$detail = $ambil->fetch_assoc();
?>

<img src="assets/img/<?php echo $detail['foto_profil']?>" class="img-thumbnail" alt="...">

 <div class="mb-3 row">
    <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticUsername" value="<?php echo $detail["username"]; ?>">
    </div>
  </div>
   <div class="mb-3 row">
    <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticUsername" value="<?php echo $detail["username"]; ?>">
    </div>
  </div>
  <br>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>