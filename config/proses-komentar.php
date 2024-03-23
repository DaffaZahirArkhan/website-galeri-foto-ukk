    <?php
    session_start();
    include 'koneksi.php';

    // Periksa apakah form dikirimkan
    if(isset($_POST['fotoid']) && isset($_POST['isikomentar'])) {
        $fotoid = $_POST['fotoid'];
        $userid = $_SESSION['userid'];
        $isikomentar = $_POST['isikomentar'];
        $tanggalkomentar = date('y-m-d');

        // Query untuk memasukkan komentar ke dalam database
        $query = mysqli_query($koneksi, "INSERT INTO komentarfoto VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");

        // Periksa apakah query berhasil dijalankan
        if($query) {
            echo "<script>
            alert('Komentar berhasil ditambahkan.');
            window.location.href='../admin/index.php';
            </script>";
        } else {
            echo "<script>
            alert('Gagal menambahkan komentar.');
            window.location.href='../admin/index.php';
            </script>";
        }
    }


    
    // Periksa apakah user yang sedang masuk (dalam sesi) adalah pemilik komentar yang ingin dihapus
    if(isset($_SESSION['userid']) && isset($_POST['komentarid'])) {
        $komentarid = $_POST['komentarid'];
        $userid = $_SESSION['userid'];
    
        // Periksa apakah komentar tersebut dimiliki oleh pengguna yang sedang masuk
        $query_check_owner = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE komentarid = '$komentarid' AND userid = '$userid'");
        $is_owner = mysqli_num_rows($query_check_owner);
    
        if($is_owner > 0) {
            // Query untuk menghapus komentar dari database
            $query_delete = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE komentarid = '$komentarid'");
    
            // Periksa apakah penghapusan berhasil
            if($query_delete) {
                echo "<script>
                alert('Komentar berhasil dihapus.');
                window.location.href='../admin/index.php';
                </script>";
            } else {
                echo "<script>
                alert('Gagal menghapus komentar.');
                window.location.href='../admin/index.php';
                </script>";
            }
        } else {
            // Jika pengguna bukan pemilik komentar, tampilkan pesan kesalahan
            echo "<script>
            alert('Anda tidak memiliki izin untuk menghapus komentar ini.');
            window.location.href='../admin/index.php';
            </script>";
        }
    } else {
        // Jika tidak ada sesi atau komentarid tidak diset, kembali ke halaman admin
        echo "<script>
        window.location.href='../admin/index.php';
        </script>";
    }
    ?>
