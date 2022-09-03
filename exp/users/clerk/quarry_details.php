<?php
error_reporting(E_ALL);
include '../../include/config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (strlen($_SESSION['id']==0)) {
      header('<location:login/logout.php');
      } else{
      }
      $uid =  $_SESSION["id"] ;
	  $pid=$_GET['pid'];
	 // if (isset($_SESSION["last_aplicantid"])){
     // $apid =  $_SESSION["last_aplicantid"] ;}
	  
      $us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"];
$dis=strtolower($dis); 
  }
}
?>

<?php
if(isset($_POST['submit2']))
{ 
  $stname=$_POST['stname'];
  $last_quarrid = '';

  //table quarry
    $sttown=$_POST['sttown'];
    $stds=$_POST['stds'];
    $stpolice=$_POST['stpolice'];
    $stmrd=$_POST['stmrd'];
    $stw=$_POST['stw'];
    $sth=$_POST['sth'];
    $state=$_POST['state'];
    $state1=$_POST['state1'];
    $wemp=$_POST['wemp'];
    $bg=$_POST['bg'];
    $gp=$_POST['gp'];
    $bl=$_POST['bl'];
    $th=$_POST['thr'];
    $fv=$_POST['fiv'];
    $eg=$_POST['eig'];
    $tn=$_POST['ten'];
    $bstr=$_POST['bstr'];
    $bstrw=$_POST['bstrw'];
    $bstraa=$_POST['bstraa'];
    $bstrs=$_POST['bstrs'];
    $blwh=$_POST['blwh'];
    $blveh=$_POST['blveh'];
    $stcon=$_POST['stcon'];
    $lno=$_POST['lno'];
    $wel=$_POST['wel'];
    $welh=$_POST['welh'];
    $wtrl=$_POST['wtrl'];
    $hmbr=$_POST['hmbr'];
    //$perdate2=$_POST['perdate2'];
    $veh=$_POST['veh'];
    $tx=$_POST['tax'];
    $epf=$_POST['epf'];
	$apid1=$_POST['permid'];
   

    $sql="INSERT into quarry (quarryna,quarryvillage,quarryGND,quarrypolice,qyarryroad,starea,height,nature,drillmethod,totemp,borano,stexpno,
    fillerno,inch3,inch5,inch8,inch10,storelocation,storesize,storestatus,storesecurity,storekeeper,exptranport,contractna,
    taxfileno,welldia,welldepth,lastdepth,sizeofstone,epf,tax,youvehical,aplicant_id,district) 
    VALUES ('".$stname."','". $sttown."','". $stds."','". $stpolice."','".$stmrd."','".$stw."','". $sth."','". $state."','". $state1."','". $wemp."',
    '". $bg."','". $gp."','". $bl."','". $th."','". $fv."','". $eg."','". $tn."','". $bstr."','". $bstrw."','". $bstraa."','". $bstrs."',
    '". $blwh."','". $blveh."','". $stcon."','". $lno."','". $wel."','". $welh."','". $wtrl."','". $hmbr."','". $epf."','". $tx."','". $veh."','". $apid1."','". $dis."')";
    

    if ($conn->query($sql) === TRUE) {
      $last_quarrid = $conn->insert_id;
      
     }

     //table quarryexp
    foreach($_POST['th'] as $key => $th) {
      $fv = $_POST['fv'][$key];
      $eg = $_POST['eg'][$key];
      $tn = $_POST['tn'][$key];
      $dayc = $_POST['dayc'][$key];
      $monthc = $_POST['monthc'][$key];
      $smonth = $_POST['smonth'][$key];
      $eid = $_POST['eid'][$key];

$sql2="INSERT into quarryexp (inch3,inch5,inch8,inch10,expna,aplicant_id,quarryid,district) 
VALUES ('".$th."','". $fv."','". $eg."','". $tn."','". $eid."','". $apid1."','". $last_quarrid."','". $dis."')";
$insert = $conn->query($sql2);

  
}

$sqidp = "update permit set quarryid='$last_quarrid' WHERE aplicant_id='$apid'";
$insert = $conn->query($sqidp);

//table product
$sixfour=$_POST['sixfour'];
$sixn=$_POST['sixn'];
$two=$_POST['two'];
$onenhalf=$_POST['onenhalf'];
$one=$_POST['one'];
$threeq=$_POST['threeq'];
$half=$_POST['half'];
$stqb=$_POST['stqb'];


$sql3="INSERT into product (six_four,six_nine,two,one_and_half,one,three_quarter,half,stone_cube,aplicant_id,quarryid,district) 
VALUES ('".$sixfour."','". $sixn."','". $two."','". $onenhalf."','". $one."','". $threeq."','". $half."','". $stqb."','". $apid1."','". $last_quarrid."','". $dis."')";
$insert = $conn->query($sql3);

if($insert)
{
//echo "<script>alert('ගල් වළේ විස්තර සම්පූර්ණයි! දැන් අවසර පත්‍ර විස්තර පුරවන්න.');</script>";
//echo '<script type="text/javascript">location.href = "permit.php";</script>';
echo '<script type="text/javascript">location.href = "view_table.php?s=2";</script>';
}
}

    //$queryr = $conn->query("SELECT * from permit WHERE aplicant_id=$apid");
    //if($queryr !== false && $queryr->num_rows > 0){
   // while($row=$queryr->fetch_assoc()){
   // $quarryad=$row["quarryad"];
   // $gnd=$row["gnd"];
   // $police2=$row["police"];
   // }
  //}



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
		 <div class="card-header py-3 d-flex flex-row align-items-center">
				
                </div>
		</div>
		
		<!--<div class="card mb-4">
  <br><center><h6 class="m-0 font-weight-bold text-primary">පෙර අයදුම්කරුවන්ගේ විස්තර පරීක්ෂා කරන්න</h6></center><br>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
<div class="form-group row">

<div class="col-sm-2"> 
</div>
&ensp;&ensp;&ensp;<label for="inputPassword3" class="col-sm-2 col-form-label">ජා.හැ.අංකය :</label> 
<div class="col-sm-4"> 
 <input type="text" class="form-control" name="P" placeholder="Search" required="required" oninvalid="this.setCustomValidity('කරුණාකර නිවැරදි ජා.හැ.අංකය ඇතුලත් කරන්න')" pattern="[0-9]{9}[vV]{1}|[0-9]{12}"oninput="setCustomValidity('')"  /> <br/>
</div>
<div class="col-sm-3">
   <input type="submit" value="Check" name="submitButton" class="btn btn-success" />
</div></div>
</form>
</div>-->
    <!-- Horizontal Form -->
              <div class="card mb-4">
			
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				
                  <h4 class="m-0 font-weight-bold text-primary">ගල් වලේ විස්තර</h4>
                </div>
                <div class="card-body"><code><span style="color:red">*</span> අනිවාර්යයෙන් පිරවිය යුතුයි!</code>

<?php
//$queryr = $conn->query("SELECT * from applicant WHERE id	=$apid");
if(isset($_GET["P"])) {
	$apid=$_GET["P"];
}

$queryp = $conn->query("SELECT * from permit WHERE perid = '$pid' limit 1");
if($queryp !== false && $queryp->num_rows > 0){
while($row1=$queryp->fetch_assoc()){
//$permitid=$row1["perid"];
$quarryad=$row1["quarryad"];
    $gnd=$row1["gnd"];
   $police2=$row1["police"];
}
}

$queryr = $conn->query("SELECT * from applicant WHERE nic = '$apid' limit 1");
if($queryr !== false && $queryr->num_rows > 0){
while($row=$queryr->fetch_assoc()){
$name=$row["fullname"];
$add=$row["addres"];
$police=$row["police"];

                    echo"   <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>01.අයදුම් කරුගේ නම:</label>
                    <div class='col-sm-9'>
                    <label for='inputEmail3' class='col-sm-9 col-form-label'> $name</label>
                    </div>
                  </div>
                  
                  <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>02.අයදුම් කරුගේ ලිපිනය:</label>
                    <div class='col-sm-9'>
                    <label for='inputEmail3' class='col-sm-9 col-form-label'> $add</label>
                    </div>
                  </div>

                  <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>03.පදිංචි නිවසට ළගම පොලිස් ස්ථානය:</label>
                    <div class='col-sm-9'>
                    <label for='inputEmail3' class='col-sm-9 col-form-label'> $police</label>
                    </div>
                  </div>";
}
}
$queryp = $conn->query("SELECT * from quarry WHERE aplicant_id = '$pid'");
if($queryp !== false && $queryp->num_rows > 0){
while($row1=$queryp->fetch_assoc()){
//$permitid=$row1["perid"];
$quarryna=$row1["quarryna"];
    //$gnd=$row1["gnd"];
   //$police2=$row1["police"];
}
}
?> 
                <form action="" name="quarry" method="post" class="signin-form" enctype="multipart/form-data"> 
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"> 04. ගල්වලේ නම: <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="stname" value="<?php echo $quarryna?>" placeholder="ගල්වලේ නම" required="required" oninvalid="this.setCustomValidity('කරුණාකර ගල්වලේ නම ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                      </div>

                      <label for="inputPassword3" class="col-sm-3 col-form-label"> 05.  ගල්වල පිහිටි ගමේ නම:</label>
                      <div class="col-sm-3">
                      <label for="inputPassword3" > <?php echo $quarryad; ?></label>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">06.ගල් වල පිහිටි ග්‍රාම සේවා කොට්ඨාශය:</label>
                      <div class="col-sm-3">
                      <label for="inputPassword3" > <?php 
					 //$gnd; 
					  //$dis;
					  $sqlgn="SELECT * from $dis  WHERE gncode = '$gnd'";
					  $querygn = $conn->query($sqlgn);
						if($querygn !== false && $querygn->num_rows > 0){
						while($row2=$querygn->fetch_assoc()){
						//$permitid=$row1["perid"];
						//$quarryad=$row1["quarryad"];
							$gnd=$row2["gnname"];
						   //$police2=$row1["police"];
						}
						}
					  echo $gnd;
					  ?></label>
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">07. ගල්වලට ළගම පිහිටි පොලිස් ස්ථානයේ නම:</label>
                      <div class="col-sm-3">
                      <label for="inputPassword3" > <?php echo $police2; ?></label>
                      </div>
                    </div>
					       
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">08.ගල්වලට ළගම පිහිටි ප්‍රධාන පාරේ නම : <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="stmrd" placeholder="ප්‍රධාන පාරේ නම" required="required" oninvalid="this.setCustomValidity('කරුණාකර ප්‍රධාන පාරේ නම ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">09. මතුපිට ගලේ ප්‍රමාණය අක්කර වලින්:</label>
                      <div class="col-sm-3">
                        <input type="number" class="form-control" name="stw" placeholder="අක්කර">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"> 10. මතුපිට ගලේ උස අඩි වලින්:</label>
                      <div class="col-sm-1">
                        <input type="number" class="form-control" name="sth" placeholder="අඩි">
                      </div>
                   
                    <label for="select2SinglePlaceholder" class="col-sm-2 col-form-label">11. ගලේ ස්වබාවය:</label>
				        	 <div class="col-sm-2">
                    <select class="form-control" name="state" id="state">
                      <option value="">තෝරන්න</option>
                      <option value="තද ගල">තද ගල</option>
                      <option value="සුදු ගල">සුදු ගල</option>  
                      <option value="වැලි ගල">වැලි ගල</option>
                      <option value="මිශ්‍ර ගල">මිශ්‍ර ගල</option>                    
                    </select>
					</div>
					<label for="inputPassword3" class="col-sm-2 col-form-label">12. ක්‍රියා කරන ආකාරය</label>
					 <div class="col-sm-2">
           <select class="form-control" name="state1" id="state1">
                      <option value="">තෝරන්න</option>
                      <option value="අත් මගින්">අත් මගින්</option>
                      <option value="‍යන්ත්‍ර මගින්">‍යන්ත්‍ර මගින්</option>  
                                         
                    </select>
					</div>
                  </div>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">13. සේවක සංඛ්‍යාව:</label>
                   
                      <div class="col-sm-3">
                        <input type="number" class="form-control" name="wemp" placeholder="මුලු සේවක සංඛ්‍යාව">
                      </div>
					 
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="bg" placeholder=" බෝර ගසන්නන් ">
                      </div>
                    
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="gp" placeholder="ගල් පුපුරවන්නන්">
                      </div>
					  
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="bl" placeholder="පුපුරවන්නන් ">
                      </div>
                    </div>
				
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">14. සේවකයන්ට අර්ථසාධක අරමුදල් ගෙවන්නේද?:</label>
                    
                    <div class="form-check form-check-inline">
                  &emsp;<p class="form-control"><input type="radio" id="yes" name="epf" value="ඔව්">ඔව්</p>
                    </div>
                    <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="no" name="epf" value="නැත"> නැත</p>
				          	</div>
					          </div>
                 
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">15. දිනකට විදින වලවල් ගණන ගැඹුර අනුව </label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="thr" placeholder="3'">
                      </div>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="fiv" placeholder="5'">
                      </div>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="eig" placeholder="8'">
                      </div>
                      <div class="col-sm-3">
                        <input type="number" class="form-control" name="ten" placeholder="10'">
                      </div>
                    </div>
			
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label"> 16. පාවිච්චි කරන පුපුරන ද්‍රව්‍ය ප්‍රමාණය:</label>
                    </div>

                     <?php
                     $querya = $conn->query("SELECT * from expitem");
                     if($querya !== false && $querya->num_rows > 0){
                     while($row=$querya->fetch_assoc()){
                     $expname=$row["expname"];
                     $id=$row["id"];
                     echo '<input type="hidden" name="eid[]" id="eid" value="'.$expname.'">';
                     echo " <div class='form-group row'>
                      <label for='inputPassword3' class='col-sm-3 col-form-label'>$expname</label>
                      <div class='col-sm-2'>
                        <input type='text' class='form-control' name='th[]' placeholder='3 inches' >
                      </div>
                      <div class='col-sm-2'>
                        <input type='text' class='form-control' name='fv[]' placeholder=  '5 inches' >
                      </div>
                      <div class='col-sm-2'>
                        <input type='text' class='form-control' name='eg[]' placeholder= '8 inches'  >
                      </div>
                      <div class='col-sm-2'>
                        <input type='text' class='form-control' name='tn[]' placeholder= '10 inches'>
                      </div>
                      
                    </div>";
                     }
                    }
                    ?>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label"> 17.ගබඩාවේ විස්තර(ගොඩනැගිලි තත්වය,පිහිටීම,ආරක්ෂාව):</label>
                      
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(1) පුපුරන ද්‍රව්‍ය ගබඩාවේ පිහිටීම: <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="bstr" placeholder="ගබඩාවේ පිහිටීම" required="required" oninvalid="this.setCustomValidity('කරුණාකර ගබඩාවේ පිහිටීම ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                      </div>
                    
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(2)  පුපුරන ද්‍රව්‍ය ගබඩාවේ ප්‍රමාණය(අඩි): <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="bstrw" placeholder="උස x දිග x පළල" required="required" oninvalid="this.setCustomValidity('කරුණාකර උස,දිග,පළල ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(3)  පුපුරන ද්‍රව්‍ය ගබඩාවේ තත්වය: <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                      <select class="form-control" name="bstraa" id="bstraa"required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="කොන්ක්‍රීට්">කොන්ක්‍රීට්</option>
                      <option value="ගඩොල්">ගඩොල්</option>  
                      <option value="බ්ලොක් ගල්">බ්ලොක් ගල්</option>                   
                    </select>
                      </div>
      
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(4)  පුපුරන ද්‍රව්‍ය ගබඩාවේ ආරක්ෂාව: <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="bstrs" placeholder=" ගබඩාවේ ආරක්ෂාව" required="required" oninvalid="this.setCustomValidity('කරුණාකර ගබඩාවේ ආරක්ෂාව ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"> 18.පුපුරන ද්‍රව්‍ය තබාගන්නේ කාගේ බාරයේද?: <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="blwh" placeholder=" කාගේ බාරයේද?" required="required" oninvalid="this.setCustomValidity('කරුණාකර කාගේ බාරයේ තබාගන්නේද යන වග සදහන් කරන්න')"oninput="setCustomValidity('')">
                      </div>
     
                      <label for="inputEmail3" class="col-sm-3 col-form-label">  19.සපයන්නාගෙන් පුපුරන ද්‍රව්‍ය ප්‍රවාහනය කරන ආකාරය: <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="blveh" placeholder="  ප්‍රවාහනය කරන ආකාරය" required="required" oninvalid="this.setCustomValidity('කරුණාකර ප්‍රවාහනය කරන ආකාරය සදහන් කරන්න')"oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-9 col-form-label"> 20.පසුගිය වර්ෂයේ නිෂ්පාදනය කළ ප්‍රමාණය:</label>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-3">
                      <input type="text" class="form-control" name="sixfour" placeholder="  6x4 ගල් කියුබ් ">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="sixn" placeholder=" 6x9 ගල් " >
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="two" placeholder="  2 පාර ගල් ">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="onenhalf" placeholder=" 1 1/2 ගල් " >
                      </div>
                    
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="one" placeholder="  1 ගල්  ">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="threeq" placeholder=" 3/4 ගල් " >
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="half" placeholder="  1/2 ගල් ">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="stqb" placeholder=" ගල් කුඩු කියුබ්" >
                      </div>
                    
                    </div>


                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">  21.ඔබ ගල් වෙළදාම් කරන කොන්ත්‍රාත්කරුවෙක් නම්:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="stcon" placeholder=" ඔබ ගල් වෙළදාම් කරන කොන්ත්‍රාත්කරුවෙක් නම්">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label"> 22.වෙළදාම් කිරීම සදහා ප්‍රවාහනය කිරීමට ඔබේම වාහන තිබේද?:</label>
                      <div class="form-check form-check-inline">
                     <p class="form-control"><input type="radio" id="yes" name="veh" value="ඔව්">ඔව්</p>
                    </div>
                    <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="no" name="veh" value="නැත"> නැත</p>
				          	</div>
					          
					</div>
          
               <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">  23.ආදායම් බදු ගෙවන්නේද?(ගෙවන්නේනම් ලිපිගොනු අංකය):</label>
                      <div class="form-check form-check-inline">
                     <p class="form-control"><input type="radio" id="yes" name="tax" value="ඔව්">ඔව්</p>
                    </div>
                    <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="no" name="tax" value="නැත"> නැත</p>
				          	</div>


                   <div class="col-sm-6">
                        <input type="text" class="form-control" name="lno" placeholder=" ලිපිගොනු අංකය">
                      </div>
					</div>
          
          <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-9 col-form-label"> 24.බෝර පිපිරවීමට අවශ්‍ය වන්නේ ළිදක ගල කඩා ඉවත් කිරීමනම්:</label>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="wel" placeholder=" ළිදේ විෂ්කම්බය (මීටර්)">
                      </div>
                    

                   
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="welh" placeholder=" දැනට හාරා අති ගැඹුර (මීටර්)">
                      </div>
                   

                  
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="wtrl" placeholder=" ජලය ලබාගැනීමට නම් තව හැරිය යුතු ගැඹුර (මීටර්)">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">25.බෝර පිපිරවීමට අවශ්‍ය වන්නේ ගෙපලක් කැපීමේදී අවහිර වන ගලක් නම් එම ගලේ විශාලත්වය:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="hmbr"  placeholder="ගලේ විශාලත්වය">
                      </div>
                    </div>

					<!--<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">ඉල්ලුම් පත්‍රයේ දිනය <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control" name="perdate2" placeholder="දිනය" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
                      </div>
                    </div>-->
					<input type="hidden" name="permid" value="<?php echo $pid; ?>">
                    <br><br>
                    <div class="form-group row">
					<div class="col-sm-5"></div>
                      <div class="col-sm-5">
                      <input type="submit" name="submit2" value="Submit" class="btn btn-primary" onClick="return confirm('ඔබට මෙම පෝරමය ඉදිරිපත් කිරීමට අවශ්‍යද ?')">
						<input type="reset" value="Reset" class="btn btn-outline-secondary" onClick="return confirm('ඔබට මෙම පෝරමය යළි පිහිටුවීමට අවශ්‍යද ?')">
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