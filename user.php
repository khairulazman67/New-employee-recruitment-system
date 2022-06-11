<?php  
include "header_admin.php";
include_once 'includes/user.inc.php';
$pro = new User($db);
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
<!-- content -->
<div class="h-auto mt-5 mb-6 bg-gray-100 w-full rounded-2xl py-10 px-10">
<div class="font-bold text-3xl text-primary-800">
    <a href="user.php">Data User</a>
</div>
<div class="w-full h-2 rounded-xl bg-secondary-300 mt-2 mb-4"></div>
<div class="flex flex-row justify-between">
    
    <div>
        <a href="user-baru.php" >
            <div class="bg-primary-500 hover:bg-primary-600 w-full text-left pl-4 py-2 px-2 ml-2 rounded-xl font-bold text-xl text-white">
                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
            </div>
        </a>
    </div>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder=" Cari Data" title="Type in a name" class="py-2 px-2 mb-3 rounded-lg">
</div>
    <div class="flex w-full justify-center">
        <table class="divide-y divide-gray-300 w-full" id="myTable">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-2 text-lg text-gray-500 ">
                        nama Lengkap
                    </th>
                    <th class="px-6 py-2 text-lg  text-gray-500">
                        Username
                    </th>
                    <th class="px-6 py-2 text-lg text-gray-500">
                        Edit
                    </th>
                    <th class="px-6 py-2 text-lg text-gray-500">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
            <?php
                $no=1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 ">
                        <div class="text-lg text-gray-900">
                            <?php echo $row['nama_lengkap'] ?>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-lg text-gray-500">
                            <?php echo $row['username'] ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="user-ubah.php?id=<?php echo $row['id_pengguna'] ?>" class="bg-yellow-300 hover:bg-yellow-400 py-2 px-7 rounded-lg font-semibold">Edit</a>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="user-hapus.php?id=<?php echo $row['id_pengguna'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="bg-red-500 text-white hover:bg-red-600 py-2 px-3 rounded-lg font-semibold">
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
</div>
</div>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    var td2 = tr[i].getElementsByTagName("td")[1];
                    if (td2) {
                        txtValue = td2.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }       
        }
    }
</script>
<?php
    include_once 'sidebar_admin.php';
?>