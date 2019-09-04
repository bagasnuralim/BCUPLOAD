<?php
    include "class/pengarsipan.php";
    $pengarsipan = new pengarsipan();
    $data = null;
    if(isset($_GET['id'])) {
        $data = $pengarsipan->getDetailbk($_GET['id']);
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
        <h3 style="color : #337ab7;">Detail Arsip "<?php echo $data["nama_surat"] ?>"</h3> 
        <hr>
    <?php if ($data) :?>
        <div class="col-lg-6">
        <table class="table table-bordered table-hover table-striped tablesorter" align="center">

            <tr>
                <th class="text-left" width="300px">No Surat</th>
                <td class="text-left"> <?php echo $data["id"] ?> </td>
                
            </tr>
            <tr>
                <th class="text-left">Nama Surat</th>
                <td> <?php echo $data["nama_surat"] ?> </td>            
            </tr>
            <tr>
                <th class="text-left">Perihal</th>
                <td> <?php echo $data["perihal_surat"] ?> </td>
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
                <td><a href="<?php echo $data['file']; ?>" class="btn btn-primary">Download</a> <a href="application.php?page=databk" class="btn btn-success">Kembali</a></td>
            </tr>              
        </table>
        
    </div>
    <?php endif; ?>
</p>