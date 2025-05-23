<!DOCTYPE html>
<html>
<head>
    <title>Simpan Identitas Cookie</title>
</head>
<body>
    <h2>Simpan Identitas Anda</h2>
    
    <?php
    // Proses simpan data
    if(isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        
        // Set cookie berlaku 1 hari
        setcookie('nama_user', $nama, time() + (86400 * 1), "/");
        setcookie('email_user', $email, time() + (86400 * 1), "/");
        
        echo "<p>Data berhasil disimpan!</p>";
    }
    
    // Proses hapus data
    if(isset($_POST['hapus'])) {
        setcookie('nama_user', "", time() - 3600, "/");
        setcookie('email_user', "", time() - 3600, "/");
        echo "<p>Data berhasil dihapus!</p>";
    }
    ?>
    
    <form method="post">
        <p>
            Nama: <br>
            <input type="text" name="nama" 
                   value="<?= isset($_COOKIE['nama_user']) ? $_COOKIE['nama_user'] : '' ?>" required>
        </p>
        <p>
            Email: <br>
            <input type="email" name="email" 
                   value="<?= isset($_COOKIE['email_user']) ? $_COOKIE['email_user'] : '' ?>" required>
        </p>
        <p>
            <button type="submit" name="simpan">Simpan</button>
            <button type="submit" name="hapus">Hapus</button>
        </p>
    </form>
</body>
</html>