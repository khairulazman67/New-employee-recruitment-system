<?php
include_once 'header.php';
include_once 'includes/skor.inc.php';
$pro = new Skor($db);
$altkriteria = isset($_POST['kriteria']) ? $_POST['kriteria'] : $_GET['kriteria'];
$stmt2 = $pro->readAll2();
$stmt3 = $pro->readAll2();
if(isset($altkriteria)){
$pro->readKri($altkriteria);
$count = $pro->countAll();
if(isset($_POST['subankr'])){
	
	$pro->insert($_POST['A11'],$_POST['nl1'],$_POST['A21'],$altkriteria)?'':$pro->update($_POST['A11'],$_POST['nl1'],$_POST['A21'],$altkriteria);
	$pro->insert($_POST['A12'],$_POST['nl2'],$_POST['A32'],$altkriteria)?'':$pro->update($_POST['A12'],$_POST['nl2'],$_POST['A32'],$altkriteria);
	/*$pro->insert($_POST['A13'],$_POST['nl3'],$_POST['A43'],$altkriteria)?'':$pro->update($_POST['A13'],$_POST['nl3'],$_POST['A43'],$altkriteria);
	$pro->insert($_POST['A14'],$_POST['nl4'],$_POST['A54'],$altkriteria)?'':$pro->update($_POST['A14'],$_POST['nl4'],$_POST['A54'],$altkriteria);*/
	$pro->insert($_POST['A25'],$_POST['nl5'],$_POST['A35'],$altkriteria)?'':$pro->update($_POST['A25'],$_POST['nl5'],$_POST['A35'],$altkriteria);
	/*$pro->insert($_POST['A26'],$_POST['nl6'],$_POST['A46'],$altkriteria)?'':$pro->update($_POST['A26'],$_POST['nl6'],$_POST['A46'],$altkriteria);
	$pro->insert($_POST['A27'],$_POST['nl7'],$_POST['A57'],$altkriteria)?'':$pro->update($_POST['A27'],$_POST['nl7'],$_POST['A57'],$altkriteria);
	$pro->insert($_POST['A38'],$_POST['nl8'],$_POST['A48'],$altkriteria)?'':$pro->update($_POST['A38'],$_POST['nl8'],$_POST['A48'],$altkriteria);
	$pro->insert($_POST['A39'],$_POST['nl9'],$_POST['A59'],$altkriteria)?'':$pro->update($_POST['A39'],$_POST['nl9'],$_POST['A59'],$altkriteria);
	$pro->insert($_POST['A410'],$_POST['nl10'],$_POST['A510'],$altkriteria)?'':$pro->update($_POST['A410'],$_POST['nl10'],$_POST['A510'],$altkriteria);*/
		
	$pro->insert($_POST['A21'],1/$_POST['nl1'],$_POST['A11'],$altkriteria)?'':$pro->update($_POST['A21'],1/$_POST['nl1'],$_POST['A11'],$altkriteria);
	$pro->insert($_POST['A32'],1/$_POST['nl2'],$_POST['A12'],$altkriteria)?'':$pro->update($_POST['A32'],1/$_POST['nl2'],$_POST['A12'],$altkriteria);
	/*$pro->insert($_POST['A43'],1/$_POST['nl3'],$_POST['A13'],$altkriteria)?'':$pro->update($_POST['A43'],1/$_POST['nl3'],$_POST['A13'],$altkriteria);
	$pro->insert($_POST['A54'],1/$_POST['nl4'],$_POST['A14'],$altkriteria)?'':$pro->update($_POST['A54'],1/$_POST['nl4'],$_POST['A14'],$altkriteria); */
	$pro->insert($_POST['A35'],1/$_POST['nl5'],$_POST['A25'],$altkriteria)?'':$pro->update($_POST['A35'],1/$_POST['nl5'],$_POST['A25'],$altkriteria);
	/*$pro->insert($_POST['A46'],1/$_POST['nl6'],$_POST['A26'],$altkriteria)?'':$pro->update($_POST['A46'],1/$_POST['nl6'],$_POST['A26'],$altkriteria);
	$pro->insert($_POST['A57'],1/$_POST['nl7'],$_POST['A27'],$altkriteria)?'':$pro->update($_POST['A57'],1/$_POST['nl7'],$_POST['A27'],$altkriteria);
	$pro->insert($_POST['A48'],1/$_POST['nl8'],$_POST['A38'],$altkriteria)?'':$pro->update($_POST['A48'],1/$_POST['nl8'],$_POST['A38'],$altkriteria);
	$pro->insert($_POST['A59'],1/$_POST['nl9'],$_POST['A39'],$altkriteria)?'':$pro->update($_POST['A59'],1/$_POST['nl9'],$_POST['A39'],$altkriteria);
	$pro->insert($_POST['A510'],1/$_POST['nl10'],$_POST['A410'],$altkriteria)?'':$pro->update($_POST['A510'],1/$_POST['nl10'],$_POST['A410'],$altkriteria);*/
	
}
if(isset($_POST['hapus'])){
	$pro->delete();
}
?>
<div class="bg-gray-100 px-5 py-5 rounded-xl">
    <div class="flex flex-col">
        <div class="flex flex-row font-bold text-3xl text-primary-800">
            <a href="main.php">Beranda/ </a><a href="analisa-alternatif-tabel.php"> Analisa Data Alternatif</a>
        </div>
        <div class="w-full h-2 bg-secondary-300 rounded-xl my-2"></div>
        <a href="data-alternatif-baru.php">
            <div class="bg-primary-500 hover:bg-primary-600 text-white rounded-xl  font-semibold py-2 px-4  inline-flex items-center">
                <span >Tambah Data</span>
            </div>
        </a>
        <table class="divide-y divide-gray-300 w-full mt-2" id="myTable">
            <thead class="bg-gray-50">
                <tr>
					<th><?php echo $pro->kri ?></th>
					<?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
						<th class="px-6 py-2 text-lg text-gray-500 ">
							<?php echo $row2['nama_alternatif'] ?>
						</th>
					<?php
						}
					?>
                    
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
            <?php
                while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr class="whitespace-nowrap">
					<th style="vertical-align:middle;"><?php echo $row3['nama_alternatif'] ?></th>
					<?php          
					$stmt4 = $pro->readAll2();
					while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					?>
                    <td class="px-6 py-4 text-center">
                        <div class="text-lg text-gray-900">
						<?php 
							if($row3['id_alternatif']==$row4['id_alternatif']){
								echo '1';
								if($pro->insert($row3['id_alternatif'],'1',$row4['id_alternatif'],$altkriteria)){

								} else{
									$pro->update($row3['id_alternatif'],'1',$row4['id_alternatif'],$altkriteria);
								}
							} else{
								$pro->readAll1($row3['id_alternatif'],$row4['id_alternatif'],$altkriteria);
								echo number_format($pro->kp, 3, '.', ',');
							}
						?>
                        </div>
                    </td>
					<?php
					}
					?>
                </tr>
            <?php
            }
            ?>
            </tbody>
			<tfoot class="bg-white divide-y divide-gray-300 pb-4" >
				<tr>
					<th>Jumlah</th>
					<?php
					$stmt5 = $pro->readAll2();
					while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)){
					?>
					<th><?php 
							$pro->readSum1($row5['id_alternatif'],$altkriteria);
							echo number_format($pro->nak, 3, '.', ',');
							if($pro->insert3($_SESSION['id_pengguna'],$row5['id_alternatif'],$altkriteria,$pro->nak)){

							} else{
								$pro->insert5($pro->nak,$row5['id_alternatif'],$altkriteria);
							}
					?></th>
					<?php
					}
					?>
				</tr>
        	</tfoot>
        </table>
		<div class="h-2 w-full bg-secondary-300 rounded-xl mt-10 mb-5"></div>
		<table class="divide-y divide-gray-300 w-full mt-5" id="myTable">
            <thead class="bg-gray-50">
                <tr>
					<th>Perbandingan</th>
					<?php
					$stmt2x = $pro->readAll2();
					$stmt3x = $pro->readAll2();
					while ($row2x = $stmt2x->fetch(PDO::FETCH_ASSOC)){
					?>
						<th class="px-6 py-2 text-lg text-gray-500 ">
							<?php echo $row2x['nama_alternatif'] ?>
						</th>
					<?php
						}
					?>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
            <?php
                while ($row3x = $stmt3x->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr class="whitespace-nowrap">
					<th style="vertical-align:middle;"><?php echo $row3x['nama_alternatif'] ?></th>
					<?php          
					$stmt4x = $pro->readAll2();
					while ($row4x = $stmt4x->fetch(PDO::FETCH_ASSOC)){
					?>
                    <td class="px-6 py-4 text-center">
                        <div class="text-lg text-gray-900">
						<?php 
							$pro->readAll3($row4x['id_alternatif'],$altkriteria);
							$jakx = $pro->jak;
							if($row3x['id_alternatif']==$row4x['id_alternatif']){
								$hs1 = 1/$jakx;
								$pro->insert2($hs1,$row3x['id_alternatif'],$row4x['id_alternatif'],$altkriteria,$_SESSION['id_pengguna']);
								echo number_format($hs1, 3, '.', ',');
							} else{
								$pro->readAll1($row3x['id_alternatif'],$row4x['id_alternatif'],$altkriteria);
								$kpx = $pro->kp;
								$jmk = $kpx/$jakx;
								$pro->insert2($jmk,$row3x['id_alternatif'],$row4x['id_alternatif'],$altkriteria,$_SESSION['id_pengguna']);
								echo number_format($jmk, 3, '.', ',');
							}
						?>
                        </div>
                    </td>
					<?php
					}
					?>
					<th style="vertical-align:middle;"><?php 
						$pro->readAvg($row3x['id_alternatif'],$altkriteria); 
						$bbt = $pro->hak;
						$pro->insert4($bbt,$row3x['id_alternatif'],$altkriteria);
						echo number_format($bbt, 3, '.', ',');
					?></th>
                </tr>
            <?php
            }
            ?>
            </tbody>
			<tfoot class="bg-white divide-y divide-gray-300 pb-4" >
				<tr>
					<th>Jumlah</th>
					<?php
					$stmt5x = $pro->readAll2();
					while ($row5x = $stmt5x->fetch(PDO::FETCH_ASSOC)){
					?>
					<th>
						<?php 
							$pro->readSum2($row5x['id_alternatif'],$altkriteria);
							echo number_format($pro->nak, 3, '.', ',');
						?>
					</th>
					<?php
					}
					?>
					<th><?php 
						$pro->readSum3($altkriteria);
						echo number_format($pro->bb, 3, '.', ',');
					?></th>
				</tr>
        	</tfoot>
        </table>	
    </div>
</div>
<div class="flex flex-row justify-center mt-5 mb-10">
	<div class="col-md-8 text-right">
		<button type="button" onclick="location.href='analisa-alternatif.php'" class="px-3 py-2 bg-secondary-300 hover:bg-secondary-800 rounded-xl font-bold "><span class="fa fa-clone"></span> Analisis Jurusan terhadap kriteria Selanjutnya</button>
		<button type="submit" onclick="location.href='rangking.php'" name="hapus-contengan" class="px-3 py-2 bg-primary-700 hover:bg-primary-800 rounded-xl font-bold text-white"><span class="fa fa-bar-chart"></span> Selesai, Lanjut Ke Perangkingan</button>
	</div>
</div >
<?php
} else{
    header('location: analisa-alternatif.php');
}
?>