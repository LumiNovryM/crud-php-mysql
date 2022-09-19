<?php
// Koneksi ke database
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starbhak Pustaka | Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="Style/index.css">
    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    
    <div class="container">
        <!-- SIDEBAR -->
        <div class="sidebar">
        <h5><span class="biru"><a href="index.php" style="text-decoration: none; color: #055BF3">Starbhak</a></span><span class="putih"><a href="index.php" style="text-decoration: none; color: white">Pustaka</a></span></h5>
            <div class="menu">
                <div class="btn siswa">
                    <ion-icon name="person"></ion-icon>
                    <p><a href="data-siswa.php">Data Siswa</a></p>
                </div>
                <div class="btn buku">
                    <ion-icon name="book"></ion-icon>
                    <p><a href="data-buku.php">Data Buku</a></p>
                </div>
            </div>
            <h5 class="pre" >Preferences</h5>
            <div class="pre-child">
                <ion-icon name="sunny"></ion-icon>
                <p>Light Mode</p>
            </div>
        </div>
        <!-- SIDEBAR -->

        <!-- TABEL -->
        <div class="tabel">
            <div class="header">
                <h2>Dashboard</h2>
                <div class="search">
                    <form action="" method="get">
                        <input type="text" placeholder="search" name="cari" autofocus autocomplete="off">
                    </form>
                </div>
            </div>
            <div class="content">
                <div class="header">
                    <h4>Data Siswa</h4>
                    <form action="">
                    <button><a href="add-siswa.html" style="text-decoration: none; color: white;">Tambah Siswa</a></button>
                    </form>
                </div>
                <div class="tampil">
                    <table cellpadding="10" cellspacing="0">
                        <tr class="head" >
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No.Telp</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM data_siswa ORDER BY id ASC";
                        $query = mysqli_query($connect,$sql);
                        if(isset($_GET['cari'])){
                            $query = mysqli_query($connect,"SELECT * FROM data_siswa WHERE nama LIKE '%".$_GET['cari']."%'");
                        }
                        while($sis = mysqli_fetch_array($query)){
                        echo"
                        <tr>
                            <td>$sis[id]</td>
                            <td>$sis[nama]</td>
                            <td>$sis[jurusan]</td>
                            <td>$sis[alamat]</td> 
                            <td>$sis[email]</td>
                            <td>$sis[telepon]</td>
                            <td>
                                <div class='btn'>
                                    <a class='hapus' href='form-edit-siswa.php?id=".$sis['id']."'  ><div class='pensil'><ion-icon name='pencil'></div></ion-icon></a>
                                    <a class='edit' href='delete-siswa.php?id=".$sis['id']."'><div class='sampah'><ion-icon name='trash'></div></ion-icon></i></a>
                                </div>
                            </td>
                        </tr>";
                        };
        
                        ?>
                    </table>
                </div>
            </div>
            
        </div>
        <!-- TABEL -->


    </div>



</body>
</html>