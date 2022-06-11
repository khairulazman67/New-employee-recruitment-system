<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt1y = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
$stmt2y = $pro2->readAll();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
$stmty = $pro->readKhusus();
$count = $pro->countAll();
$stmtx1 = $pro->readBob();
$stmtx2 = $pro->readBob();
$stmtx1y = $pro->readBob();
$stmtx2y = $pro->readBob();
//
?>
<div class="bg-gray-100 px-5 py-5 rounded-xl">
    <div class="flex flex-col">
        <div class="flex flex-row font-bold text-3xl text-primary-800">
            <a href="main.php">Beranda/ </a><a href="analisa-alternatif-tabel.php"> Analisa Data Alternatif</a>
        </div>
        <div class="w-full h-2 bg-secondary-300 rounded-xl my-2"></div>
        
		<div class="flex flex-row font-bold text-xl text-primary-800 mt-5 mb-3">Data Rangking</div>
        <table class="divide-y divide-gray-300 w-full mt-2 border-collapse border border-slate-500" id="myTable">
            <thead class="bg-gray-50">
                <tr>
					<th rowspan="2" class="border border-slate-600">Alternatif</th>
					<th colspan="<?php echo $stmt2->rowCount(); ?>" class="border border-slate-600">Kriteria</th>
                </tr>
				<tr>
		            <?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th class="border border-slate-600"><?php echo $row2['nama_kriteria'] ?></th>
		            <?php
					}
					?>
				</tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300 ">
            <?php
                while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr >
				<th class="border border-slate-600"><?php echo $row1['nama_alternatif'] ?></th>
					<?php
					$a= $row1['id_alternatif'];
					$stmt21 = $pro2->readAll();
					while ($row21 = $stmt21->fetch(PDO::FETCH_ASSOC)){
						$b= $row21['id_kriteria'];
						$stmtr = $pro->readR($a,$b);
						while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
					?>
					<td class="border border-slate-600">
						<?php 
						echo $nor = $rowr['skor_alt_kri'];
						//pow($rowr['skor_alt_kri'],$bobot);
						//$pro->ia = $a;
						//$pro->ik = $b;
						//$pro->nn4 = $nor;
						//$pro->normalisasi1();
						?>
					</td>
					<?php
						}
					}
					?>
                </tr>
            <?php
            }
            ?>
				<tr>
					<th class="border border-slate-600">Bobot</th>
					<?php
					while ($rowx1 = $stmtx1->fetch(PDO::FETCH_ASSOC)){
					?>
		                <td class="border border-slate-600"><?php echo $rowx1['bobot_kriteria'] ?></td>
		            <?php
					}
					?>
				</tr>
				<tr>
					<th class="border border-slate-600">Jumlah</th>
					<?php
					while ($rowx2 = $stmtx2->fetch(PDO::FETCH_ASSOC)){
					?>
		                <td class="border border-slate-600">
						<?php 
						$stmtx3 = $pro->readMax($rowx2['id_kriteria']);
						$rowx3 = $stmtx3->fetch(PDO::FETCH_ASSOC);
						echo number_format($rowx3['mnr1'], 5, '.', ',');
						?>
						</td>
		            <?php
					}
					?>
				</tr>
            </tbody>
        </table>

		<div class="flex flex-row font-bold text-xl text-primary-800 mt-10 mb-3">Hasil Perangkingan</div>
					
		<table class="divide-y divide-gray-300 w-full mt-2 border-collapse border border-slate-500" id="myTable">
            <thead class="bg-gray-50">
				<tr>
					<th rowspan="2" style="vertical-align: middle" class="border border-slate-600 text-center">Alternatif</th>
					<th colspan="<?php echo $stmt2->rowCount(); ?>" class="border border-slate-600 text-center">Kriteria</th>
					<th rowspan="2" style="vertical-align: middle" class="border border-slate-600 text-center">Hasil</th>
				</tr>
				<tr>
					<?php
						while ($row2 = $stmt2y->fetch(PDO::FETCH_ASSOC)){
						?>
							<th class="border border-slate-600"><?php echo $row2['nama_kriteria'] ?></th>
						<?php
						}
					?>
				</tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300 ">
            <?php
                while ($row1 = $stmt1y->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr >
				<th class="border border-slate-600"><?php echo $row1['nama_alternatif'] ?></th>
					<?php
					$a1= $row1['id_alternatif'];
					$stmt21 = $pro2->readAll();
					while ($row21 = $stmt21->fetch(PDO::FETCH_ASSOC)){
						$b2= $row21['id_kriteria'];
						$stmtr = $pro->readR($a1,$b2);
						while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
					?>
					<td class="border border-slate-600">
						<?php 
		                	echo $norx = $rowr['skor_alt_kri']*$row21['bobot_kriteria'];
							//pow($rowr['skor_alt_kri'],$bobot);
							$pro->ia = $a1;
							$pro->ik = $b2;
							$pro->nn4 = $norx;
							$pro->normalisasi1();
						?>
					</td>
					<?php
						}
					}
					?>
					<td>
						<?php 
						$stmthasil = $pro->readHasil1($a1);
						$hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
						echo $hasil['bbn'];
						$pro->ia = $a1;
						$pro->has1 = $hasil['bbn'];
						$pro->hasil1();
						?>
					</td>
                </tr>
            <?php
            }
            ?>
				<tr>
					<th>Jumlah</th>
					<?php
					while ($rowx2 = $stmtx2y->fetch(PDO::FETCH_ASSOC)){
					?>
		                <td>
							<?php 
								$stmtx3y = $pro->readMax($rowx2['id_kriteria']);
								$rowx3 = $stmtx3y->fetch(PDO::FETCH_ASSOC);
								echo number_format($rowx3['mnr1'], 5, '.', ',');
							?>
						</td>
		            <?php
					}
					?>
					<td>
						<?php 
							$stmtx4y = $pro->readMax2();
							$rowx4 = $stmtx4y->fetch(PDO::FETCH_ASSOC);
							echo number_format($rowx4['mnr2'], 5, '.', ',');
						?>
					</td>
				</tr>
            </tbody>
        </table>

		<div class="flex flex-row font-bold text-xl text-primary-800 mt-10 mb-3">Hasil Perangkingan Setelah Diurutkan</div>
		
		<table class="bg-white divide-y divide-gray-300 w-full mt-2 border-collapse border border-slate-500">
			<thead>
				<tr >
					<th class="border border-slate-600"> Urutan </th>
					<th class="border border-slate-600"> Jurusan </th>
					<th class="border border-slate-600"> Hasil Akhir</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db= new PDO ("mysql:host=localhost;dbname=id2333746_spk_ahp", "root", "");
					$no=0;
					$Query5="select nama_alternatif,hasil_akhir from ahp_data_alternatif where id_pengguna = '$_SESSION[id_pengguna]' order by hasil_akhir desc ";
					$results = $db->query($Query5);

					while($row = $results->fetch(PDO::FETCH_ASSOC)){
					$no++;
				?>
					<tr >
						<td class="border border-slate-600">Hasil Terbaik <?= $no ?></td>
						<td class="border border-slate-600"><?= $row['nama_alternatif'] ?></td>
						<td class="border border-slate-600"><?= $row['hasil_akhir'] ?></td>
					</tr>
				<?php	
					}
				?>
			</tbody>
		</table>
    </div>
</div>


</html>
