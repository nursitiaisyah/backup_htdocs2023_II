<?php 
require 'function.php';
$sql = "DELETE FROM outlet WHERE id_outlet = " . stripslashes($_GET['id']);
$exe = mysqli_query($koneksi,$sql);

if($exe){
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: outlet.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}