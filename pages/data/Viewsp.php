<?php
	include('class/connect.php'); 
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-edit"></i> Menampilkan Data</a></li>
        <li><i class="fa fa-book"></i> Data Surat Perizinan</li>
      </ol>	
		<div class="row">
			<div class="col-lg-4">
				<?php 
		        if(isset($_GET['nama'])){
		            $cari = $_GET['nama'];
		            echo "<br><h4><b>Hasil pencarian : ".$cari."</b></h4><p>";
		        }
		        ?>
			</div>
			<div class="col-lg-4" >
			<?php 
			include "class/pengarsipan.php";
  			$pengarsipan = new pengarsipan(); ?>
  			<?php
  			if(isset($_GET['kategori'])){
  				$kate = $_GET['kategori'];
  			}
			?>	
			<form method="GET" action="controllers/data/prosesgetkategori.php">
				<label>Kategori</label>
				<div class="form-group input-group">
                <select id="select" class="form-control" name="kategori">
                  <?php $result = $pengarsipan->getDataKategori(); ?>
                  <?php while ($data = $result->fetch_assoc()) :?>
                  <option><?php echo $data['kategori']; ?></option>
                  <?php endwhile; ?></select>
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-sort"></i></button>
                </span>  
            	</div>
            </form>	
			</div>
			<div class="col-lg-4">
	  	<form method="GET" action="controllers/data/prosespencarianspt.php">
	  		<label>Search File Name</label>
	  		<div class="form-group input-group">
                <input type="text" class="form-control" name="nama">
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
                    <th width="600">Nama File</th>
                    <th width="150"><center>Tanggal Expired</center></th>
                    <th colspan="2" width="100"><center>Aksi</center></th>
                </tr>
                <?php
                $no = 1;

				if(isset($_GET['nama'])){
					$cari = $_GET['nama'];
					$data = mysql_query("SELECT * FROM upload_sp WHERE nama_file LIKE '%".$cari."%'");
				}else if(isset($_GET['kategori'])){
					$kate = $_GET['kategori'];
					$data = mysql_query("SELECT * FROM upload_sp WHERE kategori LIKE '%".$kate."%'");
				}else{
					$data = mysql_query("SELECT * FROM upload_sp");
				}

				while($da = mysql_fetch_array($data)){
				?>
				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td align="left"><?php echo $da['nama_file']; ?></td>
					<td align="center"><?php echo $da['tanggal_expired']; ?></td>
					<td width="50" align="center"><a href="<?php echo $da['file']; ?>" class="btn btn-primary">Download</a></td>
					<td width="50" align="center">
						<form action="controllers/detail/idsp.php" method="get">
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