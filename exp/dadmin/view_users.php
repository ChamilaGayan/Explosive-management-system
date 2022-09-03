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

  } 
}

$newdis=$dis;

$query1 = $conn->query("SELECT * FROM users where district = '$newdis'");

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
  <title>View Users</title>
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Users</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">

                  
                            <tr>
                            <th>Name</th>
                                <th>District</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>

                          
                           
                        <?php

if($query1->num_rows>0){
while($row=$query1->fetch_assoc()){
  $row["id"];
  $dadmin=$row["role"]; 

  if($dadmin=='dadmin')
  {
      echo '<td style=color:red>You</td>';
     
  }else

echo" <tr>
<td><a href='edit_users.php?id=".$row["id"]."'> <span style=color:purple> ". $row["fname"]. " ". $row["lname"]. " </span></a></td>          
";
echo "<td>". $row["district"]. "</td>
<td>". $row["role"]. "</td> </tr>";

  {
  }
    
  }
}

else{

echo "No Details";
}

?>

           


                    </tbody>
                  </table>
                </div>
              </div>
            </div>



          <div class="text-center">
            
          </div>

        
        </div>
        <!---Container Fluid-->
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
  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>