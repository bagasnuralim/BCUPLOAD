<?php
    include "class/pengarsipan.php";
    $pengarsipan = new pengarsipan();
    $data = null;
    if(isset($_GET['id_peminjaman'])) {
        $data = $pengarsipan->getDetailPeminjaman($_GET['id_peminjaman']);
    }
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-edit"></i> Peminjaman Arsip</a></li>
                <li><i class="fa fa-pencil-square-o"></i> Data Peminjaman Arsip</li>
              </ol>
        <h3 style="color : #337ab7;">Detail Arsip "<?php echo $data["nama_arsip"] ?>"</h3> 
        <hr>
    <?php if ($data) :?>
        <div class="col-lg-6">
        <table class="table table-bordered table-hover table-striped tablesorter" align="center">

            <tr>
                <th class="text-left" width="300px">Kode Peminjaman</th>
                <td width="300" class="text-left"> <?php echo $data["id_peminjaman"] ?> </td>
                
            </tr>
            <tr>
                <th class="text-left">Tanggal Peminjaman</th>
                <td> <?php echo $data["tanggal_peminjaman"] ?> </td>            
            </tr>
            <tr>
                <th class="text-left">Nama Arsip</th>
                <td> <?php echo $data["nama_arsip"] ?> </td>
            </tr>
            <tr>
                <th class="text-left">Tanggal Pengembalian</th>
                <td> <?php echo $data["tanggal_pengembalian"] ?> </td>           
            </tr>
            <tr>
                <th class="text-left">Nama Peminjam</th>
                <td> <?php echo $data["nama_peminjam"]; ?> </td>
            </tr>
            <tr>
                <th class="text-left">Keterangan</th>
                <td> <?php echo $data["keterangan"]; ?> </td>
            </tr> 
            <tr>
                <th class="text-left">Aksi </th>
                <td><center> <a href="application.php?page=datap" class="btn btn-success">Kembali</a></center></td>
            </tr>                           
        </table>        
    </div>
    
    <?php endif; ?>
</p>