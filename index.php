<?php include('inc/header.php'); ?>
<?php 
// if(isset($_SESSION['cid'])){
//     header('location:userpro');
// }
// if(isset($_SESSION['lid'])){
//     header('location:lawyerpro');
// }
?>
<div class="background">
    <div class="logo_list d-flex align-items-center flex-column">
        <img src="img/logo.png" alt="logo" class="logo">
        <h1 class="logo_text text-center text-light display-3 font-weight-bold">Easy Justice</h1>
    </div>
    <div class="btn_list">
        <a href="lawyerlogin" class="cbtn">Lawyer</a>
        <a href="userlogin" class="cbtn">User</a>
        <a href="#" class="cbtn d-sm-block d-none" style="grid-column: 1/3;">Visit website</a>
    </div>
<?php include('inc/footer.php'); ?>