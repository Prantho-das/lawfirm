<?php
class help
{
    //  date function for date method
    public static function date($date)
    {
        $d = date("m,d,Y/h:i:sa", strtotime($date));
        return $d;
    }
    //readmore function
    public static function read($data, $limit)
    {
        $data = substr($data, 0, $limit);
        $data = substr($data, 0, strrpos($data,' ')).'...';
        return $data;
    }
    public static function validate($data)
    {
        $vdata = trim($data);
        $vdata = htmlspecialchars($vdata);
        return $vdata = stripslashes($vdata);
    }
}
