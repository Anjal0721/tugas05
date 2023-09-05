<?php 
include "koneksi.php";
$id=$_GET['id'];
$conn->query("DELETE FROM user WHERE id_user='$id'");
echo '<script>window.location.href="user.php"</script>'

?>