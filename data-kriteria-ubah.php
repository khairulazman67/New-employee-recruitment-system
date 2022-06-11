<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
$pgn = new Nilai($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/kriteria.inc.php';
$eks = new Kriteria($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->nm = $_POST['nm'];
	
	if($eks->update()){
		echo "<script>location.href='data-kriteria.php'</script>";
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
<div class="bg-gray-100 px-5 py-5 rounded-xl">
    <div class="flex flex-col">
        <div class="flex flex-row font-bold text-3xl text-primary-800">
            <a href="main.php">Beranda/ </a><a href="data-kriteria.php">Edit Data Kriteria</a>
        </div>
        <div class="w-full h-2 bg-secondary-300 rounded-xl my-2"></div>
        <div class="flex w-full justify-center">
			<form class="w-full " method="post">
				<div class="flex items-center mb-6">
					<div class="w-1/5">
						<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
							Nama Kriteria
						</label>
					</div>
					<div class="w-4/5">
						<input id="nm" name="nm" value="<?php echo $eks->nm; ?>"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" required>
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