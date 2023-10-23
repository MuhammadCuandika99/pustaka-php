<?php
include "../../config/koneksi.php"; //include file koneksi

//inisiasi module & act
$module = $_GET['module'];
$act = $_GET['act'];

//cek module dan act
if ($module == 'user' and $act == 'insert') :

    //inisiasi
    $nama =$_POST['nama_user'];
    $username =$_POST['username'];
    $pass =$_POST['pass'];
    $level =$_POST['level'];

    //fungsi
    $password = password_hash($pass, PASSWORD_DEFAULT);

    //querry
    $query = "INSERT INTO muda_user (nama_user, username, password, level, is_active)
            VALUES ('$nama', '$username', '$password', '$level', '1')";
            
            if ($connection->query($query)) {

                //munculkan alert sukses hapus data dengan session
               
            
                    //redirect ke halaman awal
                    header("location:../../media.php?module=" . $module);
                } else {
            
                    //pesan error gagal insert data
                    echo "data gagal dihapus!";
                }
endif;