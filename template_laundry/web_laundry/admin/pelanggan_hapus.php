<?php 
return 'function.php';
$sql = "DELETE FROM member WHERE id_member = " . $_GET['id'];
$exe = mysqli_query($koneksi,$sql);

if($exe){
	$success = 'true';
	$title = 'Berhasil';
	$message = 'Menghapus Data';
	$type = 'success';
	header('location: pengguna.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}
?>