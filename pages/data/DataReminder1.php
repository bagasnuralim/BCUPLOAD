
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href=""><i class="fa fa-clipboard-list"></i> Reminder</a></li>
            <li><i class="fa fa-bell"></i> Cek Surat Reminder 1</li>
          </ol>
          <h3 align="Left" style="color : #337ab7;"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <b>Cek Reminder 1 </b></h3> 
          <hr>
        </div>
      </div>
      <div class="row">         
            <div class="col-lg-4">
            <form method="POST" action="controllers/reminder/proses.php">
		  		<div class="form-group input-group">
		  			<?php $tgl_skrg = date("Y-m-d"); ?>
	                <input type="hidden" class="form-control" name="tgl_skrg" value="<?php echo $tgl_skrg; ?>">
	                <span class="input-group-btn">
	                  <button class="btn btn-default" type="submit">Refresh &nbsp <i class="fa fa-sync-alt"></i></button>
	                </span>
	            </div>
			</form>
            </div>
      </div>
      <div class="row">      
            <?php
			  include "class/pengarsipan.php";
			  $pengarsipan = new pengarsipan();
			  $data = null;
			  if(isset($_GET['tgl_p2'])){
			    $data = $pengarsipan->getDR2($_GET['tgl_p2']);
			  }
			?>
			<?php if ($data) :?>
		        <div class="col-lg-6">
		        <table class="table table-bordered table-hover table-striped tablesorter" align="center">
		            <tr>
		                <th class="text-left" width="300px">Nama Arsip</th>
		                <td class="text-left"> <?php echo $data["nama_file"] ?> </td>
		                
		            </tr>
		            <tr>
		                <th class="text-left">Kategori</th>
		                <td> <?php echo $data["kategori"] ?> </td>            
		            </tr>
		            <tr>
		                <th class="text-left">Berlaku s/d</th>
		                <td> <?php echo $data["tanggal_expired"] ?> </td>
		            </tr>
		        </table>    
		    </div>
		    <?php endif; ?>
      </div>         
    </div>
