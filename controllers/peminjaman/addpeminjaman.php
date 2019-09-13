<?php
	include '../../class/pengarsipan.php';
	$pengarsipan = new pengarsipan();

	//mengisi
	$pengarsipan->id_peminjaman = $_POST['id_peminjaman'];
	$pengarsipan->tanggal_peminjaman = $_POST['tanggal_peminjaman'];
	$pengarsipan->nama_arsip = $_POST['nama_arsip'];
	$pengarsipan->tanggal_pengembalian = $_POST['tanggal_pengembalian'];
	$pengarsipan->nama_peminjam = $_POST['nama_peminjam'];
	$pengarsipan->keterangan = $_POST['keterangan'];

	//tampung data error
	$error =$pengarsipan->addpeminjaman();

	//pengeceka n error
	if(!$error){
		header("location:../../application.php?page=addpeminjaman");
	} else {
		//membuat session untuk menampilkan pesan eror
		session_start();
		$_SESSION['message'] = $error;
		//memanggil tampilan create kembali
		echo "gagal";
	}
?>