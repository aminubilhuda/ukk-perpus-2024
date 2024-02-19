    <table id="myTable" class="table table-striped table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Judul</td>
                <td>Kategori</td>
                <td>Pengarang</td>
                <td>Penerbit</td>
                <td>Tahun Terbit</td>
                <td>Aksi</td>
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
                <td>

                    <!-- modal edit -->
                    <a href="" data-bs-toggle="modal" data-bs-target="#ModalEditBuku<?=$data['BukuID']?>">EDIT</a> |
                    <div class="modal fade" id="ModalEditBuku<?=$data['BukuID']?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">

                                        <label for="KategoriID" class="form-label">Kategori</label>
                                        <select class="form-select" name="KategoriID" id="KategoriID">
                                            <?php
                                            include "../../config/koneksi.php";
                                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                                            while ($data_kategori = mysqli_fetch_assoc($kategori)) {
                                        ?>
                                            <option
                                                <?php if($data['KategoriID'] == $data_kategori['KategoriID']) echo 'selected'; ?>
                                                value="<?=$data_kategori['KategoriID']?>">
                                                <?=$data_kategori['NamaKategori']?>
                                            </option>
                                            <?php
                                            }
                                        ?>
                                        </select>

                                        <input type="hidden" class="form-control" name="BukuID"
                                            value="<?=$data['BukuID']?>" required> <br>
                                        <label for="Judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="Judul" value="<?=$data['Judul']?>"
                                            required> <br>

                                        <label for="Penulis" class="form-label">Penulis</label>
                                        <input type="text" class="form-control" name="Penulis" required
                                            value="<?=$data['Penulis']?>">
                                        <br>

                                        <label for="Penerbit" class="form-label">Penerbit</label>
                                        <input type="text" class="form-control" name="Penerbit" required
                                            value="<?=$data['Penerbit']?>"> <br>

                                        <label for="TahunTerbit" class="form-label">Tahun Terbit</label>
                                        <input type="date" class="form-control" name="TahunTerbit" required
                                            value="<?=$data['TahunTerbit']?>">
                                        <br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="edit_buku" value="Edit" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal edit -->

                    <!-- modal hapus -->
                    <a href="" data-bs-toggle="modal" data-bs-target="#ModalHapusBuku<?=$data['BukuID']?>">HAPUS</a>
                    <div class="modal fade" id="ModalHapusBuku<?=$data['BukuID']?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">

                                        <input type="hidden" class="form-control" name="BukuID"
                                            value="<?=$data['BukuID']?>" required> <br>
                                        <label for="Judul" class="form-label">Judul</label>
                                        <input type="text" readonly="true" class="form-control" name="Judul"
                                            value="<?=$data['Judul']?>" required> <br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="hapus_buku" value="Hapus" class="btn btn-danger">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal hapus -->
                </td>
            </tr>
            <?php    }    ?>
        </tbody>
    </table>

    <!-- Modal  Tambah Buku-->
    <button type=" button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahBuku">
        Tambah Buku
    </button>

    <div class="modal fade" id="ModalTambahBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">

                        <label for="KategoriID" class="form-label">Kategori</label>
                        <select class="form-select" name="KategoriID" id="KategoriID">
                            <?php
                                include "../../config/koneksi.php";
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                                while ($data_kategori = mysqli_fetch_assoc($kategori)) {
                            ?>
                            <option value="<?=$data_kategori['KategoriID']?>"><?=$data_kategori['NamaKategori']?>
                            </option>
                            <?php
                                }
                            ?>
                        </select> <br>

                        <label for="Judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="Judul" required placeholder="Masukkan Judul"> <br>

                        <label for="Penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="Penulis" required placeholder="Masukkan Penulis">
                        <br>

                        <label for="Penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="Penerbit" required
                            placeholder="Masukkan Penerbit"> <br>

                        <label for="TahunTerbit" class="form-label">Tahun Terbit</label>
                        <input type="date" class="form-control" name="TahunTerbit" required
                            placeholder="Masukkan Tahun Terbit">
                        <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="tambah_buku" value="Tambah" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Buku-->


    <?php
    // proses tambah buku
    if(isset($_POST['tambah_buku'])){
        $kategori_id    = $_POST['KategoriID'];
        $judul          = $_POST['Judul'];
        $penulis        = $_POST['Penulis'];
        $penerbit       = $_POST['Penerbit'];
        $tahun_terbit   = $_POST['TahunTerbit'];

        $query_tambah_buku = mysqli_query($koneksi, "INSERT INTO buku VALUES (NULL, '$kategori_id', '$judul', '$penulis', '$penerbit', '$tahun_terbit')");

        if($query_tambah_buku){
            echo"
            <script>
                alert('Buku Berhasil Ditambahkan');
                 window.location='?page=buku';
            </script>
            ";
        } else {
            echo"
            <script>
                alert('Buku Gagal Ditambahkan!!');
                 window.location='?page=buku';
            </script>
            ";
            
        }
    }
    // end proses tambah buku

    // proses edit buku
    if(isset($_POST['edit_buku'])){
        $buku_id        = $_POST['BukuID'];
        $kategori_id    = $_POST['KategoriID'];
        $judul          = $_POST['Judul'];
        $penulis        = $_POST['Penulis'];
        $penerbit       = $_POST['Penerbit'];
        $tahun_terbit   = $_POST['TahunTerbit'];

        $query_edit_buku = mysqli_query($koneksi, "UPDATE buku SET KategoriID='$kategori_id', Judul='$judul', Penulis='$penulis', Penerbit='$penerbit', TahunTerbit='$tahun_terbit' WHERE BukuID=$buku_id");

        if($query_edit_buku){
            echo"
            <script>
                alert('Buku Berhasil Diedit');
                window.location='?page=buku';
            </script>
            ";
        } else {
            echo"
            <script>
                alert('Buku Gagal Diedit!!');
                window.location='?page=buku';
            </script>
            ";
        }
    }
    // end proses edit buku

    // proses delete buku
    if (isset($_POST['hapus_buku'])){
        $buku_id = $_POST['BukuID'];

        $query_hapus_buku = mysqli_query($koneksi, "DELETE FROM buku WHERE BukuID=$buku_id");
        if($query_hapus_buku){
            echo"
            <script>
                alert('Buku Berhasil Dihapus');
                window.location='?page=buku';
            </script>
            ";
        } else {
            echo"
            <script>
                alert('Buku Gagal Dihapus!!');
                window.location='?page=buku';
            </script>
            ";
        }
    }
    // end proses delete buku
?>
    <script>
let table = new DataTable('#myTable');
    </script>