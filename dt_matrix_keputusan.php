<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="jq/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <title>Data Detail Matrix Keputusan</title>
</head>
<body>
<?php
    include_once "navbar.html";
    ?> 
    <div class="text-center">
        <br>
        <h1>Data Detail Matrix Keputusan</h1>
        <br>
    </div>
    <div class="container text-center">   
        <table class="table" border="1">
            <tr>
                <thead>
                    <th >No.</th>
                    <th >ID matrix</th>
                    <th >ID alternatif</th>
                    <th >nama alternatif</th>
                    <th >ID kriteria</th>
                    <th >nama kriteria</th>
                    <th >ID bobot</th>
                    <th >Value</th>
                    <th >Nilai</th>
                    <th >Keterangan</th>
                </thead>
            </tr>
            <tbody>
                <?php
                include "koneksi.php";
                $no = 1;
                $kat=mysqli_query($conn,"SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,hasil_bobot.id_bobot,hasil_bobot.value,
                skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,hasil_bobot,kriteria,
                alternatif WHERE matrixkeputusan.id_alternatif=alternatif.id_alternatif AND 
                matrixkeputusan.id_bobot=hasil_bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
                AND kriteria.id_kriteria=hasil_bobot.id_kriteria 
                order by id_matrix ASC
                ");
                while($p=mysqli_fetch_array($kat)){

                    ?>
                    <tr>
                        <th><?php echo $no++; ?></th>
                        <td><?php echo $p['id_matrix']; ?></td>
                        <td><?php echo $p['id_alternatif']; ?></td>
                        <td><?php echo $p['nm_alternatif']; ?></td>
                        <td><?php echo $p['id_kriteria']; ?></td>
                        <td><?php echo $p['nm_kriteria']; ?></td>
                        <td><?php echo $p['id_bobot']; ?></td>
                        <td><?php echo $p['value']; ?></td>
                        <td><?php echo $p['nilai']; ?></td>
                        <td><?php echo $p['keterangan']; ?></td>
                    </tr>               
                <?php
                            }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>