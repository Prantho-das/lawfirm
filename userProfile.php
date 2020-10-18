<?php include('inc/header.php');
session_start();
if (!isset($_SESSION['cid'])) {
    header("location:userlogin");
}
$cid = $_SESSION['cid'];
$client = $_SESSION['client'];
if (isset($_GET['lid'])) {
    $lid = $_GET['lid'];
    $del = "DELETE FROM `appointment` WHERE cid=$cid AND lid=$lid";
    $delete = $db->delete($del);
    header("location:userProfile");
}
?>

<div class="col-md-8 col-10 py-5 mx-auto intro_sec">
    <div class="name pb-2">
        <div class="logo_list d-flex align-items-center flex-column">
            <a href='userpro'><img src="img/logo.png" alt="logo" class="clogo"></a>
            <h1 class="logo_text text-center mb-5 display-4 font-weight-bold">User Profile</h1>
        </div>
    </div>
    <hr />
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left" id="acco" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Edit Your Profile
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    if (isset($_REQUEST['Updatec'])) {
                        $name = $_POST['name'];
                        $uname = $_POST['uname'];
                        $phone = $_POST['phone'];
                        $upqe = "UPDATE `client` SET `name`='$name',`uname`='$uname',`phone`='$phone' WHERE cid='$cid'";
                        $upr = $db->update($upqe);
                        if ($upr) {
                            header('location:userProfile');
                        } else {
                            echo "<li class='list-group-item text-danger' style='margin-left:1rem'>Must be Some Problem</li>";
                        }
                    }

                    $select = "SELECT * FROM `client` WHERE cid='$cid'";
                    $selectquery = $db->select($select);
                    if (mysqli_num_rows($selectquery) >= 1) {
                        while ($row = mysqli_fetch_assoc($selectquery)) { ?>
                            <form class="row g-3" action="" method="POST">
                                <div class="col-sm-6 col-12">
                                    <label class="form-label">Full name</label>
                                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Enter Name" required>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="uname" value="<?php echo $row['uname']; ?>" placeholder="Enter Username" class="form-control" required>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label">Mobile</label>
                                    <input type="tel" class="form-control" value="<?php echo $row['phone']; ?>" name="phone" placeholder="Enter Number" required>
                                </div>
                                <div class="col-12">
                                    <button name="Updatec" class="btn btn-sm btn-primary px-3 py-1" style="font-size: 1.4rem;">Update</button>
                                </div>
                            </form>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

        <!--update-->
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Confirm Appointment
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    // $select = "SELECT * FROM `appointment` WHERE cid='$cid' AND status=1";
                    $select = "SELECT appointment.*,lawyer.*,services.* FROM ((lawyer INNER JOIN 
                    appointment ON appointment.lid=lawyer.Lid)INNER JOIN 
                    services ON lawyer.expart=services.sid) WHERE appointment.status=1 AND appointment.cid='$cid'";
                    $selectquery = $db->select($select);
                    if (mysqli_num_rows($selectquery) >= 1) {
                        while ($row = mysqli_fetch_assoc($selectquery)) { ?>
                            <ul class="list-group">

                                <li class="list-group-item" style="font-size: 2rem;"><span class="text-success">
                                        Confirm appoinment with:<br /></span>
                                    Name: <?php echo $row['name']; ?>
                                    <br />Phone: <?php echo $row['phone']; ?>
                                    <br />Expart: <?php echo $row['service_name']; ?>
                                    <br />Time: <?php echo help::date($row['atime']); ?>
                                    <br/><a href='chat?mlid=<?php echo $row['Lid']; ?>' class='btn btn-lg btn-success text-light'>Message</a>
                                    <br />Payment:
                                    <div class="d-flex pt-2">
                                        <div class="payment"><img src="img/bkash.png" class="img-fluid" alt=""></div>
                                        <div class="payment"><img src="img/Nagad.svg" class="img-fluid" alt=""></div>
                                        <div class="payment"><img src="img/rocket.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <br /><a href="?lid=<?php echo $row['lid']; ?>" class="m-3 btn btn-danger">Cancel</a>

                                </li>
                            </ul>
                    <?php
                        }
                    } else {
                        echo "<li class='list-group-item' style='font-size: 2rem;'>No Requested Appoinment</li>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--pending appointment-->
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Pending Appointment
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    // $select = "SELECT * FROM `appointment` WHERE cid='$cid' AND status=1";
                    $select = "SELECT appointment.*,lawyer.*,services.* FROM ((lawyer INNER JOIN 
                    appointment ON appointment.lid=lawyer.Lid)INNER JOIN 
                    services ON lawyer.expart=services.sid) WHERE appointment.status=0 AND appointment.cid='$cid'";
                    $selectquery = $db->select($select);
                    if (mysqli_num_rows($selectquery) >= 1) {
                        while ($row = mysqli_fetch_assoc($selectquery)) { ?>
                            <ul class="list-group">

                                <li class="list-group-item" style="font-size: 2rem;"><span class="text-success">
                                        Pending appoinment with:<br /></span>
                                    Name: <?php echo $row['name']; ?>
                                    <br />Phone: <?php echo $row['phone']; ?>
                                    <br />Expart: <?php echo $row['service_name']; ?>
                                    <br />Time: <?php echo help::date($row['atime']); ?>
                                    <br /><a href="?lid=<?php echo $row['lid']; ?>" class="m-3 btn btn-danger">Cancel</a>

                                </li>
                            </ul>
                    <?php
                        }
                    } else {
                        echo "<li class='list-group-item' style='font-size: 2rem;'>No Requested Appoinment</li>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--pending request-->
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTw" aria-expanded="false" aria-controls="collapseTwo">
                        Message
                    </button>
                </h2>
            </div>
            <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    $roomsel = "SELECT * FROM `msgroom` where sender='$client'";
                    $romc = $db->select($roomsel);
                    if (mysqli_num_rows($romc) > 0) {
                        while ($roww = mysqli_fetch_assoc($romc)) { ?>
                            <li class='list-group-item'><a href="chat.php?mlid=<?php echo $roww['rid']; ?>" style="font-size: 1.4rem;" class="btn btn-block btn-info"><?php echo $roww['receiver']; ?></a></li>
                    <?php
                        }
                    }else{
                            echo "<li class='list-group-item' style='font-size: 2rem;'>No Message Found</li>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--rating-->
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwf" aria-expanded="false" aria-controls="collapseTwo">
                        Rating
                    </button>
                </h2>
            </div>
            <div id="collapseTwf" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <?php
                    $rsel = "SELECT rating.*,lawyer.* FROM rating INNER JOIN lawyer ON rating.lrid=lawyer.Lid WHERE rating.crid=$cid AND rstatus=0";
                    $romc = $db->select($rsel);
                    if (mysqli_num_rows($romc) > 0) {
                        while ($roww = mysqli_fetch_assoc($romc)) { ?>
                         <ul class="list-group">
                            <li class="list-group-item" style="font-size: 2rem;"><span class="text-success">
                                    Rate him:<br /></span>
                                    Name: <?php echo $roww['name']; ?>
                                    <br />Phone: 0<?php echo $roww['phone']; ?>
                                    <div class="d-flex my-2">
                                     <div class="payment text-center" onclick='rate(2,<?php echo $roww['lrid']; ?>)'>2</div>
                                     <div class="payment text-center" onclick='rate(4,<?php echo $roww['lrid']; ?>)'>4</div>
                                     <div class="payment text-center" onclick='rate(5,<?php echo $roww['lrid']; ?>)'>5</div>
                                    </div>
                            </li>
                        </ul>
                        <?php
                        }
                    }else{
                            echo "<li class='list-group-item' style='font-size: 2rem;'>No Requested Found</li>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--rating-->
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Tranaction History
                    </button>
                </h2>
            </div>
            <div id="collapsTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">

                </div>
            </div>
        </div>

        <?php
        if (isset($_REQUEST['logout'])) {
            if (isset($_POST["logout"]) == "logoutClient") {
                if (isset($_SESSION['cid'])) {
                    session_reset();
                    session_destroy();
                    echo "<script>window.location.href='index'</script>";
                }
            }
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" value="logoutClient" name="logout">
            <button name="logout" style="margin: 2rem 0rem;" class="btn btn-lg btn-danger">Log Out</button>
        </form>
    </div>

</div>
<script>
//rating
    function rate(r,f){
         $.post("ajax/ratingajax.php", {
                rating:r,
                lrid: f,
            },
            function(data) {
                if(data==1){
                    window.location.href='userProfile';
                }
            });
    }
</script>
<?php include('inc/footer.php'); ?>