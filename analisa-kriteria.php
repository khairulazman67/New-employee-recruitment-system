<?php
include_once 'header.php';
include_once 'includes/kriteria.inc.php';
$pro1 = new Kriteria($db);
$count1 = $pro1->countAll();
include_once 'includes/nilai.inc.php';
$pro2 = new Nilai($db);
/*if($_POST){
	
	include_once 'includes/bobot.inc.php';
	$eks = new Bobot($db);

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
}*/
?>
		<div class="row">
<!--		  <div class="col-xs-12 col-sm-12 col-md-2">
		  <?php
//			include_once 'sidebar.php';
			?>
		  </div>-->
		  <div class="col-xs-12 col-sm-12 col-md-12">
		  <ol class="breadcrumb">
			  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			  <li class="active"><span class="fa fa-bomb"></span> Analisis Kriteria</li>
	  		  <li><a href="analisa-kriteria-tabel.php"><span class="fa fa-table"></span> Tabel Analisis Kriteria</a></li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-bomb"></span> Analisis Kriteria</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post" action="analisa-kriteria-tabel.php">
				<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<label>Kriteria Pertama</label>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<label>Pernilaian</label>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<label>Kriteria Kedua</label>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt2 = $pro1->readSatu('C1');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
							<input type="hidden" name="C11" value="<?php echo $row1['id_kriteria'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl1">
								<?php
								$stmt1 = $pro2->readAll();
								while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt3 = $pro1->readSatu('C2');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
							<input type="hidden" name="C21" value="<?php echo $row3['id_kriteria'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt2 = $pro1->readSatu('C1');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
							<input type="hidden" name="C12" value="<?php echo $row1['id_kriteria'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl2">
								<?php
								$stmt1 = $pro2->readAll();
								while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt3 = $pro1->readSatu('C3');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
							<input type="hidden" name="C32" value="<?php echo $row3['id_kriteria'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt2 = $pro1->readSatu('C2');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
							<input type="hidden" name="C25" value="<?php echo $row1['id_kriteria'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl5">
								<?php
								$stmt1 = $pro2->readAll();
								while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt3 = $pro1->readSatu('C3');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
							<input type="hidden" name="C35" value="<?php echo $row3['id_kriteria'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					</div>
					<center>
					<p class="text-muted">Setelah selesai silahkan klik tombol di bawah ini
					</p>
					<button type="submit" name="subankr" class="btn btn-primary"> Proses <span class="fa fa-arrow-right"></span></button></center>
				</form>
			    <center>
			  <h3>CARA PENILAIAN</h3>
			  	<p>Anda disini akan memasukan nilai dari perbandingan setiap kriteria</p>
			  	<p>Jika anda memasukan Kriteria 1 & kriteria 2 # nilai "1" #  maka dapat dikatakan bahwa Kriteria 1 dan 2 memiliki kepentingan yang sama</p>
			  	<p>Lalu Jika anda memasukan Kriteria 1 & Kriteria 2 #nilai "0,5" atau nilai < 1 , maka dapat dikatakan bahwa kriteria 1 0,5 mendekati lebih penting dari pada kriteria 2 atau bisa di katakan bawah Kriteria 2 sedikti lebih penting dari pada kriteria 1</p>
			  </center>
		  </div></div></div>
		</div>
		<?php
include_once 'footer.php';
?>