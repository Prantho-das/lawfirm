<?php
include('../class/class.php');
$db = new database;
$id = $_POST['id'];
$que = "UPDATE `appointment` SET `status`=2 WHERE id=$id";
//2 is for lawyer did not has time
$quer = $db->update($que);
if ($quer) {
    echo 1;
} else {
    echo "<h1 style='text:center text-light'>Nothing Found</h1>";
}
