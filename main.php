<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt4 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once 'includes/bobot.inc.php';
$pro5 = new Bobot($db);
$stmt5 = $pro5->readAll();
?>
		<div class="text-center">
		<div  class="font-bold text-3xl text-primary-900 mt-5">SELAMAT DATANG PADA SISTEM</div>
			<div  class="font-bold text-3xl">Pendukung keputusan penerimaan karyawan baru Perumda Tirta Pase <br> Menggunakan Metode Multi Objective Optimization On The Basis Of Radio Analysus (MOORA)</div>
        
			<div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto; margin-top:20px"></div>
		</div>
		<div class="flex flex-row gap-2 h-full mt-4">
            <div class="h-full w-1/3 bg-gray-200 mr-2 rounded-xl"> 
                <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Nilai Preferensi</div>
                <div class="px-5 py-5 h-full">
					<ol>
						<?php
						$i=1;
						while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
						?>
							<li><?php echo $i,'. '; $i++?><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jum_nilai'] ?>)</li>
						<?php
						}
						?>
					</ol>
                </div>
            </div>
            <div class="flex flex-col h-full w-2/3  ml-2 rounded-xl"> 
                <div class="flex flex-row w-full">
                    <div class="bg-gray-200 rounded-xl mr-2 w-full ">
                        
                        <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Kriteria  & Bobot</div>
                        <div class="px-5 py-5 h-full">
							<ol>
								<?php
								while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
								?>
					
									<li><?php echo $row2['nama_kriteria'] ?>
									<?php echo " = " ?>
									<?php echo $row2['bobot_kriteria'] ?></li>
								<?php
								}
								?>
							</ol>
                        </div>
                    </div>
                    <div class="bg-gray-200 rounded-xl ml-2 w-full">
                        <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Jurusan & Hasil</div>
                        <div class="px-5 py-5 h-full">
							<ol>
								<?php
								while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
								?>
								<li><?php echo $row1['nama_alternatif'] ?><?php echo " = " ?>
								<?php echo $row1['hasil_akhir'] ?></li> 
								
								<?php
								}
								?>
							</ol>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="bg-gray-200 rounded-xl">
                        
                        <div class="w-full py-3 bg-secondary-800 overflow-hidden rounded-t-xl px-4 font-bold text-xl text-white">Hasil Rekomendasi SPK</div>
                        <div class="px-5 py-5 h-full">
							<table class="divide-y divide-gray-300 w-full" id="myTable">
								<thead class="bg-gray-50">
									<tr>
										<th class="px-6 py-2 text-lg text-gray-500 ">
											Urutan
										</th>
										<th class="px-6 py-2 text-lg  text-gray-500">
											Jurusan
										</th>
										<th class="px-6 py-2 text-lg text-gray-500">
											Hasil Akhir
										</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-300">
								<?php
									$db= new PDO ("mysql:host=localhost;dbname=id2333746_spk_ahp", "root", "");
									$no=0;
									$Query5="select nama_alternatif,hasil_akhir from ahp_data_alternatif where id_pengguna = '$_SESSION[id_pengguna]' order by hasil_akhir desc ";
									$results = $db->query($Query5);
									while($row = $results->fetch(PDO::FETCH_ASSOC)){
									$no++;
								?>
									<tr class="whitespace-nowrap">
										<td class="px-6 py-4 text-center">
											<div class="text-lg text-gray-900">
												Hasil Terbaik <?php echo $no ?>
											</div>
										</td>
										<td class="px-6 py-4">
											<div class="text-lg text-gray-500">
												<?php echo $row['nama_alternatif'] ?>
											</div>
										</td>
										<td class="px-6 py-4">
											<div class="text-lg text-gray-500">
												<?php echo $row['hasil_akhir'] ?>
											</div>
										</td>
									</tr>
								<?php
								}
								?>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>
	<script>
	var chart1; // globally available
	$(document).ready(function() {
			chart1 = new Highcharts.Chart({
				chart: {
					renderTo: 'container2',
					type: 'column'
				},  
				title: {
					text: 'Grafik Perangkingan '
				},
				xAxis: {
					categories: ['Alternatif']
				},
				yAxis: {
					title: {
					text: 'Jumlah Nilai'
					}
				},
					series:            
					[
					<?php
					while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
						?>
						//data yang diambil dari database dimasukan ke variable nama dan data
						//
						{
							name: '<?php echo $row4['nama_alternatif'] ?>',
							data: [<?php echo $row4['hasil_akhir'] ?>]
						},
						<?php } ?>
					]
			});
		});  
		</script>
</body>