<div class='card'>
  <div class='card-header'>
    <h3>Data Siswa</h3>
  </div>
  <div class='card-body'>
    <!-- munculkan pesan alert -->
    <?php
    if (!empty($_SESSION['alert'])) :
      echo $_SESSION['alert'];
    endif;
    unset($_SESSION['alert']);
    ?>
    <!-- Tombol tambahd data siswa -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#siswaModal">
      Tambah Data Siswa
    </button>
    <!-- Bagian table -->
    <table class="table table-striped">

      <head>
        <th>No</th>
        <th>Nisn</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>No Hp</th>
        <th>Alamat</th>
        <th>Jenis kelamin</th>
        <th>Aksi</th>
        </thead>
        <tboddy>
          <?php
          $no = 1;
          $query = "SELECT * FROM muda_siswa";
          $conn = mysqli_query($connection, $query);
          while ($data = mysqli_fetch_array($conn)) {
            ?>

            <!-- Data Siswa -->
            <tr>
              <td>
                <?= $no++
                ; ?>
              </td>
              <td>
                <?= $data['nisn']; ?>
              </td>
              <td>
                <?= $data['nama_siswa']; ?>
              </td>
              <td>
                <?= $data['jurusan']; ?>
              </td>
              <td>
                <?= $data['no_hp']; ?>              </td>
              <td>
                <?= $data['alamat']; ?>
              </td>
              <td>
                <?= $data['jenis_kelamin']; ?>
              </td>
              <td>
             <a href="?module=edit-siswa&id=<?= $data['nisn']; ?>" class="btn btn-warning">Edit</a>
             <a href="module/siswa/aksi.php?module=siswa&act=delete&id=<?= $data['nisn']; ?>" onclick="return confirm ('Yakin dek mau hapusss data <?= $data['nama_siswa']; ?>') " class="btn btn-danger">HAPUS</a>
              </td> 
            </tr>
          <?php
           } ?>
          </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="siswaModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="module/siswa/aksi.php?module=siswa&act=insert" method="post">
              <!-- form input data siswa -->
              <div class="mb-3">
                <label for="NISN" class="form-label">Nisn</label>
                <input type="text" name="nisn" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="NISN" class="form-label">Jurusan</label>
                <select name="jurusan" class="form-select">
                  <option value="">-Pilih Jurusan-</option>
                  <option value="PPLG">PPLG</option>
                  <option value="TJKT">TJKT</option>
                  <option value="DKV">DKV</option>
                  <option value="AKL">AKL</option>
                  <option value="MPLB">MPLB</option>
                  <option value="PM">Pemasaran</option>
                </select>
              </div>
              <div>
                <label for="jenis_kelamin" class="form-label">jenis kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">No. HP</label>
                <input type="text" name="no_hp" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" rows="5" class="form-control"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
  <!-- modal hapus siswa -->
  <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>