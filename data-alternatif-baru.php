<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/alternatif.inc.php';
	$eks = new Alternatif($db);

	$eks->id = $_POST['kd'];
	$eks->nm = $_POST['nm'];
	
	if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
};
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
}
?>
<div class="bg-gray-100 px-5 py-5 rounded-xl">
    <div class="flex flex-col">
        <div class="flex flex-row font-bold text-3xl text-primary-800">
            <a href="main.php">Beranda/ </a><a href="data-kriteria.php">Tambah Data Alternatif</a>
        </div>
        <div class="w-full h-2 bg-secondary-300 rounded-xl my-2"></div>
        <div class="flex w-full justify-center">
			<form class="w-full " method="post">
				<div class="flex items-center mb-6">
					<div class="w-1/5">
						<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
							Id Data
						</label>
						
					</div>
					<div class="w-4/5">
						<select class="block text-gray-500 font-bold text-left mb-1 py-2 pr-4 w-full" id="kd" name="kd">
							<option value="A1">A1</option>
							<option value="A2">A2</option>
							<option value="A3">A3</option>
						</select>
					</div>
				</div>
				<div class="flex items-center mb-6">
					<div class="w-1/5">
						<label  class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
							Nama Kriteria
						</label>
					</div>
					<div class="w-4/5">
						<input id="nm" name="nm"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" required>
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