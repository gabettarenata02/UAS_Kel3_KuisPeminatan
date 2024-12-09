<?php
include("connection.php"); // Memasukkan koneksi database

// Hapus Data
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query = "DELETE FROM user WHERE nim = '$nim'";

    if (mysqli_query($link, $query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='tampilan-data.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($link) . "');</script>";
    }
}

mysqli_close($link);
?>
