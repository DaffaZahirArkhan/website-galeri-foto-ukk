<?php
// Mulai session
session_start();

// Periksa apakah pengguna sudah login
if (  $_SESSION['status'] != 'login') {

    echo "<script>
  alert('Anda belum Login!');
  location.href='index.php';
  </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="icon" type="image/png" href="image/logo1.jpeg">
    <link rel="stylesheet" href="css/profile.css">
      <title>Kenangan</title>
</head>
<body>
 <!-- navbar -->
 <nav class="navbar d-flex fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">  
      <img src="assets/image/logo1.jpeg" alt="Logo" width="70" height="74" class="d-inline-block align-text-top">
      <p>Kenangan</p>
    </a>
    <!-- <div class="search text-center flex-grow-1 d-flex justify-content-center align-items-center mx-auto me-5 ">
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
        <img src="assets/image/a2v.png" class="profilegbr">
        <h5 class="usr mt-2">username</h5>
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="album.php">Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="foto.php">Foto</a>
          </li>  
          <li>  <a href="config/prslogout.php" class="logout m-1">Keluar</a></li>    
        </ul>    
      </div>
    </div>
    <button class="navbar-toggler ml-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

  <!-- navbar -->

<div class="container profile">
<div class="row mb-2">
<div class="col"><img class="ftprofil" src="assets/image/a2v.png"></div>
<div class="col colft">
  <h4>Sharhpo</h4>
  <p>daffazahirarkhan</p>
  </div>
</div>
</div>
</div>

      <div class="container mt-5">
    <div class="row row-cols-4 row-cols-md-4 row-cols-sm-1 g-3 text-center">

    <div class="col col-md-3 mb-5">
    <div class="card-fluid">
    <DIV CLASS="foto">
    <img src="image/a3.webp" alt=""  class="d-gbr  img-fluid" style="height:12rem;" onclick="zoomIn()">
    <a href="">
  <i class="fa-regular fa-heart " id="heart" style="font-size: 25px"></i>
    </a>
     </DIV>
  <div class="card-foot">
    <div class="isi">
    <a  href=""><img src="image/a4.jpg" alt=""></a>
    <p>username</p>

  <i class="fa-solid fa-eye fa-lg"></i>
   <p class="jlhv">15K</p>

   <a href="">
    <i class="fa-regular fa-comment fa-lg"></i>
  </a>
  <p class="jlhk">10k</p>
  </div>
  </div>
  </div>
  </div>
     <div class="col col-md-3 mb-5">
    <div class="card-fluid">
    <DIV CLASS="foto">
    <img src="image/a3.webp" alt=""  class="d-gbr  img-fluid" style="height:12rem;" onclick="zoomIn()">
    <a href="">
  <i class="fa-regular fa-heart " id="heart" style="font-size: 25px"></i>
    </a>
     </DIV>
  <div class="card-foot">
    <div class="isi">
    <a  href=""><img src="image/a4.jpg" alt=""></a>
    <p>username</p>

  <i class="fa-solid fa-eye fa-lg"></i>
   <p class="jlhv">15K</p>

   <a href="">
    <i class="fa-regular fa-comment fa-lg"></i>
  </a>
  <p class="jlhk">10k</p>
  </div>
  </div>
  </div>
  </div> <div class="col col-md-3 mb-5">
    <div class="card-fluid">
    <DIV CLASS="foto">
    <img src="image/a3.webp" alt=""  class="d-gbr  img-fluid" style="height:12rem;" onclick="zoomIn()">
    <a href="">
  <i class="fa-regular fa-heart " id="heart" style="font-size: 25px"></i>
    </a>
     </DIV>
  <div class="card-foot">
    <div class="isi">
    <a  href=""><img src="image/a4.jpg" alt=""></a>
    <p>username</p>

  <i class="fa-solid fa-eye fa-lg"></i>
   <p class="jlhv">15K</p>

   <a href="">
    <i class="fa-regular fa-comment fa-lg"></i>
  </a>
  <p class="jlhk">10k</p>
  </div>
  </div>
  </div>
  </div>
  <div class="col col-md-3 mb-5">
    <div class="card-fluid">
    <DIV CLASS="foto">
    <img src="image/a3.webp" alt=""  class="d-gbr  img-fluid" style="height:12rem;" onclick="zoomIn()">
    <a href="">
  <i class="fa-regular fa-heart " id="heart" style="font-size: 25px"></i>
    </a>
     </DIV>
  <div class="card-foot">
    <div class="isi">
    <a  href=""><img src="image/a4.jpg" alt=""></a>
    <p>username</p>

  <i class="fa-solid fa-eye fa-lg"></i>
   <p class="jlhv">15K</p>

   <a href="">
    <i class="fa-regular fa-comment fa-lg"></i>
  </a>
  <p class="jlhk">10k</p>
  </div>
  </div>
  </div>
  </div>
  <div class="col col-md-3 mb-5">
    <div class="card-fluid">
    <DIV CLASS="foto">
    <img src="image/a3.webp" alt=""  class="d-gbr  img-fluid" style="height:12rem;" onclick="zoomIn()">
    <a href="">
  <i class="fa-regular fa-heart " id="heart" style="font-size: 25px"></i>
    </a>
     </DIV>
  <div class="card-foot">
    <div class="isi">
    <a  href=""><img src="image/a4.jpg" alt=""></a>
    <p>username</p>

  <i class="fa-solid fa-eye fa-lg"></i>
   <p class="jlhv">15K</p>

   <a href="">
    <i class="fa-regular fa-comment fa-lg"></i>
  </a>
  <p class="jlhk">10k</p>
  </div>
  </div>
  </div>
</div>
</div>
</div>
    <!-- footer -->
  <div class="footer">
      <div  class="footer-left">
        <div class="row">
           <div class="col-lg-4">
            <div class="lgfooter">
      <img src="assets/image/logoh.png" alt="Logo" width="70" height="74" class="d-inline-block align-text-top">
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
 
</body>
</html>