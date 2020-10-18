<?php
include('../class/class.php');
$db = new database;
session_start();
$lid = $_SESSION['lid'];
$que = "SELECT * FROM `appointment` WHERE lid='$lid' AND status=0";
$quer = $db->select($que);
$i=1;
$output = "";
if (mysqli_num_rows($quer) >= 1)
//start section
{
    while ($row = mysqli_fetch_assoc($quer)) {
        $output ="<tr class='pb-2'>
                <th scope='row'>{$i}</th>
                <td>{$row['vname']}</td>
                <td>{$row['cdet']}</td>
                <td>{$row['atime']}</td>
                <td><button onclick='accept({$row['id']})' class='btn md-lg btn-success mb-2'>Accept</button><button onclick='denied({$row['id']})' class='btn btn-md-lg btn-danger'>Denined</button></td>
            </tr>";
        echo $output;
        $i++;
    }
} else {
    echo "<h1 style='text:center text-light'>Nothing Found</h1>";
}
