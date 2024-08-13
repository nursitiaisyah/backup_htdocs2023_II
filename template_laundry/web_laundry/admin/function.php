<?php
session_start();

if($_SESSION){
    if($_SESSION['role'] == 'admin'){

    }else{
        header('location:../index.php');
    }
}else{
    header('location:../index.php');
}


$koneksi = mysqli_connect('localhost', 'root','web_laundry');
function ambildata($koneksi,$query){
	$data = mysqli_query($koneksi,$query);
	if (mysqli_num_rows($data) > 0) {
		while($row = mysqli_fetch_assoc($data)){
			$hasil[] = $row;
		}

		return $hasil;
	}
}

function bisa($koneksi,$query){
	$db = mysqli_query($koneksi,$query);

	if($db){
		return 1;
	}else{
		return 0;
	}
}

	function ambilsatubaris($koneksi,$query){
		$db = mysqli_query($koneksi,$query);
		return mysqli_fetch_assoc($db);
	}

	function hapus($where,$table,$redirect){
		$query = 'DELETE FROM' . $table . 'WHERE' .$where;
		echo $query;
	}

	?>


