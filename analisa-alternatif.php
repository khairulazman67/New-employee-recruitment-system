<?php
include_once 'header.php';
include_once 'includes/skor.inc.php';
$pro1 = new Skor($db);
$count1 = $pro1->countAll();
include_once 'includes/kriteria.inc.php';
$pro3 = new Kriteria($db);
include_once 'includes/nilai.inc.php';
$pro2 = new Nilai($db);

?>
<div class="bg-gray-100 px-5 py-5 rounded-xl">
	<form method="post" action="analisa-alternatif-tabel.php">   
	<div class="flex flex-col">
        <div class="flex flex-row font-bold text-3xl text-primary-800">
            <a href="main.php">Analisa Kriteria</a>
        </div>
        <div class="w-full h-2 bg-secondary-300 rounded-xl my-2"></div>
		<div class="flex flex-row">
			<div class="w-1/4 font-bold text-lg" >Pilih Kriteria</div>
			<div class="w-full">
				<select class="block text-gray-500 rounded-xl font-bold text-left mb-1 px-2 py-2 pr-4 w-full"  id="kriteria" name="kriteria">
					<?php
						$stmt4 = $pro3->readAll();
						while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
						?>
							<option value="<?php echo $row4['id_kriteria'] ?>"><?php echo $row4['nama_kriteria'] ?></option>
							<?php
						}
					?>
				</select>
				<p class="text-muted"> Silahkan pilih kriteria yang anda ingin perbandingkan dengan jurusan</p>
				
			</div>
		</div>
        <div class="flex flex-row justify-between">
			<div class="flex flex-col w-1/4">
				<div class="font-bold text-lg my-2">Kriteria Pertama</div>
					<?php
						$stmt2 = $pro1->readAlternatif('A1');
						while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
						<div class="w-full ">
							<input type="text"  value="<?php echo $row1['nama_alternatif'] ?>" type="text" class="w-full py-2 px-2 rounded-xl "  readonly>
						</div>
						<input type="hidden" name="A11" value="<?php echo $row1['id_alternatif'] ?>" />
					<?php
						}
					?>

					<?php
						$stmt2 = $pro1->readAlternatif('A1');
						while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
						<div class="w-full mt-2">
							<input type="text" value="<?php echo $row1['nama_alternatif'] ?>" type="text" class="w-full py-2 px-2 rounded-xl "  readonly>
						</div>
						<input type="hidden" name="A12" value="<?php echo $row1['id_alternatif'] ?>" />
					<?php
						}
					?>

					<?php
						$stmt2 = $pro1->readAlternatif('A2');
						while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
						<div class="w-full mt-2">
							<input type="text" value="<?php echo $row1['nama_alternatif'] ?>"  type="text" class="w-full py-2 px-2 rounded-xl "  readonly>
						</div>
						<input type="hidden" name="A25" value="<?php echo $row1['id_alternatif'] ?>" />
					<?php
						}
					?>
				
			</div>
			<div class="flex flex-col w-1/4">
				<div class="font-bold text-lg my-2">Penilaian</div>
				<div class="w-full">
					<select class="block text-gray-500 rounded-xl font-bold text-left mb-1 px-2 py-2 pr-4 w-full"  name="nl1">
						<?php
							$stmt1 = $pro2->readAll();
							while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
							?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> -
									<?php echo $row2['ket_nilai'] ?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="w-full mt-2">
					<select class="block text-gray-500 rounded-xl font-bold text-left mb-1 px-2 py-2 pr-4 w-full" name="nl2">
						<?php
							$stmt1 = $pro2->readAll();
							while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
							?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> -
									<?php echo $row2['ket_nilai'] ?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="w-full mt-2">
					<select  class="block text-gray-500 rounded-xl font-bold text-left mb-1 px-2 py-2 pr-4 w-full" name="nl5">
						<?php
							$stmt1 = $pro2->readAll();
							while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
							?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> -
									<?php echo $row2['ket_nilai'] ?></option>
								<?php
							}
						?>
					</select>
				</div>
			</div>
			<div class="flex flex-col w-1/4">
				<div class="font-bold text-lg my-2">Kriteria Kedua</div>
				<?php
					$stmt3 = $pro1->readAlternatif('A2');
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
				?>
					<div class="w-full ">
						<input type="text" value="<?php echo $row3['nama_alternatif'] ?>" type="text" class="w-full py-2 px-2 rounded-xl "  readonly>
					</div>
					<input type="hidden" name="A21" value="<?php echo $row3['id_alternatif'] ?>" />
				<?php
					}
				?>

				<?php
					$stmt3 = $pro1->readAlternatif('A3');
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
				?>
					<div class="w-full mt-2">
						<input type="text" value="<?php echo $row3['nama_alternatif'] ?>" type="text" class="w-full py-2 px-2 rounded-xl "  readonly>
					</div>
					<input type="hidden" name="A32" value="<?php echo $row3['id_alternatif'] ?>" />
				<?php
					}
				?>

				<?php
					$stmt3 = $pro1->readAlternatif('A3');
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
				?>
					<div class="w-full mt-2">
						<input type="text" value="<?php echo $row3['nama_alternatif'] ?>" type="text" class="w-full py-2 px-2 rounded-xl "  readonly>
					</div>
					<input type="hidden" name="A35" value="<?php echo $row3['id_alternatif'] ?>" />
				<?php
					}
				?>
			</div>
		</div>
        
    </div>
    <center>
        <p>
			<h1>Setelah selesai silahkan klik tombol di bawah ini</h1>
			<button type="submit" name="subankr" class="bg-primary-700 hover:bg-primary-800 rounded-lg py-2 px-3 font-semibold text-white">Proses</button>
            <h4>Silahkan Masukan Kriteria Yang Di Perlukan, Klik Tombol "Tambah Data" Untuk menambahkan kriteria</h4>
        </p>
    </center>
	</form>
</div>