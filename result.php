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

    <title>Detail</title>
</head>
<body>
    <?php
    include_once "navbar.html";
    ?> 
    <?php
    $metode=$_GET['metode'];
	if ($metode == 'SAW')
	{
	?>
    <div class="text-center mb-3">
        <br>
        <h1>Detail Matrix Keputusan</h1>
        <br>
        <a class="btn btn-outline-primary active" href="result.php?metode=SAW" role="button">Metode SAW</a>
        <a class="btn btn-outline-dark" href="result.php?metode=WP" role="button">Metode WP</a>
        <a class="btn btn-outline-success" href="result.php?metode=default" role="button">Default</a>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,hasil_bobot.id_bobot,hasil_bobot.value,
            skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,hasil_bobot,kriteria,
            alternatif WHERE matrixkeputusan.id_alternatif=alternatif.id_alternatif AND 
            matrixkeputusan.id_bobot=hasil_bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
            AND kriteria.id_kriteria=hasil_bobot.id_kriteria ORDER BY id_matrix
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
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

    <div class="text-center">
        <br>
        <h1>Nilai Maksimum</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <td>ID Kriteria</td>
                <td>Nama Kriteria</td>
                <td>Maksimum</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT id_kriteria,nm_kriteria,MAX(nilai) AS maksimum FROM vmatrixkeputusan GROUP BY id_kriteria 
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_kriteria']; ?></td>
                    <td><?php echo $p['nm_kriteria']; ?></td>
                    <td><?php echo $p['maksimum']; ?></td>

                </tr>               
            <?php
                        }
            ?>
        </tbody>
    </table>
                    </div>

    <div class="text-center">
        <br>
        <h1>Detail Normalisasi</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Normalisasi</th>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT vmatrixkeputusan.*, (vmatrixkeputusan.nilai/nilaimax.maksimum) AS
            normalisasi FROM vmatrixkeputusan,nilaimax WHERE nilaimax.id_kriteria=
            vmatrixkeputusan.id_kriteria GROUP BY vmatrixkeputusan.id_matrix            
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_matrix']; ?></td>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['id_kriteria']; ?></td>
                    <td><?php echo $p['nm_kriteria']; ?></td>
                    <td><?php echo $p['id_bobot']; ?></td>
                    <td><?php echo $p['value']; ?></td>
                    <td><?php echo $p['nilai']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td><?php echo $p['normalisasi']; ?></td>
                </tr>               
            <?php
                        }
            ?>
            </tbody>
    </table>
    </div>

    <div class="text-center">
        <br>
        <h1>Detail Pra Perangkingan</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <td>ID Matrix</td>
                <td>ID Alternatif</td>
                <td>Nama Alternatif</td>
                <td>ID Kriteria</td>
                <td>Nama Kriteria</td>
                <td>ID Bobot</td>
                <td>Value</td>
                <td>Nilai</td>
                <td>Keterangan</td>
                <td>Prarangking</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT vnormalisasi.*,(vnormalisasi.value*vnormalisasi.normalisasi) AS prarangking
            FROM vnormalisasi GROUP BY vnormalisasi.id_matrix            
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_matrix']; ?></td>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['id_kriteria']; ?></td>
                    <td><?php echo $p['nm_kriteria']; ?></td>
                    <td><?php echo $p['id_bobot']; ?></td>
                    <td><?php echo $p['value']; ?></td>
                    <td><?php echo $p['nilai']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td><?php echo $p['normalisasi']; ?></td>
                </tr>               
            <?php
                        }
            ?>
            </tbody>
            </table>
                    </div>

    <div class="text-center">
        <br>
        <h1>Detail Perangkingan</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Rangking</th>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT id_alternatif,nm_alternatif,SUM(prarangking) AS rangking FROM vprarangking
            GROUP BY id_alternatif
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['rangking']; ?></td>
                </tr>               
            <?php
                        }
            ?>
        </tbody>
    </table>
    </div>

	<?php
    }elseif($metode == 'WP')
    { ?>
    <div class="text-center mb-3">
        <br>
        <h1>Detail Matrix Keputusan</h1>
        <br>
        <a class="btn btn-outline-primary" href="result.php?metode=SAW" role="button">Metode SAW</a>
        <a class="btn btn-outline-dark active" href="result.php?metode=WP" role="button">Metode WP</a>
        <a class="btn btn-outline-success" href="result.php?metode=default" role="button">Default</a>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,hasil_bobot.id_bobot,hasil_bobot.value,
            skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,hasil_bobot,kriteria,
            alternatif WHERE matrixkeputusan.id_alternatif=alternatif.id_alternatif AND 
            matrixkeputusan.id_bobot=hasil_bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
            AND kriteria.id_kriteria=hasil_bobot.id_kriteria ORDER BY id_matrix
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
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

    <div class="text-center">
        <br>
        <h1>Jumlah Bobot</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <td>Jumlah Bobot</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT SUM(VALUE) AS jumlah FROM hasil_bobot  
            ");
            while($p=mysqli_fetch_array($kat)){
                ?>
                <tr>
                    <td><?php echo $p['jumlah']; ?></td>
                </tr>               
            <?php
                        }
            ?>
        </tbody>
    </table>
                    </div>

    <div class="text-center">
        <br>
        <h1>Normalisasi Bobot</h1>
        <br>
    </div>
    <div  class="container text-center">
    <table class="table" border="2">
        <tr>
            <thead>
                <td>ID Bobot</td>
                <td>ID Kriteria</td>
                <td>Value</td>
                <td>Jumlah</td>
                <td>Normalisasi Bobot</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT hasil_bobot.*,wp_jumbobot.jumlah,(hasil_bobot.value/wp_jumbobot.jumlah) AS normalisasi_w 
            FROM hasil_bobot,wp_jumbobot 
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_bobot']; ?></td>
                    <td><?php echo $p['id_kriteria']; ?></td>
                    <td><?php echo $p['value']; ?></td>
                    <td><?php echo $p['jumlah']; ?></td>
                    <td><?php echo $p['normalisasi_w']; ?></td>
                </tr>               
            <?php
                        }
            ?>
            </tbody>
            </table>
                    </div>

    <div class="text-center">
        <br>
        <h1>Pangkat Pra-nilai S</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <td>ID Matrix</td>
                <td>ID Alternatif</td>
                <td>Nama Alternatif</td>
                <td>ID Kriteria</td>
                <td>Nama Kriteria</td>
                <td>ID Bobot</td>
                <td>Value</td>
                <td>Nilai</td>
                <td>Keterangan</td>
                <td>Normalisasi Bobot</td>
                <td>Pangkat</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT vmatrixkeputusan.*,wpnormalisasiterbobot.normalisasi_w,POW(vmatrixkeputusan.nilai,
            wpnormalisasiterbobot.normalisasi_w) AS pangkat FROM vmatrixkeputusan,
            wpnormalisasiterbobot WHERE wpnormalisasiterbobot.id_kriteria=vmatrixkeputusan.id_kriteria
            GROUP BY vmatrixkeputusan.id_matrix 
            ");
            while($p=mysqli_fetch_array($kat)){
                ?>
                <tr>
                    <td><?php echo $p['id_matrix']; ?></td>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['id_kriteria']; ?></td>
                    <td><?php echo $p['nm_kriteria']; ?></td>
                    <td><?php echo $p['id_bobot']; ?></td>
                    <td><?php echo $p['value']; ?></td>
                    <td><?php echo $p['nilai']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td><?php echo $p['normalisasi_w']; ?></td>
                    <td><?php echo $p['pangkat']; ?></td>
                </tr>               
            <?php
                        }
            ?>
        </tbody>
            </table>
                    </div>

    <div class="text-center">
        <br>
        <h1>Nilai S</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <td>ID Alternatif</td>
                <td>Nama Alternatif</td>
                <td>Nilai S</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT id_alternatif,nm_alternatif,EXP(SUM(LOG(wppangkat.pangkat))) AS nilais FROM wppangkat GROUP BY id_alternatif 
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['nilais']; ?></td>
                </tr>               
            <?php
                        }
            ?>
            </tbody>
    </table>
                    </div>

    <div class="text-center">
        <br>
        <h1>Sum Nilai S</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <td>Jumlah</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT SUM(wpnilais.nilais) AS jum FROM wpnilais  
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['jum']; ?></td>
                </tr>               
            <?php
                        }
            ?>
            </tbody>
    </table>
                    </div>

    <div class="text-center">
        <br>
        <h1>Nilai V</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <td>ID Alternatif</td>
                <td>Nama Alternatif</td>
                <td>Nilai V</td>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT wpnilais.id_alternatif,wpnilais.nm_alternatif, (nilais/jum) AS nilaiv FROM wpnilais,wpsums 
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['nilaiv']; ?></td>
                </tr>               
            <?php
                        }
            ?>
            </tbody>
    </table>
                    </div>

    <?php     
    }elseif($metode == 'default')
	{?>
    <div class="text-center mb-3">
        <br>
        <h1>Detail Matrix Keputusan</h1>
        <br>
        <a class="btn btn-outline-primary" href="result.php?metode=SAW" role="button">Metode SAW</a>
        <a class="btn btn-outline-dark" href="result.php?metode=WP" role="button">Metode WP</a>
        <a class="btn btn-outline-success active" href="result.php?metode=default" role="button">Default</a>
    </div>
    
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,hasil_bobot.id_bobot,hasil_bobot.value,
            skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,hasil_bobot,kriteria,
            alternatif WHERE matrixkeputusan.id_alternatif=alternatif.id_alternatif AND 
            matrixkeputusan.id_bobot=hasil_bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
            AND kriteria.id_kriteria=hasil_bobot.id_kriteria ORDER BY id_matrix
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
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

    <div class="text-center">
        <br>
        <h1>Detail Normalisasi</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Normalisasi</th>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT vmatrixkeputusan.*, (vmatrixkeputusan.nilai/nilaimax.maksimum) AS
            normalisasi FROM vmatrixkeputusan,nilaimax WHERE nilaimax.id_kriteria=
            vmatrixkeputusan.id_kriteria GROUP BY vmatrixkeputusan.id_matrix            
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_matrix']; ?></td>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['id_kriteria']; ?></td>
                    <td><?php echo $p['nm_kriteria']; ?></td>
                    <td><?php echo $p['id_bobot']; ?></td>
                    <td><?php echo $p['value']; ?></td>
                    <td><?php echo $p['nilai']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td><?php echo $p['normalisasi']; ?></td>
                </tr>               
            <?php
                        }
            ?>
            </tbody>
    </table>
    </div>

    <div class="text-center">
        <br>
        <h1>Detail Perangkingan</h1>
        <br>
    </div>
    <div  class="container text-center">
    
    <table class="table" border="2">
        <tr>
            <thead>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Rangking</th>
            </thead>
        </tr>
        <tbody>
            <?php
            include "koneksi.php";
            $kat=mysqli_query($conn,"SELECT id_alternatif,nm_alternatif,SUM(prarangking) AS rangking FROM vprarangking
            GROUP BY id_alternatif            
            ");
            while($p=mysqli_fetch_array($kat)){

                ?>
                <tr>
                    <td><?php echo $p['id_alternatif']; ?></td>
                    <td><?php echo $p['nm_alternatif']; ?></td>
                    <td><?php echo $p['rangking']; ?></td>
                </tr>               
            <?php
                        }
            ?>
        </tbody>
    </table>
    </div>
    <?php     
    }
	?>
</body>
</html>