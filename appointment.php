<?php
include('inc/header.php');
session_start();
$cid = $_SESSION['cid'];
$client = $_SESSION['client'];
$lid = $_GET['lid'];
$que = "SELECT * FROM `lawyer` where Lid='$lid'";
$quer = $db->select($que);
if (mysqli_num_rows($quer) >= 1) {
    while ($row = mysqli_fetch_assoc($quer)) {
        $lname = $row['email'];
        $pexpr = $row['expr'];
    }
}
//else baki ase
?>
<div class="col-md-8 col-10 py-5 mx-auto intro_sec">
    <div class="name pb-2">
        <div class="logo_list d-flex align-items-center flex-column">
            <img src="img/logo.png" alt="logo" class="clogo">
            <h1 class="logo_text text-center mb-5 display-4 font-weight-bold">User Profile</h1>
        </div>
        <hr />
        <div class="finder pt-3">
            <div class="col-md-8 col-12 pt-3 mx-auto">
                <?php
                $select = "SELECT * FROM `appointment` WHERE cid='$cid' AND lid='$lid'";
                $selectquery = $db->select($select);
                if (mysqli_num_rows($selectquery) == 1) {
                    echo "<h2 class='text-center text-success display-1 text-capitalize'>You Have Already sent request</h2>";
                } else {
                    if (isset($_REQUEST['appoint'])) {
                        $vname = $_POST['vname'];
                        $pno = $_POST['pno'];
                        $payment = $_POST['payment'];
                        $rel = $_POST['rel'];
                        $atime = $_POST['atime'];
                        $addr = $_POST['addr'];
                        $cdet = $_POST['cdet'];
                        if (empty($vname) || empty($rel) || empty($atime) || empty($cdet)|| empty($pno) || empty($payment)) {
                            $warn = "<h2 class='text-center text-capitalize'>Any field Can not be Empty</h2>";
                        } else {
                            $inq = "INSERT INTO `appointment`
                            (`cid`, `clname`, `lid`, `lname`, `vname`, `rel`, `address`,`payment`,`pexpr`,`pno`, `cdet`, `atime`) 
                            VALUES ('$cid','$client','$lid','$lname','$vname','$rel','$addr','$payment','$pexpr','$pno','$cdet','$atime')";
                            $inr = $db->insert($inq);
                            if ($inr) {
                                // header('location:userprofile');
                                echo "<script>window.location.href='userProfile'</script>";
                            } else {
                                echo $warn = "<h2 class='text-center text-capitalize'>There is some problem</h2>";
                            }
                        }
                    }
                ?>
                    <h1>Make Appointment</h1>
                    <div class="row mt-4">
                        <form action="" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label display-6">Victim Name</label>
                                    <input type="text" class="form-control" name='vname' placeholder="Enter Victim name">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label display-6">Relation With Victim</label>
                                    <input type="text" class="form-control" name="rel" placeholder="Relation With Victim">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label display-6">Enter date and time</label>
                                    <input type="datetime-local" name="atime" class="form-control">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label display-6">Enter Address</label>
                                    <input type="text" class="form-control" name="addr" placeholder="Enter Address">
                                </div>
                                <!--payment-->
                                <div class="col-md-6 col-12">
                                 <label class="form-label display-6">Payment Method</label>
                                    <div class="form-check">
                                      <input type="radio" value="bkash" name="payment" id="flexRadioDefault1">
                                      <label class="form-check-label" for="flexRadioDefault1">
                                       Bkash
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input type="radio" value="nagad" name="payment" id="flexRadioDefault2" >
                                      <label class="form-check-label" for="flexRadioDefault2">
                                        Nagad
                                      </label>
                                    </div>
                                    <input type="tel" name="pno" placeholder="Enter Payment No" class="form-control">
                                </div>
                                 <!--payment-->
                                <div class="mb-3">
                                    <label class="form-label display-6">Case Details</label>
                                    <textarea class="form-control" name="cdet" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary my-3" name="appoint">Appoint</button>
                        </form>
                    <?php
                }
                    ?>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>