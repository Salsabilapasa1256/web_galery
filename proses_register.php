<?php 
    include "koneksi.php";

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $NamaLengkap=$_POST['namalengkap'];
    $alamat=$_POST['alamat'];

    $sql=mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$NamaLengkap','$alamat')");
    // $sql=mysqli_query($conn, "insert into  user values('username','password','email','namalengkap','alamat')");

    header("location:login.php");
    // return $sql;
?>