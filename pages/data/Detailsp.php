<?php
    include "class/pengarsipan.php";
    $pengarsipan = new pengarsipan();
    $data = null;
    if(isset($_GET['id'])) {
        $data = $pengarsipan->getDetailsp($_GET['id']);
    }
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-edit"></i> Menampilkan Data</a></li>
                <li><i class="fa fa-pencil-square-o"></i> Data Surat Perizinan</li>
              </ol>
        <h3 style="color : #337ab7;">Detail Arsip "<?php echo $data["nama_file"] ?>"</h3> 
        <hr>
    <?php if ($data) :?>
        <div class="col-lg-6">
        <table class="table table-bordered table-hover table-striped tablesorter" align="center">

            <tr>
                <th class="text-left" width="300px">ID Arsip</th>
                <td width="300" class="text-left"> <?php echo $data["id"] ?> </td>
                
            </tr>
            <tr>
                <th class="text-left">Tanggal Upload</th>
                <td> <?php echo $data["tanggal_upload"] ?> </td>            
            </tr>
            <tr>
                <th class="text-left">Nama Arsip</th>
                <td> <?php echo $data["nama_file"] ?> </td>
            </tr>
            <tr>
                <th class="text-left">Tanggal Expired</th>
                <td> <?php echo $data["tanggal_expired"] ?> </td>           
            </tr>
            <tr>
                <th class="text-left">Biaya</th>
                <td> <?php echo rupiah($data["biaya"]); ?> </td>
            </tr>
            <tr>
                <th class="text-left">Kategori</th>
                <td> <?php echo $data["kategori"]; ?> </td>
            </tr>
            <tr>
                <th class="text-left">Tipe File</th>
                <td> <?php echo $data["tipe_file"] ?> </td>
            </tr>
            <tr>
                <th class="text-left">Ukuran File </th>
                <td> <?php echo formatBytes($data["ukuran_file"]) ?> </td>
            </tr>
            <tr>
                <th class="text-left">Aksi </th>
                <td><center><a href="<?php echo $data['file']; ?>" class="btn btn-primary">Download</a> <a href="application.php?page=datasp" class="btn btn-success">Kembali</a></center></td>
            </tr>              
        </table>        
    </div>
    
    <?php endif; ?>
</p>