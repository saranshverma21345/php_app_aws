<?php
require '../config/s3-config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];

    try {
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $fileName,
            'SourceFile' => $fileTmpName,
            'ACL' => 'public-read'
        ]);

        echo "File uploaded successfully: <a href='{$result['ObjectURL']}'>{$result['ObjectURL']}</a>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
