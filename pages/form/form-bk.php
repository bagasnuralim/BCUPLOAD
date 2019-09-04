<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
  $conn = mysqli_connect('localhost','root','','pengarsipanpkl');
  $no = mysqli_query($conn, "SELECT id from upload_bk order by id desc");
  $kd = mysqli_fetch_array($no);
  $id = $kd['id'];

function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
}
  $urut = substr($id, -20);
  $tambah = (int) $urut +1;
  $bln = date('m');
  $romawi = getRomawi($bln);
  $thn = date('Y');

  if(strlen($tambah)==1){
    $format = "00".$tambah."/EX/HR-PCI/".$romawi."/".$thn;
  }else if(strlen($tambah)==2){
    $format = "0".$tambah."/EX/HR-PCI/".$romawi."/".$thn;
  }else{
    $format = $tambah."/EX/HR-PCI/".$romawi."/".$thn;
  }
?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-edit"></i> Input Arsip</a></li>
            <li><i class="fa fa-pencil-alt"></i> Form Surat Keluar</li>
          </ol>
          <h3 style="color : #337ab7;">Form Surat Keluar</h3>
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
              <label for="noun">No Surat</label>
              <input type="text" name="no_surat" class="form-control" value="<?php echo $format; ?>" readonly >
            </div>
            <div class="form-group">
              <label for="noun">Nama Surat</label>
              <input type="text" name="nama_surat" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="noun">Perihal</label>
              <input type="text" name="perihal_surat" class="form-control" required />
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
                
                $nama_surat = $_POST['nama_surat'];
                $no_surat = $_POST['no_surat'];
                $perihal_surat = $_POST['perihal_surat'];
                
                
                if(in_array($file_ext, $allowed_ext) === true){
                  if($file_size < 2044070){
                    $lokasi = 'files/barang keluar/'.$nama_surat.'.'.$file_ext;
                    move_uploaded_file($file_tmp, $lokasi);
                    $in = mysql_query("INSERT INTO upload_bk VALUES('$no_surat', '$nama_surat', '$perihal_surat', '$file_ext', '$file_size', '$lokasi')");
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
                                            document.location.href='application.php?page=bake';
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
    