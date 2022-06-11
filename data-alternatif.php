<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro = new Alternatif($db);
$stmt = $pro->readAll();
$count = $pro->countAll();

if(isset($_POST['hapus-contengan'])){
    $imp = "('".implode("','",array_values($_POST['checkbox']))."')";
    $result = $pro->hapusell($imp);
    if($result){
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showSuccessToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
            };
            </script>
            <?php
    } else{
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showErrorToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
            };
            </script>
            <?php
    }
}
?>
<div class="bg-gray-100 px-5 py-5 rounded-xl">
    <div class="flex flex-col">
        <div class="flex flex-row font-bold text-3xl text-primary-800">
            <a href="main.php">Beranda/ </a><a href="data-kriteria.php"> Data Alternatif</a>
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
                    <th class="px-6 py-2 text-lg text-gray-500 ">
                        ID Jurusan
                    </th>
                    <th class="px-6 py-2 text-lg  text-gray-500">
                        Nama Jurusan
                    </th>
                    <th class="px-6 py-2 text-lg text-gray-500">
                        Hasil Akhir
                    </th>
                    <th class="px-6 py-2 text-lg text-gray-500">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
            <?php
                $no=1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        <div class="text-lg text-gray-900">
                            <?php echo $row['id_alternatif'] ?>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-lg text-gray-500">
                            <?php echo $row['nama_alternatif'] ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="text-lg text-gray-500">
                            <?php echo $row['hasil_akhir'] ?>
                        </div>
                    </td>
                    <td class="flex flex-row justify-center text-center">
                        <a href="data-alternatif-ubah.php?id=<?php echo $row['id_alternatif'] ?>" class="bg-yellow-300 mr-2 hover:bg-yellow-400 py-2 px-7 rounded-lg font-semibold">Edit</a>
                        <a href="data-alternatif-hapus.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="bg-red-500 text-white hover:bg-red-600 py-2 px-3 rounded-lg font-semibold">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <center>
        <p>
            <h4>Silahkan Masukan Kriteria Yang Di Perlukan, Klik Tombol "Tambah Data" Untuk menambahkan kriteria</h4>
        </p>
    </center>
</div>