<?php include('inc/header.php'); ?>
<!--login section -->
<?php
session_start();
if (isset($_SESSION['lawyer'])) {
    header('location:lawyerpro');
}
if (isset($_REQUEST['login'])) {
    $un = $_POST['email'];
    $ps = $_POST['password'];
    if (!empty($un) && !empty($ps)) {
        $login = $db->lawyer($un, $ps);
    } else {
        echo '<h1>Please Fill Up The Field</h1>';
    }
}
?>
<!--login section -->
<div class="Llogin">
    <div class="col-lg-4 col-md-6 col-10 mx-auto">
        <div class="logo_list d-flex align-items-center flex-column">
            <img src="img/logo.png" alt="logo" class="logo">
            <h1 class="logo_text text-center mb-5 text-light display-3 font-weight-bold">Lawyer Login</h1>
            <?php
            if (isset($_GET['err'])) {
                $err=md5('cerror');
                if($_GET['err']==$err){
                 echo '<h1 class="logo_text text-center mb-5 text-green font-weight-bold">Please Collect Email or Password</h1>';
                }
            }
            ?>
        </div>
        <div class="row g-3 d-flex flex-column">
            <form action="" method="post">
                <div class="col">
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="col">
                    <input type="text" name="password" class="form-control" placeholder="Enter Password" aria-label="Last name">
                </div>
                <button name="login">Login</button>
            </form>
            <ul style="list-style: none;">
                <li><a style="text-decoration: none;" href="lawyerreg">
                        <h4 class="text-light">Register Now</h4>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php include('inc/footer.php'); ?>