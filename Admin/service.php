<?php include('inc/header.php'); ?>
<!--main section start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <!--service list-->
                <div class="col-md-8">
                    <div class="card-header">
                        <h3 class="card-title">Service List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Sl
                                    </th>
                                    <th>
                                        Service Name
                                    </th>
                                    <th class="">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['did'])) {
                                    $did = $_GET['did'];
                                    $del = "Delete from services where sid='$did'";
                                    $delr = $db->delete($del);
                                    if ($delr) {
                                        echo "<h1 style='text:center;color:green' class='success'>Service has been deleted</h1>";
                                        echo "<script>window.location.href='service'</script>";
                                    } else {
                                        echo "<h1 style='text:center;color:red'>Must be Some problem</h1>";
                                    }
                                }
                                $i = 1;
                                $que = "SELECT * FROM `services`";
                                $quer = $db->select($que);
                                if (mysqli_num_rows($quer) >= 1) {
                                    while ($row = mysqli_fetch_assoc($quer)) { ?>
                                        <!--start-->
                                        <tr>
                                            <td>
                                                <?php echo $i++; ?>
                                            </td>
                                            <td>
                                                <a>
                                                    <?php echo $row['service_name']; ?>
                                                </a>
                                            </td>
                                            <td class="project-actions">
                                                <a class="btn btn-danger btn-sm mt-1" href="?did=<?php echo $row['sid']; ?>">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        <!--end-->
                                <?php
                                    }
                                } else {
                                    echo "<h1 style='text:center'>Sorry....Yor have no Message</h1>";
                                }
                                ?>





                            </tbody>
                        </table>
                    </div>
                </div>
                <!--service list-->
                <!--service add-->
                <div class="col-md-4">
                    <div class="card card-primary ml-4">
                        <div class="card-header">
                            <h3 class="card-title">Add Service</h3>
                        </div>
                        <?php
                        if (isset($_REQUEST['submit'])) {
                            $name = $_POST['name'];
                            if (empty($name)) {
                                echo "<h1 style='text:center'>Field might no be empty</h1>";
                            } else {
                                $ins = "INSERT INTO `services`(`service_name`)
                     VALUES ('$name')";
                                $insr = $db->insert($ins);
                                if ($insr) {
                                    echo "<h1 style='text:center;color:green;' class='success ml-5 my-3'>INSERTED</h1>";
                                    echo "<script>window.location.href='service'</script>";
                                } else {
                                    echo "<h1 style='text:center;color:red;'>MUST BE SOME PROBLEMS</h1>";
                                }
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="">
                                    <label for="">Service Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Service Name">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Add Service</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--service add-->
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('.success').fadeOut(2000);
    })
</script>
<?php include('inc/footer.php'); ?>