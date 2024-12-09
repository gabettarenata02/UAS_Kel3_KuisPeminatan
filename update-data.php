<?php
include("connection.php"); // Memasukkan koneksi database

// Ambil data berdasarkan NIM
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $query = "SELECT * FROM user WHERE nim = '$nim'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($result);
}

// Proses Update Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $program_studi = $_POST['program_studi'];
    $fakultas = $_POST['fakultas'];
    $cita_cita = $_POST['cita_cita'];
    $hasil_quiz = $_POST['hasil_quiz'];

    $query = "UPDATE user SET 
              nama = '$nama', 
              program_studi = '$program_studi',
              fakultas = '$fakultas',
              cita_cita = '$cita_cita',
              hasil_quiz = '$hasil_quiz'
              WHERE nim = '$nim'";

    if (mysqli_query($link, $query)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='tampilan-data.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($link) . "');</script>";
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <h2 class="text-center mb-4">Update Data</h2>
        <form method="POST">
            <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
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
                <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?php echo $data['fakultas']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cita_cita" class="form-label">Cita-Cita</label>
                <input type="text" class="form-control" id="cita_cita" name="cita_cita" value="<?php echo $data['cita_cita']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="hasil_quiz" class="form-label">Hasil Quiz</label>
                <input type="text" class="form-control" id="hasil_quiz" name="hasil_quiz" value="<?php echo $data['hasil_quiz']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
