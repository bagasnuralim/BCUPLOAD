<?php
	include "class/pengarsipan.php";
	$pengarsipan = new pengarsipan();
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
		        <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
		        <li><i class="fa fa-address-card"></i> View Alerts</li>
	    	</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<?php
					$no = 1;

				?>
				
				<table class="table table-bordered table-hover table-striped tablesorter">
					<thead>
						<tr>
							<th width="5%" style="text-align: center;">No</th>
							<th>Nama Arsip</th>
							<th>Kategori</th>
							<th>Tanggal Expired</th>
							<th colspan="3" style="text-align: center;">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php $result = $pengarsipan->getDataSp(); ?>
					<?php while ($data = $result->fetch_assoc()) :?>
						<tr>
							<td width="5%" style="text-align: center;"><?php echo $no++; ?></td>
							<td><?php echo $data['nama_file']; ?></td>
							<td><?php echo $data['kategori']; ?></td>
							<td><?php echo $data['tanggal_expired']; ?></td>
							<td width="8%"><a href="application.php?page=profileusers&username=<?php echo $data['username'];?>" class="btn btn-success">Detail</a></td>
							<td width="8%"><a href="application.php?page=updateusers&username=<?php 
						echo $data['username'];
						?>" class="btn btn-primary">Ubah</a></td>
							<td width="8%"><a href="application.php?page=datausers" class="btn btn-danger" 
								onclick="deleteThis(<?php echo $data['nama']; ?>)">Hapus</a></td>
						</tr>
					</tbody>
					<?php endwhile; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="asset/js/jquery-1.10.2.js"></script>
					<script>
			            $(document).ready(function() {
			                $('#dataTables-example').DataTable({
			                        responsive: true
			                });
			            });
			        </script>
					<script>
            function deleteThis(nama){
                if (confirm("Are you sure to delete this data?")) {
                    $.ajax({
                        type: 'post',
                        url: 'controllers/users/delete.php',
                        data: {username:username},
                    succes : function(data){
                        if(data){
                            alert('data deleted');
                            window.location="application.php?page=datausers"; 
                        } else {
                            alert ("Can't delete data row" )
                        }
                    }
                    })
                }
            }
        </script>
