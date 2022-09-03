<?php
error_reporting(0);
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
$id = $_GET['id'];
$pid = $_GET['pid'];

$q = $conn->query("SELECT * from applicant WHERE id = $id");
if($q !== false && $q->num_rows > 0){
while($row=$q->fetch_assoc()){

$name=$row['fullname'];
$add=$row['addres'];
$job=$row['disignation'];
$add=$row['addres'];
$anualIncome=$row['anualIncome'];
$age=$row['age'];
$police=$row['police'];
$mobile1=$row['mobile1'];
$mobile2=$row['mobile2'];
$nic=$row['nic'];
}
}

$q1 = $conn->query("SELECT * from permit WHERE perid = $pid");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$pstore=$row['pstore'];
$permitdu=$row['permitdu'];
$Premiums=$row['Premiums'];
$task=$row['task'];
$quarryad=$row['quarryad'];
$gnd=$row['gnd'];
$ds=$row['ds'];
$offence=$row['offence'];
$appdate=$row['appdate'];
$permit_id=$row['perid'];
}
}

$q1 = $conn->query("SELECT * from agent WHERE perid = $pid");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$agname=$row['agname'];
$agadd=$row['agadd'];
$adnic=$row['adnic'];
}
}

$queryb = $conn->query("SELECT * from oldpermit WHERE perid=$pid");
if($queryb !== false && $queryb->num_rows > 0){
while($row=$queryb->fetch_assoc()){
$expname=$row["expname"];
$authqty=$row["authqty"];
$reqty=$row["reqty"];
$usedqty=$row["usedqty"];
$remqty=$row["remqty"];
$oldpermit=$row["oldpermit"];
$lauthority=$row["lauthority"];
$pno=$row["pno"];
$pdate=$row["pdate"];
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
  <title>Aplicant Details</title>
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
      
        <div class="container-fluid" id="container-wrapper">
	
       <!-- Horizontal Form -->
              <div class="card mb-4">
			
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				
                  <h4 class="m-0 font-weight-bold text-secondary">අයදුම්කරුගේ විස්තර</h4>
                 
                  <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='quarry_view.php?id=$id&pid=$pid' class='btn btn-success'>Quarry</a>"; ?>  
                      <?php echo "<a href='aplicant_view.php?id=$id&pid=$pid' class='btn btn-primary'>Applicant</a>"; ?>  
                      <?php echo "<a href='permit_view.php?id=$id&pid=$permit_id' class='btn btn-warning'>Permit</a>"; ?>  
                  </div>
                  
                </div>
                <div class="card-body">
                <form action="" name="aplicant" method="post" class="signin-form" enctype="multipart/form-data"> 
				<div class="form-row">
                      <div class="col-md-12">01.</div>
                    </div>
				  <div class="form-row">
                      <div class="col-md-12">(1) අයදුම්කරුගේ නම  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  :-   <?php echo  $name; ?></div>
                    </div>
					<div class="form-row">
                      <div class="col-md-12">(2) ලිපිනය  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :-   <?php echo  $add; ?></div>
                    </div>
                   <div class="form-row">
                      <div class="col-md-6">(3) රැකියාව&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :-   <?php echo  $job; ?></div>
                    <div class="col-md-3">(4) වාර්ෂික අදායම:- රු. <?php echo  $anualIncome;?></div>
					</div>
					
                    <div class="form-row">
					 
                     <div class="col-md-3">(5) ජාතික හැදුනුම්පත් අංකය :- <?php echo  $nic;?></div>
					 <div class="col-md-3">(6) වයස(අවු.) :- <?php echo  $age;?></div>
					 <div class="col-md-3">(7) දුරකතන අංකය (ස්ථාවර) :- <?php echo  $mobile1;?></div>
					 <div class="col-md-3">(8) ජංගම :- <?php echo  $mobile2;?></div>
                    </div>
					
					<hr color="black">
					<div class="form-row">
                      <div class="col-md-12">02. අයදුම්කරුගේ පදිංචි ස්ථානයට ආසන්නම පොලිස් ස්ථානය :- <?php echo $police; ?></div>
                    </div>
                   
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">03. අයදුම් කරන පුපුරන ද්‍රව්‍ය ප්‍රමාණය-මාසයකට :- </label>
                    </div>

                    <div class='form-group row'>
                    <?php
          $queryc = $conn->query("SELECT * from explosive WHERE perid=$pid");
          if($queryc !== false && $queryc->num_rows > 0){
          while($row=$queryc->fetch_assoc()){
          $expname=$row["expname"];
          $reqty=$row["reqty"];
        
			    echo	"
                <label for='inputPassword3' class='col-sm-3 col-form-label'>$expname</label>
                <div class='col-sm-3'>
                <label for='inputPassword3' class='col-sm-3 col-form-label'>$reqty</label>
                </div>
					      ";
          }
        }
        ?>
				 </div>

					<hr color="black">
					<div class="form-row">
                      <div class="col-md-6">04. පුපුරන ද්‍රව්‍ය ගබඩා කරන ස්ථානය :-  <?php echo $pstore;?> </div>
                     <div class="col-md-6">05. අවසරපත්‍රය අවශ්‍ය කාල සීමාව මාස :-  <?php echo $permitdu;?> </div>
					</div>
					 <div class="form-row">
                      <div class="col-md-6">06. පුපුරන ද්‍රව්‍ය ලබා ගන්නා වාරික ගණන :-  <?php echo $Premiums;?> </div>
                     <div class="col-md-6">07. පුපුරන ද්‍රව්‍ය  පාවිච්චි  කරන කාර්යය :-  <?php echo $task;?> </div>
					</div>
				 
				  <hr color="black">
				  <div class="form-row">
				  <div class="col-md-12">08. පුපුරන ද්‍රව්‍ය බෝර දැමීමේ කාර්යය සඳහා නම්</div>
				  </div>
				  <div class="form-row">
				  <div class="col-md-6">(1). ගල්වල පිහිටි ස්ථානයේ ලිපිනය :-<?php echo $quarryad; ?></div>
				  <div class="col-md-6">(2). i.ග්‍රාම නිලධාරී වසම  :-<?php echo $gnd; ?></div>
				  </div>
				  <div class="form-row">
				  <div class="col-md-6">ii. ප්‍රා.ලේකම් කොට්ටාශය  :-<?php echo $ds; ?></div>
				   <div class="col-md-6">(3). ගල්වලට ආසන්නම පොලිස් ස්ථානය :-<?php echo $police; ?></div>
				  </div>
				  <hr color="black">
				<div class="form-row">
				  <div class="col-md-12"><b>09. අනුනියෝජිතයන්ගේ විස්තර</b></div>
				  </div>	
					<div class="form-row">
				  <div class="col-md-4"> නම :-<?php echo $agname; ?></div>
				   <div class="col-md-4">ලිපිනය :-<?php echo $agadd; ?></div>
				   <div class="col-md-4">ජා.හැ.අංකය :- <?php echo $adnic ?></div>
				  </div>
					<hr color="black">
					
				<div class="form-row">
				  <div class="col-md-12">10. අයදුම්කරුට මෙයට පෙර අවසරපත්‍රයක් නිකුත් කර තිබේද? :-  <?php echo $oldpermit;?></div>
				  </div>
					<div class="form-row">
				  <div class="col-md-4"> අවසරපත්‍රයේ අංකය :-<?php echo $pno; ?></div>
				   <div class="col-md-4">දිනය :-<?php echo $pdate; ?></div>
				   <div class="col-md-4">අධිකාරිය :- <?php echo $lauthority ?></div>
				  </div>
					
					
					<div class="form-group row">
          <label for="inputPassword3" class="col-sm-12 col-form-label">මෙම අවසරපත්‍රයේ වලංගු කාලය යටතේ ලබාගත්, භාවිතා කළ හා ඉතිරි පුපුරන ද්‍රව්‍ය පිළිබද විස්තර (කි.ග්‍රැම්) </label>
					  </div>

            <div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     </div>
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය</th>
                             <th>බලය දුන් ප්‍රමාණය</th>
                             <th>ලබාගත් ප්‍රමාණය</th>
                             <th>භාවිතා කළ ප්‍රමාණය</th>
                             <th>ඉතිරි ප්‍රමාණය</th>
                            
                           </tr>
                         </thead>

          <?php
          $l = $conn->query("SELECT * from oldpermit WHERE perid=$pid");
          if($l !== false && $l->num_rows > 0){
          while($row=$l->fetch_assoc()){
            $expn=$row["expname"];
            $auth=$row["authqty"];
            $req=$row["reqty"];
            $used=$row["usedqty"];
            $rem=$row["remqty"];
			  
echo " <tbody>
     
     <tr>
       <td> $expn</a></td>
       <td> $auth</a></td>
       <td> $req</a></td>
       <td> $used</a></td>
       <td> $rem</a></td>
      
     </tr>
    
   </tbody>";

}
}
?>
</table>
</div>
</div>
<hr color="black">
		<div class="form-row">
				  <div class="col-md-12"><b>11. අයදුම්කරු අධිකරනයකදී කිසියම් වරදක් සම්බන්ධයෙන් වරදකරු කර ඇත්නම් ඒ පිළිබද විස්තර :- <?php echo $offence;?></b></div>
				  </div>		
					<hr color="black">
		<div class="form-row">
				  <div class="col-md-12"><b>ඉල්ලුම් පත්‍රයේ දිනය :- :- <?php echo $appdate;?></b></div>
				  </div>				
					<hr color="black">
					
                    <div class="form-group row">
					<div class="col-sm-4"></div>

                    
          &ensp;&ensp;&ensp;&ensp;&ensp;
                      <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='quarry_view.php?id=$id&pid=$pid' class='btn btn-success'>Quarry</a>"; ?>  
                      <?php echo "<a href='aplicant_view.php?id=$id&pid=$pid' class='btn btn-primary'>Applicant</a>"; ?>  
                      <?php echo "<a href='permit_view.php?id=$id&pid=$pid' class='btn btn-warning'>Permit</a>"; ?>  
                  </div>

                    </div>
                  </form>
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
  <script src="../../assets/js/form_validations.js"></script>

</body>

</html>