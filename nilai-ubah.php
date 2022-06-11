<?php
include_once 'header_admin.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/nilai.inc.php';
$eks = new Nilai($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->jm = $_POST['jm'];
	$eks->kt = $_POST['kt'];
	
	if($eks->update()){
		echo "<script>location.href='nilai.php'</script>";
	} else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};
</script>
<?php
	}
}
?>
		<!-- content -->
		<div class="h-full mt-5 mb-6 bg-gray-100 w-full rounded-2xl py-10 px-10">
			<div class="font-bold text-3xl text-primary-800">
				<a href="nilai.php">Data Nilai</a>  / <a href="nilai-baru.php"> Tambah Nilai</a> 
			</div>
			<div class="w-full h-2 rounded-xl bg-secondary-300 mt-2 mb-4"></div>
			<div class="text-2xl font-semibold ">
				Tambah Nilai Preferensi
			</div>
			<div>

			</div>
			<div class="flex w-full justify-center">
				<form class="w-full " method="post">
					<div class="flex items-center mb-6">
						<div class="w-1/5">
							<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
								Jumlah Nilai
							</label>
						</div>
						<div class="w-4/5">
							<input type="text" id="jm" name="jm" value="<?php echo $eks->jm; ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  required>
						</div>
					</div>
					<div class="flex items-center mb-6">
						<div class="w-1/5">
							<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
								Keterangan Nilai
							</label>
						</div>
						<div class="w-4/5">
							<input id="kt" name="kt" value="<?php echo $eks->kt; ?>"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" required>
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