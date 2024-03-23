<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login'){
    echo "<script>
    alert('Anda belum Login!');
    location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	 <link rel="icon" type="assets/image/png" href="../assets/image/logo1.jpeg">
		  <link rel="stylesheet" type="text/css" href="../css/home.css">
		<title>kenangan</title>
	</head>
	<body>
			<nav class="navbar d-flex fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">  
      <img src="../assets/image/logo1.jpeg" alt="Logo" width="70" height="74" class="d-inline-block align-text-top">
      <p>Kenangan</p>
    </a>
<!--     <div class="search text-center flex-grow-1 d-flex justify-content-center align-items-center mx-auto me-5 ">
      <div class="search-box">
        <div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
        <div class="search-input">
          <input type="text" class="input" placeholder="Search">
        </div>
      </div>
    </div>
 -->
    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close mt-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
       <!--  <img src="../assets/image/a2v.png" class="profilegbr"> -->
       <!--  <h5 class="usr mt-2">username</h5> -->
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
           <!--  <a class="nav-link active" aria-current="page" href="../profil.php">Profile</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/index.php">menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/album.php">Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/foto.php">Foto</a>
          </li>  
           <li>  <a href="../config/aksi-logout.php" class="logout m-1">Keluar</a></li>       
        </ul>    
      </div>
    </div>
    <button class="navbar-toggler ml-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
	  <div class="text-center jhome mb-5 mt-5">
    <h2>Inspirasi</h2>
  </div>
		<div class="container mt-3">
			<div class="row row-cols-4 row-cols-md-4">
			<?php
			$query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
            while($data = mysqli_fetch_array($query)){
        ?>
		<div class="col-md-3">
		<a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>">
					<div class="card-fluid mb-2 rounded-4">
						<img src="../assets/image/<?php echo $data['lokasifile']?>" class="card-img-top" title="<?php echo $data['judulfoto']?>" style="height : 12rem;">

						<div class="card-foot d-flex;">
							
					<div class="isi">
						<div class="user mt-5">
							<img  class="prf " src="../assets/image/a2v.png">
							<p class="nmusr mt-0 pe-3 mx-2"><?php echo $data['namalengkap']?></p>
						</div>
							<?php
							$fotoid = $data['fotoid'];
							$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
							if (mysqli_num_rows($ceksuka) == 1) { ?>
							<a href="../config/proses-like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="batalsuka"><i class="fa-regular fa-heart"></i></a>

							<?php }else{ ?>
							<a href="../config/proses-like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
							<div class="like" style="visibility:hidden; ">
							<?php }
							$like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
							echo mysqli_num_rows($like).'';
						?></div><p class="like">0</p>
							<div class="komen d-flex mt-5">
							<a href=""><i class="fa-regular fa-comment mx-2"></i></a>
							<p class="jlhk 	">
							<?php
								$jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
								echo mysqli_num_rows($jmlkomen);
							?></p>
						</div>
					</div>
						</div>
					</div>
			
				
					</a>
				<div class="modal fade" id="komentar<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-8">
								<img src="../assets/image/<?php echo $data['lokasifile']?>" class="card-img-top" title="<?php echo $data['judulfoto']?>">
							</div>
							<div class="col-md-4">
								<div class="m-2">
									<div class="overflow-auto">
										<div class="sticky-top">
											<strong><?php echo $data['judulfoto']?></strong><br>
											<span class="badge bg-secondary"><?php echo $data['namalengkap']?></span>
											<span class="badge bg-secondary"><?php echo $data['tanggalunggah']?></span>
											<span class="badge bg-primary"><?php echo $data['namaalbum']?></span>
										</div>
										<hr>
										<p align="left">
											<?php echo $data['deskripsifoto']?>
										</p>
										<hr>
											
												<?php
												$fotoid = $data['fotoid'];
												$komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
												while($row = mysqli_fetch_array($komentar)){
												?>
												<div style="overflow: hidden;">
												    <p style="float: left;">
												        <strong><?php echo $row['namalengkap']?></strong>
												        <?php echo $row['isikomentar']?>
												    </p>
												    <form action="../config/proses-komentar.php" method="post" style="float: right;">
												          <button type="submit" name="komentarid" class="btnhapus" value="<?php echo $row['komentarid']; ?>"><i class="fa-solid fa-trash"></i></button>
												    </form>
												</div>
												<?php } ?>
										<hr>
										<div class="sticky-bottom">
											<form action="../config/proses-komentar.php" method="POST">
												<div class="input-group">
													<input type="hidden" name="fotoid" value="<?php echo $data['fotoid']?>">
													<input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
													<div class="input-group-prepend">
														<button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>
		  		
			<!-- footer -->
			<div class="footer">
      <div  class="footer-left">
        <div class="row">
           <div class="col-lg-4">
            <div class="lgfooter">
      <img src="../assets/image/logoh.png" alt="Logo" width="70" height="74" class="d-inline-block align-text-top">
       <p>Kenangan</p>
      </div>
    </div>
        <div class="col-lg-4 ">
          <a class="ayogabung" href="register.php"><p>ayo bergabung!</p></a>
          <h5 class="kout">Setiap Gambar Memiliki Rasa dan Kenangan. </h5>
          <div class="ikon">
      <div class="my-box1 mx-1 fa-2x">
     <i class="fa-brands fa-facebook mt-0"></i>
      </div>

      <div class="my-box1 mx-1  fa-2x">
    <i class="fa-brands fa-twitter  mt-0 fa-1x"></i>
  </div>
      <div class="my-box1 mx-1 fa-2x">
   <i class="fa-brands fa-square-instagram  mt-0"></i>
      </div>
    </div>
      <p class="ntah">&copy;2024kenangan</p>
    </div>
    <div class="col-lg-4 mb-1">
      <P class="sat text-center">Ikuti Kami</P>
      <div class="row " style="padding-left: 200px">    

      <div class="my-box mx-1 fa-2x">
     <i class="fa-brands fa-facebook mt-0"></i>
      </div>

      <div class="my-box mx-1  fa-2x">
    <i class="fa-brands fa-twitter  mt-0 fa-1x"></i>
  </div>
      <div class="my-box mx-1 fa-2x">
   <i class="fa-brands fa-square-instagram  mt-0"></i>
      </div>
    </div>

    </div>
  </div>
    </div>
   <!-- footer -->
		<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	</body>
</html>