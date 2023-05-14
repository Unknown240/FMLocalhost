<!DOCTYPE html>
<html>

<head>
    <title>File Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <style>
        body {
            background-image: url('gambar.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* CSS tambahan untuk membuat halaman responsif */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Gaya tambahan untuk konten halaman */
        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
    <?php
$rootFolder = 'C:\DatabaseDown'; // Ganti dengan path folder server utama Anda
// Fungsi untuk mengambil daftar file dalam folder
function getFileList($folderPath) {
    $fileList = [];

    if (is_dir($folderPath)) {
        if ($handle = opendir($folderPath)) {
            while (($file = readdir($handle)) !== false) {
                if ($file != '.' && $file != '..') {
                    $filePath = $folderPath . '/' . $file;
                    if (is_dir($filePath)) {
                        $fileList[] = [
                            'name' => $file,
                            'type' => 'folder',
                            'path' => $filePath
                        ];
                    } else {
                        $fileList[] = [
                            'name' => $file,
                            'type' => 'file',
                            'path' => $filePath
                        ];
                    }
                }
            }
            closedir($handle);
        }
    }

    return $fileList;
}

// Fungsi untuk menampilkan isi folder
function showFolderContents($folderPath) {
    if (is_dir($folderPath)) {
        $fileList = getFileList($folderPath);

        if (count($fileList) > 0) {
            echo '<div class="folder-contents">';
            echo '<div class="file-list-table">';
            echo '<div class="centered-container">';
            echo '<center><h2>Daftar File dan Folder</h2></center>';
            echo '<table>';
            echo '<tr><th>Nama</th><th>Tipe</th><th>Aksi</th></tr>';
            foreach ($fileList as $file) {
                echo '<tr>';
                echo '<td>' . $file['name'] . '</td>';
                echo '<td>' . ($file['type'] == 'folder' ? 'Folder' : 'File') . '</td>';
                echo '<td>';
                if ($file['type'] == 'folder') {
                    echo '<a class="folder-link" href="?path=' . $file['path'] . '">Buka</a>';
                } else {
                    echo '<a class="folder-link" href="downloadfiledarifolder.php?file=' . $file['path'] . '">Download</a>';
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="empty-folder">Folder ini kosong.</p>';
        }
    } else {
        echo '<p class="error-msg">Folder tidak ditemukan.</p>';
    }
}

// Memeriksa apakah parameter path telah diberikan
if (isset($_GET['path'])) {
    $path = $_GET['path'];

    if (strpos($path, $rootFolder) === 0) {
        // Menyimpan path sebelumnya ke session
        if (!isset($_SESSION['previous_path'])) {
            $_SESSION['previous_path'] = [];
        }
        array_push($_SESSION['previous_path'], $path);

        showFolderContents($path);
        echo '<a class="back-btn" href="?path=' . dirname($path) . '">Kembali Ke Halaman Sebelumnya</a>';
        echo '<br>';
        echo '<a class="back-btn" href="index.php">Kembali ke Halaman Awal</a>';
    } else {
        echo '<p class="error-msg">Tidak diizinkan untuk mengakses folder di luar server utama.</p>';
        echo '<a class="back-btn" href="index.php">Kembali ke Halaman Awal</a>';
    }
} else {
    echo '<div class="centered-container">';
    echo '<center><h2>Daftar Folder Utama</h2></center>';
    echo '<ul class="folder-list">';
    echo '<li><a href="?path=' . $rootFolder . '" class="folder-link">' . $rootFolder . '</a></li>';
    echo '</ul>';
    echo '</div>';
  }
  ?>
  
