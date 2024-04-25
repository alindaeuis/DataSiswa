<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            font-family: "poppins", sans serif;
        }

        .main-print {
            padding: 2.5%;
            background-color: #e3e0e0;
            max-width: 640px;
            margin: 20px auto;
            border-radius: 10px;
        }

        .main-print h1 {
            text-align: center;
        }

        .main-print table {
            justify-content: center;
            align-items: center;
            margin: 0px auto;
            border-radius: 10px;
            font-size: 35px;
            text-align: center;
        }



        th {
            background-color: #a6a1a1;
            padding: 1% 10px;
            font-size: 20px;
        }

        td {
            color: #211f1f;
            background-color: #d1cfcf;
            padding: 10px 25px;
            font-size: 20px;
        }

        td a {
            background-color: #d32222;
            padding: 5px 10px;
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            border-radius: 5px;
        }

        .button-print {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 0 auto;
            text-align: center;
        }

        .button-print a {
            background-color: #378ae9;
            padding: 8px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease-in-out;
        }

        .button-print a:hover {
            background-color: #dfe0e0;
            padding: 3px border-radius: 8px;
            color: #292a2b;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .button-print i {
            margin-right: 4px;
            font-size: 15px;

        }
    </style>
</head>

<body>
    <div class="main-print" id="mainPrint">
        <h1>CETAK DATA SISWA</h1>
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
            header("Location: latihan2.php");
            exit;

        }

        if (isset($_POST['hapus'])) {
            session_destroy();
        }

        // var_dump($_SESSION['dataSiswa']);
        
        echo "<table>";
        // echo "<h1>CETAK DATA SISWA</h1>";
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
    <div class="button-print">
        <a href="latihan1.php"><i class="fa-sharp fa-solid fa-arrow-left"></i>Kembali</a>
        <button id="printButton" style="background-color:  #77787a;
            padding: 8px 13px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.5);
            color: #fff;
            font-size: 15px;border: none;"><i class="fa-solid fa-print"></i>Print</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js">
        document.getElementById('printButton').addEventListener('click', function () {
            const element = document.getElementById('mainPrint');
            html2pdf().from(element).save();
        });

    </script>
</body>

</html>