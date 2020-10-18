<?php include('inc/header.php');
session_start();
if (isset($_SESSION['lawyer'])) {
header('location:lawyerpro');
}
?>
<div class="lawreg">
    <div class="col-8 mx-auto">
        <div class="logo_list d-flex align-items-center flex-column">
            <a href='index'><img src="img/logo.png" alt="logo" class="logo"></a>
            <h1 class="logo_text text-center mb-5 text-light display-3 font-weight-bold">Lawyer Register</h1>
        </div>
        <!--registaion section-->
        <?php
        if (isset($_REQUEST['reg'])) {
            $name = $_POST['name'];
            $barr = $_POST['barr'];
            $email = $_POST['email'];
            $nid = $_POST['nid'];
            $expart = $_POST['expart'];
            $expr = $_POST['expr'];
            $addr = $_POST['addr'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $check = $_POST['check'];
            if (strlen($password) >= 8  &&  strlen($password) < 255) {
                $password = sha1($_POST['password'], false);
                if (empty($name) || empty($barr) || empty($email) || empty($nid) || empty($expart) || empty($phone) || empty($addr) || empty($password)|| empty($expr)) {
                    $warn = "<h2 class='text-center text-capitalize'>Any field Can not be Empty</h2>";
                } else {
                    $evalidate = $db->lemailval($email);
                    if ($evalidate === true) {
                        $inq = "INSERT INTO `lawyer`
                                        (`name`, `barr`, `email`, `phone`, `expart`, `addr`,`expr`, `password`)
                                         VALUES ('$name','$barr','$email','$phone','$expart','$addr','$expr','$password')";
                        $inr = $db->insert($inq);
                        if ($inr) {
                            
                           echo $warn = "<h2 style='background-color: white;
  width: max-content;
  margin: 1.2rem auto;
  padding: 1.5rem;
  border-radius: 1.3rem;' class='success text-center text-success text-capitalize'>You are Registered...! go to <a href='lawyerlogin'>Log in</a></h2>";
                            
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

        <form class="row g-3" action="" method="post">
            <div class="col-sm-6 col-12">
                <label class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Bar Council Reg:</label>
                <input type="text" name="barr" placeholder="Enter Bar Council Reg" class="form-control" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Expart Area</label>
                <select name="expart" class="form-select" id="select">
                    <option selected>Open this select menu</option>
                    <?php
                    $que = "SELECT * FROM `services`";
                    $quer = $db->select($que);
                    if (mysqli_num_rows($quer) >= 1) {
                        while ($row = mysqli_fetch_assoc($quer)) { ?>
                            <option value="<?php echo $row['sid'] ?>"><?php echo $row['service_name'] ?></option>
                    <?php
                        }
                    } else {
                        echo "<h1 style='text:center'>Sorry....Yor have no Message</h1>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Experience Level</label>
                <select name="expr" class="form-select" id="select">
                    <option value="500" Selected>0-2 years</option>
                    <option value="700">3-5 years</option>
                    <option value="1000">More than 5 years</option>
                </select>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">NID</label>
                <input type="text" class="form-control" name="nid" placeholder="Enter NID" required>
            </div>
            <div class="col-sm-6 col-12">
                <label class="form-label">Office Address</label>
                <input type="text" class="form-control" name="addr" placeholder="Office/Chamber Address:" required>
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
                <div class="form-check ml-2">
                    <input class="form-check-input" name="check" type="checkbox">
                    <label class="form-check-label ml-3 text-light" for="invalidCheck2">
                        Agree to terms and conditions.Any Problem Contact with Us:<a href='tel:+880{$row["phone"]}' style="color:white;font-size:1rem"><i class='fas fa-phone-alt ml-2'></i></a>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button name="reg" type="submit">Register</button>
            </div>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $('.success').fadeOut(20000);
    })
</script>
    <?php include('inc/footer.php'); ?>