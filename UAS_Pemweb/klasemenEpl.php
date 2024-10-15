<?php
session_start();
// Sertakan file konfigurasi database
include "config.php";

// Query untuk mengambil data klasemen liga
$sql_standings = "SELECT k.*, l.nama_liga 
                  FROM klasemen k 
                  JOIN liga l ON k.liga_id = l.liga_id
                  ORDER BY k.poin DESC, k.selisi_gol DESC";
$result = mysqli_query($config, $sql_standings);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasemen Liga</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('gambar/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .table-custom {
            background-color: rgba(255, 255, 255, 0.8); /* Background table yang kontras dengan transparansi */
        }
        .table-info {
            color: white; /* Warna tulisan angka */
        }
        .rank-1-4 {
            background-color: blue; /* Warna biru untuk nomor 1-4 */
        }
        .rank-5-8 {
            background-color: orange; /* Warna oranye untuk nomor 5-8 */
        }
        .rank-9-seterusnya {
            background-color: white; /* Warna putih untuk nomor lainnya */
            color: black; /* Warna tulisan hitam */
        }
        .legend {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            background-color: white;

        }
        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
        .legend-blue {
            background-color: blue;
        }
        .legend-orange {
            background-color: orange;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <h3 class="text-center">Klasemen Premier League</h3>
        <table class="table table-bordered  table-custom">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Tim</th>
                    <th>Match</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                    <th>GF</th>
                    <th>GA</th>
                    <th>GD</th>
                    <th>Poin</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                    $rank_class = '';
                    if ($no <= 4) {
                        $rank_class = 'rank-1-4';
                    } elseif ($no <= 8) {
                        $rank_class = 'rank-5-8';
                    }else {
                        $rank_class = 'rank-9-seterusnya';
                    }
                ?>
                <tr class="text-center">
                    <td class="table-info <?php echo $rank_class; ?>"><?php echo $no;?></td>
                    <td><?php echo $data['nama_tim'];?></td>
                    <td><?php echo $data['main'];?></td>
                    <td><?php echo $data['menang'];?></td>
                    <td><?php echo $data['seri'];?></td>
                    <td><?php echo $data['kalah'];?></td>
                    <td><?php echo $data['gol'];?></td>
                    <td><?php echo $data['kebobolan'];?></td>
                    <td><?php echo $data['selisi_gol'];?></td>
                    <td><?php echo $data['poin'];?></td>
                </tr>
                <?php 
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <div class="legend">
            <div class="legend-item">
                <div class="legend-color legend-blue"></div>
                <span>Champions League</span>
            </div>
            <div class="legend-item">
                <div class="legend-color legend-orange"></div>
                <span>Europa League</span>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
