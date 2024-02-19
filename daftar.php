<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <!-- library sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <form action="" method="post">
        <label for="Username">Username = </label>
        <input type="text" id="Username" name="username"> <br>

        <label for="Password">Password = </label>
        <input type="password" id="Password" name="password"> <br>

        <label for="Email">Email = </label>
        <input type="text" id="Email" name="email"><br>

        <label for="NamaLengkap">Nama Lengkap = </label>
        <input type="text" id="NamaLengkap" name="namalengkap"><br>

        <label for="Alamat">Alamat = </label>
        <input type="text" id="Alamat" name="alamat"><br>

        <label for="Level">Level</label>
        <select name="level" id="Level">
            <option value="Peminjam">Peminjam</option>
            <option value="Admin">Administrator</option>
        </select><br>

        <input type="submit" value="Daftar" name="submit">
    </form>
</body>

</html>

<?php
include("config/koneksi.php");
    if (isset($_POST['submit'])) {
        $username       = $_POST['username'];
        $password       = md5($_POST['password']);
        $email          = $_POST['email'];
        $namalengkap    = $_POST['namalengkap'];
        $alamat         = $_POST['alamat'];
        $level          = $_POST['level'];

        $query_daftar = mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username', '$password', '$email', '$namalengkap', '$alamat','$level')");

        if ($query_daftar) {
        // Tampilkan SweetAlert
            echo "<script>
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data berhasil disimpan.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'login.php';
                        }
                    });
                </script>";
        } else {
            // Tampilkan SweetAlert
            echo "<script>
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data Gagal disimpan.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'daftar.php';
                        }
                    });
                </script>";
        }
    }
?>