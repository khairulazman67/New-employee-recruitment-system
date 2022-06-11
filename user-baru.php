<?php
include_once 'header_admin.php';
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
window.onload=function(){
  showStickySuccessToast();
};
window.location='login.php';
</script>
<?php
    }
    
    else{
?>
<script type="text/javascript">
window.onload=function(){
  showStickyErrorToast();
};
</script>
<?php
    }

    } else{
?>
<script type="text/javascript">
window.onload=function(){
  showStickyWarningToast();
};
</script>
<?php   
    }
}
?>
				<!-- content -->
        <div class="h-full mt-5 mb-6 bg-gray-100 w-full rounded-2xl py-10 px-10">
			<div class="font-bold text-3xl text-primary-800">
				<a href="user.php">Pengguna</a>  / <a href="user-ubah.php"> Edit User</a> 
			</div>
			<div class="w-full h-2 rounded-xl bg-secondary-300 mt-2 mb-4"></div>
			<div class="text-2xl font-semibold ">
				Tambah User
			</div>
			<div>

			</div>
			<div class="flex w-full justify-center">
				<form class="w-full " method="post">
					<div class="flex items-center mb-6">
						<div class="w-1/5">
							<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
								Nama Lengkap
							</label>
						</div>
						<div class="w-4/5">
							<input type="text" id="nl" name="nl" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  required>
						</div>
					</div>
					<div class="flex items-center mb-6">
						<div class="w-1/5">
							<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
								Username
							</label>
						</div>
						<div class="w-4/5">
							<input id="un" name="un"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" required>
						</div>
					</div>
          <div class="flex items-center mb-6">
						<div class="w-1/5">
							<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
								Password
							</label>
						</div>
						<div class="w-4/5">
							<input id="pw" name="pw" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="password" required>
						</div>
					</div>
          <div class="flex items-center mb-6">
						<div class="w-1/5">
							<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
								Ulangi Password
							</label>
						</div>
						<div class="w-4/5">
							<input id="up" name="up" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="password" required>
						</div>
					</div>
					<div class="flex ">
						<button type="reset" class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
							Batal
						</button>
						<button type="submit" class="ml-2 shadow bg-primary-500 hover:bg-primary-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
							Simpan Data
						</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    <?php
    	include_once 'sidebar_admin.php';
    ?>