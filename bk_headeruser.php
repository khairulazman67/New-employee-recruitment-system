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
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body >

    <div class="w-full  mt-5 px-5">
        <div class="flex h-14 flex-row justify-between  w-full bg-primary-700 rounded-2xl px-5 items-center">
            <div class="flex  text-white font-semibold items-center">
                <div class="text-xl">Sistem Pendukung Keputusan Penerimaan Karyawan Baru</div>
                
                <div class="dropdown inline-block relative ml-3 ">
                    <button class="bg-primary-500 hover:bg-primary-600  font-semibold py-2 px-4 rounded inline-flex items-center">
                        <span class="mr-1">Input Data </span>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu absolute hidden  pt-1">
                        <li class=""><a class="rounded-t bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Data Kriteria</a></li>
                        <li class=""><a class="bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Data Alternatif</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative ml-3">
                    <button class="bg-primary-500 hover:bg-primary-600  font-semibold py-2 px-4 rounded inline-flex items-center">
                        <span class="mr-1">Analisis Data </span>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu absolute hidden pt-1">
                        <li class=""><a class="rounded-t bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Analisis Kriteria</a></li>
                        <li class=""><a class="bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Analisis Alternatif</a></li>
                        <li class=""><a class="rounded-b bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Rangking</a></li>
                        <li class=""><a class="rounded-b bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Laporan</a></li>
                    </ul>
                </div>
            </div>
            <div class=" inset-y-0 right-0 flex flex-row items-center text-white">
                <h1 class="text-white font-semibold"><?php echo $_SESSION['nama_lengkap'] ?></h1>
                <div class="dropdown inline-block relative ml-3">
                    <button class=" font-semibold hover:text-gray-300 py-2 px-4 rounded inline-flex items-center">
                        <span class="mr-1 "><i class="fa fa-cog" aria-hidden="true"></i></span>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu absolute hidden  pt-1">
                        <li class=""><a class="rounded-t bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Profil</a></li>
                        <li class=""><a class="bg-primary-500 hover:bg-primary-600 py-2 px-4 block whitespace-no-wrap" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-2 h-full mt-4">
            <div class="h-full w-1/3 bg-gray-200 mr-2 rounded-xl"> 
                <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Nilai Preferensi</div>
                <div class="px-5 py-5 h-full">
                    
                </div>
            </div>
            <div class="flex flex-col h-full w-2/3  ml-2 rounded-xl"> 
                <div class="flex flex-row w-full">
                    <div class="bg-gray-200 rounded-xl mr-2 w-full ">
                        
                        <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Kriteria  & Bobot</div>
                        <div class="px-5 py-5 h-full">
                            fsodkldfsj
                        </div>
                    </div>
                    <div class="bg-gray-200 rounded-xl ml-2 w-full">
                        <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Jurusan & Hasil</div>
                        <div class="px-5 py-5 h-full">
                            fsodkldfsj
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="bg-gray-200 rounded-xl">
                        
                        <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Hasil Rekomendasi SPK</div>
                        <div class="px-5 py-5 h-full">
                            fsodkldfsj
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
</body>