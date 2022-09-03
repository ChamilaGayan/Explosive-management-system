<?php
error_reporting(0);
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
$type= $_GET['type'];
$id = $_GET['id'];
$pid=$_GET['pid'];

$q1 = $conn->query("SELECT * from divreport WHERE perid = $pid");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$img1='../../../data/exp/div/'.$row["img"];
}
}

$q2 = $conn->query("SELECT * from policereport WHERE perid = $pid");
if($q2 !== false && $q2->num_rows > 0){
while($row=$q2->fetch_assoc()){

$img2='../../../data/exp/police/'.$row["img"];
}
}

$q3 = $conn->query("SELECT * from excavate_permit WHERE perid = $pid");
if($q3 !== false && $q3->num_rows > 0){
while($row=$q3->fetch_assoc()){

$img3='../../../data/exp/excavate/'.$row["img"];
}
}

$q4 = $conn->query("SELECT * from envpermit WHERE perid = $pid");
if($q4 !== false && $q4->num_rows > 0){
while($row=$q4->fetch_assoc()){

$img4='../../../data/exp/env/'.$row["img"];
}
}

$q5 = $conn->query("SELECT * from merchantpermit WHERE perid = $pid");
if($q5 !== false && $q5->num_rows > 0){
while($row=$q5->fetch_assoc()){

$img5='../../../data/exp/merchant/'.$row["img"];
}
}



$q6 = $conn->query("SELECT * from ins_report WHERE aplicant_id = $pid");
if($q6 !== false && $q6->num_rows > 0){
while($row=$q6->fetch_assoc()){
 
$img6='../../../data/exp/ins_report/'.$row["img"];
}
}

?>
<!DOCTYPE html>
<html lang="en">

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

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
     <?php 
   include 'include/sidebar.php';
   ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
         <?php
		include 'include/header.php';
		?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>
          <div class="text-center">
   
              </div>

              <div class="card mb-4">
			 
             <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

     <h4 class="m-0 font-weight-bold text-secondary"> බලපත්‍රය පිළිබද විස්තර </h4>
     <div class="my-2"></div>
      <?php echo "<a href='permit_view.php?id=$id&pid=$pid' class='btn btn-success btn-icon-split'>"; ?> 

                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Go Back</span>
                  </a>
      </div>
   
      <div class="card-body">

      </div>
           <center>
		   
		   <?php 
           
           if($type == '1')
           {
          //echo "<img id='scream'  class='img-fluid' width='800' height='800'src='$img1' alt='.'>"; 

           echo "<embed src='$img1' class='img-fluid' style='min-height:150vh;width:80%' />"; 
           }
           else if($type == '2') 
           {
            //echo "<embed src='$img2' class='img-fluid' width='800' height='800' />";
			 echo "<embed src='$img2' class='img-fluid' style='min-height:150vh;width:80%' />";
           }
           else if($type == '3')
           {
            //echo "<embed src='$img3' class='img-fluid' width='800' height='800' />";
			 echo "<embed src='$img3' class='img-fluid' style='min-height:150vh;width:80%' />";
           }
           else if($type == '4') 
           {
           // echo "<embed src='$img4' class='img-fluid' width='800' height='800' />";
			 echo "<embed src='$img4' class='img-fluid' style='min-height:150vh;width:80%' />";
           }
           else if($type == '5')
           {
           // echo "<embed src='$img5' class='img-fluid' width='800' height='800' />";
			 echo "<embed src='$img5' class='img-fluid' style='min-height:150vh;width:80%' />";
           }




           else if($type == '6')
           {
           // echo "<embed src='$img5' class='img-fluid' width='800' height='800' />";
			 echo "<embed src='$img6' class='img-fluid' style='min-height:150vh;width:80%' />";
           }
           
           ?></center> 
           
          </div>

          <div class="form-group row">
					<div class="col-sm-5"></div>
                      
          </div>
          
          </div>
       
        <!---Container Fluid-->
     
      <!-- Footer -->
       <?php include '../../include/footer.php';?>
      <!-- Footer -->
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