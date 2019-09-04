<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
session_start();
	include_once "/../../class/config.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$db = new Database();
	$dbConnect = $db->connect();
	$data = mysqli_query($dbConnect,"select * from login where username='$username' AND password='$password'");
	$cek = mysqli_num_rows($data);
	

	if($cek > 0 ) {
		while ($rows = mysqli_fetch_array($data)):
		  $_SESSION['nama'] = $rows['nama'];
		  $_SESSION['hak'] = $rows['hak'];
           endwhile;
         
         header("location:../../application.php?page=halamanutama");


            }else{
            echo "
                                <script type='text/javascript'>
                                setTimeout(function () {    
                                    swal({
                                        title: 'Login Anda Gagal',
                                        text:  'Cek Kembali Username dan Password Anda',
                                        icon: 'error',
                                        timer: 5000,
                                        animation : 'slideInUp',
                                        showConfirmButton: true
                                        });     
                                        },10);  
                                        window.setTimeout(function(){ 
                                            document.location.href='../../index.php';
                                            } ,3000);   
                                            </script>";
                                        
                                    }	
?>