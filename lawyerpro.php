<?php include('inc/header.php');
session_start();
if (!isset($_SESSION['lid'])) {
    header('location:lawyerlogin');
}
$lid = $_SESSION['lid'];
?>
<div class="col-md-8 col-10 py-5 mx-auto intro_sec" >
    <div class="name pb-2">
        <div class="logo_list d-flex align-items-center flex-column">
            <a href='lawyerProfile'><img src="img/logo.png" alt="logo" class="clogo"></a>
            <h1 class="logo_text text-center mb-5 display-4 font-weight-bold">Lawyer Profile</h1>
        </div>
        <div class="row mt-4">
            <div class="col-9">
                <div class="d-flex flex-column">
                    <?php
                    
                    $que = "SELECT * FROM `lawyer` where Lid=$lid";
                    $quer = $db->select($que);
                    while ($roww = mysqli_fetch_assoc($quer)) { ?>
                        <div class="img" style='height:5rem;width:5rem;margin-bottom:4rem;'><img src="lawupload/<?php echo $roww['image'] ?>" alt="" class="img-fluid"></div>
                        <div class="intro my-2">
                            <h1>Name:<?php echo $roww['name'] ?></h1>
                            <h3><b>Phone:</b>0<?php echo $roww['phone'] ?></h3>
                            <h3><b>Bar Council Reg:</b><?php echo $roww['barr'] ?></h3>
                            <?php if($roww['expr']==500){?>
                                 <h3><b>visit:</b><?php echo $roww['expr'] ?></h3>
                                 <h4><b>Experience:</b>0-2 year</h4>
                            <?php
                            }else if($roww['expr']==700){?>
                                 <h3><b>visit:</b><?php echo $roww['expr'] ?></h3>
                                 <h4><b>Experience:</b>3-5 year</h4>
                            <?php
                            }else{?>
                                <h3><b>visit:</b><?php echo $roww['expr'] ?></h3>
                                <h4><b>Experience:</b>More than 5 years</h4>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_REQUEST['upload'])) {
                        $file = $_FILES['file']['name'];
                        $filet = $_FILES['file']['type'];
                        $filetloc = $_FILES['file']['tmp_name'];
                        $fn = uniqid('DIU', false) . $file;
                        $files = "lawupload/" . $fn;
                        $fileup = $_FILES['file']['type'];
                        $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        $arry = ['png', 'jpg', 'jpeg'];
                        if (!empty($file)) {
                            if (in_array($type, $arry)) {
                                move_uploaded_file($filetloc, $files);
                                $que = "Update lawyer set image='$fn' where Lid='$lid'";
                                $proin = $db->update($que);
                                if ($proin == true) {
                                    header('location:lawyerpro');
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
            <div class="col-3"><a href="lawyerProfile" class="btn btn-lg btn-info text-light mt-5">Profile</a></div>
        </div>
    </div>
    <hr />
    <!-- appointment pendinglist -->
    <div class='appstart' style='overflow-x:scroll' >
    <h1 class="logo_text mt-5 display-5 font-weight-bold">Appointments list</h1>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Case Info</th>
                <th scope="col">Ask Time</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody id="tabbody">

        </tbody>
    </table>

    <!-- Given appointment pendinglist -->
    <h1 class="logo_text mt-5 display-5 font-weight-bold">Given Appointments list</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Case Info</th>
                <th scope="col">Time</th>
                <th scope="col">Rating</th>
            </tr>
        </thead>
        <tbody id="tabbody2">
           
        </tbody>
    </table>
    </div>
    <!-- Given appointment pendinglist -->
</div>
<script>
    //pending appointment list
    function aplist() {
        $.get("ajax/askaplist.php", function(data) {
            $('#tabbody').html(data);
        });
    }
    aplist();
    //given appointement list
    function gaplist() {
        $.get("ajax/gaplist.php", function(data) {
            $('#tabbody2').html(data);
        });
    }
    gaplist();
    //accept 
    function accept(idata) {
        $.post("ajax/apaccept.php", {
                id: idata,
            },
            function(data) {
                if (data == 1) {
                    aplist();
                    gaplist();
                    console.log(data);
                } else {
                    console.log('some problem occoured');
                }
            });
    }
    //delete
    function denied(idata) {
        $.post("ajax/apdenied.php", {
                id: idata,
            },
            function(data) {
                if (data == 1) {
                    aplist();
                    gaplist();
                } else {
                    console.log('some problem occoured');
                }
            });
    }
    //rating
    function rating(rdata){
        var htm="v"+rdata;
         $.post("ajax/ratings.php", {
                id: rdata,
            },
            function(data) {
                if(data==1){
               var p= $(`#${htm}`).html('Sent');
               setTimeout(() => {
                   gaplist();
                }, 5000);
                }else{
                    var p= $(`#${htm}`).html('Sent Aleady');
                    setTimeout(() => {
                   gaplist();
                }, 5000);
                }
            });
    }
</script>
<?php include('inc/footer.php'); ?>