<?php 
include"database/koneksi.php";// menghubungkan dengan koneksi
$username = $_POST['username'];
$password = md5($_POST['password']);
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");//mengambil data admin
$q= mysqli_fetch_array($data); //cek username admin
if (mysqli_num_rows($data)> 0) { //login admin
    $_SESSION['username'] = $q['username'];
    $_SESSION['password'] = $q['password'];
    header("location:main.php");
}else{
    header("location:index.php?pesan=gagal"); //jika gagal akan kembali ke halaman login
}

?>