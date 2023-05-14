<!DOCTYPE html>
<html>
<head>
    <title>Delete File</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('gambar.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .file-input {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .btn-container {
            text-align: center;
        }
        
        .btn {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>
<body><center>
    <div class="container">
        <?php
        $folder = 'C:/serverutama/';
        $filename = $_GET['file'];

        if (isset($_GET['file']) && !empty($_GET['file'])) {
            $file_path = $folder . $filename;

            if (file_exists($file_path)) {
                if (unlink($file_path)) {
                    echo '<h2>File berhasil dihapus.</h2>';
                    echo '<p><a href="index.php" class="btn btn-primary">Kembali ke Halaman Awal</a></p>';
                    exit;
                } else {
                    echo '<h2>Gagal menghapus file.</h2>';
                    echo '<p><a href="index.php" class="btn btn-primary">Kembali ke Halaman Awal</a></p>';
                    exit;
                }
            } else {
                echo '<h2>File tidak ditemukan.</h2>';
                echo '<p><a href="index.php" class="btn btn-primary">Kembali ke Halaman Awal</a></p>';
                exit;
            }
        } else {
            echo '<h2>Tidak ada file yang dipilih.</h2>';
            echo '<p><a href="index.php" class="btn btn-primary">Kembali ke Halaman Awal</a></p>';
            exit;
        }
        ?>
    </div></center>
</body>
</html>
