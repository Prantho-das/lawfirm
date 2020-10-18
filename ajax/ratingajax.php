<?php
include('../class/class.php');
$db = new database;
session_start();
$lrid = $_POST['lrid'];
$rating = $_POST['rating'];
$crid = $_SESSION['cid'];


//start

$que = "UPDATE `rating` SET `rating`='$rating',`rstatus`=1 WHERE crid='$crid' AND lrid='$lrid'";
$quer = $db->update($que);

//update
if ($quer) {
$rsele="SELECT * FROM rating WHERE rstatus=1 AND lrid=$lrid";
$reselc=$db->select($rsele);
$num=mysqli_num_rows($reselc);
if($num>0){
    $sellop="SELECT * FROM `rating` WHERE lrid='$lrid'";
    $sellopr=$db->select($sellop);
    $numm=mysqli_num_rows($sellopr);
    $rat=0;
    while($row=mysqli_fetch_assoc($sellopr)){
        $rat=$rat+$row['rating'];
    }
    $numb="SELECT * FROM rating WHERE rstatus=1 AND lrid=$lrid";
    $nuv=$db->select($numb);
    $mnum=mysqli_num_rows($nuv);
    $mrat=($rat/$mnum);
    $mrat;
    //lawyer rating
$rque = "UPDATE `lawyer` SET `rating`='$mrat' WHERE Lid='$lrid'";
$rquer = $db->update($rque);
if ($rquer) 
{
    echo 1;
}
else{
    echo "<h1 style='text:center text-light'>Must Be Some Problem</h1>";
}
//lawyer rating
}

} else {
    echo "<h1 style='text:center text-light'>Last Problem</h1>";
}
//update


