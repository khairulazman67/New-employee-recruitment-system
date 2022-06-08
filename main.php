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
		<div class="row">
<!--		  <div class="col-xs-12 col-sm-12 col-md-2">
		  	<?php
//			include_once 'sidebar.php';
			?>
		  </div>-->
		  <br><br><br>
		  <div class="col-xs-12 col-sm-12 col-md-12">
			<div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
		  <br/>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Nilai Preferensi</h3>
			  </div>
			  <div class="panel-body">
			    <ol>
			    	<?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jum_nilai'] ?>)</li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Kriteria & Bobot</h3>
			  </div>
			  <div class="panel-body">
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
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Jurusan & Hasil</h3>
			  </div>
			  <div class="panel-body">
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
		  <div class="col-xs-12 col-sm-12 col-md-8">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Hasil Rekomendasi SPK </h3>
			  </div>
			  <div class="panel-body">
			     <table  width="100%" class="table table-striped table-bordered">  
<tr>
	<th>Urutan</th>
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
		  </div>
		</div>
		
		</div>
		</div>
		
		<footer class="text-center">&copy; Haris Lukman Hakim 2017</footer>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
</html>