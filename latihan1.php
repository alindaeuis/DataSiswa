<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="main-content">
        <h1>Masukkan Data Siswa</h1>
        <div class="form">
            <!-- <form action="" method="post">
                <label for="nama">NAMA</label>
                <input type="text" name="nama">
                <label for="nis">NIS</label>
                <input type="number" name="nis">
                <label for="rombel">ROMBEL</label>
                <input type="text" name="rombel">
                <label for="rayon">RAYON</label>
                <input type="text" name="nama">
            </form> -->
            <form method="post" action="">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">NAMA:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nis" class="col-sm-2 col-form-label">NIS:</label >
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nis" name="nis" required>
                    </div>
                </div>
                <div class="row mb-3 ">
                    <label for="rombel" class="col-sm-2 col-form-label">ROMBEL:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rombel" name="rombel" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="rayon" class="col-sm-2 col-form-label">RAYON</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rayon" name="rayon" required>
                    </div>
                </div>
                <button type="submit" class="tambah"
                    style="background-color: #3e86e3; outline: none; border-radius: 10px; font-size: 20px; padding: 5px 15px; color: #fff; border: none;"><i
                        class="fa-solid fa-plus"></i>TAMBAH</button>
                <button type="submit" class="cetak"
                    style="background-color:#777676; padding: 5px 10px; border-radius: 10px; border: none;"><a
                        href="latihan2.php"><i class="fa-solid fa-print"></i>CETAK</a></button>
                <button type="submit" class="hapus"
                    style="background-color: #d32222; padding: 5px 15px; border: none; border-radius: 10px;"><a
                        href="destroy.php"><i class="fa-solid fa-trash-can"></i>HAPUS
                        DATA</a></button>
            </form>
        </div>
        
        <div class="content-php">
            <?php
            session_start();
            if (!isset($_SESSION['dataSiswa'])) {
                $_SESSION['dataSiswa'] = array();
            }

            if (isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rombel']) && isset($_POST['rayon'])) {
                $data = array(
                    'nama' => $_POST['nama'],
                    'nis' => $_POST['nis'],
                    'rombel' => $_POST['rombel'],
                    'rayon' => $_POST['rayon'],
                );

                array_push($_SESSION['dataSiswa'], $data);
            }
            ;

            if (isset($_GET['hapus'])) {
                $index = $_GET['hapus'];
                unset($_SESSION['dataSiswa'][$index]);
                header("Location: latihan1.php");
                exit;

            }

            if (isset($_POST['hapus'])) {
                session_destroy();
            }

            // var_dump($_SESSION['dataSiswa']);
            
            echo "<table>";
            echo "<tr>";
            echo "<th>NAMA</th>";
            echo "<th>NIS</th>";
            echo "<th>ROMBEL</th>";
            echo "<th>RAYON</th>";
            echo "<th>HAPUS</th>";
            echo "</tr>";

            foreach ($_SESSION['dataSiswa'] as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value['nama'] . "</td>";
                echo "<td>" . $value['nis'] . "</td>";
                echo "<td>" . $value['rombel'] . "</td>";
                echo "<td>" . $value['rayon'] . "</td>";
                echo "<td><a href='?hapus=" . $key . "'>Hapus</a></td>";
                echo "</tr>";
            }

            echo "</table>";

            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>