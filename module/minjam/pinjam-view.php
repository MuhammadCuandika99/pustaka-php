<div class='card'>
  <div class='card-header'>
    <h3>Data Peminjaman</h3>
  </div>
  <div class='card-body'>
    <!-- tombol tmbh siswa -->
    <!-- Button trigger modal -->
    <?php
    if (!empty($_SESSION['alert'])):
      echo $_SESSION['alert'];
    endif;
    unset($_SESSION['alert']);
    ?>
    <button type="button" class="btn btn-primary px-3 mb-3" data-bs-toggle="modal" data-bs-target="#bukuModal">
      Tambah data buku
    </button>

    <?php
    echo date('d-m-y H:i:s'); //menampilkan tanggal hari ini
    ?>
    <!-- bagian table -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tanggal Pinjam</th>
          <th>Judul Buku</th>
          <th>Nama Siswa</th>
          <th>Tanggal Pengembalian</th>
          <th>Aksi</th>
        </tr>

      </thead>
      <tbody>
        <?php
        //queryyy Select data siswa
        $no = 1;
        $query = "SELECT * FROM muda_peminjaman";
        // -- JOIN muda_siswa
        // -- ON muda_peminjaman.nisn = muda_siswa.nisn
        
        $conn = mysqli_query($connection, $query);
        while ($data = mysqli_fetch_array($conn)) {
          ?>
          <!-- fecth data peminjaman -->

          <tr>
            <td>
              <?= $no++ ?>
            </td>
            <td>
              <?= $data['tanggal_pinjaman']; ?>
            </td>
            <td>
              <?= $data['isbn']; ?>
            </td>
            <td>
              <?= $data['nisn']; ?>
            </td>
            <td>
              <?= $data['tanggal_kembali']; ?>
            </td>
            <td>
              <a href="?module=edit-buku&id=<?= $data['isbn']; ?>" class="btn btn-warning">Edit</a>
              <a href="module/buku/aksi.php?module=buku&act=delete&id=<?= $data['isbn']; ?>"
                onclick="return confirm ('Yakin dek mau hapusss data <?= $data['judul_buku']; ?>') "
                class="btn btn-danger">HAPUS</a>

            </td>
          </tr>
        <?php } ?>


      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="module/minjam/aksi.php?module=pinjam&act=insert" method="post">
          <!-- form input data siswa -->
          <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <select name="nisn" class="form-select">
              <option value="">- PILIH NAMA SISWA -</option>
              <?php
              $query = "SELECT * FROM muda_siswa";
              $conn = mysqli_query($connection, $query);
              while ($data = mysqli_fetch_array($conn)) { ?>
                <option value="<?= $data['nisn']; ?>"><?= $data['nama_siswa']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="isbn" class="form-label">Judul Buku</label>
            <select name="isbn" class="form-select">
              <option value="">- PILIH JUDUL BUKU -</option>
              <?php
              $query = "SELECT isbn,judul_buku FROM muda_buku";
              $conn = mysqli_query($connection, $query);
              while ($data = mysqli_fetch_array($conn)) { ?>
                <option value="<?= $data['isbn']; ?>"><?= $data['judul_buku']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="tanggalkembali" class="form-label">Tanggal Pengembalian (3 Hari Kerja)</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>