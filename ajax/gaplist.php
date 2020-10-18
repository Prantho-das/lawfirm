<?php
include('../class/class.php');
$db = new database;
session_start();
$lid = $_SESSION['lid'];
$que = "SELECT * FROM `appointment` WHERE lid='$lid' AND status=1";
$quer = $db->select($que);
$i = 1;
$output = "";
if (mysqli_num_rows($quer) >= 1)
//start section
{
    while ($row = mysqli_fetch_assoc($quer)) {
        $output = "
             <tr class='pb-2'>
                <th scope='row'>{$i}</th>
                <td>{$row['vname']}</td>
                <td>{$row['cdet']}</td>
                <td>{$row['atime']}</td>
                <td><button class='btn btn-success' onclick='rating({$row['cid']})' id='v{$row['cid']}'>Rating</button><br/></td>
            </tr>";
        echo $output;
        $i++;
    }
} else {
    echo "<h1 style='text:center text-light'>Nothing Found</h1>";
}
