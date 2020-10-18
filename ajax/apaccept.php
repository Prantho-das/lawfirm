<?php
include('../class/class.php');
$db = new database;
$id = $_POST['id'];
//accept option 
$que = "UPDATE `appointment` SET `status`=1 WHERE id=$id";
$quer = $db->update($que);
if ($quer) {
//payment option
$sque = "SELECT * FROM `appointment` where id='$id'";
$squer = $db->select($sque);
if (mysqli_num_rows($squer) >= 1) {
    while ($row = mysqli_fetch_assoc($squer)) {
        $clname=$row['clname'];
        $lname=$row['lname'];
        $payment=$row['payment'];
        $pno=$row['pno'];
        $pexpr=$row['pexpr'];
        $payins="INSERT INTO `payment`(`pay_man`, `pay_rec`, `pay_met`, `pay_am`, `pay_amnt`) VALUES ('$clname','$lname','$payment','$pno','$pexpr')";
        $pins=$db->insert($payins);
        if($pins){
            echo 1;
        }else{
             echo "<h1 style='text:center text-light'>Nothing payment Found</h1>";
        }
    }
}
//payment option
} else {
    echo "<h1 style='text:center text-light'>Nothing Found</h1>";
}
