<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary text-light border-bottom border-dark">
        <div class="container">
            <h2 class="navbar-brand" href="index.php">Halaman Edit</h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon  btn btn-dark"></span> -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 24 24">
                    <path
                        d="M 3 5 A 1.0001 1.0001 0 1 0 3 7 L 21 7 A 1.0001 1.0001 0 1 0 21 5 L 3 5 z M 3 11 A 1.0001 1.0001 0 1 0 3 13 L 21 13 A 1.0001 1.0001 0 1 0 21 11 L 3 11 z M 3 17 A 1.0001 1.0001 0 1 0 3 19 L 21 19 A 1.0001 1.0001 0 1 0 21 17 L 3 17 z">
                    </path>
                </svg>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"> </div>

                <?php
                // session_start();
                if (!isset($_SESSION['userid'])) {
                    ?>
                    <ul>
                        <li><a href="register.php" class="btn btn-outline-primary m-1">Register</a></li>
                        <li><a href="login.php" class="btn btn-outline-success m-1">Login</a></li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <!-- <p>Selamat Datang <b>
                            <?= $_SESSION['namalengkap'] ?>
                        </b></p> -->
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="index.php" class="btn text-light m-1">Home</a></li>
                        <li class="nav-item"><a href="album.php" class="btn text-light m-1">Album</a></li>
                        <li class="nav-item"><a href="foto.php" class="btn text-light m-1">Foto</a></li>
                        <li class="nav-item"><a href="logout.php" class="btn btn-danger m-1">Logout</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>

    </nav>

    <form action="tambah_komentar.php" method="post">
        <?php
        include "koneksi.php";
        $fotoid = $_GET['fotoid'];
        $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
        while ($data = mysqli_fetch_array($sql)) {
            # code...
            ?>
            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
            <div class="table-responsive">
                <div class="container mb-4 mt-4">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Judul</td>
                            <td><input type="text" name="judulfoto" value="<?= $data['judulfoto'] ?>" class="form-control"
                                    id="exampleFormControlInput1"></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><input type="text" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>"
                                    class="form-control" id="exampleFormControlInput1"></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><img src="gambar/<?= $data['lokasifile'] ?>" width="150px" alt="hii"></td>
                        </tr>
                        <tr>
                            <td>Komentar</td>
                            <td class="mb-3">
                                <!-- <input type="text" name="isikomentar"> -->
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isikomentar"
                                    border="1"></textarea>
                            </td>

                        </tr>
                        <div class="d-grid gap-2 d-md-block">
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit">
                                        Kirim
                                        <!-- <input type="submit" value="Tambah"> -->
                                    </button>
                                </td>
                            </tr>
                        </div>
                    </table>
                </div>
            </div>
            <?php
        }
        ?>
    </form>

    <div class="table-responsive">
        <div class="table">
            <div class="container-fluid mt-3">
                <div class="d-flex justify-content-center">
                    <table width="100%" border="1" cellpadding=5 cellspacing=0
                        class="table-bordered table-striped table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                        </tr>
                        <?php
                        include "koneksi.php";
                        // session_start();
                        
                        $userid = $_SESSION['userid'];
                        $sql = mysqli_query($conn, "select * from komentarfoto,user where komentarfoto.userid=user.userid");
                        while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td>
                                    <?= $data['komentarid'] ?>
                                </td>
                                <td>
                                    <?= $data['namalengkap'] ?>
                                </td>
                                <td>
                                    <?= $data['isikomentar'] ?>
                                </td>
                                <td>
                                    <?= $data['tanggalkomentar'] ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br>
    <footer class="d-flex justify-content-center border-top mt-2 bg-secondary fixed-bottom">
        <p class="pt-2 text-light">&copy;  UKK RPL 2024 | SALSABILA PASA | SMK AL-GHIFARI</p>
    </footer>

    <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>