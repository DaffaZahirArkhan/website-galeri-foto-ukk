<?php
session_start();
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
          <link rel="stylesheet" type="text/css" href="../css/foto.css">
        <title>kenangan</title>
	</head>
	<body>
				
<nav class="navbar d-flex fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">  
      <img src="../assets/image/logo1.jpeg" alt="Logo" width="70" height="74" class="d-inline-block align-text-top">
      <p>Kenangan</p>
    </a>
  <!--   <div class="search text-center flex-grow-1 d-flex justify-content-center align-items-center mx-auto me-5 ">
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

        <div class="container">
            <div class="row">
                 <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-header">Tambah Album</div>
                        <div class="card-body">
                            <form action="../config/aksi-album.php" method="POST">
                                <label class="form-label">Nama Album</label>
                                <input type="text" name="namaalbum" class="form-control" required></input>
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" required></textarea>
                                <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mt-2">
                        <div class="card-header">Data Album</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Album</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                    while($data = mysqli_fetch_array($sql)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data ['namaalbum'] ?></td>
                                        <td><?php echo $data ['deskripsi'] ?></td>
                                        <td><?php echo $data ['tanggalbuat'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['albumid'] ?>"> Edit </button>
                                            <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../config/aksi-album.php" method="POST">
                                                            <input type="hidden" name="albumid" value="<?php echo $data['albumid']?>">
                                                            <label class="form-label">Nama Album</label>
                                                            <input type="text" name="namaalbum" value="<?php echo $data['namaalbum']?>" class="form-control" required></input>
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi"  required>
                                                                <?php echo $data['deskripsi']; ?>
                                                            </textarea>    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid'] ?>"> Hapus </button>
                                            <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi-album.php" method="POST">
                                                        <input type="hidden" name="albumid" value="<?php echo $data['albumid']?>">
                                                        Apakah anda yakin ingin menghapus data  <strong><?php echo $data['namaalbum']?></strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td> 
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
      <img src="image/logoh.png" alt="Logo" width="70" height="74" class="d-inline-block align-text-top">
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