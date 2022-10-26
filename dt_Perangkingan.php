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
    
    <title>Data Perangkingan</title>
</head>
<body>
<?php
    include_once "navbar.html";
    ?> 
<div class="text-center">
        <br>
        <h1>Data Perangkingan</h1>
        <br>
    </div>
    <div class="container text-center">
        <table class="table" border="1">
            <tr>
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Ranking</th>
                </thead>
            </tr>
            <tbody>
                <?php
                include "koneksi.php";
                $no = 1;
                $kat=mysqli_query($conn,"SELECT id_alternatif,nm_alternatif,SUM(prarangking) AS rangking FROM vprarangking
                GROUP BY id_alternatif order by id_alternatif ASC");
                while($p=mysqli_fetch_array($kat)){

                    ?>
                    <tr>
                        <th><?php echo $no++; ?></th>
                        <td><?php echo $p['nm_alternatif']; ?></td>
                        <td><?php echo $p['rangking']; ?></td>
                    </tr>               
                <?php
                            }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>