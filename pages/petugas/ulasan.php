<?php
    session_start();
    include "../../config/koneksi.php";
?>

<table class="table table-striped">
    <thead>
        <th>No</th>
        <th>Buku</th>
        <th>Nama Pengulas</th>
        <th>Ulasan</th>
        <th>Rating</th>
    </thead>
    <tbody>
        <?php
            include "../../config/koneksi.php";
            $no = 1;
            $query_ulasan = mysqli_query($koneksi, "SELECT * FROM ulasanbuku
            INNER JOIN buku ON ulasanbuku.BukuID=buku.BukuID
            INNER JOIN user ON ulasanbuku.UserID=user.UserID");
            while ($data = mysqli_fetch_assoc($query_ulasan)){?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$data['Judul'] ?></td>
            <td><?=$data['NamaLengkap'] ?></td>
            <td><?=$data['Ulasan'] ?></td>
            <td><?=$data['Rating'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>