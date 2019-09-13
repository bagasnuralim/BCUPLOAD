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
		
		echo '<h3>Akun telah terhapus</h3> <td width="50" align="center"><a href="application.php?page=datausers" class="btn btn-primary">Kembali</a></td>';
		//header("location: ../../application.php?page=datausers");
	} else {
		//membuat session untuk menampilkan pesan error bernama message 
		session_start();
		$_SESSION['message'] = $error;
		//memanggil data kembali
		header("location: ../../application.php?page=datausers");
	}
?>