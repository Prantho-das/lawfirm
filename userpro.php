<?php include('inc/header.php'); ?>
<?php
session_start();
if (!isset($_SESSION['cid'])) {
    header("location:userlogin");
}
?>
<div class="col-md-8 col-10 py-5 mx-auto intro_sec">
    <div class="name pb-2">
        <div class="logo_list d-flex align-items-center flex-column">
            <img src="img/logo.png" alt="logo" class="clogo">
            <h1 class="logo_text text-center mb-5 display-4 font-weight-bold">User Profile</h1>
        </div>
        <div class="row mt-4">
            <div class="col-9">
                <div class="d-flex flex-column">
                    <?php
                    $cid = $_SESSION['cid'];
                    $que = "SELECT * FROM `client` where cid=$cid";
                    $quer = $db->select($que);
                    while ($roww = mysqli_fetch_assoc($quer)) { ?>
                        <div class="img" style='height:4.5rem;width:4.5rem;margin-bottom:5rem;'><a href='userProfile'><img src="clientupload/<?php echo $roww['img'] ?>" alt="" class="img-fluid"></a></div>
                        <div class="intro mt-2">
                            <h1><?php echo $roww['uname'] ?></h1>
                            <h3>0<?php echo $roww['phone'] ?></h3>
                        </div>
                    <?php
                    }
                    ?>
                    <div>

                        <?php
                        if (isset($_REQUEST['upload'])) {
                            $file = $_FILES['file']['name'];
                            $filet = $_FILES['file']['type'];
                            $filetloc = $_FILES['file']['tmp_name'];
                            $fn = uniqid('DIU', false) . $file;
                            $files = "clientupload/" . $fn;
                            $fileup = $_FILES['file']['type'];
                            $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            $arry = ['png', 'jpg', 'jpeg'];
                            if (!empty($file)) {
                                if (in_array($type, $arry)) {
                                    move_uploaded_file($filetloc, $files);
                                    $que = "Update client set img='$fn' where cid='$cid'";
                                    $proin = $db->update($que);
                                    if ($proin == true) {
                                        header('location:userpro');
                                    } else {
                                        echo "Must be Some Problem";
                                    }
                                } else {
                                    echo "Please Upload Png,Jpg,Jpeg";
                                }
                            } else {
                                echo "Please Insert File";
                            }
                        }
                        ?>


<h3 class='text-info'>Upload Profile Image</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input style="margin-right:-3rem;" type="file" name="file" />
                            <input type="submit" style="display: block;" class="btn btn-sm btn-success" name="upload" Value="Upload" />
                        </from>
                    </div>
                </div>
            </div>
            <div class="col-3"><a href="userProfile" class="btn btn-lg btn-info text-light">Profile</a></div>
        </div>
    </div>
    <hr />
    <div class="finder pt-3">
        <h1>Find Lawyer</h1>
        <div class="row">
            <div class="col-md-8 col-12 pt-3">
                <!--<form action="" method="POST" id="form">-->
                <div class="row">
                    <div class="col-12 col-6">
                        <div class="mb-3">
                            <label class="form-label">Enter Location</label>
                            <input type="text" class="form-control addr" name="addr" id="formGroupExampleInput" placeholder="Enter Location">
                        </div>
                    </div>
                    <div class="col-12 col-6">
                        <div class="mb-3">
                            <label class="form-label">Case Category</label>
                            <select class="form-select cat" id="mainsel" name="category">
                                <option value="" selected>Select Case Category</option>
                                <!--select option -->
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
                    </div>
                </div>
                <button id="find">Find</button>
                <!--</form>-->
            </div>
        </div>
    </div>
    <div class="lawlist pl-4 mt-5">
        <?php
        //lawyer finding

        //lawyer finding
        ?>
    </div>
    <!-- modal section start  -->
    <!-- Button trigger modal -->

    <!-- Modal -->

    <script>
        $(document).ready(function() {
            $("#find").click(function(e) {
                e.preventDefault();
                var addrr = $('.addr').val();
                var cat = $('.cat').val();
                $.post("ajax/lawlist.php", {
                        addr: addrr,
                        category: cat
                    },
                    function(data, status) {
                        $('.lawlist').html(data);
                    });
            });

        });
    </script>
    <?php include('inc/footer.php'); ?>