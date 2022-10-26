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
    
    <title>Form Kriteria</title>
</head>
<body>
<?php
    include_once "navbar.html";
    ?> 
<div class="text-center">
        <br>
        <h1>Form Kriteria</h1>
        <br>
    </div>
    <div class="container">
    <form class="form-group" action="insertkriteria.php" method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                <input  class="form-control mb-3 ml-2 "type="text" name="id_kriteria" placeholder="ID" required>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                <input  class="form-control mb-3 ml-2" type="text" name="nm_kriteria" placeholder="Nama" required>
                </td>
            </tr>
            <tr>
                <td>
                <input class="btn btn-primary" type="submit" name="Save" value="save">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>