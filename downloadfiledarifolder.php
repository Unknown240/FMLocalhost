<?php
if (isset($_GET['file'])) {
    $filePath = $_GET['file'];

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo 'File tidak ditemukan.';
    }
} else {
    echo 'File tidak valid.';
}
?>
