<table class="table table-striped table-hover">
    <thead>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status Peminjaman</th>
    </thead>
    <tbody>
        <?php
            include "../../config/koneksi.php";
            $no = 1;
            $query_data_peminjam = mysqli_query($koneksi, "SELECT * FROM peminjaman
            LEFT JOIN user ON peminjaman.UserID=user.UserID
            LEFT JOIN buku ON peminjaman.BukuID=buku.BukuID");
            while ($data_peminjam = mysqli_fetch_assoc($query_data_peminjam)) {
        ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$data_peminjam['NamaLengkap'] ?></td>
            <td><?=$data_peminjam['Judul'] ?></td>
            <td><?=$data_peminjam['TanggalPeminjaman'] ?></td>
            <td><?=$data_peminjam['TanggalPengembalian'] ?></td>
            <td><?=$data_peminjam['StatusPeminjaman'] ?></td>

        </tr>
        <?php } ?>
    </tbody>
</table>