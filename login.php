<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <form method="post" action="" class="login-form">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input class="button-login" type="submit" name="login" value="Login">

        <label for="Daftar">Belum Memiliki akun <b><a href="daftar.php">Daftar</a></b></label>
    </form>
</body>

</html>
<?php
session_start();
require 'config/koneksi.php';

if(isset($_POST['login'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $query = "SELECT * FROM user WHERE Username = '$username' OR Email = '$username'";
 $hasil = mysqli_query($koneksi, $query);
 $data = mysqli_fetch_assoc($hasil);

 if(mysqli_num_rows($hasil) > 0){
    if(MD5($password, $data['Password'])){
      $_SESSION['user_id']  = $data['UserID'];
      $_SESSION['username'] = $data['Username'];
      $_SESSION['email']    = $data['Email'];
      $_SESSION['nama']     = $data['NamaLengkap']; // BARU
      $_SESSION['level']    = $data['Level'];

      if($_SESSION['level'] == "Admin"){
        header("Location: pages/admin/index.php");
      }else if($_SESSION['level'] == "Peminjam"){
        header("Location: pages/peminjam/index.php");
      }else if($_SESSION['level'] == "Petugas"){
        header("Location: pages/petugas/index.php");
      }

    }else{
      echo "<script>alert('Password yang anda masukkan salah!'); window.location.href='index.php';</script>";
    }

 }else{
    echo "<script>alert('Username atau email yang anda masukkan tidak terdaftar!'); window.location.href='index.php';</script>";
 }

}
?>