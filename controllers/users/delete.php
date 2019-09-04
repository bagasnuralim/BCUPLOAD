<?php 
	include "/../../class/pengarsipan.php";
	$pengarsipan = new pengarsipan();

	//mengisi atribut dengan js delete
	$pengarsipan->id_login = $_GET['id_login'];
	//menampung hasil dari method hapus
	$error = $pengarsipan->delete();
	//pengecekan eror atau berhasil, !$error = berhasil
	if(!$error){
		//memanggil tampilan data
		
		echo 'Akun telah terhapus';
		//header("location: ../../application.php?page=datausers");
	} else {
		//membuat session untuk menampilkan pesan error bernama message 
		session_start();
		$_SESSION['message'] = $error;
		//memanggil data kembali
		header("location: ../../application.php?page=datausers");
	}
?>