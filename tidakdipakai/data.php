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
    
    <title>Data</title>
</head>
<body>
    <?php
    include_once "navbar.html";
    ?> 
    
    <div class="container">
        <div class="text-center">
            <br>
            <h1>Data</h1>
            <br>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Matrix Keputusan</h5>
                    <a href="dt_matrix_keputusan.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Normalisasi</h5>
                    <a href="dt_normalisasi.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Perangkingan</h5>
                    <a href="dt_Perangkingan.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Alternatif</h5>
                    <a href="dtalternatif.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Bobot</h5>
                    <a href="dtbobot.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Kriteria</h5>
                    <a href="dtkriteria.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Matrix</h5>
                    <a href="dtmatrix.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Skala</h5>
                    <a href="dtskala.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>