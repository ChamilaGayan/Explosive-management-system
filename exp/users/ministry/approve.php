<?php
require_once('../../include/config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$uid =  $_SESSION["id"] ;  

$id = $_GET['id'];
 
if(isset($_POST['submit']))
{ 

    $sq5 = "update permit set gaApprove='5',ministryApprove='1',stat='Approved' WHERE aplicant_id='$id'";
    $insert = $conn->query($sq5);
    
  if($insert)
  {
    echo "<script>alert('අනුමත කිරීම සම්පූර්ණයි!');</script>";
    echo '<script type="text/javascript">location.href = "index.php";</script>';
  }
}
if(isset($_POST['submit2']))
{ 
    $rej = "update permit set ministryApprove='2',gaApprove='5' WHERE aplicant_id='$id'";
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



$a = $conn->query("SELECT * from permit WHERE aplicant_id = $id");
if($a !== false && $a->num_rows > 0){
while($row=$a->fetch_assoc()){

$pstore=$row['pstore'];
$ntime=$row['permitdu'];
$Premiums=$row['Premiums'];
$quarryad=$row['quarryad'];
$expno=$row['expno'];
$task=$row['task'];
$qtpremiums=$row['qtpremiums'];


$oldreq_no=$row['oldreq_no'];
$rules=$row['rules'];
$other_facts=$row['other_facts'];
$c_approval_no=$row['c_approval_no'];
$c_approval_date=$row['c_approval_date'];

$oldreq=$row['oldrequest'];
$pls=$row['police_approve'];
$old_copies=$row['old_coppies'];
$my_stat=$row['my_stat'];


}
}

$q1 = $conn->query("SELECT * from divreport WHERE aplicant_id = $id");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

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
$pdate3=$row['pdate'];
$maxqty=$row['maxqty'];
$edt3=$row['edate'];
$lndname=$row['lndname'];
$gsd=$row['gsd'];
$north=$row['north'];
$east=$row['east'];
}
}

$q4 = $conn->query("SELECT * from envpermit WHERE aplicant_id = $id");
if($q4 !== false && $q4->num_rows > 0){
while($row=$q4->fetch_assoc()){

$pdate4=$row['pdate'];


$edt4=$row['edate'];
}
}

$q5 = $conn->query("SELECT * from merchantpermit WHERE aplicant_id = $id");
if($q5 !== false && $q5->num_rows > 0){
while($row=$q5->fetch_assoc()){

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
$disignation=$row["disignation"];
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
  <title>Ministry Approve</title>
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
            
             <h4 class="m-0 font-weight-bold text-secondary"> 4 ආකෘතිය </h4>
      </div>
      <div class="card-body">

              <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"> මගේ අංකය :</label>
                      <div class="col-sm-3">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $expno</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">දිස්ත්‍රික් ලේකම් කාර්‍යාලය :</label>
                      <div class="col-sm-9">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $dis</label>"; ?>
                      </div>
                    </div>
 
                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">දිනය:</label>
                      <div class="col-sm-9">
                      <label for='inputEmail3' class='col-sm-9 col-form-label'><span id="datetime"></span><script>var dt = new Date();
                      document.getElementById("datetime").innerHTML=dt.toLocaleString();</script> </label>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">පුපුරන ද්‍රව්‍ය පාලක හා ආරක්ෂක ලේකම්, කොළඹ 03</label>
                      
                    </div>
                    <br><br>
                    <?php  
     if($task == 'ව්‍යාපාරික')
     {
       echo "<center><u><h6 class='m-0 font-weight-bold text-secondary'> පුපුරන ද්‍රව්‍ය අවසරපත්‍ර පූර්ව අනුමැතිය</h6></u></center>"; 
     }
     else
     {
      echo "<center><u><h6 class='m-0 font-weight-bold text-secondary'> පුපුරන ද්‍රව්‍ය අවසරපත්‍ර ආවරණ අනුමැතිය</h6></u></center>"; 
    }
     ?>


                    <br><br>
                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-12 col-form-label">පුපුරන ද්‍රව්‍ය සම්බන්ධයෙන් මා වෙත ලැබී ඇති අයදුම් පත්‍රයේ විස්තර ඔබගේ අනුමැතිය සදහා ඉදිරිපත් කරමි</label>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">01(I)(i): අයදුම්කරුගේ නම:</label>
                      <div class="col-sm-9">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $name</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(ii): ලිපිනය:</label>
                      <div class="col-sm-9">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $add</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(iii): රැකියාව:</label>
                      <div class="col-sm-9">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $disignation</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">(iv): ජා.හැ.අංකය:</label>
                      <div class="col-sm-9">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $nic</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">(II)  -ප්‍රාදේශීය ලේකම්ගේ නිර්දේශය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $edt1</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">-පොලිස් නිර්දේශය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $edt2</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">-කැණීම් බලපත්‍රය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $edt3</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">-පාරිසරික ආරක්ෂණ බලපත්‍රය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $edt4</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">-වෙළද බලපත්‍රය අවලංගු වන දිනය :</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$edt5</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                    <label for="inputPassword3" class="col-sm-7 ">(III)(අ): මීට කලින් අයදුම්කරු විසින් අයදුම්පත් ඉදිරිපත් කරනු ලැබ තිබේද?</label>
                    <?php echo "<label for='inputEmail3' >$oldreq </label>"; ?> 
				          	</div>



                    
                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-5">ඉදිරිපත් කර ඇතිනම් ලිපිගොනුවේ යොමු අංකය:</label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3'> $oldreq_no </label>"; ?> 
                      </div>
                    </div>

                   
                      
                     
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය වර්ගය</th>
                             <th>ඉතිරිවී ඇති ප්‍රමාණය</th>
                            
                          
                            
                           </tr>
                         </thead>

                      <?php
                      $old = $conn->query("SELECT * from oldpermit  WHERE aplicant_id = $id ");
                      if($old !== false && $old->num_rows > 0){
                      while($row=$old->fetch_assoc()){
                      $remqty=$row["remqty"];
                      $expname2=$row["expname"];
                      echo " <tbody>
     
                      <tr>
                        <td> $expname2</a></td>
                        <td> $remqty</a></td>
                       
                       
                       
                      </tr>
                     
                    </tbody>";
                                   
                      }
                    }
                      ?>
                      </table>


                     
                    </div>
<br>
                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-4">(ඇ): වර්තමාන අයදුම්පත් කාර්යය:</label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3' > $task </label>"; ?>
                      </div>
                    </div>


                   
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය වර්ගය</th>
                             <th><center>අයදුම් කළ ප්‍රමාණය</center></th>
                             <th><center>සහකාර පුපුරන ද්‍රව්‍ය පාලක විසින් නිර්දේශ කළ ප්‍රමාණය</center></th>
                             <th><center>බලපත්‍ර අධිකාරිය විසින් නිර්දේශ කරන ප්‍රමාණය</center></th>
                          
                            
                           </tr>
                         </thead>

<?php
          $qbc = $conn->query("SELECT * from explosive WHERE aplicant_id=$id");
          if($qbc !== false && $qbc->num_rows > 0){
          while($row=$qbc->fetch_assoc()){
          $expname=$row["expname"];
          $reqty=$row["reqty"];
          $authqty=$row["authqty"];
          $gaauthqty=$row["ga_authqty"];
          $expid=$row["expid"];
          echo '<input type="hidden" name="exid[]" id="exid" value="'.$expid.'">';
			
                      
					echo " <tbody>
     
     <tr>
       <td> $expname</a></td>
       <td><center> $reqty</center></td>
       <td><center> $authqty</center></td>
       <td><center>$gaauthqty</center></td>
      
      
     </tr>
    
   </tbody>";



}
}
?>
</table>
</div>



                    <br>
                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputPassword3" class="col-sm-5">02: පොලිසිය විසින් නිර්දේශ කරනු ලැබ තිබේද?:</label>
                      <?php echo "<label for='inputEmail3' >$pls </label>"; ?> 
					</div>
                 
                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-7 ">03: පුපුරන ද්‍රව්‍ය ගබඩා කරන ආකාරය සහ ඒවා ගබඩා කරන ස්ථානය:</label>
                      <div class="col-sm-5">
                      <?php echo "<label for='inputEmail3'> $pstore</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">04:පුපුරන ද්‍රව්‍ය පාවිච්චි කරන ස්ථාන කිහිපයක්නම් එහි ලිපිනය:</label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $lndname ,  $gsd , ඛණ්ඩාංක උතුරු-$north ,  නැගෙනහිර-$east  </label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputPassword3" class="col-sm-9 ">05: අයදුම් පත්‍රය දැනට තිබෙන අවසරපත්‍රයක් අලුත් කරගැනීමට නම් අයදුම්පත්‍රය සමග අවලංගු වූ අවසරපත්‍රයේ මුල් පිටපත හෝ දැනට වලංගුව පවතින අවසරපත්‍රයේ ඡායාපිටපත්(සත්‍ය පිටපතක් බව සහකාර පුපුරන ද්‍රව්‍ය පාලක විසින් සහතික කළ තිබිය යුතුය) යා කොට එවා:</label>
                      <?php echo "<label for='inputEmail3' >$old_copies </label>"; ?> 
			          		</div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-4">06: අවසරපත්‍රය වලංගු වන කාලය (මාස): </label>
                      <div class="col-sm-7">
                      <?php echo "<label for='inputEmail3'>$ntime </label>"; ?>
                      </div>
                    </div>
             
                    <div class="form-group row py-sm-1 mb-0">
                    <label for="inputPassword3" class="col-sm-9">07: මා විසින් නිර්දේශිත 01 - (IV) කොටසින් සදහන් කර ප්‍රමාණයන් නිකුත් කරනු ලබන්නේ සමාන කොටස් වශයෙන්ද?</label>
                    
                    <?php echo "<label for='inputEmail3' >$my_stat </label>"; ?> 

				          	</div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">08: කොටස් වශයෙන් ලබා ගැනීමටනම් එම කොටස් වාර ගණන:</label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $qtpremiums</label>"; ?> 
                      </div>
                    </div> 

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">09: අවසරපත්‍රයේ ඇතුළත් කළ යුතු යම් කොන්දේසි ඇත්නම් ඒවා සදහන් කරන්න:</label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'>$rules </label>"; ?> 
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">10: අයදුම්කරු විසින් ඉල්ලා ඇති පුපුරන ද්‍රව්‍ය වලින් මාසිකව නිෂ්පාදනය කිරීමට බලාපොරොත්තු වන ගල් කියුබ් ප්‍රමාණය:</label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $maxqty</label>"; ?>
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">11: වෙනත් කරුණු(අවසරපත්‍රයට ඇතුළත් කොට ඇති විශේෂ කොන්දේසි පිළිපැද තිබේද?):</label>
                      <div class="col-sm-6">
                       <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $other_facts</label>"; ?> 
                      </div>
                    </div>

                    <div class="form-group row py-sm-1 mb-0">
                      <label for="inputEmail3" class="col-sm-7">12:ඉහත අනුමැතියට යටත්ව නිකුත් කල අවසරපත්‍රයේ අංකය හා දිනය:</label>
                      <?php echo "<label for='inputEmail3'>අංකය: $c_approval_no &ensp; &ensp;  $c_approval_date </label>"; ?> 
                    </div>
                   



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