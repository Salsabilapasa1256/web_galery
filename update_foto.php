<?php
include "koneksi.php";
session_start();

$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$albumid = $_POST['albumid'];

//upload gambar baru
if ($filename = $_FILES['lokasifile']['name'] !== "") {
    $rand = rand();
    $ekstensi = array("png", "jpg", "jpeg", "gif");
    $filename = $_FILES['lokasifile']['name'];
    $ukuran = $_FILES['lokasifile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:foto.php");
    } else {
        if ($ukuran < 1044070) {
            $x = $rand . '_' . $filename;
            move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
            mysqli_query($conn, "update foto set judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',lokasifile='$x',albumid='$albumid'");
            header("location:foto.php");
        } else {
            header("location:foto.php");
        }
    }
} else {
    mysqli_query($conn, "update foto set judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',albumid='$albumid'");
    header("location:foto.php");
}
?>