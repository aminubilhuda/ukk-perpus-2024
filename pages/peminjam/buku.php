    <table id="myTable" class="table table-striped table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Judul</td>
                <td>Kategori</td>
                <td>Pengarang</td>
                <td>Penerbit</td>
                <td>Tahun Terbit</td>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../../config/koneksi.php";
                $no = 1;
                $query_data_buku = mysqli_query($koneksi, "SELECT * FROM buku 
                INNER JOIN kategoribuku 
                ON buku.KategoriID=kategoribuku.KategoriID");
                while ($data = mysqli_fetch_assoc($query_data_buku)){?>
            <tr>
                <td><?=$no++; ?></td>
                <td><?=$data['Judul'] ?></td>
                <td><?=$data['NamaKategori'] ?></td> <!-- BARU -->
                <td><?=$data['Penulis'] ?></td>
                <td><?=$data['Penerbit'] ?></td>
                <td><?=$data['TahunTerbit'] ?></td>

            </tr>
            <?php    }    ?>
        </tbody>
    </table>