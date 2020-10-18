<?php include('inc/header.php');
session_start();
if (!isset($_SESSION['lid'])) {
    header('location:lawyerlogin');
}
$lid = $_SESSION['lid'];
$lawyer = $_SESSION['lawyer'];
?>
<!-- <div class="loader"></div> -->
<div class="col-md-8 col-10 py-5 mx-auto intro_sec">
    <div class="name pb-2">
        <div class="logo_list d-flex align-items-center flex-column">
            <a href='lawyerpro'><img src="img/logo.png" alt="logo" class="clogo"></a>
            <h1 class="logo_text text-center mb-5 display-4 font-weight-bold">Lawyer Profile</h1>
        </div>
    </div>
    <hr />
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Edit Your Profile
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <!--this is update-->
                    <?php
                    if (isset($_REQUEST['Updatec'])) {
                        $name = $_POST['name'];
                        $addr = $_POST['addr'];
                        $phone = $_POST['phone'];
                        $expr = $_POST['expr'];
                        $upqe = "UPDATE `lawyer` SET `name`='$name',`addr`='$addr',`expr`='$expr',`phone`='$phone' WHERE Lid='$lid'";
                        $upr = $db->update($upqe);
                        if ($upr) {
                            header('location:lawyerProfile');
                        } else {
                            echo "<li class='list-group-item text-danger' style='margin-left:1rem'>Must be Some Problem</li>";
                        }
                    }

                    $select = "SELECT * FROM `lawyer` WHERE Lid='$lid'";
                    $selectquery = $db->select($select);
                    if (mysqli_num_rows($selectquery) >= 1) {
                        while ($row = mysqli_fetch_assoc($selectquery)) { ?>
                            <form class="row g-3" action="" method="POST">
                                <div class="col-sm-6 col-12">
                                    <label class="form-label">Full name</label>
                                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Enter Name" required>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="addr" value="<?php echo $row['addr']; ?>" placeholder="Enter Username" class="form-control" required>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label">Experience Level</label>
                                    <select name="expr" style="height:4rem;font-size:1.4rem;" class="form-select" id="select">
                                         <option value="500" Selected>1-2 years</option>
                                        <option value="700">3-5 years</option>
                                        <option value="1000">More than 5 years</option>
                                    </select>
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
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Message
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="card card-body">
                        <?php
                        $roomsel = "SELECT * FROM `msgroom` where receiver='$lawyer'";
                        $romc = $db->select($roomsel);
                        if (mysqli_num_rows($romc) > 0) {
                            while ($roww = mysqli_fetch_assoc($romc)) { ?>
                                <a href="chat.php?cid=<?php echo $roww['sid']; ?>" style="font-size: 1.4rem;" class="btn btn-info"><?php echo $roww['sender']; ?></a>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseT" aria-expanded="false" aria-controls="collapseTwo">
                        Tranaction History
                    </button>
                </h2>
            </div>
            <div id="collapseT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">

                </div>
            </div>
        </div>
        <?php
        if (isset($_REQUEST['logout'])) {
            if (isset($_POST["logout"]) == "logoutlawyer") {
                if (isset($_SESSION['lid'])) {
                    session_reset();
                    session_destroy();
                    echo "<script>window.location.href='index'</script>";
                }
            }
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" value="logoutlawyer" name="logout">
            <button name="logout" style="margin: 2rem 0rem;" class="btn btn-lg btn-danger">Log Out</button>
        </form>
    </div>

</div>
<!-- Optional JavaScript -->
<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous">
</script>
<script src="js/main.js"></script>
<script>
    // const loaderr=()=>{
    //     setTimeout(() => {
    //         let load = document.querySelector('.loader');
    //         load.style.display = "none";
    //      }, 3000);
    // }
</script>
</body>

</html>