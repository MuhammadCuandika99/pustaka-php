<?php
include "../../config/koneksi.php"; //include file koneksi
date_default_timezone_set('Asia/Jakarta');


//inisiasi module & act
$module = $_GET['module'];
$act = $_GET['act'];

//bagian insert data
if ($module == 'pinjam' and $act == 'insert'):
    //inisialisasi nama field le dalam variabel
    $isbn = $_POST['isbn'];
    $nisn = $_POST['nisn'];
    $kembali = $_POST['tanggal_kembali'];
    $id = date('dmyHis');
    $pinjam = date('Y-m-d');
    $status = 'pinjam';


    //querry ambil data stock
    $query = "SELECT stok FROM muda_buku WHERE isbn = $isbn";
    $result = mysqli_query($connection,$query); 
    $row = mysqli_fetch_array($result);
    // masukkan jumlah stok ke variebel
    $stok = $row['stok'];
    // lakukan pengurangan stok (-1)
    $newstock - $stok -1;

    //query insert
    $query = "INSERT INTO muda_peminjaman (id_peminjaman, nisn, isbn, tanggal_pinjaman, tanggal_kembali, status)
    VALUE ('$id','$nisn','$isbn','$pinjam','$kembali','$status')";

    //query update stok buku
    $query_stok = "UPDATE muda_buku SET
                    stok = $newstok
                    WHERE isbn = '$isbn'";

    //kondisi pengecekan apakah data berhasil dimasukan atau tidak
    if ($connection->query($query)) {

        //munculkan alert sukses simpan data
        session_start();
        $_SESSION["alert"] = "
        <div class = 'alert alert-success' role='alert'>
        Data Siswa Berhasil Di Simpan.
        </div>
        ";

        // jalankan query update stok
        $connection->query($query_stock);

        //redirect ke halaman awal
        header("location:../../media.php?module=" . $module);
    } else {

        //pesan error gagal insert data
        echo "data gagal disimpan!!";
    }

    elseif ($module == 'pinjam' and $act == 'delete'):

        //ambil id peminjaman
        $id = $_GET['id'];

        //ambil isbn
        $isbn = $_GET['isbn'];

        //querry ambil data stock
    $query = "SELECT stok FROM muda_buku WHERE isbn = $isbn";
    $result = mysqli_query($connection,$query); 
    $row = mysqli_fetch_array($result);

        //masukkan jumlah stok ke variabel
        $stok = $row['stok'];
        //lakukan penambahan stok (+1)
        $newstok = $stock + 1;

        //query delete peminjaman
        $query_pinjam = "DELETE FROM muda_peminjaman WHERE id_peminjaman = $id";
endif;