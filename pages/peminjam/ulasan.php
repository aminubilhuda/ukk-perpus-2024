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
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
            include "../../config/koneksi.php";
            $no = 1;
            $query_ulasan = mysqli_query($koneksi, "SELECT * FROM ulasanbuku
            INNER JOIN buku ON ulasanbuku.BukuID=buku.BukuID
            INNER JOIN user ON ulasanbuku.UserID=user.UserID
            ");
            while ($data = mysqli_fetch_assoc($query_ulasan)) {
               
                if ($data['UserID'] == $_SESSION['user_id']) {
                    $ulasan_saya[] = $data;
                } else {
                    $ulasan_lainya[] = $data;
                }
        ?>
        <?php foreach ($ulasan_saya as $data) { ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$data['Judul'] ?></td>
            <td><?=$data['NamaLengkap'] ?></td>
            <td><?=$data['Ulasan'] ?></td>
            <td><?=$data['Rating'] ?></td>
            <td>
                <?php if ($data['UserID'] == $_SESSION['user_id']) { ?>

                <!-- Modal Edit -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#ModalEditUlasan<?=$data['UlasanID']?>">
                    Edit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ModalEditUlasan<?=$data['UlasanID']?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Ulasan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- form ulasan -->
                                <form action="" method="post">

                                    <div class="mb-3">
                                        <input type="hidden" name="UlasanID" value="<?= $data['UlasanID'] ?>"
                                            class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="UserID" value="<?= $_SESSION['user_id'] ?>"
                                            class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="BukuID" value="<?= $data['BukuID'] ?>"
                                            class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Ulasan</label>
                                        <textarea class="form-control" name="Ulasan" id="exampleFormControlTextarea1"
                                            rows="3"><?=$data['Ulasan'] ?></textarea>
                                    </div>

                                    <label for="Rating" class="form-label">Rating</label>
                                    <select name="Rating" class="form-select" aria-label="Default select example">
                                        <?php
                                            for ($r = 1; $r<=10; $r++){ ?>
                                        <option <?php if($data['Rating']== $r) echo 'selected'; ?>><?=$r;?>
                                        </option>
                                        <?php }
                                        ?>
                                    </select>
                                    <!-- end form ulasan -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="edit_ulasan" value="Update" class="btn btn-primary">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal edit -->
                <?php } ?>
            </td>
        </tr>
        <?php } ?>

        <?php } ?>

        <?php foreach ($ulasan_lainya as $data) { ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$data['Judul'] ?></td>
            <td><?=$data['NamaLengkap'] ?></td>
            <td><?=$data['Ulasan'] ?></td>
            <td><?=$data['Rating'] ?></td>
            <td>
                <?php if ($data['UserID'] == $_SESSION['user_id']) { ?>

                <!-- Modal Edit -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#ModalEditUlasan<?=$data['UlasanID']?>">
                    Edit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ModalEditUlasan<?=$data['UlasanID']?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Ulasan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- form ulasan -->
                                <form action="" method="post">

                                    <div class="mb-3">
                                        <input type="hidden" name="UlasanID" value="<?= $data['UlasanID'] ?>"
                                            class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="UserID" value="<?= $_SESSION['user_id'] ?>"
                                            class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="BukuID" value="<?= $data['BukuID'] ?>"
                                            class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Ulasan</label>
                                        <textarea class="form-control" name="Ulasan" id="exampleFormControlTextarea1"
                                            rows="3"><?=$data['Ulasan'] ?></textarea>
                                    </div>

                                    <label for="Rating" class="form-label">Rating</label>
                                    <select name="Rating" class="form-select" aria-label="Default select example">
                                        <?php
                                            for ($r = 1; $r<=10; $r++){ ?>
                                        <option <?php if($data['Rating']== $r) echo 'selected'; ?>><?=$r;?>
                                        </option>
                                        <?php }
                                        ?>
                                    </select>
                                    <!-- end form ulasan -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="edit_ulasan" value="Update" class="btn btn-primary">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal edit -->
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<!-- Modal Tambah Ulasan -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUlasan">
    Tambah Ulasan
</button>
<!-- Modal -->
<div class="modal fade" id="ModalTambahUlasan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Ulasan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form ulasan -->

                <form action="" method="post">

                    <div class="mb-3">
                        <input type="hidden" name="UserID" value="<?= $_SESSION['user_id'] ?>" class="form-control"
                            id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="BukuID" class="form-label">Buku</label>
                        <select class="form-select" name="BukuID" id="BukuID">
                            <?php
                                include "../../config/koneksi.php";
                                $buku = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($data_buku = mysqli_fetch_assoc($buku)) {
                            ?>
                            <option value="<?=$data_buku['BukuID']?>"><?=$data_buku['Judul']?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Ulasan</label>
                        <textarea class="form-control" name="Ulasan" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>

                    <label for="KategoriID" class="form-label">Rating</label>
                    <select name="Rating" class="form-select" aria-label="Default select example">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <!-- end form ulasan -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="tambah_ulasan" value="Simpan" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal tambah ulasan -->

<!-- Proses tambah ulasan -->
<?php
    if (isset($_POST['tambah_ulasan'])) {
        $user   = $_POST['UserID'];
        $buku   = $_POST['BukuID'];
        $ulasan = $_POST['Ulasan'];
        $rating = $_POST['Rating'];

        $query_input = mysqli_query($koneksi, "INSERT INTO ulasanbuku VALUE (NULL, '$user', '$buku', '$ulasan', '$rating')");

        if ($query_input) {
             echo"
            <script>
                alert('Ulasan Berhasil Ditambahkan');
                window.location='?page=ulasan';
            </script>
            ";
        } else {
            echo"
            <script>
               alert('Ulasan Gagal Ditambahkan!!');
                window.location='?page=ulasan';
            </script>
            ";
        }
    }
?>
<!-- end proses tambah ulasan -->

<!-- proses edit ulasan-->
<?php
    if(isset($_POST['edit_ulasan'])){
        $ulasan_id  = $_POST['UlasanID'];
        $user_id    = $_POST['UserID'];
        $buku_id    = $_POST['BukuID'];
        $ulasan     = $_POST['Ulasan'];
        $rating     = $_POST['Rating'];

        $query_edit = mysqli_query($koneksi, "UPDATE ulasanbuku SET UserID='$user_id', BukuID='$buku_id', Ulasan='$ulasan', Rating='$rating' WHERE UlasanID=$ulasan_id");

        if ($query_edit) {
            echo"
            <script>
               alert('Ulasan Berhasil Diupdate');
                window.location='?page=ulasan';
            </script>
            ";
        } else {
            echo"
            <script>
               alert('Ulasan Gagal Diupdate');
                window.location='?page=ulasan';
            </script>
            ";
        }
    }
?>
<!-- end proses edit ulasan-->