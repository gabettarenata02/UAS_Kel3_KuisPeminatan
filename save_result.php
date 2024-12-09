<?php
session_start();
include('connection.php'); // Pastikan koneksi sudah terjalin

$nim = $_SESSION['nim']; // Ambil NIM dari session

if (isset($nim)) {
    // Query untuk mengambil data pengguna
    $query = "SELECT nama, program_studi, fakultas, cita_cita FROM user WHERE nim = '$nim'";
    $result = mysqli_query($link, $query);

    if ($result) {
        $userData = mysqli_fetch_assoc($result);
        if ($userData) {
            $nama = htmlspecialchars($userData['nama']);
            $program_studi = htmlspecialchars($userData['program_studi']);
            $fakultas = htmlspecialchars($userData['fakultas']);
            $cita_cita = htmlspecialchars($userData['cita_cita']);
        } else {
            echo "User not found.";
            exit;
        }
    } else {
        echo "Error: " . mysqli_error($link);
        exit;
    }
} else {
    echo "NIM is not set.";
    exit;
}

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hasil_quiz = $_POST['hasil_quiz'];

    // Update data pengguna
    $update_query = "UPDATE user SET hasil_quiz='$hasil_quiz' WHERE nim='$nim'";
    
    if (mysqli_query($link, $update_query)) {
        echo "<script>
            window.location.href = '$hasil_quiz.html';
        </script>";
    } else {
        echo "Error: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz Confirmation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" />
    <link rel="stylesheet" href="css/konfirm-style.css" />
</head>
<body>
    <div class="main-container">
        <div class="rectangle">
            <div class="content">
                <form action="" method="POST"> 
                    <input type="hidden" name="nim" id="nim" value="<?php echo $nim; ?>" />
                    <input type="hidden" name="nama" id="nama" value="<?php echo $nama; ?>" />
                    <input type="hidden" name="program_studi" id="program_studi" value="<?php echo $program_studi; ?>" />
                    <input type="hidden" name="fakultas" id="fakultas" value="<?php echo $fakultas; ?>" />
                    <input type="hidden" name="cita_cita" id="cita_cita" value="<?php echo $cita_cita; ?>" />
                    <input type="hidden" name="hasil_quiz" id="hasil_quiz" />
                </form>
            </div>
        </div>
    </div>

    <script>
        function checkResults() {
            const score = localStorage.getItem('score');
            let profession;

            if (score >= 7 && score <= 13) {
                profession = 'auditor_it';
            } else if (score >= 14 && score <= 20) {
                profession = 'application_developer';
            } else if (score >= 21 && score <= 28) {
                profession = 'system_analyst';
            }

            document.getElementById('hasil_quiz').value = profession;
        }

        window.onload = checkResults;
    </script>
</body>
</html>