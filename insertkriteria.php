<?php
include "koneksi.php";
$id_kriteria = $_POST['id_kriteria'];
$nm_kriteria = $_POST['nm_kriteria'];

$sql="INSERT INTO kriteria (id_kriteria,nm_kriteria) VALUES ('".$id_kriteria."','".$nm_kriteria."')";
$a=$conn->query($sql);
        if($a === true){
            header('location: dtkriteria.php');
        }else{
            echo "erooooor";
        }
?>