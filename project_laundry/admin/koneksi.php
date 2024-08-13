<?php
$koneksi=mysqli_connect('localhost','root','','laundry_project');
/*check connection */
if (mysqli_connect_error()) {
	printf("Connect failend :", mysqli_connect_error());
	exit();
}
?>
