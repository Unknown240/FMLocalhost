
<?php
$file = $_GET['file'];

if (isset($file)) {
    $file_path = 'C:/serverutama/' . $file; // Ubah dengan path folder "serverutama" yang sesuai

    if (file_exists($file_path)) {
        // Menentukan header untuk memulai pengunduhan
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Length: ' . filesize($file_path));
        header('Pragma: no-cache');
        header('Expires: 0');

        // Membaca dan mengirimkan file ke output
        readfile($file_path);
        exit;
    } else {
        echo 'File tidak ditemukan.';
    }
} else {
    echo 'Parameter file tidak valid.';
}
?>
