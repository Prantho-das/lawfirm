<?php
include('../class/class.php');
$db=new database;
session_start();
$c_id=$_SESSION['cid'];
echo "<h1 class='display-3 pb-3 border border-top-0 border-left-0 border-right-0'>Find Result</h1>";
$addrr = $_POST['addr'];
$category = $_POST['category'];
$que = "SELECT services.*,lawyer.* FROM services INNER JOIN 
            lawyer ON services.sid=lawyer.expart WHERE addr LIKE '%$addrr%' 
            AND expart LIKE '%$category%' order by lawyer.rating desc";
$quer = $db->select($que);
$output="";
if (mysqli_num_rows($quer) >= 1)
{
    while ($row = mysqli_fetch_assoc($quer)){
       $output="<div class='row mt-4 border py-4'>
            <div class='col-md-9 col-7'>
                <div class='d-flex'>
                    <div class='Limg'><img src='lawupload/{$row["image"]}' alt='' class='img-fluid'></div>
                    <div class='intro mt-2' style='overflow:scroll;'>
                        <h1>{$row["name"]}</h1>
                        <h3 class='mb-2'><a href='tel:+880{$row["phone"]}'><i class='fas fa-phone-alt'></i></a></h3><label class='mb-3' for = 'phone'>Call Now</label>
                        <h4>{$row["service_name"]}</h4>
                        <h4>{$row["addr"]}</h4>
                        </div>
                            </div>
                        </div>
                        <div class='col-md-3 col-5 mt-5'>
                        <h4 class='mt-3'>Ratting:{$row["rating"]}</h4>
                        <h4 class='mt-3'>Visit:{$row["expr"]}</h4>
                        <a href='appointment?lid={$row["Lid"]}' type='button' class='btn btn-lg btn-primary'>Appointment</a>
            </div>
        </div>";
    echo $output;
} 
}else {
    echo "<h1 style='text:center text-light'>Nothing Found</h1>";
}
