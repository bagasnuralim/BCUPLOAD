<?php
  $conn = mysqli_connect('localhost','root','','pengarsipanpkl');
  $no = mysqli_query($conn, "SELECT id_login from login order by id_login desc");
  $kd = mysqli_fetch_array($no);
  $id = $kd['id_login'];

  $urut = substr($id, 6,3);
  $tambah = (int) $urut +1;
  $bln = date('m');
  $thn = date('y');

  if(strlen($tambah)==1){
    $format = "IL".$bln.$thn."00".$tambah;
  }else if(strlen($tambah)==2){
    $format = "IL".$bln.$thn."0".$tambah;
  }else{
    $format = "IL".$bln.$thn.$tambah;
  }
?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href=""><i class="fa fa-user"></i> Manajemen Users</a></li>
            <li><i class="fa fa-pencil-alt"></i> Add Users</li>
          </ol>
          <h3 align="center" style="color : #337ab7;"><b>Form Add Users</b></h3>
          <hr>
        </div>
      </div>
      <div class="row">         
            <p>
            <div class="col-lg-3"></div> 
            <form action="controllers/users/addusers.php" method="post" >
            <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" name="id_login" value="<?php echo $format; ?>">
              <label for="noun">Username</label>
              <input type="text" name="username" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="noun">Password</label>
              <input type="password" name="password" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="noun">Nama Lengkap User</label>
              <input type="text" name="nama" class="form-control" required />
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><b>@</b></span>
                <input type="text" class="form-control" name="gmail" placeholder="Gmail">
              </div>
            <div class="form-group">
                <label>Hak Akses User</label>
                <select class="form-control" name="hak">
                  <option>admin</option>
                  <option>user</option>
                </select>
            </div>
              <button type="submit" class="btn btn-success" style="width : 100%">Simpan</button>
            </div>
            </form>
            </p>    
      </div>       
      
    </div>
    