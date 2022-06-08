<?php
include "includes/config.php";

$config = new Config();
$db = $config->getConnection();

if($_POST){
    
    include_once 'includes/user.inc.php';
    $eks = new User($db);

    $eks->nl = $_POST['nl'];
    $eks->un = $_POST['un'];
    $eks->pw = md5($_POST['pw']);

    if($eks->pw == md5($_POST['up'])){
    
    if($eks->insert()){
?>
<script type="text/javascript">
  window.onload = function () {
    showStickySuccessToast();
    setTimeout("location.href='login.php'", 2000);

  };
</script>

<?php
    }
    
    else{
?>
<script type="text/javascript">
  window.onload = function () {
    showStickyErrorToast();
  };
</script>
<?php
    }

    } else{
?>
<script type="text/javascript">
  window.onload = function () {
    showStickyWarningToast();
  };
</script>
<?php   
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
	<title>Register</title>

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
			<div class="mt-10 text-primary-900 ">
				<h1 class="text-[40px] font-bold mb-5">Register</h1>
          <div>
            <form method="post">
              <div class="text-xl">
                <label for="fname" class="font-semibold  text-xl">Nama Lengkap :</label><br>
                <input type="text"  nid="nl" name="nl" required class="border-2 rounded-lg border-primary-800 hover:border-primary-900 h-10 w-96 p-5"><br>
              </div>
              <div class="text-xl">
                <label for="fname" class="font-semibold  text-xl">Username :</label><br>
                <input type="text"  id="un" name="un" required class="border-2 rounded-lg border-primary-800 hover:border-primary-900 h-10 w-96 p-5"><br>
              </div>
              <div class="mt-4  text-xl mb-4">
                <label for="fname" class="font-semibold ">Password :</label><br>
                <input type="password" d="pw" name="pw" required class="border-2 rounded-lg border-primary-800 hover:border-primary-900 h-10 w-96 p-5" required autocomplete="current-password"><br>
              </div>
              <div class="mt-4  text-xl mb-4">
                <label for="fname" class="font-semibold ">Ulangi Password :</label><br>
                <input type="password"  id="up" name="up" required class="border-2 rounded-lg border-primary-800 hover:border-primary-900 h-10 w-96 p-5" required autocomplete="current-password"><br>
              </div>
              <div class="flex items-center">
                <button class="bg-secondary-900 rounded-xl py-3 px-11 text-white font-bold hover:bg-primary-900"  type="submit" href='login.php'>
                  Register
                </button>
              </div>
            </form>
          </div>
          
          <div class="absolute inset-y-0 -right-5">
            <img src="./img/ilus.png" alt="" class="mt-11 ml-8 w-[550px]">
          </div>  
				
			</div>
		</div>
	</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
<?php
// include_once 'footer.php';
?>

</html>