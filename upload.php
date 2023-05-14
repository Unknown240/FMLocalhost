<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
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
<body>
    <div class="container">
        <h1>Upload File</h1>
        <form action="upload_process.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file" class="file-input">
            <div class="btn-container">
                <button type="submit" name="submit" class="btn">Upload</button>
                <a href="index.php" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
