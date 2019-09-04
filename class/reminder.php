<?php
	include 'config.php';
	class reminder {
		public $tanggal_sekarang = date("Y-m-d");
			public function getDataSP(){
				$db = new Database();
				$dbconnect = $db->connect();
				$sql = "SELECT * FROM upload_sp";
				$data = $dbConnect->query($sql);
				$dbConnect = $db->close();
				return $data;
			}
			public function getReminder(){
				$result = getDataSp();
				while ($data = $result->fetch_assoc()) {
		        public $tanggal_p2 = $data['tgl_p2'];
		        }
		          if($tanggal_p2 == $tanggal_sekarang){
		             echo "<script type='text/javascript'>
		                                        setTimeout(function () {    
		                                            swal({
		                                                title: 'Peringatan Arsip Expired !',
		                                                text:  'Cek Arsip Surat Perizinan',
		                                                icon: 'warning',
		                                                timer: 10000,
		                                                animation : 'slideInUp',
		                                                showConfirmButton: true
		                                                });     
		                                                },10);  
		                                                window.setTimeout(function(){ 
		                                                    document.location.href='application.php?page=halamanutama';
		                                                    } ,3000);   
		                                                    </script>";;
		          }  
			}
	}
?>