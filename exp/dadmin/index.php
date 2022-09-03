<?php
include '../include/config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (strlen($_SESSION['id']==0)) {
      header('<location:login/logout.php');
      } else{
      }
      $uid =  $_SESSION["id"] ;

 $query = $conn->query("SELECT * from users  WHERE id = $uid ");

if($query !== false && $query->num_rows > 0){
  while($row=$query->fetch_assoc()){
    $dis=$row["district"];
 
  $imageURL='assets/img/'.$row["file_name"];
  }
}

  $newdis=$dis;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../assets/img/logo/logo.png" rel="icon">
  <title>Home</title>
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

     <!-- Earnings (Annual) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php

$sql="SELECT * FROM users where district = '$newdis'";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d Users\n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

  ?>
                      </div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           


 <!-- Additional Content -->

               
                <div class="card-body">
                <div class="p-3 mb-2 bg-gradient-light text-secondary" role="alert">
                    <h4 class="alert-heading">ආයුබෝවන්!</h4>
                    <p>
                    Every day is your day if you know how to use every bit properly. Making a day good or bad depends largely on you. Give your best, and enjoy your day. Have a great day!
                    </p>
                    <hr>
                    <p class="mb-0">
                    අද දිනය : <label for='inputEmail3' class='col-sm-9 col-form-label'><span id="datetime"></span><script>var dt = new Date();
                      document.getElementById("datetime").innerHTML=dt.toLocaleString();</script> </label>
                    </p>
                  </div>
                </div>
</div>
        


      <!-- Footer -->
       <?php include '../include/footer.php';?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/ruang-admin.min.js"></script>

</body>

</html>