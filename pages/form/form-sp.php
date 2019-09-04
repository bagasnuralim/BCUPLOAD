<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
  include "class/pengarsipan.php";
  $pengarsipan = new pengarsipan();
?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-edit"></i> Input Arsip</a></li>
            <li><i class="fa fa-pencil-alt "></i> Form Surat Perizinan</li>
          </ol>
          <div class="row">
          <div class="col-lg-8"><h3 style="color : #337ab7;">Form Surat Perizinan</h3></div>
          
        </div>
        <hr>
            <div class="row">
              <div class="col-lg-12">
                <div class="bs-example">
                  <div class="alert alert-dismissable alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Perhatian!</h4>
                    <p>Upload file dengan melengkapi form di bawah ini. File yang bisa di Upload hanya file dengan ekstensi <b> pdf</b> dan besar file (file size) maksimal hanya 2 MB.</p>
                  </div>
                </div>
                <p>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="col md-12">
                <div class="form-group">
                  <?php
                    $conn = mysqli_connect('localhost','root','','pengarsipanpkl');
                    $no = mysqli_query($conn, "SELECT id from upload_sp order by id desc");
                    $kd = mysqli_fetch_array($no);
                    $id = $kd['id'];

                    $urut = substr($id, 6,3);
                    $tambah = (int) $urut +1;
                    $bln = date('m');
                    $thn = date('y');

                    if(strlen($tambah)==1){
                      $format = "SP".$bln.$thn."00".$tambah;
                    }else if(strlen($tambah)==2){
                      $format = "SP".$bln.$thn."0".$tambah;
                    }else{
                      $format = "SP".$bln.$thn.$tambah;
                    }
                  ?>
                  <input type="hidden" value="<?php echo $format; ?>" class="form-control" name="id" readonly>
                </div>
                <div class="form-group">
                  <label for="noun">Nama File</label>
                  <input type="text" name="nama" class="form-control" required />
                </div>
                <div class="form-group">
                  <label for="noun">Tanggal Expired</label>
                  <input type="date" name="tanggalEx" class="form-control" required />
                </div>
                <div class="form-group">
                  <label for="noun">Biaya</label>
                  <input type="text" name="Biaya" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Kategori  
                    </label><label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
                    <label><form method="POST" action="controllers/kategori/kategori.php">
                        <div class="form-group">
                          <label >Tambah Kategori</label>
                          <input type="text" name="kategori">
                          <button type="submit" class="btn-primary">Add</button>
                        </div>
                      </form></label>
                    <select id="select" class="form-control" name="kategori">
                      <?php $result = $pengarsipan->getDataKategori(); ?>
                      <?php while ($data = $result->fetch_assoc()) :?>
                      <option><?php echo $data['kategori']; ?></option>
                      <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                  <label>Search File</label>
                  <input type="file" name="file" required />
                </div>
                  <button type="submit" class="btn btn-success"  name="upload" value="Upload" style="width : 100%">Simpan</button>
                </div>
                </form>
                </p>
              </div>
              <div class="col-lg-6">
                <?php
              include('class/connect.php');
              if($_POST){
                $allowed_ext  = array('pdf');
                $file_name    = $_FILES['file']['name'];
                $file_name_exp  = explode(".", $file_name);
                $file_ext   = strtolower(array_pop($file_name_exp));
                // $file_ext    = strtolower(end(explode('.', $file_name)));
                $file_size    = $_FILES['file']['size'];
                $file_tmp   = $_FILES['file']['tmp_name'];
                
                $id = $_POST['id'];
                $tanggalEx = $_POST['tanggalEx'];
                $tgl_p2 = date("Y-m-d",strtotime('-2 month',strtotime($tanggalEx)));
                $tgl_p1 = date("Y-m-d",strtotime('+1 month',strtotime($tgl_p2)));
                $biaya = $_POST['Biaya'];
                $kategori = $_POST['kategori'];
                $nama     = $_POST['nama'];
                $tgl      = date("Y-m-d");
                
                if(in_array($file_ext, $allowed_ext) === true){
                  if($file_size < 2044070){
                    $lokasi = 'files/surat perizinan/'.$nama.'.'.$file_ext;
                    move_uploaded_file($file_tmp, $lokasi);
                    $in = mysql_query("INSERT INTO upload_sp VALUES('$id', '$tgl', '$nama', '$tanggalEx','$biaya','$kategori','$tgl_p2','$tgl_p1', '$file_ext', '$file_size', '$lokasi')");
                    if($in){
                      echo "<script type='text/javascript'>
                                setTimeout(function () {    
                                    swal({
                                        title: 'Berhasil !',
                                        text:  'Anda telah memasukan data',
                                        icon: 'success',
                                        timer: 10000,
                                        animation : 'slideInUp',
                                        showConfirmButton: true
                                        });     
                                        },10);  
                                        window.setTimeout(function(){ 
                                            document.location.href='application.php?page=form-sp';
                                            } ,3000);   
                                            </script>";
                    }else{
                      echo "<script type='text/javascript'>
                                setTimeout(function () {    
                                    swal({
                                        title: 'Gagal Upload !',
                                        text:  'Data yang anda masukan gagal',
                                        icon: 'error',
                                        timer: 10000,
                                        animation : 'slideInUp',
                                        showConfirmButton: true
                                        });     
                                        },10);  
                                        window.setTimeout(function(){ 
                                            document.location.href='application.php?page=form-sp';
                                            } ,3000);   
                                            </script>";
                    }
                  }else{
                    echo "<script type='text/javascript'>
                                setTimeout(function () {    
                                    swal({
                                        title: 'Upload Gagal!',
                                        text:  'Besar ukuran file maksimal 2 Mb !',
                                        icon: 'error',
                                        timer: 10000,
                                        animation : 'slideInUp',
                                        showConfirmButton: true
                                        });     
                                        },10);  
                                        window.setTimeout(function(){ 
                                            document.location.href='application.php?page=form-sp';
                                            } ,3000);   
                                            </script>";
                  }
                }else{
                  echo "<script type='text/javascript'>
                                setTimeout(function () {    
                                    swal({
                                        title: 'Gagal Upload !',
                                        text:  'File yang anda upload ilegal',
                                        icon: 'error',
                                        timer: 10000,
                                        animation : 'slideInUp',
                                        showConfirmButton: true
                                        });     
                                        },10);  
                                        window.setTimeout(function(){ 
                                            document.location.href='application.php?page=form-sp';
                                            } ,3000);   
                                            </script>";
                }
              }
              ?>
              </div>
            </div> <!--/.row -->        
            
                  
        </div>    
      </div>
    </div>
    