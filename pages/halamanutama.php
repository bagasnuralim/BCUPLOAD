<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    

      $result = $pengarsipan->getDataSp();
        while ($data = $result->fetch_assoc()) {

          
          $tanggal_peringatan2 = $data['tgl_p2'];
          $tanggal_peringatan1 = $data['tgl_p1'];
          if($tgl == $tanggal_peringatan2){
                 echo "<script type='text/javascript'>
                                          setTimeout(function () {    
                                              swal({
                                                  title: 'Peringatan Arsip Expired !',
                                                  text:  'Cek Arsip Surat Perizinan',
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
                                  text:  'Cek Arsip Surat Perizinan',
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
                    <i class="fa fa-envelope fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data = $pengarsipan->hitungsp();; ?></p>
                    <p class="announcement-text">Jumlah Surat Perizinan</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Arsip Surat Perizinan
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
                    <i class="fa fa-backward fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data = $pengarsipan->hitungbk();; ?></p>
                    <p class="announcement-text">Jumlah Arsip Surat Keluar</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Arsip Surat Keluar
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
                    <i class="fa fa-forward fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data = $pengarsipan->hitungbm();; ?></p>
                    <p class="announcement-text">Jumlah Arsip Surat Masuk</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Arsip Surat Masuk
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
</div>