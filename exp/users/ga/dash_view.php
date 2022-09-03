<?php
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
   
}  

$uid =  $_SESSION["id"] ;
$us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"]; 
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
  <title>View Aplicant</title>
  <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../../assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
          </div>
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">

                           
<?php
 $type= $_GET['type'];
if($type == '1')
{
  echo '<script type="text/javascript">location.href = "exp_approved.php";</script>';
}


elseif($type == '2')
{
  echo ' <tr>
  <th>NIC No</th>
      <th>Full Name</th>
      <th>Address</th>
      <th>Approved Permit</th>
  </tr>
</thead>
<tbody>';
$query = $conn->query("SELECT * FROM applicant LEFT JOIN permit ON applicant.id=permit.aplicant_id WHERE ministryApprove='1' AND applicant.district='$dis'");
if($query->num_rows>0){
while($row=$query->fetch_assoc()){
  $id=$row["id"];
  $name=$row["fullname"]; 
  $nic=$row["nic"]; 
  $add=$row["addres"];  
  $exap=$row['expOffApprove'];
  $ga=$row['gaApprove'];
  $mini=$row['ministryApprove'];
  $stat=$row['stat'];
echo" <tr>
<td > <a href='aplicant_view.php?id=".$row["id"]."'> <span style=color:green> ". $row["nic"]. " </span></a></td>          
";
echo "<td>". $row["fullname"]. "</td>
<td>". $row["addres"]. "</td>";
echo "  <td><center><a href='approved_permit.php?id=$id' target='_blank' class='btn btn-primary btn-sm'><i class='fa fa-print'></i></a></td>";


}

}else{

  echo "No Details";
  }
}


elseif($type == '3')
{
  echo '<script type="text/javascript">location.href = "view_table.php";</script>';
}



elseif($type == '4')
{
  echo ' <tr>
  <th>NIC No</th>
      <th>Full Name</th>
      <th>Address</th>
     
  </tr> 
</thead>
<tbody>';
$query = $conn->query("SELECT * FROM applicant LEFT JOIN permit ON applicant.id=permit.aplicant_id WHERE gaApprove='0' AND applicant.district='$dis'");
if($query->num_rows>0){
while($row=$query->fetch_assoc()){
  $id=$row["id"];
  $name=$row["fullname"]; 
  $nic=$row["nic"]; 
  $add=$row["addres"];  
  $exap=$row['expOffApprove'];
  $ga=$row['gaApprove'];
  $mini=$row['ministryApprove'];
  $stat=$row['stat'];
echo" <tr>
<td > <a href='aplicant_view.php?id=".$row["id"]."'> <span style=color:green> ". $row["nic"]. " </span></a></td>          
";
echo "<td>". $row["fullname"]. "</td>
<td>". $row["addres"]. "</td>";
}

}else{

  echo "No Details";
  }
}

?>
            </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <div class="text-center">
          </div>
          </div>
        </div>
        <!---Container Fluid-->
      </div>
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
  <!-- Page level plugins -->
  <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>