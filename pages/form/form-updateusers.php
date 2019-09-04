<?php
  include "class/pengarsipan.php";
  $pengarsipan = new pengarsipan();
  $data = null;
  if(isset($_GET['id_login'])){
    $data = $pengarsipan->getProfile($_GET['id_login']);
  }
?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href=""><i class="fa fa-user"></i> Manajemen Users</a></li>
            <li><i class="fa fa-pencil-alt"></i> Update Users</li>
          </ol>
          <h3 align="center" style="color : #337ab7;"><b>Form Update Users</b></h3>
          <hr>
        </div>
      </div>
      <div class="row">         
            <p>
            <div class="col-lg-3"></div> 
            <form action="controllers/users/updateusers.php" method="post" >
            <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" name="id_login" value="<?php echo $data['id_login']; ?>">
              <label for="noun">Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required />
            </div>
            <div class="form-group">
              <label for="noun">Password</label>
              <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required />
            </div>
            <div class="form-group">
              <label for="noun">Nama Lengkap User</label>
              <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required />
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><b>@</b></span>
                <input type="text" class="form-control" name="gmail" value="<?php echo $data['gmail']; ?>" >
            </div>
            <div class="form-group">
                <label>Hak Akses User</label>
                <select class="form-control" name="hak" value="<?php echo $data['hak'];?>" required>
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
    