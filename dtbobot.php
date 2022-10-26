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
    
    <title>Data Bobot</title>
</head>
<body>
<?php
    include_once "navbar.html";
    ?> 
<div class="text-center">
        <br>
        <h1>Data Bobot</h1>
        <br>
    </div>
    <div  class="container text-center">>
        <table class="table" border="1">
            <tr>
                <thead>
                    <th>ID bobot</th>
                    <th>ID kriteria</th>
                    <th>Value</th>
                </thead>
            </tr>
            <tbody>
                <?php
                include "koneksi.php";
                $no = 1;
                $kat=mysqli_query($conn,"SELECT * from hasil_bobot order by id_bobot ASC");
                while($p=mysqli_fetch_array($kat)){

                    ?>
                    <tr>
                        <th><?php echo $p['id_bobot'] ?></th>
                        <td><?php echo $p['id_kriteria']; ?></td>
                        <td><?php echo $p['value']; ?></td>
                    </tr>               
                <?php
                            }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>