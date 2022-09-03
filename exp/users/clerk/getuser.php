<?php 


error_reporting(0);
include '../../include/config.php';
if(!isset($_SESSION))
    {
        session_start(); 
    } 
    if (strlen($_SESSION['id']==0)) {
      header('<location:login/logout.php');
      } else{
      }
      $uid =  $_SESSION["id"] ;
      
$us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"]; 
} 
}

require_once('../../include/config.php');
$departid = 0;

if(isset($_POST['depart'])){
   $departid = mysqli_real_escape_string($conn,$_POST['depart']); // department id
}

$users_arr = array();

if($departid > 0){
   $sql = "SELECT gncode,gnname FROM $dis WHERE divsec=".$departid;

   $result = mysqli_query($conn,$sql);

   while( $row = mysqli_fetch_array($result) ){
      $userid = $row['gncode'];
      $name = $row['gnname'];

      $users_arr[] = array("id" => $userid, "name" => $name);
   }
}
// encoding array to json format
echo json_encode($users_arr);