<?php
  include "../../class/pengarsipan.php";
  $pengarsipan = new pengarsipan();
  $tgl_skrg = $_POST['tgl_skrg'];
  $result = $pengarsipan->getDataSp();
  while ($data = $result->fetch_assoc()){
    $tgl_p2 = $data['tgl_p2'];
    if($tgl_skrg == $tgl_p2){
      header("location: ../../application.php?page=dare1&tgl_p2=$tgl_p2");
    }else{
      header("location: ../../application.php?page=dare1");
    }
  }