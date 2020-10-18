<?php include('inc/header.php');
session_start();
if (isset($_SESSION['cid'])) {
    header("location:userpro");
}
?>
<div class="ulogin">
    <div class="col-lg-4 col-md-6 col-10 mx-auto">
        <div class="logo_list d-flex align-items-center flex-column">
            <img src="img/logo.png" alt="logo" class="logo">
            <h1 class="logo_text text-center mb-5 text-light display-3 font-weight-bold">User Login</h1>
        </div>
        <div class="row g-3 d-flex flex-column">
            <?php
            if (isset($_SESSION['client'])) {
                header('location:index');
            }
            if (isset($_REQUEST['login'])) {
                $un = $_POST['email'];
                $ps = $_POST['password'];
                if (!empty($un) && !empty($ps)) {
                    $login = $db->client($un, $ps);
                } else {
                    echo '<h1>Please Fill Up The Field</h1>';
                }
            }
            ?>
            <form action="" method="POST">
                <div class="col">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="col">
                    <input type="text" name="password" class="form-control" placeholder="Enter Password" aria-label="Last name">
                </div>
                <button name="login">Login</button>
            </form>
            <ul style="list-style: none;">
                <li>
                    <a style="text-decoration: none;" href="userreg">
                        <h4 class="text-light">Register Now</h4>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php include('inc/footer.php'); ?>