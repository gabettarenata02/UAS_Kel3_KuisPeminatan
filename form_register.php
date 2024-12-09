<?php
include("connection.php");

if (isset($_POST["submit"])) {
    $nim = htmlentities(strip_tags(trim($_POST["nim"])));
    $nama = htmlentities(strip_tags(trim($_POST["nama"])));
    $program_studi = htmlentities(strip_tags(trim($_POST["program_studi"])));
    $fakultas = htmlentities(strip_tags(trim($_POST["fakultas"])));
    $cita_cita = htmlentities(strip_tags(trim($_POST["cita_cita"])));

    $error_message = "";

    // Validasi input
    if (empty($nim)) {
        $error_message .= "<li>NIM belum diisi</li>";
    } elseif (!preg_match("/^[0-9]{10}$/", $nim)) {
        $error_message .= "<li>NIM harus berupa 10 digit angka</li>";
    }

    // Cek apakah NIM sudah terdaftar
    $nim = mysqli_real_escape_string($link, $nim);
    $query = "SELECT * FROM user WHERE nim='$nim'";
    $result = mysqli_query($link, $query);
    $num_rows = mysqli_num_rows($result);
    
    if ($num_rows >= 1) {
        $error_message .= "<li>NIM sudah terdaftar</li>";
    }

    // Validasi field lainnya
    if (empty($nama)) {
        $error_message .= "<li>Nama belum diisi</li>";
    }
    if (empty($program_studi)) {
        $error_message .= "<li>Program studi belum diisi</li>";
    }
    if (empty($fakultas)) {
        $error_message .= "<li>Fakultas belum diisi</li>";
    }
    if (empty($cita_cita)) {
        $error_message .= "<li>Cita-cita belum diisi</li>";
    }

    // Jika tidak ada error, simpan data dan set session
    if ($error_message === "") {
        // Escape string untuk mencegah SQL injection
        $nama = mysqli_real_escape_string($link, $nama);
        $program_studi = mysqli_real_escape_string($link, $program_studi);
        $fakultas = mysqli_real_escape_string($link, $fakultas);
        $cita_cita = mysqli_real_escape_string($link, $cita_cita);

        // Insert data ke database
        $query = "INSERT INTO user (nim, nama, program_studi, fakultas, cita_cita) 
                 VALUES ('$nim', '$nama', '$program_studi', '$fakultas', '$cita_cita')";
        
        if (mysqli_query($link, $query)) {
            // Set NIM ke session setelah berhasil menyimpan data
            session_start(); // Pastikan session dimulai
            $_SESSION['nim'] = $nim; // Simpan NIM ke session

            header("Location: success-register.php");
            exit();
        } else {
            die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
        }
    } else {
        echo "<ul>$error_message</ul>";
    }
}
?>