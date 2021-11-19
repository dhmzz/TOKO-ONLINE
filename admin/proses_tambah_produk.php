<?php
    $nama_produk = $_POST['nama_produk']; 
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $temp = $_FILES['foto']['tmp_name'];
    $type = $_FILES['foto']['type'];
    $size = $_FILES['foto']['size'];
    $name = rand(0,9999).$_FILES['foto']['name'];
    $folder = "../foto/";

    // echo $temp.$type.$size.$name;

    include "koneksi.php";
    if ($size < 20480000 and ($type == "image/jpeg" or $type == "image/png")) 
    {
        
        if (move_uploaded_file($temp,$folder. $name)) {
            $input = mysqli_query($koneksi,"insert into produk (nama_produk,deskripsi,harga,foto) 
            VALUES ('".$nama_produk."','".$deskripsi."','".$harga."','".$name."')");
            if ($input) {
                echo "<script>alert('Berhasil');location.href='tampil_produk.php';</script>";
            }else {
                echo "<script>alert('Gagal');location.href='tampil_produk.php';</script>";
            }
        }
    }  
    else {
        echo "tidak ada";
        echo "<script>alert('file tidak sesuai');location.href='tampil_produk.php';</script>";
    }
?>