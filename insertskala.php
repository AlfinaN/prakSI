<?php
include "koneksi.php";
$idskala = $_POST['idskala'];
$value = $_POST['value'];
$keterangan = $_POST['keterangan'];

$sql="INSERT INTO skala (id_skala,value,keterangan) VALUES ('".$idskala."','".$value."','".$keterangan."')";
$a=$conn->query($sql);
        if($a === true){
            header('location: dtskala.php');
        }else{
            echo "erooooor";
        }
?>