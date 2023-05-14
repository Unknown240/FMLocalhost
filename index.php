<!DOCTYPE html>
<html>

<head>
    <title>File Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
        <h1>Selamat Datang Di Server SREN</h1>
        <center><h3> Markas Komando Operasi Udara I <h3></center>
        <br>
        <p class="time">Sekarang pukul : <span id="time"></span></p>
        <?php
        $hostname = gethostname();
        $ip_address = gethostbyname($hostname);

        echo "IP Address Server : " . $ip_address;
        ?>

<script>
		// Fungsi untuk memperbarui waktu setiap detik
		function updateTime() {
			var date = new Date();
			var hours = date.getHours();
			var minutes = date.getMinutes();
			var seconds = date.getSeconds();

			// Menambahkan 0 di depan angka jika angka < 10
			hours = hours < 10 ? "0" + hours : hours;
			minutes = minutes < 10 ? "0" + minutes : minutes;
			seconds = seconds < 10 ? "0" + seconds : seconds;

			var timeString = hours + ":" + minutes + ":" + seconds;

			document.getElementById("time").textContent = timeString;
		}

		// Memanggil fungsi updateTime setiap detik
		setInterval(updateTime, 1000);
	</script>


        <hr>
        <div class="row">
        <center>
    <a href="upload.php" class="btn">Upload File Ke Server</a>
    <br><br>
    <a href="downloadfolder.php" class="btn">Download File Dari Server</a>
</center>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <table>
                    <?php
                    // Fungsi untuk mengatur format ukuran file
                    function formatBytes($bytes, $precision = 2)
                    {
                        $units = array('B', 'KB', 'MB', 'GB', 'TB');
                        $bytes = max($bytes, 0);
                        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                        $pow = min($pow, count($units) - 1);
                        $bytes /= (1 << (10 * $pow));
                        return round($bytes, $precision) . ' ' . $units[$pow];
                    }

                    // Direktori untuk menyimpan file
                    $uploadDir = 'C:/serverutama/';

                    $files = scandir($uploadDir);
                    $files = array_diff($files, array('.', '..'));

                    if (count($files) > 0) {
                        echo '<div class="file-list">';
                        echo '<table>';
                        echo '<tr><th>Nama File</th><th>Ukuran File</th><th>Tanggal Upload</th><th>Tindakan</th></tr>';
                        foreach ($files as $file) {
                            $filePath = $uploadDir . $file;
                            $fileSize = filesize($filePath);
                            $fileSizeFormatted = formatBytes($fileSize);
                            $fileDate = date("d-m-Y H:i:s", filemtime($filePath));

                            echo '<tr>';
                            echo '<td>' . $file . '</td>';
                            echo '<td>' . $fileSizeFormatted . '</td>';
                            echo '<td>' . $fileDate . '</td>';
                            echo '<td><a href="download.php?file=' . urlencode($file) . '" class="btn btn-download">Download</a>';
                            echo '<a href="delete.php?file=' . urlencode($file) . '" class="btn btn-delete">Delete</a></td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo '<div class="message info">Tidak ada file yang tersedia di Server.</div>';
                    }
                    ?>
                </table>
            </div>
        </div>    
    </div>

</body>

</html>