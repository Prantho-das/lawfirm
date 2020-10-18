<?php include('inc/header.php'); ?>
<?php 
$cque = "SELECT * FROM `client`";
$cquer = $db->select($cque);
if(mysqli_num_rows($cquer)>0){
    $client=mysqli_num_rows($cquer);
}else{
    $client=0;
}
$lque = "SELECT * FROM `lawyer`";
$lquer = $db->select($lque);
if(mysqli_num_rows($lquer)>0){
    $llient=mysqli_num_rows($lquer);
}else{
    $llient=0;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pl-4">
  <!-- Content Header (Page header) -->
  <h1 class="text-center display-5 my-3">Welcome to Admin Panel</h1>
  <div class='row pr-4'>
      <div class='col-md-3 col-6'>
         <div class="card">
          <div class="card-body">
            <h2 class="text-center text-primary"><i class="fas fa-user"></i></h2>
            <h4 class="text-center">Total Clients</h4>
            <h2 class='text-center'><?php echo $client; ?></h2>
          </div>
        </div>
      </div>
      <div class='col-md-3 col-6'>
          <div class="card">
          <div class="card-body">
            <h2 class="text-center text-primary"><i class="fas fa-gavel"></i></h2>
            <h4 class="text-center">Total Lawyer</h4>
            <h2 class='text-center'><?php echo $llient; ?></h2>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php'); ?>