<?php
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
$oldreq_no=$row['oldreq_no'];
$rules=$row['rules'];
$other_facts=$row['other_facts'];
$c_approval_no=$row['c_approval_no'];
$c_approval_date=$row['c_approval_date'];
$oldreq=$row['oldrequest'];
$pls=$row['police_approve'];
$old_copies=$row['old_coppies'];
$my_stat=$row['my_stat'];
$appdate=$row['appdate'];
$oldreqno=$row['oldreq_no'];
$minfileno=$row['min_file_no'];
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
			  <!------*********************************Print Content**********************************************-->
	  <div id="DOCPRINT">
                 <!-------------------Start Content--------------------------------->
	
<div class="card-body">	
					<div class="form-row">
                      <div class="col-md-12"> <h4 class="m-0 font-weight-bold text-secondary"> 4 ආකෘතිය </h4></div>
                    </div>
					
		<div class="form-row">
        <div class="col-md-12"> මගේ අංකය : <?php echo $expno; ?> </div>
        </div>			
			<div class="form-row">
        <div class="col-md-12">දිස්ත්‍රික් ලේකම් කාර්‍යාලය : <?php echo $dis; ?> </div>
        </div>			
		<div class="form-row">
        <div class="col-md-12"><p>දිනය  : <?php echo $date; ?> </p></div>
        </div>				
					
		<div class="form-row">
        <div class="col-md-12">පුපුරන ද්‍රව්‍ය පාලක හා ආරක්ෂක ලේකම්,  </div>
        </div>	
		<div class="form-row">
        <div class="col-md-12">ආරක්‍ෂක අමාත්‍යාංශය, ආරක්‍ෂක මූලස්ථාන සංකීර්ණය,  </div>
        </div>	
		<div class="form-row">
        <div class="col-md-12"><p>ශ්‍රී ජයවර්ධනපුර, කෝට්ටේ. </p></div>
        </div>	
		
<?php if ($task=='ව්‍යාපාරික'){
	$title='පූර්ව';
}else{
	$title='ආවරණ';
}
?>
		<div class="form-row">
        <div class="col-md-12"><b><u><h3>පුපුරන ද්‍රව්‍ය අවසරපත්‍ර - <?php echo $title;?> අනුමැතිය</b></u></h3></div>
        </div>	

		<div class="form-row">
        <div class="col-md-12">01.  පුපුරන ද්‍රව්‍ය සම්බන්ධයෙන් මා වෙත ලැබී ඇති අයදුම් පත්‍රයේ විස්තර ඔබගේ  <?php echo $title;?> අනුමැතිය සදහා ඉදිරිපත් කරමි</div>
        </div>
		
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
        <div class="col-md-12">(අ). අමාත්‍යංශ ලිපිගොනුවේ යොමු අංකය:<?php echo $minfileno; ?></div>
        </div>
		<div class="form-row">
        <div class="col-md-12">(ආ).  දැනට ඔහු ලඟ ඉතිරි වී ඇති පුපුරන දව්‍ය වර්ග හා ප්‍රමාණය :<?php echo $oldreq_no; echo " " . $appdate; ?>දිනට</div>
        </div>
		<div class="form-row">
        <div class="col-md-12">
		<!------------------------------------->
		<div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය වර්ගය</th>
                             <th><center>ඉතිරිවී ඇති ප්‍රමාණය</center></th>
                            
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
                        <td> $expname2</td>
                        <td><center> $remqty</center></td>
                       
                      </tr>
                     
                    </tbody>";
                                   
                      }
                      }
                      ?>
                      </table>
                    </div>
		<!------------------------------------->
		
		</div>
        </div>
		<div class="form-row">
        <div class="col-md-12">(ඇ): වර්තමාන අයදුම්පත් කාර්යය: <?php echo $task;?></div>
        </div>
		<div class="form-row">
        <div class="col-md-12">&nbsp&nbsp<u>IV. &nbsp&nbspකොටස</u></div>
        </div>
		
		<!------------------------------------------------------------------>
		
                     <div class="table-responsive">
                       <table class="table table-bordered">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය වර්ගය</th>
							  <th><center>අයදුම්කරු විසින් අයදුම්  කරන ප්‍රමාණ  මාස: <?php echo $ntime;?> ට </center></th>
							   <th><center>සහකාර පුපුරන ද්‍රව්‍ය පාලක  විසින් නිර්දේශ කරන ප්‍රමාණ මාස: <?php echo $ntime;?> ට</center></th>
                             <th><center>බලපත්‍ර අධිකාරිය විසින් නිර්දේශ කරන ප්‍රමාණ මාස: <?php echo $ntime;?> ට</center></th>   
                            
                           </tr>
                         </thead>

          <?php
          $qbc = $conn->query("SELECT * from explosive WHERE perid=$pid");
          if($qbc !== false && $qbc->num_rows > 0){
          while($row=$qbc->fetch_assoc()){
          $expname=$row["expname"];
		  $reqty=$row["reqty"];
		  $authqty=$row["authqty"];
          $gaauthqty=$row["ga_authqty"];
          $expid=$row["expid"];
          echo '<input type="hidden" name="exid[]" id="exid" value="'.$expid.'">';?>
                      
					 <tbody>
     
     <tr>
       <td> <center><?php echo $expname;?></center></td>
	   <td><center><?php echo $reqty * $ntime ;?></center></td>
	   <td><center><?php echo$authqty  ;?></center></td>
       <td><center><?php echo$gaauthqty ;?></center></td>
     </tr>
    
   </tbody>
<?php 
    }
    }
    ?>
    </table>
    </div>
		<!------------------------------------------------------------------>
		
		
		
		
		<div class="form-row"><p>
        <div class="col-md-12"><p>02: පොලිසිය විසින් නිර්දේශ කරනු ලැබ තිබේද ? <?php echo $pls;?></p></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"><p>03: පුපුරන ද්‍රව්‍ය ගබඩා කරන ආකාරය සහ ඒවා ගබඩා කරන ස්ථානය:  <?php echo $pstore;?></p></div>
        </div>
		
		<div class="form-row">
        <div class="col-md-12"><p>04:පුපුරන ද්‍රව්‍ය පාවිච්චි කරන ස්ථාන කිහිපයක්නම් එහි ලිපිනය: <?php echo $lndname ,", ".  $gsd .".",  " ඛණ්ඩාංක උතුරු-" . $north  ,  ", නැගෙනහිර- " . $east;?></p></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"><p>05: අයදුම් පත්‍රය දැනට තිබෙන අවසරපත්‍රයක් අලුත් කරගැනීමට නම් අයදුම්පත්‍රය සමග අවලංගු වූ අවසරපත්‍රයේ මුල් පිටපත හෝ දැනට වලංගුව පවතින අවසරපත්‍රයේ ඡායාපිටපත්(සත්‍ය පිටපතක් බව සහකාර පුපුරන ද්‍රව්‍ය පාලක විසින් සහතික කළ තිබිය යුතුය) යා කොට එවා:  <?php echo $old_copies;?></p></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"><p>06: අවසරපත්‍රය වලංගු වන කාලය (මාස):  <?php echo $ntime;?></p></div>
        </div>
		
		<?php 
		if ($qtpremiums<>""){
			$ans="ඔව්";
			}else{
				$ans="නැත";
			}
		
		?>
		<div class="form-row">
        <div class="col-md-12"><p>07: මා විසින් නිර්දේශිත 01 - (IV) කොටසින් සදහන් කර ප්‍රමාණයන් නිකුත් කරනු ලබන්නේ සමාන කොටස් වශයෙන්ද? <?php echo $ans;?></p></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"><p>08: කොටස් වශයෙන් ලබා ගැනීමටනම් එම කොටස් වාර ගණන: <?php echo $qtpremiums;?></p></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"><p>09: අවසරපත්‍රයේ ඇතුළත් කළ යුතු යම් කොන්දේසි ඇත්නම් ඒවා සදහන් කරන්න:  <?php echo $rules;?></p></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"><p>10: අයදුම්කරු විසින් ඉල්ලා ඇති පුපුරන ද්‍රව්‍ය වලින් මාසිකව නිෂ්පාදනය කිරීමට බලාපොරොත්තු වන ගල් කියුබ් ප්‍රමාණය:  <?php echo $maxqty;?></p></div>
        </div>
		<div class="form-row">
        <div class="col-md-12"><p>11: වෙනත් කරුණු(අවසරපත්‍රයට ඇතුළත් කොට ඇති විශේෂ කොන්දේසි පිළිපැද තිබේද?):  <?php echo $other_facts;?></p></div>
        </div>
		<?php if ($task<>'ව්‍යාපාරික'){?>
		<div class="form-row">
        <div class="col-md-12"><p>12: ආවරණ  අනුමැතියට යටත්ව නිකුත් කල අවසරපත්‍රයේ අංකය හා දිනය: <?php echo $c_approval_no ;?></p></div>
        </div>
		<?php } ?>
		<div class="form-row">
        <div class="col-md-3">දිනය:-  <?php echo $c_approval_date;?></div><div class="col-md-12"></div>
        </div>
		
	
		<div class="form-row">
<div class="col-md-12">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp..........................................</div>
	<div class="col-md-12">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspදිස්ත්‍රික් ලේකම්/දිසාපති</div>
</div>
		
		<div>
	  </div><!-- ---------------------End of Card body------------------------->
	  </div> <!-------------------------End of Class card-body------------>
	  <!----------------End Content------------------------------------>
	  </div>
	  
	 <div class="col-md-12 col-md-offset-6" align="center">
                                                    <div class="form-group">
                                                        
                                                     <!--<input type="submit" name="addSubmit" value="Sumbit" class="btn btn-danger" id="addSubmit">
                                                        <button type="reset" class="btn btn-dark" >Reset</button>-->
                                                    
                                                        
                                                         <input type="button" value="PRINT" onclick="PrintElem(DOCPRINT)" class="btn btn-success"> 
                                                    
                                                        
                                                       
                                                    
                                                    </div>
                                                </div>   
	  
	  <!------*********************************End of Print Content*********************************************-->
              </div>
            </div>
          <div class="text-center">
          </div>
          </div>
        </div>
		</div>
        <!---Container Fluid-->
      </div>
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
 
  
  <!-- Page level plugins -->
  <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>
		  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		 
		  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
			<script src="../../assets/js/ruang-admin.min.js"></script>
		  
  
  
  <script> 
function PrintElem(elem) {
    Popup($(elem).html());
}

function Popup(data) {
    var mywindow = window.open('', 'new div', 'height=600,width=1024');
    mywindow.document.write('<html contenteditable><head><title></title>');
    mywindow.document.write('<link rel="stylesheet" href="css/styles.css" type="text/css" />');
	var divToPrint = document.getElementById('table');
    var htmlToPrint = '' +
        '<style type="text/css">' +
		'table {' + 
		'border-collapse: collapse;' + '}' +
        'table th, table td {' +
        'border: 1px solid #000;' +
        'padding:0;' +
        '}' +
        '</style>';
	mywindow.document.write(htmlToPrint);
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

    mywindow.print();
    mywindow.close();

    return true;

        } 
        
        </script>
  
  
</body>

</html>