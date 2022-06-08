<?php
include "includes/config.php";

session_start();
if (!isset($_SESSION['nama_lengkap'])) {
    echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplikasi SPK</title>

    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css" />
    <link href="css/output.css" rel="stylesheet">
</head>

<body >
    <div
        class="flex flex-col inset-y-0 right-0  w-[78%] absolute mt-6 mr-6 ">
        <div class="flex justify-end text-white text-xl font-bold pr-4 w-full  py-5 items-center rounded-3xl  bg-secondary-800 ">
            <h1><?php echo $_SESSION['nama_lengkap'] ?></h1>
            <a href="logout.php" class="ml-2 ">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>