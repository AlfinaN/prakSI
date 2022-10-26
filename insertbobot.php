<?php
include "koneksi.php";
$id_bobot = $_POST['id_bobot'];
$id_kriteria = $_POST['id_kriteria'];
$value = $_POST['nama'];

$sql="INSERT INTO hasil_bobot (id_bobot,id_kriteria,value) VALUES ('".$id_bobot."','".$id_kriteria."','".$value."')";
$a=$conn->query($sql);
        if($a === true){
            header('location: dtbobot.php');
        }else{
            echo "erooooor";
        }

?>