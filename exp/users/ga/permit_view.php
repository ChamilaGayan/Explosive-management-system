<?php
error_reporting(0);
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  



$id = $_GET['id'];
$nid=$id;
$q1 = $conn->query("SELECT * from divreport WHERE aplicant_id = $id");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$landtype=$row['landtype'];
$qtypermit=$row['qtypermit'];
$pdate=$row['pdate'];

$edt1=$row['edate'];
}
}

$q2 = $conn->query("SELECT * from policereport WHERE aplicant_id = $id");
if($q2 !== false && $q2->num_rows > 0){
while($row=$q2->fetch_assoc()){

$polst=$row['polst'];
$pdate2=$row['pdate'];


$edt2=$row['edate'];
}
}

$q3 = $conn->query("SELECT * from excavate_permit WHERE aplicant_id = $id");
if($q3 !== false && $q3->num_rows > 0){
while($row=$q3->fetch_assoc()){

$permittype=$row['permittype'];
$permitno=$row['permitno'];
$maxqty=$row['maxqty'];
$depth=$row['depth'];
$north=$row['north'];
$east=$row['east'];
$holespertime=$row['holespertime'];
$blastperday=$row['blastperday'];
$blastperweek=$row['blastperweek'];
$blastpermonth=$row['blastpermonth'];
$pdate3=$row['pdate'];


$deedno=$row['deedno'];
$lotno=$row['lotno'];
$lndname=$row['lndname'];
$gsd=$row['gsd'];

$edt3=$row['edate'];
}
}

$q4 = $conn->query("SELECT * from envpermit WHERE aplicant_id = $id");
if($q4 !== false && $q4->num_rows > 0){
while($row=$q4->fetch_assoc()){

$ptype=$row['ptype'];
$permitno=$row['permitno'];
$pdate4=$row['pdate'];


$edt4=$row['edate'];
}
}

$q5 = $conn->query("SELECT * from merchantpermit WHERE aplicant_id = $id");
if($q5 !== false && $q5->num_rows > 0){
while($row=$q5->fetch_assoc()){

$merno=$row['merno'];
$institute=$row['institute'];
$pdate5=$row['pdate'];


$edt5=$row['edate'];
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
          
              <div class="card mb-4">
			
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h4 class="m-0 font-weight-bold text-secondary">අවසරපත්‍ර පිළිබද විස්තර</h4>
      
      <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='quarry_view.php?id=$nid' class='btn btn-success'>Quarry</a>"; ?>  
                      <?php echo "<a href='aplicant_view.php?id=$nid' class='btn btn-primary'>Applicant</a>"; ?>  
                      <?php echo "<a href='permit_view.php?id=$nid' class='btn btn-warning'>Permit</a>"; ?>  
                  </div>
     
      </div>
      <div class="card-body">

      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">අයදුම් කරුගේ විස්තර</h5>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>නම</th>
                        <th>ජා.හැ.අංකය</th>
                        <th>ලිපිනය</th>
                        <th>පොලිස් ස්ථානය</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php echo $name; ?></a></td>
                        <td><?php echo $nic; ?></td>
                        <td><?php echo $add; ?></td>
                        <td><?php echo $police; ?></td>
                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->


          <hr color="black">

          <form action="" name="aplicant" method="post" class="signin-form" enctype="multipart/form-data"> 
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

</div>

<?php
$q1 = $conn->query("SELECT * from ins_report WHERE aplicant_id = $id");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$ins_dt=$row['date'];

}
}

?>

<div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h5 class="m-0 font-weight-bold text-secondary">සහකාර පුපුරන ද්‍රව්‍ය පාලකගේ නිරීක්ෂන වාර්තාව</h5>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  
                  <th>දිනය</th>
          
                  <th>බලපත්‍රය</th>
                  
                </tr>
              </thead>
              <tbody>

                <tr>
                 
                  <td><?php echo $ins_dt ; ?></td>
                  <td><?php echo "<a href='permitimg.php?type=6&&id=$id' class='btn btn-primary' >Details</a>"; ?></td>                       
                </tr>
               
              </tbody>
            </table>
          </div>
    </div>
    <!--Row-->

          <hr color="black">

      <form action="" name="aplicant" method="post" class="signin-form" enctype="multipart/form-data"> 
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
       
      </div>

      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">ප්‍රාදේශීය ලේකම් අවසරපත්‍රය</h5>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ඉඩම් වර්ගය</th>
                        <th>ප්‍රා.ලේ. සතුනම් ප්‍රමාණය</th>
                        <th>දිනය</th>
                        <th>අවලංගු දිනය</th>
                        <th>බලපත්‍රය</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php echo $landtype; ?></a></td>
                        <td><?php echo $qtypermit; ?></td>
                        <td><?php echo $pdate; ?></td>
                        <td><?php echo $edt1 ; ?></td>
                        <td><?php echo "<a href='permitimg.php?type=1&&id=$nid' class='btn btn-primary' >Details</a>"; ?></td>                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->

          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    
      </div>

      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">පොලිස් අවසරපත්‍රය</h5>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>පොලිස් ස්ථානය</th>
                        <th>නිර්දේශය</th>
                        <th>දිනය</th>
                        <th>අවලංගු දිනය</th>
                        <th>බලපත්‍රය</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php echo $police; ?></a></td>
                        <td><?php echo $polst; ?></td>
                        <td><?php echo $pdate2; ?></td>
                        <td><?php echo $edt2 ; ?></td>
                        <td><?php echo "<a href='permitimg.php?type=2&&id=$nid' class='btn btn-primary' >Details</a>"; ?></td>                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->

          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    
      </div>
          
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">භූ විද්‍යා සමීක්ෂණ හා පතල් කාර්‍යාංශ බලපත්‍රය</h5>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>බලපත්‍ර වර්ගය</th>
                        <th>බලපත්‍ර අංකය</th>
                        <th>මාසික නිෂ්පාදන පරිමාව</th>
                        <th>වලේ ගැඹුර(මීටර්)</th>
                        <th>ඛණ්ඩාංක - උතුරු</th>
                        <th>ඛණ්ඩාංක - නැගෙනහිර</th>
                       
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php echo $permittype; ?></a></td>
                        <td><?php echo $permitno; ?></a></td>
                        <td><?php echo $maxqty; ?></a></td>
                        <td><?php echo $depth; ?></a></td>
                        <td><?php echo $north; ?></a></td>
                        <td><?php echo $east; ?></td>
                        
                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->

      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ඉඩමේ නම</th>
                        <th>ප්‍රාදේශීය ලේකම් කොට්ඨාශය</th>
                        <th>ඔප්පු අංකය</th>
                        <th>කැබලි අංකය</th>
                        
                       
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php echo $lndname; ?></a></td>
                        <td><?php echo $gsd; ?></a></td>
                        <td><?php echo $deedno; ?></a></td>
                        <td><?php echo $lotno; ?></a></td>
                       
                        
                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->








          <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                       
                        <th>බෝර වලවල් පිපිරවීම් සංඛ්‍යාව</th>
                        <th>දිනය</th>
                        <th>අවලංගු දිනය</th>
                        <th>බලපත්‍රය</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        
                        <td><?php echo "වරකට: $holespertime , දිනකට: $blastperday , සතියකට:$blastperweek , මසකට: $blastpermonth"; ?></td>
                        <td><?php echo $pdate3; ?></td>
                        <td><?php echo $edt3 ; ?></td>
                        <td><?php echo "<a href='permitimg.php?type=3&&id=$nid' class='btn btn-primary'>Details</a>"; ?></td>                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->






          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      
      </div>



      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">පරිසර බලපත්‍රය</h5>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>බලපත්‍ර වර්ගය</th>
                        <th>බලපත්‍ර අංකය</th>
                        <th>දිනය</th>
                        <th>අවලංගු දිනය</th>
                        <th>බලපත්‍රය</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php echo $ptype; ?></a></td>
                        <td><?php echo $permitno; ?></td>
                        <td><?php echo $pdate4; ?></td>
                        <td><?php echo $edt4 ; ?></td>
                        <td><?php echo "<a href='permitimg.php?type=4&&id=$nid' class='btn btn-primary' >Details</a>"; ?></td>                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->

          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     
      </div>



      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">ප්‍රාදේශීය සභා අවසරපත්‍රය</h5>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ප්‍රාදේශීය සභාව</th>
                        <th>බලපත්‍ර අංකය</th>
                        <th>දිනය</th>
                        <th>අවලංගු දිනය</th>
                        <th>බලපත්‍රය</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php echo $institute; ?></a></td>
                        <td><?php echo $merno; ?></td>
                        <td><?php echo $pdate5; ?></td>
                        <td><?php echo $edt5 ; ?></td>
                        <td><?php echo "<a href='permitimg.php?type=5&&id=$nid' class='btn btn-primary'>Details</a>"; ?></td>                       
                       
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          </div>
          <!--Row-->
<br><br>
         <center> <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='quarry_view.php?id=$nid' class='btn btn-success'>Quarry</a>"; ?>  
                      <?php echo "<a href='aplicant_view.php?id=$nid' class='btn btn-primary'>Applicant</a>"; ?>  
                      <?php echo "<a href='permit_view.php?id=$nid' class='btn btn-warning'>Permit</a>"; ?>  
                  </div></center>

         
<br><br>
          <div class="form-group row">
					<div class="col-sm-5"></div>
                      
                    </div>
                  </form>

          
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

</body>

</html>