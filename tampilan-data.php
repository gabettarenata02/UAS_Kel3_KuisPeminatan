<?php
include("connection.php"); // Memasukkan koneksi database
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Quiz Peminatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tampilan-data.css"> 
</head> 

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <header class="header-title mb-4">
            <h1><a href="tampilan-data.php" style="text-decoration: none;"><span class="fw-normal text-dark">QUIZ</span> <span class="text-primary">PEMINATAN</span></a></h1>
            <hr>
        </header>
        <section>
            <h2 class="text-center">Data Hasil</h2>
            <!-- Tombol Add -->
            <div class="clearfix mb-3">
                <a href="add-data.php" class="btn btn-primary float-end" style="width: 100px;">Add</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Cita-Cita</th>
                            <th scope="col">Hasil Quiz</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM user ORDER BY nama ASC";
                        $result = mysqli_query($link, $query);

                        if (!$result) {
                            die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
                        }

                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($data['nim']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['nama']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['program_studi']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['fakultas']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['cita_cita']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['hasil_quiz'] ?? 'Belum Ada') . "</td>";
                            echo "<td class='text-center'>
                                <a href='update-data.php?nim=" . $data['nim'] . "' class='btn btn-info text-white btn-sm'>Update</a>
                                <a href='delete-data.php?nim=" . $data['nim'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                            </td>";
                            echo "</tr>";
                        }

                        mysqli_free_result($result);
                        mysqli_close($link);
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>
