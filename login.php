<?php
include_once 'includes/config.php';
$config = new Config();
$db = $config->getConnection();
if($_POST){
	include_once 'includes/login.inc.php';
	$login = new Login($db);
	$login->userid = $_POST['username'];
	$login->passid = md5($_POST['password']);
	if($login->login()){
		
		if($_SESSION['username']!='admin'){

		echo "<script>location.href='main.php'</script>";	
}
		else{
		echo "<script>location.href='admin.php'</script>";
	}
	}
	
	else{
		echo "<script>alert('Login Gagal')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Login</title>

	<link href="css/output.css" rel="stylesheet">

</head>

<body class="bg-blue-300">
	<div class="container mx-auto ">
		<!-- tulisan atas -->
		<div class="mt-16">
			<div class="flex justify-center text-white font-bold text-center text-4xl bg-secondary-900 rounded-3xl mx-28 mb-10 py-4">
				Sistem Pendukung Keputusan Penerimaan <br> Karyawan Baru Perumda Tirta Pase
			</div>
		</div>
		<div class="flex mx-44 relative">
			<div class="mt-20 text-primary-900 ">
				<h1 class="text-[40px] font-bold mb-5">Login</h1>
				<form method="post">
						<div>
							<div class="text-xl">
								<label for="fname" class="font-semibold  text-xl">Email :</label><br>
								<input type="text"  name="username" id="Inputusernamee1" class="border-2 rounded-lg border-primary-800 hover:border-primary-900 h-10 w-96 p-5"><br>
							</div>
							<div class="mt-4  text-xl mb-4">
								<label for="fname" class="font-semibold ">Password :</label><br>
								<input type="password" name="password" id="InputPassword1" class="border-2 rounded-lg border-primary-800 hover:border-primary-900 h-10 w-96 p-5" required autocomplete="current-password"><br>
							</div>
							<div class="flex items-center">
								<button class="bg-secondary-900 rounded-xl py-3 px-11 text-white font-bold hover:bg-primary-900"  type="submit" >
									Login
								</button>
								<!-- <br> -->
								<div class="flex items-center ml-3">
									Belum memiliki akun?, <div class="flex hover:text-white"><a href="user-baru2.php"> register</a></div> 
								</div>
							</div>
							
						</div>
						
						<div class="absolute inset-y-0 -right-5">
							<img src="./img/ilus.png" alt="" class="mt-11 ml-8 w-[550px]">
						</div>  
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>