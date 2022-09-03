<?php
error_reporting(0);
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
$uid =  $_SESSION["id"] ; 

$id = $_GET['id'];

$quser = $conn->query("SELECT * from users  WHERE id = $uid ");
if($quser !== false && $quser->num_rows > 0){
while($row=$quser->fetch_assoc()){
$dis=$row["district"];
  }
}

$a = $conn->query("SELECT * from permit WHERE aplicant_id = $id");
if($a !== false && $a->num_rows > 0){
while($row=$a->fetch_assoc()){

    $pstore=$row['pstore'];
    $ntime=$row['permitdu'];
    $Premiums=$row['Premiums'];
    $quarryad=$row['quarryad'];
    $expno=$row['expno'];
    $price=$row['price'];
    $stone=$row['stone_details'];

}
}

$q1 = $conn->query("SELECT * from divreport WHERE aplicant_id = $id");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$pdate=$row['pdate'];
}
}

$q2 = $conn->query("SELECT * from policereport WHERE aplicant_id = $id");
if($q2 !== false && $q2->num_rows > 0){
while($row=$q2->fetch_assoc()){

$polst=$row['polst'];

}
}

$q3 = $conn->query("SELECT * from excavate_permit WHERE aplicant_id = $id");
if($q3 !== false && $q3->num_rows > 0){
while($row=$q3->fetch_assoc()){

$pdate3=$row['pdate'];

}
}

$q4 = $conn->query("SELECT * from envpermit WHERE aplicant_id = $id");
if($q4 !== false && $q4->num_rows > 0){
while($row=$q4->fetch_assoc()){

$pdate4=$row['pdate'];

}
}

$q5 = $conn->query("SELECT * from merchantpermit WHERE aplicant_id = $id");
if($q5 !== false && $q5->num_rows > 0){
while($row=$q5->fetch_assoc()){

$pdate5=$row['pdate'];

}
}

$queryr = $conn->query("SELECT * from applicant WHERE id=$id");
if($queryr !== false && $queryr->num_rows > 0){
while($row=$queryr->fetch_assoc()){
$name=$row["fullname"];
$add=$row["addres"];
$nic=$row["nic"];
$police=$row["police"];
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../../assets/img/logo/logo.png" rel="icon">
  <title>Permit</title>
  <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../../assets/css/ruang-admin.min.css" rel="stylesheet">

  <style>
    @media print {
  #prt {
    display: none;
  }
  #cls {
    display: none;
  }
}
</style>

</head>

<body id="page-top">
<button id="cls" class="btn btn-danger" style="float: right; margin-top: 30px;margin-right:20px;" type="button" onclick="window.open('', '_self', '');  window.close();">Close X</button>

          <main id="GFG"> 
          
<img id="scream" width="1" height="1" src="../../assets/img/permit.jpg" alt="The Scream">
               
<canvas id="myCanvas" width="1123" height="1123">
</canvas>

<script>
    window.onload = function(){
     var canvas = document.getElementById("myCanvas");
     var context = canvas.getContext("2d");
     var imageObj = new Image();
     imageObj.onload = function(){
         context.drawImage(imageObj, 10, 10);
         context.font = "14pt Calibri";
         context.fillText("<?php echo $name; ?>", 550, 87);
         context.fillText("<?php echo $add; ?>", 550, 130);
     };
     imageObj.src = "../../assets/img/permit.jpg" ; 
};
</script>
</main>
<br><br>
<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-6 col-form-label"></label>
                      <div class="col-sm-3">
                      <input type="submit" id="prt" name="submit" value="Print" class="btn btn-primary" onclick="window.print()">                     
                     </div>
                    </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../assets/js/ruang-admin.min.js"></script>

</body>

</html>