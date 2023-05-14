<!DOCTYPE html>
<html>
<head>
    <title>Upload File - Hasil</title>
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

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        if (!empty($_FILES['file']['name'])) {
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_error = $_FILES['file']['error'];

            // Cek apakah terjadi error saat upload
            if ($file_error === UPLOAD_ERR_OK) {
                // Pindahkan file yang diupload ke direktori tujuan
                if (move_uploaded_file($file_tmp, $folder . $file_name)) {
                    echo '<h2>File berhasil diunggah.</h2>';
                    echo '<p><a href="index.php" class="btn btn-primary">Kembali ke Halaman Awal</a></p>';
                    exit;
                } else {
                    echo '<h2>Terjadi kesalahan saat memindahkan file.</h2>';
                    echo '<p><a href="upload.php" class="btn btn-primary">Unggah File Lagi</a></p>';
                    exit;
                }
            } else {
                echo '<h2>Terjadi kesalahan saat mengunggah file.</h2>';
                echo '<p><a href="upload.php" class="btn btn-primary">Unggah File Lagi</a></p>';
                exit;
            }
        } else {
            echo '<h2>Silakan pilih file yang akan diunggah.</h2>';
            echo '<p><a href="upload.php" class="btn btn-primary">Unggah File Lagi</a></p>';
            exit;
        }
        ?>
    </div></center>
</body>
</html>
