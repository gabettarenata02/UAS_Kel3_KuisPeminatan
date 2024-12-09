<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success-card {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        .success-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }
        .success-icon svg {
            width: 40px;
            height: 40px;
            color: white;
        }
        .message {
            color: #333;
            margin-bottom: 1.5rem;
        }
        .details {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            text-align: left;
        }
        .details p {
            margin-bottom: 0.5rem;
        }
        .back-button {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .back-button:hover {
            background: #0b5ed7;
            color: white;
        }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        
        <h2 class="mb-4">Registrasi Berhasil!</h2>
        
        <?php if(isset($_GET['nama']) && isset($_GET['nim'])): ?>
            <div class="message">
                Selamat! Data anda telah berhasil terdaftar dalam sistem kami.
            </div>
            
            <div class="details">
                <p><strong>Nama:</strong> <?php echo htmlspecialchars(urldecode($_GET['nama'])); ?></p>
                <p><strong>NIM:</strong> <?php echo htmlspecialchars(urldecode($_GET['nim'])); ?></p>
                <?php if(isset($_GET['program_studi'])): ?>
                    <p><strong>Program Studi:</strong> <?php echo htmlspecialchars(urldecode($_GET['program_studi'])); ?></p>
                <?php endif; ?>
                <?php if(isset($_GET['fakultas'])): ?>
                    <p><strong>Fakultas:</strong> <?php echo htmlspecialchars(urldecode($_GET['fakultas'])); ?></p>
                <?php endif; ?>
                <?php if(isset($_GET['peminatan'])): ?>
                    <p><strong>Peminatan:</strong> <?php echo htmlspecialchars(urldecode($_GET['peminatan'])); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <a href="index.html" class="back-button">Lanjut untuk Mengisi Quiz</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>