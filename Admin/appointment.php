<?php include('inc/header.php'); ?>
<div class="content-wrapper">
    <!--appointment list-->
    <div class="container py-3">
        <h4 class="text-center mb-4">Pending Appointment List</h4>
        <div class="appoint" style='overflow-x:scroll'>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Client Email</th>
                        <th scope="col">Lawyer Email</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($_GET['adid'])) {
                        $adid = $_GET['adid'];
                        $del = "Delete from appointment where id='$adid'";
                        $delr = $db->delete($del);
                        if ($delr) {
                            echo "<script>window.location.href='appointment'</script>";
                            echo "<h4 style='text:center;color:green' class='success'>Service has been deleted</h4>";
                        } else {
                            echo "<h1 style='text:center;color:red'>Must be Some problem</h1>";
                        }
                    }
                    $i = 1;
                    $que = "SELECT * FROM `appointment` WHERE status=0";
                    $quer = $db->select($que);
                    if (mysqli_num_rows($quer) >= 1) {
                        while ($row = mysqli_fetch_assoc($quer)) { ?>
                            <!--start-->
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $row['clname']; ?>
                                </td>
                                <td valign="top">
                                    <p><?php echo $row['lname']; ?></p>
                                </td>
                                <td>
                                    <p><?php echo date("h:i:sa,d/m/y", strtotime($row['atime'])); ?></p>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="?adid=<?php echo $row['id']; ?>">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <!--end-->
                    <?php
                        }
                    } else {
                        echo "<td><h5 style='text:center'>Sorry....Yor have no Message</h5></td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <h4 class="text-center mb-4">Given Appointment List</h4>
        <div class="appoint" style='overflow-x:scroll'>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Client Email</th>
                        <th scope="col">Lawyer Email</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $que = "SELECT * FROM `appointment` WHERE status=1";
                    $quer = $db->select($que);
                    if (mysqli_num_rows($quer) >= 1) {
                        while ($row = mysqli_fetch_assoc($quer)) { ?>
                            <!--start-->
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $row['clname']; ?>
                                </td>
                                <td>
                                    <p><?php echo $row['lname']; ?></p>
                                </td>
                                <td>
                                    <p><?php echo date("h:i:sa,d/m/y", strtotime($row['atime'])); ?></p>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="?adid=<?php echo $row['id']; ?>">
                                         <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <!--end-->
                    <?php
                        }
                    } else {
                        echo "<td><h5 style='text:center'>Sorry....Yor have no Message</h5></td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--appointment list-->
</div>
<?php include('inc/footer.php'); ?>