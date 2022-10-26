<?php
include "koneksi.php";
$idmatrix = $_POST['idmatrix'];
$idalternatif = $_POST['idalternatif'];
$idbobot = $_POST['idbobot'];
$idskala = $_POST['idskala'];

$sql="INSERT INTO matrixkeputusan (id_matrix,id_alternatif,id_bobot,id_skala) VALUES ('".$idmatrix."','".$idalternatif."','".$idbobot."','".$idskala."')";
$a=$conn->query($sql);
        if($a === true){
            header('location: dtmatrix.php');
        }else{
            echo "erooooor";
        }
?>