<?php
// include_once 'header_admin.php';
if($_POST){
    
    include_once 'includes/user.inc.php';
    $eks = new User($db);

    $eks->nl = $_POST['nl'];
    $eks->un = $_POST['un'];
    $eks->pw = md5($_POST['pw']);

    if($eks->pw == md5($_POST['up'])){
    
    if($eks->insert()){
?>
<script type="text/javascript">
  window.onload = function () {
    showStickySuccessToast();
  };
  window.location = 'login.php';
</script>
<?php
    }
    
    else{
?>
<script type="text/javascript">
  window.onload = function () {
    showStickyErrorToast();
  };
</script>
<?php
    }

    } else{
?>
<script type="text/javascript">
  window.onload = function () {
    showStickyWarningToast();
  };
</script>
<?php   
    }
}
?>
    <?php
      include_once 'header_admin.php';
    ?>
      <!-- content -->
      <div class="h-full mt-5 mb-6 bg-gray-100 w-full rounded-2xl py-10 px-10">
        <div class="text-4xl font-bold ">Selamat Datang Pada Sistem</div> 
        <div class="h-2 my-2 w-full bg-secondary-300 rounded-xl"></div>
        <div  class="font-semibold text-2xl">Pendukung keputusan penerimaan karyawan baru Perumda Tirta Pase Menggunakan Metode Multi Objective Optimization On The Basis Of Radio Analysus (MOORA)</div>
        
      </div>
    </div>
    <?php
      include_once 'sidebar_admin.php';
    ?>