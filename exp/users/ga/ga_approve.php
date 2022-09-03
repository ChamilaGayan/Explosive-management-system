<?php
error_reporting(0);
require_once('../../include/config.php');

date_default_timezone_set('Asia/Colombo');
 $date = date('Y-m-d');
 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$uid =  $_SESSION["id"] ;  

$id = $_GET['id'];
$pid = $_GET['pid'];

if(isset($_POST['submit']))
{ 

  foreach($_POST['gaqty'] as $key => $gaqty) {
    $exp = $_POST['exid'][$key];
    $sql55 = "update explosive set ga_authqty='$gaqty' WHERE expid='$exp'";
    $insert = $conn->query($sql55);
    }

  $reg = $_POST['reg'];
  $otherst = $_POST['otherst'];
  $ano = $_POST['ano'];
  $apdate = date('Y-m-d G:i:s ', strtotime("now"));
  //$ifpno = $_POST['ifpno'];

  //$oldreq = $_POST['oldreq'];
  $st = $_POST['st'];
  $oldp = $_POST['oldp'];
  $myst = $_POST['myst'];
  $gapid = $_POST['gapid'];
  

   // $sq5 = "update permit set oldrequest='$oldreq',oldreq_no='$ifpno',police_approve='$st',old_coppies='$oldp',stock_premiums='$dc',rules='$reg',other_facts='$otherst',monthly_product='$rst',my_stat='$myst',c_approval_no='$ano',c_approval_date='$apdate',isread_ga='1',expOffApprove='5',gaApprove='1',stat='Ministry' WHERE aplicant_id='$id'";
    $sq5 = "update permit set police_approve='$st',old_coppies='$oldp',stock_premiums='$dc',rules='$reg',other_facts='$otherst',monthly_product='$rst',my_stat='$myst',c_approval_no='$ano',c_approval_date='$apdate',isread_ga='1',expOffApprove='5',gaApprove='1',stat='Ministry' WHERE perid='$gapid'";
	
	$insert = $conn->query($sq5);
    
  if($insert)
  {
    echo "<script>alert('අනුමත කිරීම සම්පූර්ණයි!');</script>";
    echo '<script type="text/javascript">location.href = "index.php";</script>';
  }
}
if(isset($_POST['submit2']))
{ 
    $rej = "update permit set gaApprove='2',ministryApprove='2',expOffApprove='5' WHERE perid='$gapid'";
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
$expno=$row['expno'];
$task=$row['task'];
$qtpremiums=$row['qtpremiums'];

$oldreq=$row['oldrequest'];

$oldreq_no=$row['oldreq_no'];
$appdate=$row['appdate'];
$minfno=$row['min_file_no'];

}
}

$q1 = $conn->query("SELECT * from divreport WHERE perid = $pid");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$pdate=$row['pdate'];

$edt1=$row['edate'];
}
}

$q2 = $conn->query("SELECT * from policereport WHERE perid = $pid");
if($q2 !== false && $q2->num_rows > 0){
while($row=$q2->fetch_assoc()){
$polst=$row['polst'];
$pdate2=$row['pdate'];
$edt2=$row['edate'];
}
}
if ($polst=="නිර්දේශ කරමි"){
	$polgast="ඔව්";
}else{
	$polgast="නැත";
}


$q3 = $conn->query("SELECT * from excavate_permit WHERE perid = $pid");
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

$q4 = $conn->query("SELECT * from envpermit WHERE perid = $pid");
if($q4 !== false && $q4->num_rows > 0){
while($row=$q4->fetch_assoc()){

$pdate4=$row['pdate'];


$edt4=$row['edate'];
}
}

$q5 = $conn->query("SELECT * from merchantpermit WHERE perid = $pid");
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
  <title>GA Approve</title>
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
				<div class="form-row">
                      <div class='col-sm-12'> මගේ අංකය : <?php echo $expno;?></div>
					  </div>
             <div class="form-row">
                      <div class='col-sm-12'> දිස්ත්‍රික් ලේකම් කාර්‍යාලය : <?php echo $dis;?></div>
					  </div>

                   <div class="form-row">
                      <div class='col-sm-12'><p> දිනය: <?php echo $date;?></p></div>
					  </div>
					<div class="form-row">
                      <div class='col-sm-12'> පුපුරන ද්‍රව්‍ය පාලක හා ආරක්ෂක ලේකම්, </div>
					  </div>
					  <div class="form-row">
                      <div class='col-sm-12'> <p>ආරක්‍ෂක අමාත්‍යාංශය, ආරක්‍ෂක මූලස්ථාන සංකීර්ණය, ශ්‍රී ජයවර්ධනපුර, කෝට්ටේ.</p></div>
					  </div>
                    
                    
                    <?php  
     if($task == 'ව්‍යාපාරික')
     {
       $title=" පුපුරන ද්‍රව්‍ය අවසරපත්‍ර පූර්ව අනුමැතිය"; 
	   $type="පූර්ව";
     }
     else
     {
      $title=" පුපුරන ද්‍රව්‍ය අවසරපත්‍ර ආවරණ අනුමැතිය"; 
	   $type="ආවරණ";
    }
     ?>
					<div class="form-row">
                      <div class='col-sm-12'><h3><u><p> <?php echo $title ;?></u></h3></p></div>
					  </div>
					<div class="form-row">
                      <div class='col-sm-12'>01. පුපුරන ද්‍රව්‍ය සම්බන්ධයෙන් මා වෙත ලැබී ඇති අයදුම් පත්‍රයේ විස්තර ඔබගේ  <?php echo $type ;?> අනුමැතිය සදහා ඉදිරිපත් කරමි. </div>
					  </div>
                   
		<!-------------------------------------------->
		
		<div class="form-row">
        <div class="col-md-12">&nbsp&nbsp<u>I. &nbsp&nbspකොටස</u></div>
        </div>	
		<div class="form-row">
        <div class="col-md-12">(i)&nbsp&nbsp අයදුම්කරුගේ නම: <?php echo $name; ?></div>
        </div>	
		<div class="form-row">
        <div class="col-md-12">(ii)&nbsp&nbsp ලිපිනය: <?php echo $add; ?></div>
        </div>
		<div class="form-row">
        <div class="col-md-12">(iii)&nbsp&nbsp රැකියාව: <?php echo $disignation; ?></div>
        </div>
		<div class="form-row">
        <div class="col-md-12">(iv)&nbsp&nbsp ජා.හැ.අංකය: <?php echo $nic; ?></div>
        </div>
		<div style="border:solid"><p>
		<div class="form-row">
        <div class="col-md-12">&nbsp&nbsp <u>II. &nbsp&nbspකොටස</u></div>
        </div>
		
		<div class="form-row">
        <div class="col-md-12"> &nbsp&nbsp * පොලිස් නිර්දේශය අවලංගු වන දිනය :<?php echo $edt2; ?></u></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"> &nbsp&nbsp * කැණීම් බලපත්‍රය අවලංගු වන දිනය :<?php echo $edt2; ?></u></div>
        </div>
		</p>
        </div>
<!-------------------------------------------->
                    <br>
					<div class="form-row">
        <div class="col-md-12">&nbsp&nbsp<u>III. &nbsp&nbspකොටස</u></div>
        </div>

		<div class="form-row">
        <div class="col-md-12">මීට කලින් අයදුම්කරු විසින් අයදුම්පත් ඉදිරිපත් කරනු ලැබ තිබේද ? <?php echo $oldreq;?></div>
		</div>
		<div class="form-row">
        <div class="col-md-12">ඉදිරිපත් කරනු ලැබ තිබේ නම්,</div>
        </div>
		<div class="form-row">
        <div class="col-md-12">(අ). අමාත්‍යංශ ලිපිගොනුවේ යොමු අංකය:<?php echo $minfno; ?></div>
        </div>
		<div class="form-row">
        <div class="col-md-12">(ආ).  දැනට ඔහු ලඟ ඉතිරි වී ඇති පුපුරන දව්‍ය වර්ග හා ප්‍රමාණය :<?php echo $oldreq_no;echo $appdate; ?> දිනට</div>
        </div>
<!---------------------------------------------->
                    

                   
                      
                      <div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                      $old = $conn->query("SELECT * from oldpermit  WHERE perid = $pid ");
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
                    </div>
<br>
                    <div class="form-row">
					<div class="col-md-12"><p>(ඇ): වර්තමාන අයදුම්පත් කාර්යය: <b><i><?php echo $task ?></i></b></p></div>
					</div>
					
		<div class="form-row">
        <div class="col-md-12"><p>&nbsp&nbsp<u>IV. &nbsp&nbspකොටස</u></p></div>
        </div>


                    <div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     </div>
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය වර්ගය</th>
                             <th>අයදුම් කළ ප්‍රමාණය</th>
                             <th>සහකාර පුපුරනද්‍රව්‍ය පාලක විසින් නිර්දේශ කළ ප්‍රමාණය</th>
                             <th>බලපත්‍ර අධිකාරිය විසින් නිර්දේශ කරන ප්‍රමාණය</th>
                          
                            
                           </tr>
                         </thead>

<?php
          $qbc = $conn->query("SELECT * from explosive WHERE perid=$pid");
          if($qbc !== false && $qbc->num_rows > 0){
          while($row=$qbc->fetch_assoc()){
          $expname=$row["expname"];
          $reqty=$row["reqty"];
          $authqty=$row["authqty"];
          $expid=$row["expid"];
          echo '<input type="hidden" name="exid[]" id="exid" value="'.$expid.'">';
			
                      
					echo " <tbody>
     
     <tr>
       <td> $expname</a></td>
       <td> $reqty</a></td>
       <td> $authqty</a></td>
       <td><input type='text' class='col-sm-4 form-control' name='gaqty[]' value='$authqty'></td>
      
      
     </tr>
    
   </tbody>";



}
}
?>
</table>
</div>
</div>


                    <div class="form-row">
					<div class="col-md-12">02: පොලිසිය විසින් නිර්දේශ කරනු ලැබ තිබේද?: <b><i><?php echo $polgast; ?></i></b></div>
					<input type="hidden" name="st" value="<?php echo $polgast;?>">
					</div>
					
                    <div class="form-row">
					<div class="col-md-12">03: පුපුරන ද්‍රව්‍ය ගබඩා කරන ආකාරය සහ ඒවා ගබඩා කරන ස්ථානය: <b><i><?php echo $pstore; ?></i></b></div>
					</div>
                 
                    <div class="form-row">
					<div class="col-md-12">04:පුපුරන ද්‍රව්‍ය පාවිච්චි කරන ස්ථානය හෝ  කිහිපයක්නම් එහි ලිපිනය:<b><i><?php echo $lndname .", ".  $gsd . ", " ." ඛණ්ඩාංක උතුරු-".$north .", ". " නැගෙනහිර-" .$east; ?></i></b></div>
					</div>

                  

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-9 col-form-label">05: අයදුම් පත්‍රය දැනට තිබෙන අවසරපත්‍රයක් අලුත් කරගැනීමට නම් අයදුම්පත්‍රය සමග අවලංගු වූ අවසරපත්‍රයේ මුල් පිටපත හෝ දැනට වලංගුව පවතින අවසරපත්‍රයේ ඡායාපිටපත්(සත්‍ය පිටපතක් බව සහකාර පුපුරන ද්‍රව්‍ය පාලක විසින් සහතික කළ තිබිය යුතුය) යා කොට එවා:</label>
                      <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="yes" checked name="oldp" value="ඇත">ඇත</p>
                    </div>
                    <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="no" name="oldp" value="නැත"> නැත</p>
				          	</div>
			          		</div>
					<div class="form-row">
					<div class="col-md-12">06: අවසරපත්‍රය වලංගු වන කාලය: <b><i>මාස <?php echo $ntime; ?> කි.</i></b></div>
					<input type="hidden" name="st" value="<?php echo $polgast;?>">
					</div>
                   <?php
				   if ($qtpremiums>0){
					   $myst="ඔව්";
				   }else{
					   $myst="නැත";
				   }
				   ?>
					<div class="form-row">
					<div class="col-md-12">07: මා විසින් නිර්දේශිත 01 - (IV) කොටසින් සදහන් කර ප්‍රමාණයන් නිකුත් කරනු ලබන්නේ සමාන කොටස් වශයෙන්ද? <b><i> <?php echo $myst; ?></i></b></div>
					<input type="hidden" name="myst" value="<?php echo $myst;?>">
					</div>
                    

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">08: කොටස් වශයෙන් ලබා ගැනීමටනම් එම කොටස් වාර ගණන:</label>
                      <div class="col-sm-6">
                      <?php echo "<label for='inputEmail3' class='col-sm-9 col-form-label'> $qtpremiums</label>"; ?> 
                      </div>
                    </div> 

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">09: අවසරපත්‍රයේ ඇතුළත් කළ යුතු යම් කොන්දේසි ඇත්නම් ඒවා සදහන් කරන්න:</label>
                      <div class="col-sm-6">
                      <input type="text" class="form-control" value="අමුණා ඇත" name="reg" >
                      </div>
                    </div>
				<div class="form-row">
					<div class="col-md-12">10: අයදුම්කරු විසින් ඉල්ලා ඇති පුපුරන ද්‍රව්‍ය වලින් මාසිකව නිෂ්පාදනය කිරීමට බලාපොරොත්තු වන ගල් කියුබ් ප්‍රමාණය: <b><i> <?php echo $maxqty; ?> කි.</i></b></div>
					
					</div>
                    

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">11: වෙනත් කරුණු(අවසරපත්‍රයට ඇතුළත් කොට ඇති විශේෂ කොන්දේසි පිළිපැද තිබේද?):</label>
                      <div class="col-sm-6">
                      <input type="text" class="form-control" value="ඔව්"name="otherst" >
                      </div>
                    </div>
				<?php if($task <> 'ව්‍යාපාරික'){?>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">12: ආවරණ   අනුමැතියට යටත්ව නිකුත් කල අවසරපත්‍රයේ අංකය හා දිනය:</label>
                      <div class="col-sm-6">
                      <input type="text" class="form-control" name="ano" placeholder="අංකය හා දිනය">
                      </div>
					  </div>
				<?php } ?>
					  <!--
					  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">දිනය:</label>
                      <div class="col-sm-3">
                      <input type="date" class="form-control" name="apdate" >
                      </div>
                    </div>-->


               

                   
					<input type="hidden" name ="gapid" value="<?php echo $pid; ?>">


                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label"></label>

                      <div class="col-sm-3">
                      <input type="submit" name="submit" value="Approve" class="btn btn-success" style="width:140px"  onClick="return confirm('ඔබට මෙම අවසරපත්‍රය අනුමත කිරීමට අවශ්‍යද ?')">
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