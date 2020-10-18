<?php
include('inc/header.php');
session_start();
// if (!isset($_SESSION['cid']) || !isset($_SESSION['lid'])) {
//     header("location:userlogin");
// }

?>
<div class="col-md-8 col-10 py-5 mx-auto intro_sec">
    <div class="logo_list d-flex align-items-center flex-column">
        <img src="img/logo.png" alt="logo" class="clogo">
        <h1 class="logo_text text-center mb-5 display-4 font-weight-bold">Message</h1>
    </div>
    <hr />
    <?php
    //user end
    if (isset($_SESSION['client']) || isset($_SESSION['cid'])) {
        $emai = $_SESSION['client'];
        $id = $_GET['mlid'];
        $sid = $_SESSION['cid'];
        $usesel = "SELECT * FROM lawyer WHERE Lid='$id'";
        $query = $db->select($usesel);
        while ($row = mysqli_fetch_assoc($query)) {
            $semai = $row['email'];
        }
        $semai;
        $checq = "SELECT * FROM `msgroom` WHERE (sender='$emai' AND receiver='$semai')";
        $cquery = $db->select($checq);
        $num = mysqli_num_rows($cquery);
        if ($num == 1) {
            while ($crow = mysqli_fetch_assoc($cquery)) {
                $coid = $crow['coid'];
            }
            $coid;
        } else {
            $coid = uniqid("pra");
            $coinq = "INSERT INTO `msgroom`(`coid`, `sender`,`sid`, `receiver`,`rid`) VALUES ('$coid','$emai','$sid','$semai','$id')";
            $inr = $db->insert($coinq);
        }
    }
    // user end


    //lawyer start
    if (isset($_SESSION['Lawyer']) || isset($_SESSION['lid'])) {
        $id = $_GET['cid'];
        $emai = $_SESSION['lawyer'];
        $usesel = "SELECT * FROM client WHERE cid='$id'";
        $query = $db->select($usesel);
        while ($row = mysqli_fetch_assoc($query)) {
            $semai = $row['email'];
        }
        $checq = "SELECT * FROM `msgroom` WHERE (sender='$semai' AND receiver='$emai')";
        $cquery = $db->select($checq);
        $num = mysqli_num_rows($cquery);
        if ($num == 1) {
            while ($crow = mysqli_fetch_assoc($cquery)) {
                $coid = $crow['coid'];
            }
            $coid;
        }
    }
    //lawyer finished
    if (isset($_REQUEST["snt"])) {
        $msg = $_POST['msg'];
        if (empty($msg)) {
            echo "Please Send Some Message";
        } else {
            $min = "INSERT INTO `msg`(`frm`, `to`, `msg`, `cid`)
                        VALUES ('$emai','$semai','$msg','$coid')";
            $mquery = $db->insert($min);
            if ($mquery == true) {
                echo "<h5 class='text-success sent'>Sent<h5>";
            } else {
                echo "Sorry...! Not Sent";
            }
        }
    }
    ?>
    <div class="message" style="overflow-Y:scroll !important;height: 25rem;"></div>
    <form class="mt-3" action="" method="POST">
        <div class="col-md-12">
            <div class="form-group" style="margin-top: 2rem;">
                <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <button class="btn btn-lg btn-success mt-3 float-right" name="snt">Send</button>
    </form>
</div>
</div>
<script>
    $('.sent').fadeOut(2000);

    function chatlist() {
        var coid = "<?php echo $coid; ?>";
        $.post("ajax/chatlist.php", {
                cid: coid,
            },
            function(data) {
                $('.message').html(data);
            });
    }
    setInterval(() => {
        chatlist();
    }, 500);
</script>
<?php include("inc/footer.php"); ?>