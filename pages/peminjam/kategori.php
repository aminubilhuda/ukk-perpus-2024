    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Kategori</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../../config/koneksi.php";
                $no = 1;
                $query_data_kategori = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                while ($data = mysqli_fetch_assoc($query_data_kategori)){?>
            <tr>
                <td><?=$no++; ?></td>
                <td><?=$data['NamaKategori'] ?></td>
                <td>

                    <a href="" data-bs-toggle="modal"
                        data-bs-target="#ModalEditKategori<?=$data['KategoriID']?>">EDIT</a> |
                    <!-- modal edit -->
                    <div class="modal fade" id="ModalEditKategori<?=$data['KategoriID']?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">

                                        <input type="hidden" class="form-control" name="KategoriID"
                                            value="<?=$data['KategoriID']?>" required> <br>

                                        <label for="NamaKategori" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="NamaKategori"
                                            value="<?=$data['NamaKategori']?>" required> <br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="edit_kategori" value="Edit" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal edit -->

                    <a href="" data-bs-toggle="modal"
                        data-bs-target="#ModalHapusKategori<?=$data['KategoriID']?>">HAPUS</a>
                    <!-- modal hapus -->
                    <div class="modal fade" id="ModalHapusKategori<?=$data['KategoriID']?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <input type="hidden" class="form-control" name="KategoriID"
                                            value="<?=$data['KategoriID']?>" required> <br>
                                        <label for="Judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="NamaKategori"
                                            value="<?=$data['NamaKategori']?>" required> <br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="hapus_kategori" value="Hapus" class="btn btn-danger">
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

    <!-- Modal  Tambah Kategori-->
    <button type=" button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahKategori">
        Tambah Kategori
    </button>

    <div class="modal fade" id="ModalTambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <label for="Judul" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="NamaKategori" required
                            placeholder="Masukkan Kategori"> <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="tambah_kategori" value="Tambah" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Kategori-->


    <?php
    // proses tambah kategori
    if(isset($_POST['tambah_kategori'])){
        $NamaKategori    = $_POST['NamaKategori'];

        $query_tambah_kategori = mysqli_query($koneksi, "INSERT INTO kategoribuku VALUES (NULL, '$NamaKategori')");

        if($query_tambah_kategori){
            echo"
            <script>
                alert('Kategori Berhasil Ditambahkan');
                 window.location='index.php?page=kategori';
            </script>
            ";
        } else {
            echo"
            <script>
                alert('Buku Gagal Ditambahkan!!');
                 window.location='index.php?page=kategori';
            </script>
            ";
            
        }
    }
    // end proses tambah kategori

    // proses edit kategori
    if(isset($_POST['edit_kategori'])){
        $kategori_id        = $_POST['KategoriID'];
        $NamaKategori       = $_POST['NamaKategori'];

        $query_edit_kategori = mysqli_query($koneksi, "UPDATE kategoribuku SET NamaKategori='$NamaKategori' WHERE KategoriID=$kategori_id");

        if($query_edit_kategori){
            echo"
            <script>
                alert('Buku Berhasil Diedit');
                window.location='index.php?page=kategori';
            </script>
            ";
        } else {
            echo"
            <script>
                alert('Buku Gagal Diedit!!');
                window.location='index.php?page=kategori';
            </script>
            ";
        }
    }
    // end proses edit buku

    // proses delete buku
    if (isset($_POST['hapus_kategori'])){
        $kategori_id = $_POST['KategoriID'];

        $query_hapus_kategori = mysqli_query($koneksi, "DELETE FROM kategoribuku WHERE KategoriID=$kategori_id");
        if($query_hapus_kategori){
            echo"
            <script>
                alert('Buku Berhasil Dihapus');
                window.location='?page=kategori';
            </script>
            ";
        } else {
            echo"
            <script>
                alert('Buku Gagal Dihapus!!');
                window.location='?page=kategori';
            </script>
            ";
        }
    }
    // end proses delete buku
?>