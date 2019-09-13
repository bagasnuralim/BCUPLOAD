<?php
	include('class/connect.php'); 
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-edit"></i> Peminjaman Arsip</a></li>
        <li><i class="fa fa-book"></i> Data Peminjaman Arsip</li>
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
				<thead>
            	<tr>
                	<th width="60"><center>No  <i class="fa fa-sort"></i></center></th>
                    <th width="400">Nama Arsip</th>
                    <th width="100"><center>Tanggal Pengembalian  <i class="fa fa-sort"></i></center></th>
                    <th width="150">Nama Peminjam</th>
                    <th>status</th>
                    <th width="100"><center>Aksi</center></th>
				</tr>
				</thead>
                <?php
                $no = 1;
			  	$date = date("Y-m-d");
				if(isset($_GET['nama_arsip'])){
					$cari = $_GET['nama_arsip'];
					$data = mysql_query("SELECT * FROM peminjaman WHERE nama_arsip LIKE '%".$cari."%'");
				}else{
					$data = mysql_query("SELECT * FROM peminjaman");
				}

				while($da = mysql_fetch_array($data)){
				?>
				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td align="left"><?php echo $da['nama_arsip']; ?></td>
					<td align="center"><?php echo $da['tanggal_pengembalian']; ?></td>
                    <td><?php echo $da['nama_peminjam']; ?></td>
                    <td width="10" align="center"><?php 
						if($date <= $da['tanggal_pengembalian']){
							echo '<i class="fa fa-check-square fa-2x"></i>';
						}else{
							echo '<i class="fa fa-window-close fa-2x"></i>';
						}
					?></td>
					<td width="50" align="center">
						<form action="controllers/detail/idp.php" method="get">
							<input type="hidden" name="id_peminjaman" value="<?php echo $da['id_peminjaman'] ?>">
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