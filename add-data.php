<?php
include("connection.php"); // Memasukkan koneksi database

// Proses Menambahkan Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $program_studi = $_POST['program_studi'];
    $fakultas = $_POST['fakultas'];
    $cita_cita = $_POST['cita_cita'];
    $hasil_quiz = $_POST['hasil_quiz'];

    // Query untuk memasukkan data baru ke database
    $query = "INSERT INTO user (nim, nama, program_studi, fakultas, cita_cita, hasil_quiz) 
              VALUES ('$nim', '$nama', '$program_studi', '$fakultas', '$cita_cita', '$hasil_quiz')";

    if (mysqli_query($link, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='tampilan-data.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($link) . "');</script>";
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <h2 class="text-center mb-4">Tambah Data</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="program_studi" class="form-label">Program Studi</label>
                    <select class="form-select" id="program_studi" name="program_studi" required>
                        <option selected disabled value="">Pilih Program Studi...</option>
                        <option value="D3 Sistem Informasi">D3 Sistem Informasi</option>
                        <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                        <option value="S1 Informatika">S1 Informatika</option>
                        <option value="S1 Sains Data">S1 Sains Data</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas" required>
            </div>
            <div class="mb-3">
                <label for="cita_cita" class="form-label">Cita-Cita</label>
                <input type="text" class="form-control" id="cita_cita" name="cita_cita" required>
            </div>
            <div class="mb-3">
                <label for="hasil_quiz" class="form-label">Hasil Quiz</label>
                <input type="text" class="form-control" id="hasil_quiz" name="hasil_quiz" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>

</html>
