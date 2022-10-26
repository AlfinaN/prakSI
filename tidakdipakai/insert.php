<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
                    <h5 class="card-title">Form Alternatif</h5>
                    <a href="formalternatif.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Bobot</h5>
                    <a href="formbobot.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Kriteria</h5>
                    <a href="formkriteria.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Matrix</h5>
                    <a href="formmatrix.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Skala</h5>
                    <a href="formskala.php" class="btn btn-primary">Show</a>
                </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>