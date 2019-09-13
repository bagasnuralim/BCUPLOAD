<?php
  $conn = mysqli_connect('localhost','root','','pengarsipanpkl');
  $no = mysqli_query($conn, "SELECT id_peminjaman from peminjaman order by id_peminjaman desc");
  $kd = mysqli_fetch_array($no);
  $id = $kd['id_peminjaman'];

  $urut = substr($id, 6,3);
  $tambah = (int) $urut +1;
  $bln = date('m');
  $thn = date('y');

  if(strlen($tambah)==1){
    $format = "PA".$bln.$thn."00".$tambah;
  }else if(strlen($tambah)==2){
    $format = "PA".$bln.$thn."0".$tambah;
  }else{
    $format = "PA".$bln.$thn.$tambah;
  }
?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href=""><i class="fa fa-user"></i> Peminjaman Arsip</a></li>
            <li><i class="fa fa-pencil-alt"></i> Input Peminjaman Arsip</li>
          </ol>
          <h3 align="center" style="color : #337ab7;"><b>Form Add Peminjaman Arsip</b></h3>
          <hr>
        </div>
      </div>
      <div class="row">         
            <p>
            <div class="col-lg-3"></div> 
            <form action="controllers/peminjaman/addpeminjaman.php" method="post" >
            <div class="col-md-6">        
                <div class="form-group">
                    <label for="noun">Nomor Peminjaman</label>
                    <input type="text" readonly name="id_peminjaman" class="form-control" value="<?php echo $format; ?>">
                </div>
                <div class="form-group">
                    <label for="noun">Tanggal Peminjaman</label>
                    <input type="date"  name="tanggal_peminjaman" class="form-control" value="<?php $date = date("Y-m-d"); echo $date ?>">
                </div>        
            <div class="form-group">
              <label for="noun">Nama Arsip</label>
              <input type="text" name="nama_arsip" class="form-control" required />
            </div>
            
            <div class="form-group">
              <label for="noun">Tanggal Pengembalian</label>
              <input type="date" name="tanggal_pengembalian" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="noun">Nama Peminjam / Penerima</label>
              <input type="text" name="nama_peminjam" class="form-control" required />
            </div>
            <div class="form-group">
                <label>Keterangan / Catatan</label>
                <textarea class="form-control" name="keterangan" rows="4"></textarea>
            </div>
              <button type="submit" class="btn btn-success" style="width : 100%">Simpan</button>
            </div>
            </form>
            </p>    
      </div>       
      
    </div>
    