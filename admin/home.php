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
		<title>WEBSITE GALERI FOTO</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/hom.css">
	</head>
	<body>
		<nav class="navbar d-flex fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">  
      <img src="../assets/image/logo1.jpeg" alt="Logo" width="70" height="74" class="d-inline-block align-text-top">
      <p>Kenangan</p>
    </a>
    <!-- <div class="search text-center flex-grow-1 d-flex justify-content-center align-items-center mx-auto me-5 ">
      <div class="search-box">
        <div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
        <div class="search-input">
          <input type="text" class="input" placeholder="Search">
        </div>
      </div>
    </div> -->

    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close mt-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <img src="../assets/image/a2v.png" class="profilegbr">
        <h5 class="usr mt-2">username</h5>
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../profil.php">Profile</a>
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

        <div class="container mt-3">
			Album:
			<?php
				$album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
				while($row = mysqli_fetch_array($album)){ ?>
				<a href="home.php?albumid=<?php echo $row['albumid']?>" class="btn btn-outline-primary"><?php echo  $row['namaalbum']?></a>


				<?php } ?>
			
			<div class="row">
				<?php
				if (isset($_GET['albumid'])){
					$albumid = $_GET['albumid'];
					$query = mysqli_query($koneksi, "SELECT * FROM  foto WHERE userid='$userid' AND albumid='$albumid'");
					while($data = mysqli_fetch_array($query)){ ?>

					<div class="col-md-3 mt-2">
									<div class="card">
										<img src="../assets/image/<?php echo $data['lokasifile']?>" class="card-img-top" title="<?php echo $data['judulfoto']?>" style="height : 12rem;">
										<div class="card-footer text-center">
											
											<?php
												$fotoid = $data['fotoid'];
												$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
												if (mysqli_num_rows($ceksuka) == 1) { ?>
												<a href="../config/proses-like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="batalsuka"><i class="fa-regular fa-heart"></i></a>

												<?php }else{ ?>
												<a href="../config/proses-like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
													
												<?php }
												$like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
												echo mysqli_num_rows($like).' Suka';
											?>
											<a href=""><i class="fa-regular fa-comment"></i></a> KOMENTAR
										</div>
									</div>
								</div>
						<?php } } else {

            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
            while($data = mysqli_fetch_array($query)){
        ?>
		<div class="col-md-3 mt-2">
				<div class="card">
					<img src="../assets/image/<?php echo $data['lokasifile']?>" class="card-img-top" title="<?php echo $data['judulfoto']?>" style="height : 12rem;">
					<div class="card-footer text-center">
						
						<?php
							$fotoid = $data['fotoid'];
							$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
							if (mysqli_num_rows($ceksuka) == 1) { ?>
							<a href="../config/proses-like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="batalsuka"><i class="fa-regular fa-heart"></i></a>

							<?php }else{ ?>
							<a href="../config/proses-like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
								
							<?php }
							$like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
							echo mysqli_num_rows($like).' Suka';
						?>
						<a href=""><i class="fa-regular fa-comment"></i></a> KOMENTAR
					</div>
				</div>
			</div>
        <?php } } ?>
        </div>
	</div>
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
		<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	</body>
</html>