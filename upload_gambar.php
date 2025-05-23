<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload file</title>
    <meta name="description " content="Belajar PHP">
    <meta name="keywords" content="{tulis nim anda disini}">
    <meta name="author" content="{tulis nama anda disini}">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <p><label for="">Pilih gambar yang akan di upload:</label><br>
        <input type="file" name="gambar" value="Pilih gambar" id="gambar1"></p>
        <input type="submit" value="Upload image" name="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["gambar"])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"] ["name"]);
    $uploadOk = 1;
    $tipeGambar = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //cek apakah ada kiriman data dengan methode post
    if(isset($_POST["submit"])) {
    //cek apakah file berupa gambar
    $check = getimagesize($_FILES["gambar"] ["tmp_name"]);
    if($check !== false) {
        echo "File berupa citra/gambar -". $check["mime"] . ".";
        $uploadOk = 1;
        //simpan kedalam folder gambar
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }
}   

    //deteksi apakah ada file dengan nama yang sama
    if (file_exists($target_file)) {
    echo "Sorry, file already exists .";
    $uploadOk = 0;
    }

    //check file size
    if ($_FILES["gambar"] ["size"] > 500000) {
        echo "Sorry, file anda terlalu besar.";
        $uploadOk = 0;
    }

    //filter format
    if($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar != "jpeg"
    && $tipeGambar != "gif") {
        echo "Sorry, hanya file JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }

    //check if $uploadOk telah sesuai dengan kriteria
    if ($uploadOk == 0) {
        echo "Sorry, file anda gagal upload.";
    } else {
        //proses upload file
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "File" . htmlspecialchars(basename($_FILES["gambar"] ["name"])) . "berhasil upload.";
        } else {
            echo "Sorry, Ada error saat upload.";
        }
    }
}
?>
</body>
</html>
