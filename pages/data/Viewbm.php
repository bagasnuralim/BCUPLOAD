<?php
	include('class/connect.php'); 
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-edit"></i> Menampilkan Data</a></li>
        <li><i class="fa fa-book"></i> Data Surat Masuk</li>
      </ol>
		<div class="row">
			<div class="col-lg-7">
				<?php 
		        if(isset($_GET['nama_surat'])){
		            $cari = $_GET['nama_surat'];
		            echo "<br><h4><b>Hasil pencarian : ".$cari."</b></h4><p>";
		        }
		        ?>
			</div>
			<div class="col-lg-5">
	  	<form method="GET" action="controllers/data/prosesgetbm.php">
	  		<label>Search File Name</label>
	  		<div class="form-group input-group">
                <input type="text" class="form-control" name="nama_surat">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
              </div>
		</form>
			</div>
		</div>
		
    
    <div class="row">
	  <div class="col-lg-12">
        <div class="table-responsive">
			<table class="table table-bordered table-hover table-striped tablesorter">
            	<tr>
                	<th width="50"><center>No</center></th>
                    <th width="400">Nama Surat</th>
                    <th width="350"><center>Perihal</center></th>
                    <th colspan="2" width="100"><center>Aksi</center></th>
                </tr>
                <?php
                $no = 1;

				if(isset($_GET['nama_surat'])){
					$cari = $_GET['nama_surat'];
					$data = mysql_query("SELECT * FROM upload_bm WHERE nama_surat LIKE '%".$cari."%'");
				}else{
					$data = mysql_query("SELECT * FROM upload_bm");
				}

				while($da = mysql_fetch_array($data)){
				?>
				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td align="left"><?php echo $da['nama_surat']; ?></td>
					<td align="center"><?php echo $da['perihal_surat']; ?></td>
					<td width="50" align="center"><a href="<?php echo $da['file']; ?>" class="btn btn-primary">Download</a></td>
					<td width="50" align="center">
						<form action="controllers/detail/idbm.php" method="get">
							<input type="hidden" name="id" value="<?php echo $da['id'] ?>">
							<button class="btn btn-success">Detail</button>
						</form> 
					</td>
				</tr>
				<?php
				}
				?>
            </table>
        </div>    	
      </div>
    </div>        
    </div>
  </div>
</div>            