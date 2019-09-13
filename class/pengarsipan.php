<?php
	include "config.php";
	
	class pengarsipan {		
		
		public function createusers(){
			$db = new Database();
			$dbconnect = $db->connect();
			$sql = "INSERT INTO login 
				(id_login,
				username,
				password,
				nama,
				gmail,
				hak
				)
				Values
				( '{$this->id_login}',
				  '{$this->username}',
				  '{$this->password}',
				  '{$this->nama}',
				  '{$this->gmail}',
				  '{$this->hak}'
				)";
			//eksekusi query diatas
			$data=$dbconnect->query($sql);
			if($sql="SELECT FROM login")

			//menampung data eror
			$error =$dbconnect->error;

			//menutup koneksi
			$dbconnect=$db->close();
			//mengembalikan data error
			return $error;	
		}
		public function addpeminjaman(){
			$db = new Database();
			$dbconnect = $db->connect();
			$sql = "INSERT INTO peminjaman 
				(id_peminjaman,
				tanggal_peminjaman,
				nama_arsip,
				tanggal_pengembalian,
				nama_peminjam,
				keterangan
				)
				Values
				( '{$this->id_peminjaman}',
				  '{$this->tanggal_peminjaman}',
				  '{$this->nama_arsip}',
				  '{$this->tanggal_pengembalian}',
				  '{$this->nama_peminjam}',
				  '{$this->keterangan}'
				)";
			//eksekusi query diatas
			$data=$dbconnect->query($sql);
			if($sql="SELECT FROM peminjaman")

			//menampung data eror
			$error =$dbconnect->error;

			//menutup koneksi
			$dbconnect=$db->close();
			//mengembalikan data error
			return $error;	
		}
		public function InReminder2(){
			$db = new Database();
			$dbconnect = $db->connect();
			$sql = "INSERT into reminder2_bulan 
				(nama_file,
				 tanggal_expired,
				 tgl_p2,
				 kategori
				)
				Values
				('{$this->nama_file}',
				 '{$this->tanggal_expired}',
				 '{$this->tgl_p2}',
				 '{$this->kategori}'
				)";
			//eksekusi query diatas
			$data=$dbconnect->query($sql);
			if($sql="SELECT FROM reminder2_bulan")

			//menampung data eror
			$error =$dbconnect->error;

			//menutup koneksi
			$dbconnect=$db->close();
			//mengembalikan data error
			return $error;	
		}
		public function InReminder1(){
			$db = new Database();
			$dbconnect = $db->connect();
			$sql = "INSERT into reminder1_bulan 
				(nama_file,
				 tanggal_expired,
				 tgl_p1,
				 kategori
				)
				Values
				('{$this->nama_file}',
				 '{$this->tanggal_expired}',
				 '{$this->tgl_p1}',
				 '{$this->kategori}'
				)";
			//eksekusi query diatas
			$data=$dbconnect->query($sql);
			if($sql="SELECT FROM reminder1_bulan")

			//menampung data eror
			$error =$dbconnect->error;

			//menutup koneksi
			$dbconnect=$db->close();
			//mengembalikan data error
			return $error;	
		}
		public function createkategori(){
			$db = new Database();
			$dbconnect = $db->connect();
			$sql = "INSERT INTO category 
				(kategori
				)
				Values
				( '{$this->kategori}'
				)";
			//eksekusi query diatas
			$data=$dbconnect->query($sql);
			if($sql="SELECT FROM category")

			//menampung data eror
			$error =$dbconnect->error;

			//menutup koneksi
			$dbconnect=$db->close();
			//mengembalikan data error
			return $error;	
		}
		public function getProfile ($id_login) {
			$db = new Database();	
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM login where id_login = '{$id_login}'"; 
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();	
			return $data->fetch_array();			
		}
		public function getDetailExpired ($tanggal_expired) {
			$db = new Database();	
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM upload_sp where tanggal_expired = '{$tanggal_expired}'"; 
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();	
			return $data->fetch_array();			
		}
		public function getDetailbk ($id) {
			$db = new Database();	
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM upload_bk where id = '{$id}'"; 
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();	
			return $data->fetch_array();			
		}
		public function getDetailbm ($id) {
			$db = new Database();	
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM upload_bm where id = '{$id}'"; 
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();	
			return $data->fetch_array();			
		}
		public function getDetailsp ($id) {
			$db = new Database();	
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM upload_sp where id = '{$id}'"; 
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();	
			return $data->fetch_array();			
		}
		public function getDetailPeminjaman ($id_peminjaman) {
			$db = new Database();	
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM peminjaman where id_peminjaman = '{$id_peminjaman}'"; 
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();	
			return $data->fetch_array();			
		}
		public function getDataLogin() {
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM login";
			$data = $dbConnect->query($sql);
			
			$dbConnect = $db->close();
			return $data;
		}
		public function getDataKategori() {
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM category";
			$data = $dbConnect->query($sql);
			
			$dbConnect = $db->close();
			return $data;
		}
		public function getDataSp() {
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM upload_sp";
			$data = $dbConnect->query($sql);
			
			$dbConnect = $db->close();
			return $data;
		}
		
		public function hitungArsipDipinjam(){
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			$data = mysqli_query($dbConnect,"SELECT * FROM peminjaman where CURRENT_DATE <= `tanggal_pengembalian`");
			$jumlah = mysqli_num_rows($data);
			echo $jumlah;
		}
		public function hitungArsipNonAktif(){
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			$data = mysqli_query($dbConnect,"SELECT * FROM upload_sp where `tanggal_expired` <= CURRENT_DATE");
			$jumlah = mysqli_num_rows($data);
			echo $jumlah;
		}
		public function hitungArsipAktif(){
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			$data = mysqli_query($dbConnect,"SELECT * FROM upload_sp where  CURRENT_DATE <= `tanggal_expired`");
			$jumlah = mysqli_num_rows($data);
			echo $jumlah;
		}
		public function delete(){
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			//querry menghapus data
			$sql = "DELETE FROM login where id_login = '{$this->id_login}'";
			//eksekusi querry diatas
			$data = $dbConnect->query($sql);
			//menampung error query simpan data
			$error = $dbConnect->error;
			//menutup koneksi
			$dbConnect = $db->close();
			//mengembalikan nilai error
			return $error;
		}
			public function update() {
			$db = new Database();
			//membukan koneksi
			$dbConnect = $db->connect();
			
			//query menyimpan data
			$sql = "update login
					SET 
						username = '{$this->username}',
						password ='{$this->password}',
						nama ='{$this->nama}',
						gmail ='{$this->gmail}',
						hak ='{$this->hak}'
						where id_login = '{$this->id_login}'
						";
			//eksekusi query di atas
			$data = $dbConnect->query($sql);
			//menampung error query simpan data
			$error = $dbConnect->error;
			//menutup koneksi
			$dbConnect = $db->close();
			
			//mengembalikan nilai error
			return $error;
		}

			public function getDR1(){
				$db = new Database();
				$dbConnect = $db->connect();
				$sql = "SELECT * FROM upload_sp where tgl_p2 <= '{$date}'";
				$data = $dbConnect->query($sql);
				$dbConnect = $db->close();
				return $data;
			}
			public function getDataReminder2(){
				$db = new Database();
				$dbConnect = $db->connect();
				$sql = "SELECT * FROM reminder2_bulan";
				$data = $dbConnect->query($sql);
				
				$dbConnect = $db->close();
				return $data;
			}
			
	}

?>