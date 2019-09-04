<?php
    include "class/pengarsipan.php";
    $pengarsipan = new pengarsipan();
    $data = null;
    if(isset($_GET['id_login'])) {
        $data = $pengarsipan->getProfile($_GET['id_login']);
    }
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><a href="application.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-address-card"></i> Manajemen Users</a></li>
                <li><i class="fa fa-user"></i> Detail Profil Users</li>
              </ol>
        <h3 style="color : #337ab7;">Detail Profile "<?php echo $data["nama"] ?>"</h3> 
        <hr>
    <?php if ($data) :?>
        <div class="col-lg-6">
        <table class="table table-bordered table-hover table-striped tablesorter" align="center">

            <tr>
                <th class="text-left" width="300px">username</th>
                <td class="text-left"> <?php echo $data["username"] ?> </td>
                
            </tr>
            <tr>
                <th class="text-left">Password</th>
                <td> <?php echo $data["password"] ?> </td>            
            </tr>
            <tr>
                <th class="text-left">Nama Lengkap</th>
                <td> <?php echo $data["nama"] ?> </td>
            </tr>
            <tr>
                <th class="text-left">Gmail</th>
                <td> <?php echo $data["gmail"] ?> </td>
            </tr>
            <tr>
                <th class="text-left">Hak Akses User</th>
                <td> <?php echo $data["hak"] ?> </td>           
            </tr>
        </table>
        
    </div>
    <?php endif; ?>
</p>