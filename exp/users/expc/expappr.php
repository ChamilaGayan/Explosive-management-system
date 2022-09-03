<?php
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$uid =  $_SESSION["id"] ; 
$id1 = $_GET['id'];
$pid = $_GET['pid'];
$date = date('Y-m-d'); 
if(isset($_POST['submit']))
  { 
  
 foreach($_POST['auqty'] as $key => $auqty) {
  $exp = $_POST['exid'][$key];
  $sql55 = "update explosive set authqty='$auqty' WHERE expid='$exp'";
  $insert = $conn->query($sql55);
  }
  
  $num=$_POST['num'];
  $price=$_POST['price'];
  $prtime=$_POST['prtime'];
  $str=$_POST['str'];
  $perdu=$_POST['perdu'];
  $qt=$_POST['qt'];
  $actperid=$_POST['actpid'];
  
    $sq5 = "update permit set expno='$num',price='$price',isread_exp='1',expOffApprove='1',stat='GA',permitdu='$prtime',pstore='$str',Premiums='$perdu',qtpremiums='$qt',expapp_date='$date' WHERE perid='$actperid'";
    $insert = $conn->query($sq5);

  if($insert)
  {
    echo "<script>alert('අනුමත කිරීම සම්පූර්ණයි!');</script>";
    echo '<script type="text/javascript">location.href = "index.php";</script>';
  }
}

if(isset($_POST['submit2']))
{
    $rej = "update permit set expOffApprove='2',gaApprove='2',ministryApprove='2' WHERE perid='$actperid'";
    $insert = $conn->query($rej);
    
  if($insert)
  {
    echo "<script>alert('ප්‍රතික්ෂේප කිරීම සම්පූර්ණයි!');</script>";
    echo '<script type="text/javascript">location.href = "index.php";</script>';
  }
}

$quser = $conn->query("SELECT * from users  WHERE id = $uid ");
if($quser !== false && $quser->num_rows > 0){
while($row=$quser->fetch_assoc()){
$dis=$row["district"];
}
} 

$a = $conn->query("SELECT * from permit WHERE perid = $pid");
if($a !== false && $a->num_rows > 0){
while($row=$a->fetch_assoc()){
  
$pstore=$row['pstore'];
$ntime=$row['permitdu'];
$Premiums=$row['Premiums'];
$quarryad=$row['quarryad'];
$task=$row['task'];
$expno=$row['expno'];
}
}

/*$q1 = $conn->query("SELECT * from divreport WHERE perid = $pid");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$pdate=$row['pdate'];
$edt1=$row['edate'];
}
}*/

$q2 = $conn->query("SELECT * from policereport WHERE perid = $pid");
if($q2 !== false && $q2->num_rows > 0){
while($row=$q2->fetch_assoc()){

$polst=$row['polst'];
if ($polst<>""){
$pdate2=$row['pdate'];
$edt2=$row['edate'];
}
}
}else{
$polst="";	
}

$q3 = $conn->query("SELECT * from excavate_permit WHERE perid = $pid");
if($q3 !== false && $q3->num_rows > 0){
while($row=$q3->fetch_assoc()){

$pdate3=$row['pdate'];
$lotno=$row['lotno'];
$deedno=$row['deedno'];
$lndname=$row['lndname'];
$gsd=$row['gsd'];
$north=$row['north'];
$east=$row['east'];
$edt3=$row['edate'];
$permitno=$row['permitno'];
}
}else{
	
}

/*$q4 = $conn->query("SELECT * from envpermit WHERE perid = $pid");
if($q4 !== false && $q4->num_rows > 0){
while($row=$q4->fetch_assoc()){

$pdate4=$row['pdate'];
$edt4=$row['edate'];
}
}*/

/*$q5 = $conn->query("SELECT * from merchantpermit WHERE perid = $pid");
if($q5 !== false && $q5->num_rows > 0){
while($row=$q5->fetch_assoc()){

$pdate5=$row['pdate'];
$edt5=$row['edate'];
}
}*/

$queryr = $conn->query("SELECT * from applicant WHERE id=$id1");
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
  <title>Explosive Approve Page</title>
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
        <form action="" name="exappr" method="post" class="signin-form" enctype="multipart/form-data"> 
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>
          <div class="text-center">
   
              </div>

              <div class="card mb-4">
			
             <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            
     <h4 class="m-0 font-weight-bold text-secondary"> 12 "ආ" ආකෘතිය </h4>
      </div>
      <div class="card-body">

              <div class="form-group row">
                      <!--<label for="inputEmail3" class="col-sm-1 col-form-label"> මගේ අංකය : </label>-->
                      <div class="col-sm-3">
					   මගේ අංකය : <?php echo $expno; ?>
                     <!-- <input type="text" class="form-control" name="num">-->
                      </div>
                    </div>
				<div class="form-row">
				  <div class="col-md-12">දිස්ත්‍රික් ලේකම් කාර්‍යාලය :  <?php echo $dis; ?></div>
				  </div>
                   <div class="form-row">
				  <div class="col-md-12">දිනය: <?php echo $date; ?></div>
				  </div>
					<div class="form-row">
				  <div class="col-md-12">දිස්ත්‍රික් ලේකම්/දිසාපති: <?php echo $dis; ?></div>
				  </div>
                  

                    

    <?php
     if($task == 'ව්‍යාපාරික')
     {
                $title=" පුපුරන ද්‍රව්‍ය පාලක සහ ආරක්ෂක අමාත්‍යාංශයේ ලේකම්ගේ පූර්ව අනුමැතියට යටත්ව පුපුරන ද්‍රව්‍ය අවසරපත්‍රය නිකුත් කිරීම"; 
     }
     else
     {
      $title=" පුපුරන ද්‍රව්‍ය පාලක සහ ආරක්ෂක අමාත්‍යාංශයේ ලේකම්ගේ ආවරණ අනුමැතියට යටත්ව පුපුරන ද්‍රව්‍ය අවසරපත්‍රය නිකුත් කිරීම"; 
    }
     ?> 
	 
				<div class="form-row">
				  <div class="col-md-12"> <h4><u><?php echo $title; ?></u></h4></div>
				  </div>

                    <div class="form-row">
				  <div class="col-md-4"><p>01: නම: <?php echo $name; ?></p></div>
				  </div>
				  
                 <div class="form-row">
				  <div class="col-md-4"><p>02: ලිපිනය: <?php echo $add; ?></p></div>
				  </div>
				   <div class="form-row">
				  <div class="col-md-4"><p>03: ජා.හැ.අංකය: <?php echo $nic; ?></p></div>
				  <div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">උක්ත අයදුම්කරුගේ අයදුම්පත්‍රයේ සදහන් කරුණු සලකා බලා පහත සදහන් පුපුරන ද්‍රව්‍ය පාලක සහ ආරක්ෂක අමාත්‍යාංශයේ ලේකම්ගේ අනුමැතියට යටත්ව පුපුරන ද්‍රව්‍ය අවසරපත්‍රය නිකුත් කිරීම නිර්දේශ කරමි.</label>
                    </div>



                    <div class="card">
                     
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය</th>
                             <th><center>අයදුම්කරු මසකට  ඉල්ලුම් කළ ප්‍රමාණය</center></th>
                             <th><center>වාරිකයක් සඳහා නිර්දේශ කරන ප්‍රමාණය</center></th>
                          
                            
                           </tr>
                         </thead>













<div class='form-group row'>
<?php
          $qbc = $conn->query("SELECT * from explosive WHERE perid=$pid");
          if($qbc !== false && $qbc->num_rows > 0){
          while($row=$qbc->fetch_assoc()){
          $expname=$row["expname"];
          $reqty=$row["reqty"];
          $expid=$row["expid"];
         
          echo '<input type="hidden" name="exid[]" id="exid" value="'.$expid.'">';
	      	
                       
                      echo " <tbody>
     
                      <tr>
                         <td> $expname</td>
                         <td><center> $reqty</center></td>
                         <td> <center><input type='text' class='col-sm-10 col-form-label' name='auqty[]' placeholder='නිර්දේශ කරන ප්‍රමාණය' >
                         </center></td>
                        
                        
                       </tr>
                      
                     </tbody>";
                  
                  }
                  }
                  ?>
                  </table>
                  </div>
                  </div>
<br>
                   <!-- <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">04: ප්‍රාදේශීය ලේකම්ගේ නිර්දේශය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> //$edt1</label>"; ?>
                      </div>
                    </div>-->
					<div class="form-row">
				  <div class="col-md-12">05: පොලිස් නිර්දේශය අවලංගු වන දිනය : <?php 
				  if ($polst<>""){
				  echo $edt2;
				  }else{?>
				  <span style="color:red"><b>
					<?php echo "පොලිස් නිර්දේශය  ඇතුලත් කර නොමැත.";
				  }
				  
				  ?></b></span></div>
				  </div>
                   
				<div class="form-row">
				  <div class="col-md-12">06: කැණීම් බලපත්‍රය අවලංගු වන දිනය : <?php 
				  if ($permitno<>""){
				  echo $edt3;
				  }else{?>
				  <span style="color:red"><b>
					<?php echo "කැණීම් බලපත්‍රය  ඇතුලත් කර නොමැත.";
				  }
				  
				  ?></b></span></div>
				  </div>
                    
<!--
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">07: පාරිසරික ආරක්ෂණ බලපත්‍රය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> //$edt4</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">08: වෙළද බලපත්‍රය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>//$edt5</label>"; ?>
                      </div>
                    </div>-->

                    <div class="form-group row">
                      <label for="prtime" class="col-sm-2 col-form-label">09: වලංගු කාලය: මාස </label>
                      <div class="col-sm-9">
                      <input type="text" class="col-sm-2 form-control" name="prtime" value=" <?php echo "$ntime"; ?>">
                      
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">10: නිකුත් කිරීම:</label>
                      <div class="col-sm-2">
                      <?php echo "<label for='inputEmail3' > $Premiums</label>"; ?>
                      </div>

                      <div class="col-sm-2">
                      <select class="form-control" name="perdu" id="perdu" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="සති 1">සති 1</option>
                      <option value="සති 2">සති 2</option> 
						          <option value="සති 3">සති 3</option>
                      <option value="සති 4">සති 4</option>
                      <option value="අවශ්‍යතාවය අනුව">අවශ්‍යතාවය අනුව</option>
                    </select>
                    </div>
                    <input type="text" class="col-sm-2 form-control" name="qt" placeholder=" වාරික ගණන">
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">11: අවසරපත්‍ර ගාස්‍තුව (රු.):</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="price" >
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      &ensp;&nbsp; 12. <?php echo " <label for='inputEmail3'>  <u> $task</u></label> "; ?> &ensp;කැණීම් කිරීම සදහා පමණක් අදාල පුපුරන ද්‍රව්‍ය බාවිතා කල යුතුය:</label>
                     
                    </div>
					
					<div class="form-row">
				  <div class="col-md-12"><p>13: භාවිතා කරන ස්ථානය: <?php echo $lndname ." , ". $gsd . ",  ඛණ්ඩාංක උතුරු- "  . $north ." ,  නැගෙනහිර- "  .$east; ?></p></div>
				  </div>
                    
             
                    <div class="form-group row">
                     &nbsp;&ensp;14: මෙම පුපුරන ද්‍රව්‍ය ගබඩා කිරීමට අදහස් කරන ස්ථානය  &nbsp;&ensp;<input type="text" class="col-sm-6 form-control"  name="str" value=" <?php echo " $pstore"; ?>"> &ensp; 
                    </div>
                    </div>
					<input type="hidden" name ="actpid" value="<?php echo $pid; ?>">
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label"></label>
                      <div class="col-sm-3">
                      <input type="submit" name="submit" value="Approve" style="width:140px" class="btn btn-success" onClick="return confirm('ඔබට මෙම අවසරපත්‍රය අනුමත කිරීමට අවශ්‍යද ?')">
                      </div>
                    </div>
                      </form>


<form action="" name="reject" method="post" class="signin-form" enctype="multipart/form-data"> 

<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label"></label>
                      <div class="col-sm-3">
                      <input type="submit" name="submit2" value="Reject" style="width:140px" class="btn btn-danger" onClick="return confirm('ඔබට මෙම අවසරපත්‍රය ප්‍රතික්ෂේප කිරීමට අවශ්‍යද ?')">
                      </div>
                    </div>
 
</form>


          </div>  
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