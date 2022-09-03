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
				
                  <h4 class="m-0 font-weight-bold text-secondary">ගල් වලේ විස්තර</h4>
                 
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
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>01.අයදුම් කරුගේ නම : </label>
                    <div class='col-sm-9'>
                    <label for='inputEmail3' class='col-sm-9 col-form-label'> $name</label>
                    </div>
                  </div>
                  
                  <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>02.අයදුම් කරුගේ ලිපිනය : </label>
                    <div class='col-sm-9'>
                    <label for='inputEmail3' class='col-sm-9 col-form-label'> $add</label>
                    </div>
                  </div>

                  <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-4 col-form-label'>03.පදිංචි නිවසට ළගම පොලිස් ස්ථානය : </label>
                    <div class='col-sm-7'>
                    <label for='inputEmail3' class='col-sm-7 col-form-label'> $police</label>
                    </div>
                  </div>";
}
}

?>
                <form action="" name="quarry" method="post" class="signin-form" enctype="multipart/form-data"> 
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"> 04. ගල්වලේ නම : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$quarryna</label>"; ?>
                      </div>
 
                      <label for="inputPassword3" class="col-sm-3 col-form-label"> 05. ගල්වල පිහිටි ගමේ නම : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$quarryad</label>"; ?>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">06.ගල් වල පිහිටි ග්‍රාම සේවා කොට්ඨාශය : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$gnd</label>"; ?>
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">07. ගල්වලට ළගම පිහිටි පොලිස් ස්ථානයේ නම : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$police2</label>"; ?>
                      </div>
                    </div>
					       
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">08.ගල්වලට ළගම පිහිටි ප්‍රධාන පාරේ නම : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$qyarryroad</label>"; ?>
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">09. මතුපිට ගලේ ප්‍රමාණය අක්කර වලින් : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$starea</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"> 10. මතුපිට ගලේ උස අඩි වලින් : </label>
                      <div class="col-sm-1">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$height</label>"; ?>
                      </div>
                   
                    <label for="select2SinglePlaceholder" class="col-sm-2 col-form-label">11. ගලේ ස්වබාවය : </label>
				        	 <div class="col-sm-2">
                   <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$nature</label>"; ?>
					</div>
					<label for="inputPassword3" class="col-sm-2 col-form-label">12. ක්‍රියා කරන ආකාරය : </label>
					 <div class="col-sm-2">
           <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$drillmethod</label>"; ?>
					</div>
                  </div>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">13. සේවක සංඛ්‍යාව: </label>
                   
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3'>මුලු සංඛ්‍යාව : $totemp</label>"; ?>
                      </div>
					 
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3'>බෝර ගසන්නන් : $borano</label>"; ?>
                      </div>
                    
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3'>ගල් පුපුරවන්නන් : $stexpno</label>"; ?>
                      </div>
					  
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3'>පුපුරවන්නන් : $fillerno</label>"; ?>
                      </div>
                    </div>
				
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">14. සේවකයන්ට අර්ථසාධක අරමුදල් ගෙවන්නේද? : </label>
                    
                      <?php echo "<label for='inputEmail3'>$epf</label>"; ?>
					          </div>
                 
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">15. දිනකට විදින වලවල් ගණන ගැඹුර අනුව </label>
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>අගල් 3 : $inch3</label>"; ?>
                      </div>
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>අගල් 5 : $inch5</label>"; ?>
                      </div>
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>අගල් 8 : $inch8</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>අගල් 10 : $inch10</label>"; ?>
                      </div>
                    </div>
			
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label"> 16. පාවිච්චි කරන පුපුරන ද්‍රව්‍ය ප්‍රමාණය : </label>
                    </div>




                    <div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     </div>
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය</th>
                             <th>3 inches</th>
                             <th>5 inches</th>
                             <th>8 inches</th>
                             <th>10 inches</th>
                             <th>දිනක</th>
                             <th>මසක</th>
                             <th>මාස 6ක</th>
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
                      <label for="inputEmail3" class="col-sm-6 col-form-label"> 17.ගබඩාවේ විස්තර(ගොඩනැගිලි තත්වය,පිහිටීම,ආරක්ෂාව) : </label>
                      
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(1) පුපුරන ද්‍රව්‍ය ගබඩාවේ පිහිටීම : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storelocation</label>"; ?>
                      </div>
                    
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(2)  පුපුරන ද්‍රව්‍ය ගබඩාවේ ප්‍රමාණය(දිග,පළල,උස අඩි වලින්) : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storesize</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(3)  පුපුරන ද්‍රව්‍ය ගබඩාවේ තත්වය : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storestatus</label>"; ?>
                      </div>
      
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(4)  පුපුරන ද්‍රව්‍ය ගබඩාවේ ආරක්ෂාව : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storesecurity</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"> 18.පුපුරන ද්‍රව්‍ය තබාගන්නේ කාගේ බාරයේද? : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$storekeeper</label>"; ?>
                      </div>
     
                      <label for="inputEmail3" class="col-sm-3 col-form-label">  19.සපයන්නාගෙන් පුපුරන ද්‍රව්‍ය ප්‍රවාහනය කරන ආකාරය : </label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$exptranport</label>"; ?>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-9 col-form-label"> 20.පසුගිය වර්ෂයේ නිෂ්පාදනය කළ ප්‍රමාණය : </label>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>6x4 ගල් කියුබ් : $dsix_fouris</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>6x9 ගල් : $six_nine</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>2 පාර ගල් : $two</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>1 1/2 ගල් : $one_and_half</label>"; ?>
                      </div>
                    
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>1 ගල් : $one</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>3/4 ගල් : $three_quarter</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>1/2 ගල් : $half</label>"; ?>
                      </div>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>ගල් කුඩු කියුබ් : $stone_cube</label>"; ?>
                      </div>
                    
                    </div>


                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">  21.ඔබ ගල් වෙළදාම් කරන කොන්ත්‍රාත්කරුවෙක් නම් : </label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3'>$contractna</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label"> 22.වෙළදාම් කිරීම සදහා ප්‍රවාහනය කිරීමට ඔබේම වාහන තිබේද? : </label>
                      <?php echo "<label for='inputEmail3' class='col-sm-5 col-form-label'>$youvehical</label>"; ?>
					          
					</div>
          
               <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">  23.ආදායම් බදු ගෙවන්නේද?(ගෙවන්නේනම් ලිපිගොනු අංකය) : </label>
                      <?php echo "<label for='inputEmail3' class='col-sm-2 col-form-label'>$tax</label>"; ?>


                   <div class="col-sm-6">
                   <?php echo "<label for='inputEmail3' class='col-sm-5 col-form-label'>$taxfileno</label>"; ?>
                      </div>
					</div>
          
          <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-9 col-form-label"> 24.බෝර පිපිරවීමට අවශ්‍ය වන්නේ ළිදක ගල කඩා ඉවත් කිරීමනම් : </label>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3'>ළිදේ විෂ්කම්බය(මීටර්):$welldia</label>"; ?>
                      </div>
                    

                   
                      <div class="col-sm-4">
                      <?php echo "<label for='inputEmail3' >දැනට හාරා ඇති ගැඹුර(මීටර්):$welldepth</label>"; ?>
                      </div>
                   

                  
                      <div class="col-sm-5">
                      <?php echo "<label for='inputEmail3' >ජලය ලබාගැනීමට තව හෑරිය යුතු ගැඹුර(මීටර්):$lastdepth</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">25.බෝර පිපිරවීමට අවශ්‍ය වන්නේ ගෙපලක් කැපීමේදී අවහිර වන ගලක් නම් එම ගලේ විශාලත්වය : </label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$sizeofstone</label>"; ?>
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">ඉල්ලුම් පත්‍රයේ දිනය : </label>
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