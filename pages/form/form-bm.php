<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
  $conn = mysqli_connect('localhost','root','','pengarsipanpkl');
  $no = mysqli_query($conn, "SELECT id from upload_bm order by id desc");
  $kd = mysqli_fetch_array($no);
  $id = $kd['id'];

  $urut = substr($id, 6,3);
  $tambah = (int) $urut +1;
  $bln = date('m');
  $thn = date('y');

  if(strlen($tambah)==1){
    $format = "SM".$bln.$thn."00".$tambah;
  }else if(strlen($tambah)==2){
    $format = "SM".$bln.$thn."0".$tambah;
  }else{
    $format = "SM".$bln.$thn.$tambah;
  }
?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-edit"></i> Input Arsip</a></li>
            <li><i class="fa fa-pencil-alt"></i> Form Surat Masuk</li>
          </ol>
          <h3 style="color : #337ab7;">Form Surat Masuk</h3>
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
            </div>
          </div><!-- /.row -->     
            <p>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="col md-12">
            <div class="form-group">
              <input type="hidden" name="no_surat" class="form-control" value="<?php echo $format; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="noun">Nama Surat</label>
              <input type="text" name="nama_surat" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="noun">Sumber Surat</label>
              <input type="text" name="sumber_surat" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="noun">Perihal Surat</label>
              <input type="text" name="perihal_surat" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="noun">No Surat dari Sumber</label>
              <input type="text" name="no_surat_sumber" class="form-control" required />
            </div>
            <div class="form-group">
              <label>Search File</label>
              <input type="file" name="file" required />
            </div>
              <button type="submit" class="btn btn-success"  name="upload" value="Upload" style="width : 100%">Simpan</button>
            </div>
            </form>
            </p>
              <?php
              include('class/connect.php');
              if($_POST){
                $allowed_ext  = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
                $file_name    = $_FILES['file']['name'];
                $file_name_exp  = explode(".", $file_name);
                $file_ext   = strtolower(array_pop($file_name_exp));
                // $file_ext    = strtolower(end(explode('.', $file_name)));
                $file_size    = $_FILES['file']['size'];
                $file_tmp   = $_FILES['file']['tmp_name'];
                
                $no_surat = $_POST['no_surat'];
                $nama_surat = $_POST['nama_surat'];
                $sumber_surat = $_POST['sumber_surat'];
                $no_surat_sumber = $_POST['no_surat_sumber'];
                $perihal_surat = $_POST['perihal_surat'];
                
                if(in_array($file_ext, $allowed_ext) === true){
                  if($file_size < 2044070){
                    $lokasi = 'files/barang masuk/'.$nama_surat.'.'.$file_ext;
                    move_uploaded_file($file_tmp, $lokasi);
                    $in = mysql_query("INSERT INTO upload_bm VALUES('$no_surat', '$nama_surat', '$sumber_surat','$perihal_surat','$no_surat_sumber', '$file_ext', '$file_size', '$lokasi')");
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
                                            document.location.href='application.php?page=form-bm';
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
      </div>
    </div>
    