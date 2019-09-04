<?php
	include "class/pengarsipan.php";
	$pengarsipan = new pengarsipan();
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
		        <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
		        <li><a href=""><i class="fa fa-user"></i> Manajemen Users</a></li>
		        <li><i class="fa fa-address-card"></i> Daftar Users</li>
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
							<th>Nama Lengkap</th>
							<th>Username</th>
							<th>Hak Akses User</th>
							<th colspan="3" style="text-align: center;">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php $result = $pengarsipan->getDataLogin(); ?>
					<?php while ($data = $result->fetch_assoc()) :?>
						<tr>
							<td width="5%" style="text-align: center;"><?php echo $no++; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['hak']; ?></td>
							<td width="8%"><a href="application.php?page=profileusers&id_login=<?php echo $data['id_login'];?>" class="btn btn-success">Detail</a></td>
							<td width="8%"><a href="application.php?page=updateusers&id_login=<?php 
						echo $data['id_login'];
						?>" class="btn btn-primary">Ubah</a></td>
							<td width="8%"><a href="application.php?page=deleteusers&id_login=<?php echo $data['id_login'];?>" class="btn btn-danger"
								>Hapus</a></td>
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
            function deleteThis(id_login){
                if (confirm("Are you sure to delete this data?")) {
                    $.ajax({
                        type: 'post',
                        url: 'controllers/users/delete.php',
                        data: {id_login:id_login},
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
