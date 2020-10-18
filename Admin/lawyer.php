<?php include('inc/header.php'); ?>
<!--main section start -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <!--service list-->
        <div class="col-md-7">
          <div class="card-header">
            <h3 class="card-title">Lawyer List</h3>
          </div>
          <div class="card-body" style='overflow-x:scroll'>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Lawyer Name</th>
                  <th>Lawyer Email</th>
                  <th class="">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['ldid'])) {
                  $ldid = $_GET['ldid'];
                  $del = "Delete from lawyer where Lid='$ldid'";
                  $delr = $db->delete($del);
                  if ($delr) {
                    echo "<script>window.location.href='lawyer'</script>";
                    echo "<h1 style='text:center;color:green' class='success'>Service has been deleted</h1>";
                  } else {
                    echo "<h1 style='text:center;color:red'>Must be Some problem</h1>";
                  }
                }
                $i = 1;
                $que = "SELECT * FROM `lawyer`";
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
                      <td>
                         <p><?php echo $row['email']; ?></p>
                      </td>
                      <td class="project-actions">
                        <a class="btn btn-danger btn-sm" href="?ldid=<?php echo $row['Lid']; ?>">
                          <i class="fas fa-window-close"></i>
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
        <div class="col-md-5">
          <div class="card card-primary ml-4">
            <div class="card-header">
              <h3 class="card-title">Add Lawyer</h3>
            </div>
            <?php
            if (isset($_REQUEST['reg'])) {
              $name = $_POST['name'];
              $barr = $_POST['barr'];
              $email = $_POST['email'];
              $nid = $_POST['nid'];
              $expart = $_POST['expart'];
              $addr = $_POST['addr'];
              $phone = $_POST['phone'];
              $password = $_POST['password'];
              if (strlen($password) >= 8  &&  strlen($password) < 255) {
                $password = sha1($_POST['password'], false);
                if (empty($name) || empty($barr) || empty($email) || empty($nid) || empty($expart) || empty($phone) || empty($addr) || empty($password)) {
                  $warn = "<h2 class='text-center text-capitalize'>Any field Can not be Empty</h2>";
                } else {
                  $evalidate = $db->lemailval($email);
                  if ($evalidate === true) {
                    $inq = "INSERT INTO `lawyer`
                            (`name`, `barr`, `email`, `phone`, `expart`, `addr`, `password`)
                            VALUES ('$name','$barr','$email','$phone','$expart','$addr','$password')";
                    $inr = $db->insert($inq);
                    if ($inr) {
                      echo "<h1 style='text:center;color:green;' class='success ml-5 my-3'>INSERTED</h1>";
                    } else {
                      echo $warn = "<h2 class='text-center text-light text-capitalize'>There is some problem</h2>";
                    }
                  } else {
                    echo $warn = "<h2 class='text-center text-capitalize'>Email is Already registered</h2>";
                  }
                }
              } else {
                echo $warn = "<h1 class='text-center text-capitalize text-light'>Sorry...! Password Must be 8 in length</h1>";
              }
            }

            ?>
            <form class="p-3" action='' method='post'>
              <div class="form-group">
                <label class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label class="form-label">Reg No:</label>
                <input type="text" name="barr" placeholder="Enter Bar Reg" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label class="form-label">Expart Area</label>
                <select class="form-control" name="expart" style="width: 100%" tabindex="-1" aria-hidden="true">
                  <option selected>Open this select menu</option> <?php
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
              <div class="form-group">
                <label class="form-label">Parmanent Address</label>
                <input type="text" class="form-control" name="addr" placeholder="Parmanent Address:" required>
              </div>
              <div class="form-group">
                <label class="form-label">Enter Nid</label>
                <input type="text" class="form-control" name="nid" placeholder="Enter Nid:" required>
              </div>
              <div class="form-group">
                <label class="form-label">Mobile</label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter Number" required>
              </div>
              <div class="form-group">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
              </div>
              <div class="">
                <button type="submit" class="btn btn-sm btn-primary" name="reg">Register</button>
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