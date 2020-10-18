<?php
include('../class/class.php');
$db = new database;
session_start();
$crid = $_POST['id'];
$lrid=$_SESSION['lid'];
$sel="SELECT * FROM `rating` WHERE crid='$crid'";
$selq=$db->select($sel);
if(mysqli_num_rows($selq)==0){
    $que="INSERT INTO `rating`(`crid`, `lrid`) VALUES ('$crid','$lrid')";
$quer = $db->insert($que);
if ($quer) {
    echo 1;
} else {
    echo "<h1 style='text:center text-light'>Sorry</h1>";
}
}else{
    echo "<h1 style='text:center text-light'>Already Sent request</h1>";
}

