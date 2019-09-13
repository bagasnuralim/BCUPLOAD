<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
	include('class/connect.php'); 
?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
  include "class/pengarsipan.php";
  $pengarsipan = new pengarsipan();    

    $tgl = date("Y-m-d");
    $penerima = "bagasnuralim@gmail.com";
    $judul = "Reminder Surat Aktif";
    $isi = "Segera cek arsip surat aktif";
    $header = "From: 160613012@lpkia.ac.id\r\n".
              "Replay-to: 160613012@lpkia.ac.id\r\n".
              "Cc: bagasnuralim@gmail.com";

    mail($penerima,$judul,$isi,$header);

      $result = $pengarsipan->getDataSp();
        while ($data = $result->fetch_assoc()) {

          
          $tanggal_peringatan2 = $data['tgl_p2'];
          $tanggal_peringatan1 = $data['tgl_p1'];
          if($tgl == $tanggal_peringatan2){
                 echo "<script type='text/javascript'>
                                          setTimeout(function () {    
                                              swal({
                                                  title: 'Peringatan Arsip Expired !',
                                                  text:  'Cek Arsip Surat Aktif',
                                                  icon: 'info',
                                                 
                                                  animation : 'slideInUp',
                                                  showConfirmButton: true
                                                  });     
                                                  },10);  
                                                  
                                                      </script>";;
          }else if($tgl == $tanggal_peringatan1){
                  echo "<script type='text/javascript'>
                          setTimeout(function () {    
                              swal({
                                  title: 'Peringatan Arsip Expired !',
                                  text:  'Cek Arsip Surat Aktif',
                                  icon: 'warning',
                                
                                  animation : 'slideInUp',
                                  showConfirmButton: true
                                  });     
                                  },10);  
                                  
                                      </script>";;
          }
      }
?>

<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-13">
            <ol class="breadcrumb">
              <li><a href=""><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
              <li><i class="icon-file-alt"></i> </li>
            </ol>
        <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Selamat datang <font face="Texton Pro Ext" size="5"><?php echo $_SESSION['nama']; ?> </font> selamat bekerja di sistem pengarsipan PT. Papandayan Cocoa Industries. 
        </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-file-alt fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data = $pengarsipan->hitungArsipAktif();; ?></p>
                    <p class="announcement-text">Jumlah Arsip Aktif</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Arsip Surat Aktif
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-fire fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data = $pengarsipan->hitungArsipNonAktif();; ?></p>
                    <p class="announcement-text">Jumlah Arsip Expired</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Arsip Expired
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-handshake fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data = $pengarsipan->hitungArsipDipinjam();; ?></p>
                    <p class="announcement-text">Jumlah Arsip Di Pinjam</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Arsip Di Pinjam
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          
         
          
          <!-- 

           echo "<script type='text/javascript'>
                              setTimeout(function () {    
                                  swal({
                                      title: 'Login Berhasil',
                                      text:  'Selamat Datang ',
                                      icon: 'success',
                                      timer: 60,
                                      showConfirmButton: true
                                      });     
                                      },10);  
                                      window.setTimeout(function(){ 
                                          document.location.href='../../application.php?page=halamanutama';
                                          } ,3000);   
                                          </script>"; -->
          </div>
        </div><!-- /.row -->
        <div class="row">
        
</div>