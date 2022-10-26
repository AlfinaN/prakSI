<?php
include "koneksi.php";
$idalternatif = $_POST['id'];
$nmalternatif = $_POST['nama'];

$sql="INSERT INTO alternatif (id_alternatif,nm_alternatif) VALUES ('".$idalternatif."','".$nmalternatif."')";
$a=$conn->query($sql);
        if($a === true){
            header('location: dtalternatif.php');
        }else{
            echo "erooooor";
        }

?>