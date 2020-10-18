<?php include('inc/header.php');
session_start();
if (isset($_SESSION['cid'])) {
    header("location:userpro");
}
?>
<div class="lawreg">
    <div class="col-8 mx-auto">
        <div class="logo_list d-flex align-items-center flex-column">
            <a href='index'><img src="img/logo.png" alt="logo" class="logo"></a>
            <h1 class="logo_text text-center mb-5 text-light display-3 font-weight-bold">User Register</h1>
        </div>

        <!--registaion section-->
        <?php
        if (isset($_REQUEST['reg'])) {
            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $nid = $_POST['nid'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $check = $_POST['check'];
            if (strlen($password) >= 8  &&  strlen($password) < 255) {
                $password = sha1($_POST['password'], false);
                if (empty($name) || empty($uname) || empty($email) || empty($nid) || empty($phone) || empty($password)) {
                    $warn = "<h2 class='text-center text-capitalize'>Any field Can not be Empty</h2>";
                } else {
                    $evalidate = $db->clientemval($email);
                    if ($evalidate === true) {
                        $inq = "INSERT INTO `client`(`name`, `uname`, `email`, `phone`, `nid`, `password`)
                         VALUES ('$name','$uname','$email','$phone','$nid','$password')";
                        $inr = $db->insert($inq);
                        if ($inr) {
                            echo $warn = "<h2 style='background-color: white;
  width: max-content;
  margin: 1.2rem auto;
  padding: 1.5rem;
  border-radius: 1.3rem;' class='success text-center text-success text-capitalize'>You are Registered...! go to <a href='userlogin'>Log in</a></h2>";
                        } else {
                            echo $warn = "<h2 class='text-center text-light text-capitalize'>There is some problem</h2>";
                        }
                    } else {
                        echo $warn = "<h2 class='text-center text-capitalize'>Email is Already registered</h2>";
                    }
                }
            } else {
                echo $warn = "<h1 class='text-center text-capitalize text-light'>Sorry...! Password Must be 8 in length</h1>";
            }
        }

        ?>
        <!--registaion section -->

        <form class="row g-3" action="" method="POST">
            <div class="col-sm-6 col-12">
                <label class="form-label">Full name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Username</label>
                <input type="text" name="uname" placeholder="Enter Username" class="form-control" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">NID</label>
                <input type="text" class="form-control" name="nid" placeholder="Enter NID" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Mobile</label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter Number" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" required>
                    <label class="form-check-label ml-2 text-light" for="invalidCheck2">
                        Agree to terms and conditions.Any Problem Contact with Us:<a href='tel:+880{$row["phone"]}' style="color:white;font-size:1rem"><i class='fas fa-phone-alt ml-2'></i></a>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button name="reg">Register</button>
            </div>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $('.success').fadeOut(20000);
    })
</script>
    <?php include('inc/footer.php'); ?>