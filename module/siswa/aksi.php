<?php
include "../../config/koneksi.php"; //include file koneksi

//inisiasi module & act
$module = $_GET['module'];
$act = $_GET['act'];

//bagian insert data
if ($module == 'siswa' AND $act == 'insert'):
    //inisiasi nama field ke dalam variabel
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    //query insert
    $query = "INSERT INTO muda_siswa (nisn,nama_siswa,jurusan,jenis_kelamin,alamat,no_hp)
          VALUES ('$nisn' , '$nama' , '$jurusan' , '$jekel' , '$alamat' , '$no_hp')";

    //kondisi pengecekan apakah data berhasil dihapus 
    if ($connection->query($query)) {

    //munculkan alert sukses hapus data dengan session
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-success' role='alert'>
        Data siswa Berhasil Disimpan.
        </div>
        ";

        //redirect ke halaman awal
        header("location:../../media.php?module=" . $module);
    } else {

        //pesan error gagal insert data
        echo "data gagal dihapus!";
    }
// DELETE
elseif ($module == 'siswa' and $act == 'delete') :

// ambil id siswa
$id = $_GET['id'];

//query deldete data
$query = "DELETE FROM muda_siswa WHERE nisn = $id";

    //kondisi pengecekan apakah data berhasil dihapus 
    if ($connection->query($query)) {

        //munculkan alert sukses hapus data dengan session
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
            Data siswa Berhasil Dihapus.
            </div>
            ";
    
            //redirect ke halaman awal
            header("location:../../media.php?module=" . $module);
        } else {
    
            //pesan error gagal insert data
            echo "data gagal dihapus!";
        }

        //bagian Edit Data Siswa
        elseif ($module == 'siswa' and $act == 'update') :

            // update
        //inisiasi data yang dikirim dalam variabel
        $id = $_POST['nisn'];
        $nama = $_POST['nama_siswa'];
        $jurusan = $_POST['jurusan'];
        $jekel = $_POST['jenis_kelamin'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

        // query data siswa
        $query = "UPDATE muda_siswa SET
        nama_siswa = '$nama',
        jurusan = '$jurusan',
        jenis_kelamin = '$jekel',
        no_hp = '$no_hp',
        alamat = '$alamat'
        WHERE nisn= $id";
            //kondisi pengecekan apakah data berhasil dihapus 
    if ($connection->query($query)) {

        //munculkan alert sukses hapus data dengan session
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
            Data siswa Berhasil Disimpan.
            </div>
            ";
    
            //redirect ke halaman awal
            header("location:../../media.php?module=" . $module);
        } else {
    
            //pesan error gagal insert data
            echo "data berhasil diupdate!";
        }
    
    
endif;