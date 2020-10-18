<?php
class database
{
   public $link;
   public function __construct()
   {
      $this->link = mysqli_connect('localhost', 'larajaha_lawu', 'Password101!', 'larajaha_law') or die("error is:".mysqli_connect_error());
     
   }
   //admin method
   public function admin($email, $pass)
   {
      // $pass=sha1($pass);
      $logq = "SELECT * FROM `admin` WHERE email='$email' AND password='$pass'";
      $loginnn = mysqli_query($this->link, $logq);
      while ($rowww = mysqli_fetch_assoc($loginnn)) {
         $adname = $rowww['adminname'];
         $aid = $rowww['adid'];
      }
      $nummm = mysqli_num_rows($loginnn);
      if ($nummm == 1) {
         session_start();
         $_SESSION['admin'] = $email;
         $_SESSION['adminname'] = $adname;
         $_SESSION['aid'] = $aid;
         header("location:index");
      } else {
         header("location:login");
      }
   }
   //client method
   public function client($email, $pass)
   {
      $pass = sha1($pass);
      $logq = "SELECT * FROM `client` WHERE email='$email' AND password='$pass'";
      $loginn = mysqli_query($this->link, $logq);
      while ($roww = mysqli_fetch_assoc($loginn)) {
         $cid = $roww['cid'];
      }
      $numm = mysqli_num_rows($loginn);
      if ($numm == 1) {
         session_start();
         $_SESSION['client'] = $email;
         $_SESSION['cid'] = $cid;
         header("location:userpro");
      } else {
         header("location:userlogin");
      }
   }
   //lawyer login
   public function lawyer($email, $pass)
   {
      $pass = sha1($pass);
      $logq = "SELECT * FROM `lawyer` WHERE email='$email' AND password='$pass'";
      $loginn = mysqli_query($this->link, $logq);
      while ($roww = mysqli_fetch_assoc($loginn)) {
         $lid = $roww['Lid'];
      }
      $numm = mysqli_num_rows($loginn);
      if ($numm == 1) {
         session_start();
         $_SESSION['lawyer'] = $email;
         $_SESSION['lid'] = $lid;
         header("location:lawyerpro");
      } else {
        header("location:lawyerlogin");
      }
   }
   //lawyer email validation
   public function lemailval($email)
   {
      $emval = "SELECT * FROM `lawyer` WHERE email='$email'";
      $evq = mysqli_query($this->link, $emval);
      $num = mysqli_num_rows($evq);
      if ($num >= 1) {
         return false;
      } else {
         return true;
      }
   }
   //client email validation
   public function clientemval($email)
   {
      $emval = "SELECT * FROM `client` WHERE email='$email'";
      $evq = mysqli_query($this->link, $emval);
      $num = mysqli_num_rows($evq);
      if ($num >= 1) {
         return false;
      } else {
         return true;
      }
   }
   //select method
   public function select($data)
   {
      $sel = mysqli_query($this->link, $data);
      if ($sel) {
         return $sel;
      }
   }
   //insert method
   public function insert($data)
   {
      $query = mysqli_query($this->link, $data);
      if ($query == true) {
         return $query;
      }
   }
   //delete method
   public function delete($data)
   {
      $del = mysqli_query($this->link, $data);
      if ($del) {
         return $del;
      }
   } //update method
   public function update($up)
   {
      $update = mysqli_query($this->link, $up);
      if ($update) {
         return $update;
      }
   }
}
