<?php
	include "/../../class/pengarsipan.php";
	$pengarsipan = new pengarsipan();

	$pengarsipan->nama_file = $_POST['nama_file'];
	$pengarsipan->tanggal_expired = $_POST['tanggal_expired'];
	$pengarsipan->tgl_p2 = $_POST['tgl_p2'];
	$pengarsipan->kategori = $_POST['kategori'];

	$error = $pengarsipan->InReminder2();

	
if(!$error){
			header("location: ../../application.php?page=datasp");
} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../application.php?page=detailsp&nama_file=$nama_file");
}

	
?>