<?php
include "config/koneksi.php";
$isbn = $_GET['id'];
$query = "SELECT * FROM muda_buku WHERE isbn = $isbn";
$conn = mysqli_query($connection, $query);
$data = mysqli_fetch_array($conn);
?>
<div class='card-header'>
    <h1>Edit Data Buku</h1>
</div>
<div class='card-body'>
    <p>Edit Data Buku</p>
    <form action="module/buku/aksi.php?module=buku&act=update" method="post">
        <div class="mb-3">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="" placeholder="NISN....."
            value="<?= $data['isbn']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul</label>
            <input type="text" name="judul_buku" class="form-control" id="" value="<?= $data['judul_buku']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="pengarang">pengarang</label>
            <input type="text" name="pengarang" value="<?= $data['pengarang']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" id="" value="<?= $data['penerbit']; ?>"  required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" class="form-control" id="" value="<?= $data['tahun_terbit']; ?>" 
            required>
        </div>
        <div class="mb-3">
            <label for="jenis_buku" class="form-label">Jenis Buku</label>
            <input type="text" name="jenis_buku"  class="form-control" id="" value="<?= $data['jenis_buku']; ?>"
            required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">stok</label>
            <input type="text" name="stok"  class="form-control" id="" value="<?= $data['stok']; ?>" required>
        </div>
        <div class="mb-3">
            <a href="?module=buku" class="btn btn-primary">Batal</a>
            <input type="submit" value="Update Data" class="btn btn-success">
</div>
    </form>
</div>
</div>