<?php

	class Database {
	
		private $conn;
		
		// Method untuk menghubungkan ke database
		public function connect() {
			$this->conn = new mysqli("localhost", "root", "", "pengarsipanpkl");
			return $this->conn;
		}
		
		// method untuk memutuskan koneksi dengan database
		public function close() {
			return $this->conn->close();
		}
	}
		 function formatBytes($bytes, $precision = 2) { 
		    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

		    $bytes = max($bytes, 0); 
		    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
		    $pow = min($pow, count($units) - 1); 

		    $bytes /= pow(1024, $pow); 

		    return round($bytes, $precision) . ' ' . $units[$pow]; 
		}

		

		function rupiah($biaya){
					$hasil = "Rp ". number_format($biaya,2,',','.');
					return $hasil;
		}	
	
?>