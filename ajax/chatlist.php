<?php
ob_start();
include "../class/class.php";
$db = new database();
session_start();
// if (isset($_SESSION['cid'])) {
//     $style = "bg-primary text-light";
// }else if (isset($_SESSION['lid'])) {
//     $style = "bg-primary text-light";
// } else {
//     $style = "bg-light";
// }
$coid = $_POST['cid'];
if (isset($coid)) {
    $mq = "SELECT * FROM `msg` WHERE cid='$coid' ORDER BY time desc";
    $msq = $db->select($mq);
    while ($mrow = mysqli_fetch_assoc($msq)) {
        $output = "<div class=' msgg rounded p-5 mb-2'>
                        <h4 class='bg-primary text-light'
                         style='width:max-content;padding: 1rem;border-radius: 2rem;margin-bottom: 1rem;'
                         >{$mrow['frm']}</h4>
                            <h5> {$mrow['msg']}</h5>
                            <h6> {$mrow['time']}</h6>
                    </div>";
        echo $output;
    }
}
