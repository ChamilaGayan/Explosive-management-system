<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once('../../include/config.php');
date_default_timezone_set('Asia/Colombo');
 $date = date('Y-m-d'); 
$uid =  $_SESSION["id"] ;
$us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"]; 

}
}
$id1 = $_REQUEST['id'];
$a = $conn->query("SELECT * from permit WHERE perid = $id1");
if($a !== false && $a->num_rows > 0){
while($row=$a->fetch_assoc()){

    $pstore=$row['pstore'];
    $ntime=$row['permitdu'];
    $Premiums=$row['Premiums'];
    $quarryad=$row['quarryad'];
    $expno=$row['expno'];
    $price=$row['price'];
    
    $task=$row['task'];
    $qtpremiums=$row['qtpremiums'];
	$app_id=$row['aplicant_id'];
}
}

$q1 = $conn->query("SELECT * from divreport WHERE perid = $id1");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$pdate=$row['pdate'];

$edt1=$row['edate'];
}
}

$q2 = $conn->query("SELECT * from policereport WHERE perid = $id1");
if($q2 !== false && $q2->num_rows > 0){
while($row=$q2->fetch_assoc()){

$polst=$row['polst'];
$pdate2=$row['pdate'];


$edt2=$row['edate'];
}
}
$q3 = $conn->query("SELECT * from excavate_permit WHERE perid = $id1");
if($q3 !== false && $q3->num_rows > 0){
while($row=$q3->fetch_assoc()){
  $permitno=$row['permitno'];
  $pdate3=$row['pdate'];
  $lotno=$row['lotno'];
  $deedno=$row['deedno'];
  $lndname=$row['lndname'];
  $gsd=$row['gsd'];
  $north=$row['north'];
  $east=$row['east'];


  $edt3=$row['edate'];

}
}
//$q4 = $conn->query("SELECT * from envpermit WHERE perid = $id1");
//if($q4 !== false && $q4->num_rows > 0){
//while($row=$q4->fetch_assoc()){

//$pdate4=$row['pdate'];


//$edt4=$row['edate'];

//}
//}

$q5 = $conn->query("SELECT * from merchantpermit WHERE perid = $id1");
if($q5 !== false && $q5->num_rows > 0){
while($row=$q5->fetch_assoc()){

$pdate5=$row['pdate'];

$edt5=$row['edate'];

}
}
$queryr = $conn->query("SELECT * from applicant WHERE id=$app_id");
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h4 class="m-0 font-weight-bold text-secondary"> 12 "ආ" ආකෘතිය </h4>	
                </div>
      
	  <!-------------------Start Content--------------------------------->
	
<div class="card-body">	
					<div class="form-row">
                      <div class="col-md-12"> මගේ අංකය &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :   <?php echo  $expno; ?></div>
                    </div>
					<div class="form-row">
                      <div class="col-md-12"> දිස්ත්‍රික් ලේකම් කාර්‍යාලය :   <?php echo  $dis; ?></div>
                    </div>
					<div class="form-row">
                      <div class="col-md-12"> <p>දිනය&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :  <?php echo $date;?></p></div>
                    </div>
					
					<div class="form-row">
                      <div class="col-md-12"> දිස්ත්‍රික් ලේකම්/දිසාපති&nbsp&nbsp&nbsp:   <?php echo  $dis; ?></div>
                    </div>
					
						
		<?php if($task == 'ව්‍යාපාරික'){
     $title="පුපුරන ද්‍රව්‍ය පාලක සහ ආරක්ෂක අමාත්‍යාංශයේ ලේකම්ගේ  පූර්ව අනුමැතියට යටත්ව පුපුරන ද්‍රව්‍ය අවසරපත්‍රය නිකුත් කිරීම";
		}
     else
     { 
		$title="පුපුරන ද්‍රව්‍ය පාලක සහ ආරක්ෂක අමාත්‍යාංශයේ ලේකම්ගේ ආවරණ අනුමැතියට යටත්ව පුපුරන ද්‍රව්‍ය අවසරපත්‍රය නිකුත් කිරීම";
    }
     ?> 
	 <div class="form-row">
	 <div class="col-md-12"><p><u><b><h4><?php echo $title;?></h4></b></u></p></div>
	</div>


       <div class="form-row">
	   <div class="col-md-12"> නම&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:- <?php echo $name; ?></div></div>
       <div class="form-row">
	   <div class="col-md-12">ලිපිනය&nbsp &nbsp &nbsp &nbsp &nbsp:- <?php echo  $add; ?></div></div>
	   <div class="form-row">
	   <div class="col-md-12"> ජා.හැ.අංකය&nbsp&nbsp:- <?php echo  $nic; ?></div></div>

<?php if($task == 'ව්‍යාපාරික'){
     $para="උක්ත අයදුම්කරුගේ අයදුම්පත්‍රයේ සදහන් කරුණු සලකා බලා පහත සදහන් පුපුරන ද්‍රව්‍ය පාලක සහ ආරක්ෂක අමාත්‍යාංශයේ ලේකම්ගේ පූර්ව අනුමැතියට යටත්ව පුපුරන ද්‍රව්‍ය අවසරපත්‍රය නිකුත් කිරීම නිර්දේශ කරමි.";
		}
     else
     { 
	$para="උක්ත අයදුම්කරුගේ අයදුම්පත්‍රයේ සදහන් කරුණු සලකා බලා පහත සදහන් පුපුරන ද්‍රව්‍ය පාලක සහ ආරක්ෂක අමාත්‍යාංශයේ ලේකම්ගේ ආවරණ  අනුමැතියට යටත්ව පුපුරන ද්‍රව්‍ය අවසරපත්‍රය නිකුත් කිරීම නිර්දේශ කරමි.";
    }
     ?> 

<div class="form-row">
	 <div class="col-md-12"><p><?php echo $para;?></p></div>
	</div>

<div class="form-row">
	 <div class="col-md-6">
	 <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>පුපුරන ද්‍රව්‍ය</th>
                            <!-- <th><center>ඉල්ලුම් කළ ප්‍රමාණය</center></th>-->
                             <th><center>නිර්දේශ කළ ප්‍රමාණය</center></th>
                          
                            
                           </tr>
                         </thead>

<?php
          
		  $qbc = $conn->query("SELECT * from explosive WHERE perid=$id1");
          if($qbc !== false && $qbc->num_rows > 0){
          while($row=$qbc->fetch_assoc()){
          $expname=$row["expname"];
          $reqty=$row["reqty"];
          $authqty=$row["authqty"];
         
          echo '<input type="hidden" name="exid[]" id="exid" value="'.$expname.'">';
			
                    ?>  
					 <tbody>
      <?php if ($authqty>0){
		  $instlment=0;
		  if ($qtpremiums>0){
		 // $instlment= ($ntime * $authqty)/$qtpremiums;
		  //$instlment= floor($authqty/$qtpremiums);
		  }
		  
		  
		  
		  ?>
    <tr>
      
	   <td> <?php echo $expname;?></td>
      
       <td> <center> <?php 
	   if ($qtpremiums>0){
	   echo $authqty . ' X ' .  $qtpremiums . ' = ' . $qtpremiums * $authqty;
	   }else{
		  echo  $authqty;
	   }?>
	   
	   
	   </center></td>
      
      
     </tr>
	  <?php } ?>
   </tbody>
<?php
}
}
?>
</table>
</div> 
	 </div>
	</div>
	<br>
<!--<div class="form-row">
	<div class="col-md-12"><p>* &nbsp &nbspප්‍රාදේශීය ලේකම්ගේ නිර්දේශය අවලංගු වන දිනය  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:-&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<?php // echo $edt1;?> </p></div>
</div>-->
<div class="form-row">
	<div class="col-md-12"><p>* &nbsp &nbspපොලිස් නිර්දේශය අවලංගු වන දිනය &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:-&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<?php echo $edt2;?> </p></div>
</div>	
<div class="form-row">
	<div class="col-md-12"><p>* &nbsp &nbspකැණීම් බලපත්‍රය අවලංගු වන දිනය  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:-&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<?php echo $edt3;?> </p></div>
</div>	
<!--<div class="form-row">
	<div class="col-md-12"><p>* &nbsp &nbspපාරිසරික ආරක්ෂණ බලපත්‍රය අවලංගු වන දිනය&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:-&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<?php //echo $edt4;?> </p></div>
</div>	
<div class="form-row">
	<div class="col-md-12"><p>* &nbsp &nbspවෙළද බලපත්‍රය අවලංගු වන දිනය &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:-&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<?php //echo $edt5;?> </p></div>
</div>	
<div class="form-row">
	<div class="col-md-12"> 01. වලංගු කාලය (මාස)  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :-<?php //echo $ntime;?>කි</div>
</div>	-->
<div class="form-row">
	<div class="col-md-12">&nbsp &nbsp  &nbsp &nbspනිකුත් කිරීම&nbsp&nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp&nbsp  &nbsp &nbsp&nbsp &nbsp  &nbsp &nbsp:- <?php echo $Premiums?> ට වරක්, වාරික : <?php echo $qtpremiums;?></div>
</div>	<div class="form-row">
	<div class="col-md-12">&nbsp &nbsp&nbsp &nbspඅවසරපත්‍ර ගාස්‍තුව (රු.පි.)&nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp:-<?php echo $price;?></div>
</div>	
<div class="form-row">
	<div class="col-md-12"><p>02. <?php echo $task;?>&ensp;කැණීම් කිරීම සදහා පමණක් අදාල පුපුරන ද්‍රව්‍ය බාවිතා කල යුතුය:</p></div>
</div>	
<div class="form-row">
	<div class="col-md-12"><p>&nbsp &nbsp&nbsp &nbspභාවිතා කරන ස්ථානය :- <?php echo $permitno . " " . $lndname . " ".  $gsd  . "  ඛණ්ඩාංක උතුරු - " . $north . "  නැගෙනහිර-" . $east?></p></div>
</div>	
<div class="form-row">
	<div class="col-md-12"><p>03. මෙම පුපුරන ද්‍රව්‍ය ගබඩා කිරීමට අදහස් කරන ස්ථානය:-  <?php echo $pstore;?></p></div>
</div>	
<br>
<div class="form-row">
<div class="col-md-12">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp..........................................</div>
	<div class="col-md-12">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspසහකාර පුපුරන ද්‍රව්‍ය පාලක</div>
</div>
	
	  
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