<?php
error_reporting(0);
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
$id = $_GET['id'];
$nid=$id;
$q1 = $conn->query("SELECT * from quarry WHERE aplicant_id = $id");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){
  
$quarryna=$row['quarryna'];
$quarryvillage=$row['quarryvillage'];
$quarryGND=$row['quarryGND'];
$quarrypolice=$row['quarrypolice'];
$qyarryroad=$row['qyarryroad'];
$starea=$row['starea'];
$height=$row['height'];
$nature=$row['nature'];
$drillmethod=$row['drillmethod'];
$totemp=$row['totemp'];
$borano=$row['borano'];
$stexpno=$row['stexpno'];
$fillerno=$row['fillerno'];
$epf=$row['epf'];
$fileno=$row['fileno'];
$inch3=$row['inch3'];
$inch5=$row['inch5'];
$inch8=$row['inch8'];
$inch10=$row['inch10'];
$storelocation=$row['storelocation'];
$storesize=$row['storesize'];
$storestatus=$row['storestatus'];
$storesecurity=$row['storesecurity'];
$storekeeper=$row['storekeeper'];
$exptranport=$row['exptranport'];
$contractna=$row['contractna'];
$youvehical=$row['youvehical'];
$vehino=$row['vehino'];
$tax=$row['tax'];
$taxfileno=$row['taxfileno'];
$welldia=$row['welldia'];
$welldepth=$row['welldepth'];
$lastdepth=$row['lastdepth'];
$sizeofstone=$row['sizeofstone'];
$appdate=$row['appdate'];
}
}


$quser = $conn->query("SELECT * from product  WHERE aplicant_id = $id ");
if($quser !== false && $quser->num_rows > 0){
while($row=$quser->fetch_assoc()){
$dsix_fouris=$row["six_four"];
$six_nine=$row["six_nine"];
$two=$row["two"];
$one_and_half=$row["one_and_half"];
$one=$row["one"];
$three_quarter	=$row["three_quarter"];
$half=$row["half"];
$stone_cube=$row["stone_cube"];
  }
}
$queryr = $conn->query("SELECT * from permit WHERE aplicant_id=$id");
    if($queryr !== false && $queryr->num_rows > 0){
    while($row=$queryr->fetch_assoc()){
    $quarryad=$row["quarryad"];
    $gnd=$row["gnd"];
    $police2=$row["police"];
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
  <title>Quarry Details</title>
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
				
                  <h4 class="m-0 font-weight-bold text-secondary">????????? ????????? ??????????????????</h4>
                 
                  <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='quarry_view.php?id=$id' class='btn btn-success'>Quarry</a>"; ?>  
                      <?php echo "<a href='aplicant_view.php?id=$id' class='btn btn-primary'>Applicant</a>"; ?>  
                      <?php echo "<a href='permit_view.php?id=$id' class='btn btn-warning'>Permit</a>"; ?>  
                  </div>
                
                </div>
                <div class="card-body">

        <?php
        $queryr = $conn->query("SELECT * from applicant WHERE id	=$id");
        if($queryr !== false && $queryr->num_rows > 0){
        while($row=$queryr->fetch_assoc()){
        $name=$row["fullname"];
        $add=$row["addres"];
        $police=$row["police"];

                    echo"   <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>01.?????????????????? ??????????????? ?????? : </label>
                    <div class='col-sm-9'>
                    <label for='inputEmail3' class='col-sm-9 col-form-label'> $name</label>
                    </div>
                  </div>
                  
                  <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>02.?????????????????? ??????????????? ?????????????????? : </label>
                    <div class='col-sm-9'>
                    <label for='inputEmail3' class='col-sm-9 col-form-label'> $add</label>
                    </div>
                  </div>

                  <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-4 col-form-label'>03.?????????????????? ??????????????? ????????? ?????????????????? ?????????????????? : </label>
                    <div class='col-sm-7'>
                    <label for='inputEmail3' class='col-sm-7 col-form-label'> $police</label>
                    </div>
                  </div>";
}
}

?>
                <form action="" name="quarry" method="post" class="signin-form" enctype="multipart/form-data"> 
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"> 04. ?????????????????? ?????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$quarryna</label>"; ?>
                      </div>
 
                      <label for="inputPassword3" class="col-sm-3 col-form-label"> 05. ??????????????? ?????????????????? ????????? ?????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$quarryad</label>"; ?>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">06.????????? ?????? ?????????????????? ?????????????????? ???????????? ???????????????????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$gnd</label>"; ?>
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">07. ?????????????????? ????????? ?????????????????? ?????????????????? ????????????????????? ?????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$police2</label>"; ?>
                      </div>
                    </div>
					       
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">08.?????????????????? ????????? ?????????????????? ????????????????????? ???????????? ?????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$qyarryroad</label>"; ?>
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">09. ?????????????????? ????????? ???????????????????????? ??????????????? ??????????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$starea</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"> 10. ?????????????????? ????????? ?????? ????????? ??????????????? : </label>
                      <div class="col-sm-1">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$height</label>"; ?>
                      </div>
                   
                    <label for="select2SinglePlaceholder" class="col-sm-2 col-form-label">11. ????????? ????????????????????? : </label>
				        	 <div class="col-sm-2">
                   <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$nature</label>"; ?>
					</div>
					<label for="inputPassword3" class="col-sm-2 col-form-label">12. ????????????????????? ????????? ??????????????? : </label>
					 <div class="col-sm-2">
           <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$drillmethod</label>"; ?>
					</div>
                  </div>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">13. ???????????? ????????????????????????: </label>
                   
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3'>???????????? ???????????????????????? : $totemp</label>"; ?>
                      </div>
					 
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3'>????????? ????????????????????? : $borano</label>"; ?>
                      </div>
                    
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3'>????????? ????????????????????????????????? : $stexpno</label>"; ?>
                      </div>
					  
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3'>????????????????????????????????? : $fillerno</label>"; ?>
                      </div>
                    </div>
				
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">14. ???????????????????????? ???????????????????????? ????????????????????? ????????????????????????? : </label>
                    
                      <?php echo "<label for='inputEmail3'>$epf</label>"; ?>
					          </div>
                 
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">15. ??????????????? ??????????????? ??????????????? ????????? ??????????????? ???????????? </label>
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>???????????? 3 : $inch3</label>"; ?>
                      </div>
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>???????????? 5 : $inch5</label>"; ?>
                      </div>
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>???????????? 8 : $inch8</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>???????????? 10 : $inch10</label>"; ?>
                      </div>
                    </div>
			
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label"> 16. ???????????????????????? ????????? ?????????????????? ???????????????????????? ???????????????????????? : </label>
                    </div>




                    <div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     </div>
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>?????????????????? ????????????????????????</th>
                             <th>3 inches</th>
                             <th>5 inches</th>
                             <th>8 inches</th>
                             <th>10 inches</th>
                             <th>????????????</th>
                             <th>?????????</th>
                             <th>????????? 6???</th>
                           </tr>
                         </thead>

                         <?php
                     $querya = $conn->query("SELECT * from quarryexp WHERE aplicant_id=$nid");
                     if($querya !== false && $querya->num_rows > 0){
                     while($row=$querya->fetch_assoc()){
                     $expname=$row["expna"];
                     $in3=$row["inch3"];
                     $in5=$row["inch5"];
                     $in8=$row["inch8"];
                     $in10=$row["inch10"];
                    
                    
                     
                     $day =  ($inch3 * $in3) + ($inch5 * $in5) + ($inch8 * $in8) + ($inch10 * $in10);
                     $mqty=$day*20;
                     $m6qty=$mqty*6;
          

                        echo " <tbody>
     
                           <tr>
                             <td> $expname</a></td>
                             <td> $in3</a></td>
                             <td> $in5</a></td>
                             <td> $in8</a></td>
                             <td> $in10</a></td>
                             <td> $day</a></td>
                             <td> $mqty</a></td>
                             <td> $m6qty</a></td>
                            
                           </tr>
                          
                         </tbody>";
                      
              
                   
                     }
                    }
                    ?>
 </table>
                     </div>
               </div>
<br>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label"> 17.?????????????????? ??????????????????(??????????????????????????? ???????????????,?????????????????????,?????????????????????) : </label>
                      
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(1) ?????????????????? ???????????????????????? ?????????????????? ????????????????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storelocation</label>"; ?>
                      </div>
                    
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(2)  ?????????????????? ???????????????????????? ?????????????????? ????????????????????????(?????????,?????????,?????? ????????? ???????????????) : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storesize</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(3)  ?????????????????? ???????????????????????? ?????????????????? ??????????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storestatus</label>"; ?>
                      </div>
      
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(4)  ?????????????????? ???????????????????????? ?????????????????? ????????????????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storesecurity</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"> 18.?????????????????? ???????????????????????? ???????????????????????? ???????????? ??????????????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storekeeper</label>"; ?>
                      </div>
     
                      <label for="inputEmail3" class="col-sm-3 col-form-label">  19.????????????????????????????????? ?????????????????? ???????????????????????? ??????????????????????????? ????????? ??????????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$exptranport</label>"; ?>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-9 col-form-label"> 20.?????????????????? ?????????????????? ??????????????????????????? ?????? ???????????????????????? : </label>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>6x4 ????????? ?????????????????? : $dsix_fouris</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>6x9 ????????? : $six_nine</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>2 ????????? ????????? : $two</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>1 1/2 ????????? : $one_and_half</label>"; ?>
                      </div>
                    
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>1 ????????? : $one</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>3/4 ????????? : $three_quarter</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>1/2 ????????? : $half</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>????????? ???????????? ?????????????????? : $stone_cube</label>"; ?>
                      </div>
                    
                    </div>


                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">  21.?????? ????????? ????????????????????? ????????? ?????????????????????????????????????????????????????? ????????? : </label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3'>$contractna</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label"> 22.????????????????????? ??????????????? ???????????? ??????????????????????????? ?????????????????? ???????????? ???????????? ???????????????? : </label>
                      <?php echo "<label for='inputEmail3' class='col-sm-5 col-form-label'>$youvehical</label>"; ?>
					          
					</div>
          
               <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">  23.?????????????????? ????????? ?????????????????????????(?????????????????????????????? ???????????????????????? ????????????) : </label>
                      <?php echo "<label for='inputEmail3' class='col-sm-2 col-form-label'>$tax</label>"; ?>


                   <div class="col-sm-6">
                   <?php echo "<label for='inputEmail3' class='col-sm-5 col-form-label'>$taxfileno</label>"; ?>
                      </div>
					</div>
          
          <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-9 col-form-label"> 24.????????? ??????????????????????????? ?????????????????? ??????????????? ???????????? ?????? ????????? ???????????? ???????????????????????? : </label>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3'>???????????? ???????????????????????????(???????????????):$welldia</label>"; ?>
                      </div>
                    

                   
                      <div class="col-sm-4">
                      <?php echo "<label for='inputEmail3' >???????????? ???????????? ????????? ???????????????(???????????????):$welldepth</label>"; ?>
                      </div>
                   

                  
                      <div class="col-sm-5">
                      <?php echo "<label for='inputEmail3' >????????? ??????????????????????????? ?????? ??????????????? ???????????? ???????????????(???????????????):$lastdepth</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">25.????????? ??????????????????????????? ?????????????????? ??????????????? ?????????????????? ???????????????????????? ??????????????? ?????? ???????????? ????????? ?????? ????????? ??????????????????????????? : </label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$sizeofstone</label>"; ?>
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">????????????????????? ????????????????????? ???????????? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$appdate</label>"; ?>
                      </div>
                    </div>

                    <br><br>
                    <div class="form-group row">
					<div class="col-sm-4"></div>

          &ensp;&ensp;&ensp;&ensp;&ensp;
          <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='quarry_view.php?id=$id' class='btn btn-success'>Quarry</a>"; ?>  
                      <?php echo "<a href='aplicant_view.php?id=$id' class='btn btn-primary'>Applicant</a>"; ?>  
                      <?php echo "<a href='permit_view.php?id=$id' class='btn btn-warning'>Permit</a>"; ?>  
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

</body>

</html>