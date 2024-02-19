<table class="table table-striped table-hover">
    <thead>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status Peminjaman</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
            include "../../config/koneksi.php";
            $no = 1;
            $query_data_peminjam = mysqli_query($koneksi, "SELECT * FROM peminjaman
            INNER JOIN user ON peminjaman.UserID=user.UserID
            INNER JOIN buku ON peminjaman.BukuID=buku.BukuID
            WHERE peminjaman.UserID='$_SESSION[user_id]'");
            while ($data_peminjam = mysqli_fetch_assoc($query_data_peminjam)) {
        ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$data_peminjam['NamaLengkap'] ?></td>
            <td><?=$data_peminjam['Judul'] ?></td>
            <td><?=$data_peminjam['TanggalPeminjaman'] ?></td>
            <td><?=$data_peminjam['TanggalPengembalian'] ?></td>
            <td><?=$data_peminjam['StatusPeminjaman'] ?></td>
            <td>
                <?php if($data_peminjam['StatusPeminjaman'] == "dipinjam") { ?>
                <!-- Modal Edit Pinjam Buku -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#ModalEdit<?= $data_peminjam['PeminjamanID'] ?>">
                    Edit
                </button>
                <!-- Modal -->
                <div class="modal fade" id="ModalEdit<?= $data_peminjam['PeminjamanID'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- form edit -->

                                <form action="" method="post">

                                    <div class="mb-3">
                                        <input type="hidden" name="PeminjamanID"
                                            value="<?= $data_peminjam['PeminjamanID'] ?>" class="form-control"
                                            id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="UserID" value="<?= $_SESSION['user_id'] ?>"
                                            class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="BukuID" class="form-label">Buku</label>
                                        <select class="form-select" name="BukuID" id="BukuID">
                                            <?php
                                            include "../../config/koneksi.php";
                                            $buku = mysqli_query($koneksi, "SELECT * FROM buku");
                                            while ($data_buku = mysqli_fetch_assoc($buku)) {
                                        ?>
                                            <option
                                                <?php if($data_peminjam['BukuID'] == $data_buku['BukuID']) echo 'selected'; ?>
                                                value="<?=$data_buku['BukuID']?>">
                                                <?=$data_buku['Judul']?>
                                            </option>
                                            <?php
                                            }
                                        ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="TanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                                        <input type="date" name="TanggalPeminjaman" class="form-control"
                                            value="<?=$data_peminjam['TanggalPeminjaman']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="TanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                                        <input type="date" name="TanggalPengembalian" class="form-control"
                                            value="<?=$data_peminjam['TanggalPengembalian']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="StatusPeminjaman" class="form-label">Status Peminjaman</label>
                                        <select name="StatusPeminjaman" class="form-select">
                                            <option value="dipinjam"
                                                <?php if($data_peminjam['StatusPeminjaman']== "dipinjam") echo 'selected'; ?>>
                                                Dipinjam</option>
                                            <option value="dikembalikan"
                                                <?php if($data_peminjam['StatusPeminjaman']== "dikembalikan") echo 'selected'; ?>>
                                                Dikembalikan</option>
                                        </select>
                                    </div>

                                    <!-- end form edit -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="edit_pinjam" value="Simpan" class="btn btn-primary">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end Modal EDIT Pinjam Buku -->

                |

                <!-- Modal Hpus Pinjam Buku -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#ModalHapus<?= $data_peminjam['PeminjamanID'] ?>">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="ModalHapus<?= $data_peminjam['PeminjamanID'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- form hapus -->

                                <form action="" method="post">

                                    <div class="mb-3">
                                        <input type="hidden" name="PeminjamanID"
                                            value="<?= $data_peminjam['PeminjamanID'] ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="BukuID" class="form-label">Buku</label>
                                        <input type="text" disabled name="BukuID" value="<?= $data_peminjam['Judul'] ?>"
                                            class="form-control">
                                    </div>

                                    <!-- end form hapus -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="hapus_pinjam" value="Simpan" class="btn btn-primary">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end Modal Papus Pinjam Buku -->
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Modal Pinjam Buku -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPinjamBuku">
    Pinjam Buku
</button>
<!-- Modal -->
<div class="modal fade" id="ModalPinjamBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Peminjaman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form peminjaman -->

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
                        <label for="TanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="TanggalPeminjaman" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <div class="mb-3">
                        <label for="TanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" name="TanggalPengembalian" class="form-control"
                            id="exampleFormControlInput1">
                    </div>

                    <div class="mb-3">
                        <label for="StatusPeminjaman" class="form-label">Status Peminjaman</label>
                        <select name="StatusPeminjaman" class="form-select">
                            <option value="dipinjam">Dipinjam</option>
                            <option value="dikembalikan">Dikembalikan</option>
                        </select>
                    </div>

                    <!-- end form pinjaman -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="pinjam_buku" value="Simpan" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end Modal Pinjam Buku -->

<!-- proses peminjaman buku -->
<?php
    if (isset($_POST['pinjam_buku'])) {
        $user       = $_POST['UserID'];
        $buku       = $_POST['BukuID'];
        $tglPinjam  = $_POST['TanggalPeminjaman'];
        $tglBalik   = $_POST['TanggalPengembalian'];
        $status     = $_POST['StatusPeminjaman'];

        $query_pinjam = mysqli_query($koneksi, "INSERT INTO peminjaman VALUES (NULL, '$user', '$buku', '$tglPinjam', '$tglBalik', '$status')");

        if($query_pinjam){
             echo"
            <script>
                alert('Buku Berhasil Dipinjam');
                window.location='?page=peminjaman';
            </script>
            ";
        } else {
             echo"
            <script>
                alert('Buku Gagal Dipinjam');
                window.location='?page=peminjaman';
            </script>
            ";
        }
    }
?>
<!-- end proses peminjaman buku -->

<!-- proses Delete peminjaman -->
<?php
    if (isset($_POST['hapus_pinjam'])) {
        $id = $_POST['PeminjamanID'];

        $query_hapus = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE PeminjamanID=$id");

        if($query_hapus){
             echo"
            <script>
                alert('Buku Berhasil Dihapus');
                window.location='?page=peminjaman';
            </script>
            ";
        } else {
             echo"
            <script>
                alert('Buku Gagal Dihapus');
                window.location='?page=peminjaman';
            </script>
            ";
        }
    }
?>
<!-- end proses Delete peminjaman -->

<!-- proses EDIT peminjaman buku -->
<?php
    if (isset($_POST['edit_pinjam'])) {
        $id         = $_POST['PeminjamanID'];
        $user       = $_POST['UserID'];
        $buku       = $_POST['BukuID'];
        $tglPinjam  = $_POST['TanggalPeminjaman'];
        $tglBalik   = $_POST['TanggalPengembalian'];
        $status     = $_POST['StatusPeminjaman'];

        $query_pinjam = mysqli_query($koneksi, "UPDATE peminjaman 
        SET UserID='$user',
        BukuID='$buku',
        TanggalPeminjaman='$tglPinjam',
        TanggalPengembalian='$tglBalik',
        StatusPeminjaman='$status'
        WHERE PeminjamanID=$id");

        if($query_pinjam){
             echo"
            <script>
                alert('Buku Berhasil Dipinjam');
                window.location='?page=peminjaman';
            </script>
            ";
        } else {
             echo"
            <script>
                alert('Buku Gagal Dipinjam');
                window.location='?page=peminjaman';
            </script>
            ";
        }
    }
?>
<!-- end EDIT proses peminjaman buku -->