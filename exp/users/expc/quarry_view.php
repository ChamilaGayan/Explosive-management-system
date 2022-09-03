<?php
error_reporting(0);
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
$id = $_GET['id'];
$pid=$_GET['pid'];

$q1 = $conn->query("SELECT * from quarry WHERE aplicant_id = $pid");
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


$quser = $conn->query("SELECT * from product  WHERE aplicant_id = $pid ");
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

$queryr = $conn->query("SELECT * from permit WHERE perid=$pid");
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
		<div><h4 class="m-0 font-weight-bold text-primary"></h4>
	
		</div>
    <!-- Horizontal Form -->
              <div class="card mb-4">
			
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				 <h5 class="m-0 font-weight-bold text-secondary">3 ආකෘතිය </h5>
				
                  
                 
                  <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='quarry_view.php?id=$id&pid=$pid' class='btn btn-success'>Quarry</a>"; ?>  
                      <?php echo "<a href='aplicant_view.php?id=$id&pid=$pid'' class='btn btn-primary'>Applicant</a>"; ?>  
                      <?php echo "<a href='permit_view.php?id=$id&pid=$pid' class='btn btn-warning'>Permit</a>"; ?>  
                  </div>
                  
                </div>
				<div class="card-body">
				<h4 class="m-0 font-weight-bold text-secondary">ගල්  පිපිරවීම්  / කැණීම් කරන සථානය පිළිබඳ සවිස්තර වාර්තාව</h4>
				</div>
                <div class="card-body"> 

        <?php
        $queryr = $conn->query("SELECT * from applicant WHERE id	=$id");
        if($queryr !== false && $queryr->num_rows > 0){
        while($row=$queryr->fetch_assoc()){
        $name=$row["fullname"];
        $add=$row["addres"];
        $police=$row["police"];
?>
                    <div class='form-row'>
                    <div class='col-sm-12'> <p>01. අයදුම් කරුගේ නම  හා ලිපිනය:  <?php echo $name . " , ". $add ?></p>
                    </div>
                  </div>
                  
                  <div class='form-row'>
                    <div class='col-sm-9'><p>02. පදිංචි නිවසට ළගම පොලිස් ස්ථානය : <?php echo $police; ?></p>
                    </div>
                  </div>
 <hr color="black">
                  <?php 
}
}

?>
                <div class='form-row'>
                    <div class='col-sm-6'><p>03. ගල්වලේ නම : <?php echo $quarryna; ?>
                    </div>
					<div class='col-sm-6'>04. ගල්වල පිහිටි ගමේ නම : <?php echo $quarryad; ?></p>
                    </div>
                  </div>
				
				<div class='form-row'>
                    <div class='col-sm-6'><p>05. ගල් වල පිහිටි ග්‍රාම සේවා කොට්ඨාශය :  <?php echo $gnd; ?>
                    </div>
					<div class='col-sm-6'>06. ගල්වලට ළගම පිහිටි පොලිස් ස්ථානයේ නම : <?php echo $police2; ?></p>
                    </div>
                  </div>
                 <div class='form-row'>
                    <div class='col-sm-6'><p>07.ගල්වලට ළගම පිහිටි ප්‍රධාන පාරේ නම :   <?php echo $qyarryroad; ?>
                    </div>
					<div class='col-sm-6'>08. මතුපිට ගලේ ප්‍රමාණය අක්කර වලින් : <?php echo $starea; ?></p>
                    </div>
                  </div>   
                    
				<div class='form-row'>
                    <div class='col-sm-4'><p>09. මතුපිට ගලේ උස අඩි වලින් :   <?php echo $height; ?>
                    </div>
					<div class='col-sm-4'>10. ගලේ ස්වබාවය : <?php echo $nature; ?></p>
                    </div>
					<div class='col-sm-4'>11. ක්‍රියා කරන ආකාරය :  <?php echo $drillmethod; ?></p>
                    </div>
					
                  </div>   	       
                  <hr color="A2A0A0">

                 <div class='form-row'>
                    <div class='col-sm-3'><p>12. සේවක සංඛ්‍යාව:    මුලු සංඛ්‍යාව : <?php echo $totemp; ?>
                    </div>
					<div class='col-sm-3'>බෝර ගසන්නන් :   <?php echo $borano; ?></p>
                    </div>
					<div class='col-sm-3'>ගල් පුපුරවන්නන් :   <?php echo $stexpno; ?></p>
                    </div>
					<div class='col-sm-3'>පුපුරවන්නන් :    <?php echo $fillerno; ?></p>
                    </div>
                  </div>      
				
                 <div class='form-row'>
                    <div class='col-sm-12'><p>13. සේවකයන්ට අර්ථසාධක අරමුදල් ගෙවන්නේද? :  <?php echo $epf; ?>
                    </div>	
                  </div>
                  
			<div class='form-row'>
                    <div class='col-sm-4'><p>14. දිනකට විදින වලවල් ගණන ගැඹුර අනුව,  අගල් 3 -  <?php echo $inch3; ?>
                    </div>
					<div class='col-sm-2'>අගල් 5 -  <?php echo $inch5; ?></p>
                    </div>
					<div class='col-sm-2'>අගල් 8 -  <?php echo $inch8; ?></p>
                    </div>
					<div class='col-sm-2'>අගල් 10 -   <?php echo $inch10; ?></p>
                    </div>
                  </div>   	
                   
                 
                  
			
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label"> 15. පාවිච්චි කරන පුපුරන ද්‍රව්‍ය ප්‍රමාණය:</label>
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
                     $querya = $conn->query("SELECT * from quarryexp WHERE aplicant_id=$pid");
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
                    <div class="form-row">
                      <div class='col-sm-12'> <p>16. ගබඩාවේ විස්තර(ගොඩනැගිලි තත්වය,පිහිටීම,ආරක්ෂාව) : </p></div>
                      
                    </div>
					<div class="form-row">
                      <div class='col-sm-6'><p> (i) පුපුරන ද්‍රව්‍ය ගබඩාවේ පිහිටීම : <?php echo $storelocation;?></div>
                      <div class='col-sm-6'> (ii) පුපුරන ද්‍රව්‍ය ගබඩාවේ ප්‍රමාණය(දිග,පළල,උස අඩි වලින්) :  <?php echo$storesize;?></p></div>
                    </div>
                    <div class="form-row">
                      <div class='col-sm-6'> <p>(iii)  පුපුරන ද්‍රව්‍ය ගබඩාවේ තත්වය :  <?php echo $storestatus;?></div>
                      <div class='col-sm-6'> (iv)  පුපුරන ද්‍රව්‍ය ගබඩාවේ ආරක්ෂාව :  <?php echo $$storesecurity;?></p></div>
                    </div>
					<div class="form-row">
                      <div class='col-sm-6'> <p>(17. පුපුරන ද්‍රව්‍ය තබාගන්නේ කාගේ බාරයේද? :  <?php echo $storekeeper;?></div>
                      <div class='col-sm-6'>  18. සපයන්නාගෙන් පුපුරන ද්‍රව්‍ය ප්‍රවාහනය කරන ආකාරය : <?php echo $exptranport;?></p></div>
                    </div>
                   

                   <hr color="A2A0A0">
				   <div class="form-row">
                      <div class='col-sm-6'> <p>19. පසුගිය වර්ෂයේ නිෂ්පාදනය කළ ප්‍රමාණය :</p>
					  </div>
					  </div>
					  
					   <div class="form-row">
                      <div class='col-sm-6'> <p>
					  <table class="table table-striped table-bordered">
					  <th>ප්‍රමාණය (size) </th><th>කියුබ්</th> <th>ප්‍රමාණය (size)</th><th>කියුබ්</th>
					   <tr><td>6"x4" ගල්</td><td><?php echo $dsix_fouris;?></td> <td>1" ගල්</td><td><?php echo $one;?></td></tr>
					   <tr><td>6"x9" ගල්</td><td><?php echo $six_nine; ?></td> <td>3/4" ගල්</td><td><?php echo $three_quarter; ?></td></tr>
					   <tr><td>2 "ගල්</td><td><?php echo $two; ?></td> <td>1/2" ගල්</td><td><?php echo $half;?> </td></tr>
					   <tr><td>1 1/2 "ගල්</td><td><?php echo $one_and_half; ?></td> <td>ගල්කුඩු</td><td><?php echo $stone_cube;?></td></tr>
					  </table>
					  
					  </p>
					  </div>
					  </div>
                    
                   
					   <div class="form-row">
                      <div class='col-sm-6'> <p>20. ඔබ ගල් වෙළදාම් කරන කොන්ත්‍රාත්කරුවන්ගේ  නම් : <?php echo $contractna; ?></p></div>
					  </div>

                   <div class="form-row">
                      <div class='col-sm-6'> <p>21. වෙළදාම් කිරීම සදහා ප්‍රවාහනය කිරීමට ඔබේම වාහන තිබේද? : <?php echo$youvehical; ?></p></div>
					  </div>
					  
					  <div class="form-row">
                      <div class='col-sm-6'> <p> 22. ආදායම් බදු ගෙවන්නේද?(ගෙවන්නේනම් ලිපිගොනු අංකය) : <?php echo$tax,$taxfileno; ?></p></div>
					  </div>
					  
					<div class="form-row">
                      <div class='col-sm-12'> <p>23. බෝර පිපිරවීමට අවශ්‍ය වන්නේ ළිදක ගල කඩා ඉවත් කිරීමනම් : </p></div>
					  </div>
					  <div class="form-row">
					  <div class='col-sm-3'> <p>ළිදේ විෂ්කම්බය(මීටර්): <?php echo$welldia; ?> </p></div>
					  
					  
					  <div class='col-sm-3'> <p>දැනට හාරා ඇති ගැඹුර(මීටර්): <?php echo$welldepth ; ?></p></div>
					  <div class='col-sm-4'> <p>ජලය ලබාගැනීමට තව හෑරිය යුතු ගැඹුර(මීටර්): <?php echo$lastdepth; ?> </p></div>
					  </div>
                    
          
               <div class="form-row">
                      <div class='col-sm-12'> <p>25.බෝර පිපිරවීමට අවශ්‍ය වන්නේ ගෙපලක් කැපීමේදී අවහිර වන ගලක් නම් එම ගලේ විශාලත්වය : <?php echo $sizeofstone;?></p></div>
					  </div>
          
        <div class="form-row">
                      <div class='col-sm-6'> <p>ඉල්ලුම් පත්‍රයේ දිනය :  <?php echo$appdate; ?></p></div>
					  </div>

                    

					

                    <br><br>
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

</body>

</html>