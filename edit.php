<?php 
include "koneksi.php";
$id=$_GET['id'];
$tam=$conn->query("SELECT * FROM user WHERE id_user='$id'");
$bar=$tam->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Cancel</a>
    <center>
        <h3>Edit Data</h3>
        <form action="" method="POST">
        <table>
            <tr>
                <td>Id User</td>
                <td><input type="text" name="id_user" value="<?=$bar['id_user']?>" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?=$bar['nama']?>"></td>
            </tr>
            <tr>
                <td>Gmail</td>
                <td><input type="text" name="gmail" value="<?=$bar['gmail']?>"></td>
            </tr>
            <tr>
                <td>Nomor_Hp</td>
                <td><input type="text" name="nomor_hp" value="<?=$bar['nomor_hp']?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?=$bar['alamat']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>
<?php
if(isset($_POST['simpan'])){
    $conn->query("UPDATE user SET
            id_user='$_POST[id_user]',
            nama='$_POST[nama]',
            gmail='$_POST[gmail]',
            nomor_hp='$_POST[nomor_hp]',         
            alamat='$_POST[alamat]'
            WHERE id_user='$id'");

            
            echo '<script>window.location.href="user.php"</script>';
}
