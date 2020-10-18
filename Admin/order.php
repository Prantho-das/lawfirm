<?php include('inc/header.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <!--service list-->
            <div class="col-11 mx-md-auto mr-auto">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                </div>
                <div class="card-body" style='overflow-x:scroll;'>
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Client</th>
                                <th>Lawyer</th>
                                <th>Payment Method</th>
                                <th>Account No</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $del = "Delete from payment where pay_id='$id'";
                                $delr = $db->delete($del);
                                if ($delr) {
                                    echo "<script>window.location.href='order'</script>";
                                    echo "<h1 style='text:center;color:green' class='success'>Service has been deleted</h1>";
                                } else {
                                    echo "<h1 style='text:center;color:red'>Must be Some problem</h1>";
                                }
                            }
                            $i = 1;
                            $que = "SELECT * FROM `payment`";
                            $quer = $db->select($que);
                            if (mysqli_num_rows($quer) >= 1) {
                                while ($row = mysqli_fetch_assoc($quer)) { ?>
                                    <!--start-->
                                    <tr>
                                        <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pay_man']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pay_rec']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pay_met']; ?>
                                        </td>
                                        <td>
                                            0<?php echo $row['pay_am']; ?>
                                        </td> 
                                        <td>
                                            <?php echo $row['pay_amnt']; ?>
                                        </td> 
                                        <td class="">
                                            <a class="btn btn-danger btn-sm" href="?id=<?php echo $row['pay_id']; ?>">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h1 style='text:center'>Sorry....Yor have no Transction</h1>";
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