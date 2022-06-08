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

<div class="row">
	<!--<div class="col-xs-12 col-sm-12 col-md-2">
		<?php
			//include_once 'sidebar.php';
		?>-->
	</div>
	<br>
	<br>
	<br>
	<div class="col-xs-13 col-sm-13 col-md-13">
	<ol class="breadcrumb">
	  <li><a href="main.php"><span class="fa fa-home"></span> Beranda</a></li>
	  <li class="active"><span class="fa fa-bank"></span> Data Rangking</li>
	</ol>
	
	    	<div class="row">
				<div class="col-md-6 text-left">
					<h3>Data Rangking</h3>
				</div>
				<!--<div class="col-md-6 text-right">
		            <button type="button" onclick="location.href='main.php'" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</button>
				</div>-->
			</div>
	    
	    	<br/>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $stmt2->rowCount(); ?>" class="text-center">Kriteria</th>
		            </tr>
		            <tr>
		            <?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th><?php echo $row2['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
		<?php
		while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <th><?php echo $row1['nama_alternatif'] ?></th>
		                <?php
		                $a= $row1['id_alternatif'];
						$stmt21 = $pro2->readAll();
						while ($row21 = $stmt21->fetch(PDO::FETCH_ASSOC)){
							$b= $row21['id_kriteria'];
							$stmtr = $pro->readR($a,$b);
							while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
						?>
		                <td>
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
					<th>Bobot</th>
					<?php
					while ($rowx1 = $stmtx1->fetch(PDO::FETCH_ASSOC)){
					?>
		                <td><?php echo $rowx1['bobot_kriteria'] ?></td>
		            <?php
					}
					?>
				</tr>
				<tr>
					<th>Jumlah</th>
					<?php
					while ($rowx2 = $stmtx2->fetch(PDO::FETCH_ASSOC)){
					?>
		                <td>
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
			<h3>Hasil Perangkingan</h3>
			<br/>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $stmt2->rowCount(); ?>" class="text-center">Kriteria</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Hasil</th>
		            </tr>
		            <tr>
		            <?php
					while ($row2 = $stmt2y->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th><?php echo $row2['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
		<?php
		while ($row1 = $stmt1y->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <th><?php echo $row1['nama_alternatif'] ?></th>
		                <?php
		                $a1= $row1['id_alternatif'];
						$stmt21 = $pro2->readAll();
						while ($row21 = $stmt21->fetch(PDO::FETCH_ASSOC)){
							$b2= $row21['id_kriteria'];
							$stmtr = $pro->readR($a1,$b2);
							while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
						?>
		                <td>
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

		
		    	<!--<div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>-->
<h3>Hasil Perangkingan Setelah Di Urutkan</h3>
		    		   <table  width="100%" class="table table-striped table-bordered">  
<tr>
	<th> Urutan </th>
    <th> Jurusan </th>
    <th> Hasil Akhir</th>
    </tr>
<?php
 /*   $servername="localhost";
    $username="root";
    $password="";
    $database="spk_ahp";
    $koneksi=mysql_connect ($servername, $username, $password);

  if ($koneksi) {
    mysql_select_db ($database) or die ("Database Tidak Ditemukan");
   }*/
$db= new PDO ("mysql:host=localhost;dbname=id2333746_spk_ahp", "root", "");
	   $no=0;
	  $Query5="select nama_alternatif,hasil_akhir from ahp_data_alternatif where id_pengguna = '$_SESSION[id_pengguna]' order by hasil_akhir desc ";
	  $results = $db->query($Query5);
	   /*$hasil=mysql_query($Query5);
	   if($hasil===FALSE){
	   	die(mysql_error());
	   }*/
	   while($row = $results->fetch(PDO::FETCH_ASSOC)){
//$id = $data['id'];
$no++;
 echo "<tr>";
 echo"<td>Hasil Terbaik $no</td>";
 echo"<td>".$row['nama_alternatif']."</td>";
 echo"<td>".$row['hasil_akhir']."</td>";
        
  echo "</tr>";
        
}
	   ?>
	   </table>
	</div>   	
</div>

<
	  
	</body>
</html>
<?php
include_once 'footer.php';
?>
