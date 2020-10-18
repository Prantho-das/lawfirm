<?php include('inc/header.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <!--service list-->
            <div class="col-11 mx-md-auto mr-auto">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                </div>
                <div class="card-body" style='overflow-x:scroll'>
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_GET['cdid'])) {
                                $cdid = $_GET['cdid'];
                                $del = "Delete from client where cid='$cdid'";
                                $delr = $db->delete($del);
                                if ($delr) {
                                    echo "<script>window.location.href='user'</script>";
                                    echo "<h1 style='text:center;color:green' class='success'>Service has been deleted</h1>";
                                } else {
                                    echo "<h1 style='text:center;color:red'>Must be Some problem</h1>";
                                }
                            }
                            $i = 1;
                            $que = "SELECT * FROM `client`";
                            $quer = $db->select($que);
                            if (mysqli_num_rows($quer) >= 1) {
                                while ($row = mysqli_fetch_assoc($quer)) { ?>
                                    <!--start-->
                                    <tr>
                                        <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td style="width: 30%;">
                                            <p><?php echo $row['email']; ?></p>
                                        </td>
                                        <td class="">
                                            <a class="btn btn-danger btn-sm" href="?cdid=<?php echo $row['cid']; ?>">
                                               <i class="fas fa-trash mr-1"></i>Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>01</td>
                                        <td>
                                            <a> Dipto paull </a>
                                        </td>
                                        <td>
                                            <a>dipto@gmail.com</a>
                                        </td>
                                        <td class="">
                                            <a class="btn btn-danger btn-sm" href="#">
                                                Delete
                                            </a>
                                        </td>
                                    </tr> -->

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
        </div>
    </section>
</div>
<?php include('inc/footer.php'); ?>