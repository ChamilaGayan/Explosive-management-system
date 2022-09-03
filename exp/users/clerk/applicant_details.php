<?php
error_reporting(0);
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
      
$us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"]; 
} 
}
?>

<?php
if(isset($_POST['submit']))
{ 
  $nic=$_POST['nic'];
  $last_aplicantid = '';
  $qu = $conn->query("SELECT * FROM applicant WHERE nic='$nic' limit 1");

  if($qu !== false && $qu->num_rows > 0){
    while($row=$qu->fetch_assoc()){
    $last_aplicantid=$row["id"];
    }
  }
  else{
 //table aplicant
 $name=$_POST['name'];
 $add=$_POST['add'];
 $job=$_POST['job'];
 $income=$_POST['income'];

 $age=$_POST['age'];
 $contact1=$_POST['contact1'];
 $contact2=$_POST['contact2'];
 $police=$_POST['police'];

 $sql="INSERT into applicant (	fullname,addres,anualIncome,disignation,nic,age,mobile1,mobile2,police,district) 
 VALUES ('".$name."','". $add."','". $income."','". $job."','".$nic."','".$age."','". $contact1."','". $contact2."','". $police."','". $dis."')";

 if ($conn->query($sql) === TRUE) {
   $last_aplicantid = $conn->insert_id;
  }
  
  }
  $_SESSION['last_aplicantid']=$last_aplicantid;

    //table permit
    $state=$_POST['state'];
    $ntime=$_POST['ntime'];
    $state2=$_POST['state2'];
    $expwrk=$_POST['expwrk'];
    $qadd=$_POST['qadd'];
    $gnd=$_POST['gnd'];
    $ds=$_POST['ds'];
    $qpolice=$_POST['qpolice'];
    $details=$_POST['details'];
    $bpermit=$_POST['bpermit'];
    $pno=$_POST['pno'];
    $perdates=$_POST['perdates'];
    $ps=$_POST['ps'];
    $num=$_POST['num'];
    $last_perid = '';
	$minfno=['minfileno'];
	 $pno2=$_POST['pno'];
    
    $sql2="INSERT into permit (	pstore,permitdu,Premiums,task,quarryad,gnd,ds,police,nic,offence,aplicant_id,appdate,stat,district,expno,min_file_no,oldreq_no) 
    VALUES ('".$state."','". $ntime."','". $state2."','". $expwrk."','".$qadd."','".$gnd."','". $ds."','". $qpolice."','". $nic."','". $details."','". $last_aplicantid."','". $perdates."','Exp Officer','". $dis."','". $num."','".$minfno."','".$pno2."')";

    if ($conn->query($sql2) === TRUE){
      $last_perid = $conn->insert_id;
      
    }
    $_SESSION['last_perid']=$last_perid;

    //table agent
    $aname=$_POST['aname'];
    $aadd=$_POST['aadd'];
    $anic=$_POST['anic'];
  
    $sql3="INSERT into agent (agname,agadd,adnic,aplicant_id,perid,district) 
    VALUES ('".$aname."','". $aadd."','". $anic."','". $last_aplicantid."','". $last_perid."','". $dis."')";
    $insert = $conn->query($sql3);

      //table oldpermit
      
      $pdateee=$_POST['pdateee'];
      $pno2=$_POST['pno'];
      $ps=$_POST['ps'];

      foreach($_POST['tqt'] as $key => $tqt) {
      $sqt = $_POST['sqt'][$key];
      $useqt = $_POST['useqt'][$key];
      $reqty = $_POST['reqty'][$key];
      $eid = $_POST['eid'][$key];
      $sql4="INSERT into oldpermit (authqty,reqty,usedqty,remqty,expname,nic,oldpermit,lauthority,pdate,pno,aplicant_id,perid,district) 
      VALUES ('".$tqt."','". $sqt."','". $useqt."','". $reqty."','". $eid."','". $nic."','". $bpermit."','". $ps."','". $pdateee."','". $pno2."','". $last_aplicantid."','". $last_perid."','". $dis."')";
      $insert = $conn->query($sql4);
      }

        //Table Explosive
        foreach($_POST['stone'] as $key => $stone){
        $exid = $_POST['exid'][$key];
        $sql5="INSERT into explosive (expname,reqty,aplicant_id,perid,district) 
        VALUES ('".$exid."','".$stone."','". $last_aplicantid."','". $last_perid."','". $dis."')";
        $insert = $conn->query($sql5);
        }
  
        if($insert)
        {
          //echo "<script>alert('අයදුම්කරුගේ විස්තර සම්පූර්ණයි! දැන් ගල්වල විස්තර පුරවන්න.');</script>";
          //echo '<script type="text/javascript">location.href = "quarry_details.php";</script>';
		  echo '<script type="text/javascript">location.href = "view_table.php?s=1";</script>';
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript">
        $(document).ready(function(){

            $("#ds").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getuser.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){
                      
                      var len = response.length;

                        $("#gnd").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];
                            $("#gnd").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
    </script>




<script type="text/javascript">
        $(document).ready(function(){

            $("#dist").change(function(){
                var did = $(this).val();

                $.ajax({
                    url: 'police_div.php',
                    type: 'post',
                    data: {distr:did},
                    dataType: 'json',
                    success:function(response){
                      
                      var len = response.length;

                        $("#police").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];
                            $("#police").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
    </script>





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
      
        <!-- Container Fluid-->
        
    <div class="container-fluid" id="container-wrapper">
		<div class="card mb-4"><h4 class="m-0 font-weight-bold text-primary"><br>(ඇ) ආකෘතිය</h4>
		<div class="card-header py-3 d-flex flex-row align-items-center">

				  <h6>1956 අංක 21 දරන පුපුරන ද්‍රව්‍ය පනත යටතේ පුපුරන ද්‍රව්‍ය ලබාගැනිම, සන්තකයේ තබා ගැනිම සහ පාවිච්චි කිරිම පිණිස අවසරපත්‍රය ලබාගැනිම/ අවසරපත්‍රය අළුත් කර ගැනිම සඳහා අයදුම් කිරිම</h6>
          </div>
		</div> 

    <?php
if(isset($_GET["P"])) {
  
   $resaultt = $conn->query("SELECT * FROM applicant WHERE nic = '" . $_GET["P"] . "'");

  //Assuming field_paint_efficeincy__value is the column that should match the input value

   if ($resaultt->num_rows > 0) {
        while($row = $resaultt->fetch_assoc()) {
          $fname=$row['fullname'];
          $addr=$row['addres'];
          $jobs=$row['disignation'];
          $Income=$row['anualIncome'];
          $agee=$row['age'];
          $mob1=$row['mobile1'];
          $mob2=$row['mobile2'];
          $nicc=$row['nic'];
        }

        echo '<center><div class="col-sm-4" >       
        <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              පෙර අයදුම්කරුවෙක් ඇත.
              </div></div></center>';
   }  
  
   else{
    echo '<center><div class="col-sm-4" >       
    <div class="alert alert-primary alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          පෙර අයදුම්කරුවෙක් නැත.
          </div></div></center>';
   }

   }
?>
    
<div class="card mb-4">
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
</div>

 <!-- Horizontal Form -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				
                  <h4 class="m-0 font-weight-bold text-primary">අයදුම්කරුගේ විස්තර</h4>
                </div>
                <div class="card-body"><code><span style="color:red">*</span> අනිවාර්යයෙන් පිරවිය යුතුයි!</code><br><br>

                <form action="" name="aplicant" method="post" class="signin-form" enctype="multipart/form-data"> 
				  
                    <div class="form-group row">
  
                    <label for="inputPassword3" class="col-sm-2 col-form-label">01.(i) ජා.හැ.අංකය <span style="color:red">*</span></label>  
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="nic" placeholder="ජාතික හැදුනුම්පත් අංකය" required="required" oninvalid="this.setCustomValidity('කරුණාකර නිවැරදි ජා.හැ.අංකය ඇතුලත් කරන්න')" pattern="[0-9]{9}[vV]{1}|[0-9]{12}" oninput="setCustomValidity('')" value="<?php echo $nicc; ?>">
                      </div>

                      <label for="inputEmail3" class="col-sm-3 col-form-label">(ii) අයදුම්කරුගේ නම <span style="color:red">*</span> </label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" placeholder="අයදුම්කරුගේ නම" required="required" oninvalid="this.setCustomValidity('කරුණාකර නම ඇතුලත් කරන්න')"oninput="setCustomValidity('')" value="<?php echo $fname; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">(iii) ලිපිනය <span style="color:red">*</span></label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" name="add" placeholder="ලිපිනය" required="required" oninvalid="this.setCustomValidity('කරුණාකර ලිපිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')" value="<?php echo $addr; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">(iv) රැකියාව </label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="job" placeholder="රැකියාව"  value="<?php echo $jobs; ?>">
                      </div>
                
                      <label for="inputPassword3" class="col-sm-2 col-form-label">(v) වාර්ෂික අදායම (රු.) </label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="income" placeholder="වාර්ෂික ආදායම"  value="<?php echo $Income; ?>">
                      </div>

                      <label for="inputPassword3" class="col-sm-2 col-form-label">(vi) වයස (අවු.)</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="age" placeholder=" වයස"  value="<?php echo $agee; ?>">
                      </div> 
                    </div>
				
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">(vii) දුරකතන අංකය (ස්ථාවර) </label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="contact1" placeholder="දුරකතන අංකය (ස්ථාවර)"  value="<?php echo $mob1; ?>"> 
                      </div>
					   <label for="inputPassword3" class="col-sm-1 col-form-label">(viii) ජංගම <span style="color:red">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="contact2" placeholder=" ජංගම" required="required" oninvalid="this.setCustomValidity('කරුණාකර අංක 10කින් සමන්විත දුරකතන අංකය ඇතුලත් කරන්න')"  pattern="[0]{1}[0-9]{9}" oninput="setCustomValidity('')" value="<?php echo $mob2; ?>">
                      </div>
                    </div>
					<hr color="black">






          <div class="form-group row">
                      

                      <label for="inputPassword3" class="col-sm-3 col-form-label">02. අයදුම්කරුගේ පදිංචි ස්ථානයට ආසන්නම පොලිස් ස්ථානය <span style="color:red">*</span></label>
                                <div class="col-sm-3">
          
                                <select id="dist" name="dist" class="form-control" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
   <option value="">දිස්ත්‍රික්කය තෝරන්න</option>
   <?php 
   // Fetch Department
   $dis_sql = "SELECT * FROM district";
   $dis_data = mysqli_query($conn,$dis_sql);
   while($row = mysqli_fetch_assoc($dis_data) ){
      $disid = $row['dno'];
      $disname = $row['dname'];
      
      // Option
      echo "<option value='".$disid."' >".$disname."</option>";
   }
   ?>
</select>
          
                                </div>
                                <label for="inputPassword3" class="col-sm-3 col-form-label">   පොලිස් ස්ථානය <span style="color:red">*</span></label>
                                <div class="col-sm-3">
          
                                <select id="police" name="police" class="form-control">
                      <option value="">පොලිස් ස්ථානය</option>
                      </select>
          
                                </div>
          
                              </div>

                   <!-- <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">02. අයදුම්කරුගේ පදිංචි ස්ථානයට ආසන්නම පොලිස් ස්ථානය <span style="color:red">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="police" placeholder="පොලිස් ස්ථානය" required="required" oninvalid="this.setCustomValidity('කරුණාකර පොලිස් ස්ථානය සදහන් කරන්න')" oninput="setCustomValidity('')">
                      </div>
                    </div> -->
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">03. අයදුම් කරන පුපුරන ද්‍රව්‍ය ප්‍රමාණය  : මාසයකට</label>
                    </div>

                    <div class='form-group row'>
                    <?php
          $queryc = $conn->query("SELECT * from expitem");
          if($queryc !== false && $queryc->num_rows > 0){
          while($row=$queryc->fetch_assoc()){
          $expname=$row["expname"];
          $id=$row["id"];
          echo '<input type="hidden" name="exid[]" id="exid" value="'.$expname.'">';
				  echo	"
                      <label for='inputPassword3' class='col-sm-3 col-form-label'>$expname</label>
                      <div class='col-sm-3'>
                        <input type='text' class='form-control' name='stone[]' >
                      </div>";
          }
        }
        ?>  
				 </div>

					<hr color="black">
					 <div class="form-group row">
                    <label for="select2SinglePlaceholder" class="col-sm-3 col-form-label">04. පුපුරන ද්‍රව්‍ය ගබඩා කරන ස්ථානය <span style="color:red">*</span></label>
					 <div class="col-sm-3">
                    <select class="form-control" name="state" id="state" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="නිවසේ අරක්ෂිතව තැනු ගබඩාවේ">නිවසේ අරක්ෂිතව තැනු ගබඩාවේ</option>
                      <option value="වැඩබිමේ අරක්ෂිතව තැනු ගබඩාවේ">වැඩබිමේ අරක්ෂිතව තැනු ගබඩාවේ</option> 
					  <option value="වැඩබිමේ අරක්ෂිතව තැනු ගබඩාවේ">රජයේ ගබඩාවේ සහ වැඩබිමේ අරක්ෂිතව තැනු ගබඩාවේ</option> 
                    </select>
					</div>
					<label for="inputPassword3" class="col-sm-3 col-form-label">05. අවසරපත්‍රය අවශ්‍ය කාල සීමාව මාස <span style="color:red">*</span></label>
					<div class="col-sm-3">
          <input type="number" class="form-control" name="ntime" placeholder=" මාස " required="required" oninvalid="this.setCustomValidity('කරුණාකර අවසරපත්‍රය අවශ්‍ය කාල සීමාව ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
					</div>
          </div>
				  <div class="form-group row">
                    <label for="select2SinglePlaceholder" class="col-sm-3 col-form-label">06. පුපුරන ද්‍රව්‍ය ලබා ගන්නා වාරික ගණන <span style="color:red">*</span></label>
					 <div class="col-sm-3">
                    <select class="form-control" name="state2" id="state2" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="සතියකට වරක්">සතියකට වරක්</option>
                      <option value="සති දෙකකට වරක්">සති දෙකකට වරක්</option> 
						          <option value="මාසිකව">මාසිකව</option>
						          <option value="අවශ්‍යතාවය අනුව">අවශ්‍යතාවය අනුව</option>
					  
                    </select>
					</div>
					<label for="inputPassword3" class="col-sm-3 col-form-label">07. පුපුරන ද්‍රව්‍ය  පාවිච්චි  කරන කාර්යය <span style="color:red">*</span></label>


          <div class="col-sm-3">
                    <select class="form-control" name="expwrk" id="expwrk" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="ව්‍යාපාරික">ව්‍යාපාරික</option>
                      <option value="ව්‍යාපාරික නොවන">ව්‍යාපාරික නොවන</option> 
						          <option value="පරීක්ෂා පිපුරුම්">පරීක්ෂා පිපුරුම්</option>
						          
					  
                    </select>
					          </div>

                  </div>
				  <hr color="black">
				  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">08. පුපුරන ද්‍රව්‍ය බෝර දැමීමේ කාර්යය සඳහා නම්</label>
                      <div class="col-sm-2">
                      </div>
                    </div>
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">   (අ). ගල්වල පිහිටි ස්ථානයේ ලිපිනය <span style="color:red">*</span></label>
                      <div class="col-sm-8">
					   <input type="text" class="form-control" name="qadd" placeholder=" ගල්වල පිහිටි ස්ථානයේ ලිපිනය" required="required" oninvalid="this.setCustomValidity('කරුණාකර ගල්වල පිහිටි ස්ථානයේ ලිපිනය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                      </div>
                    </div>
					<div class="form-group row">
                      

					  <label for="inputPassword3" class="col-sm-3 col-form-label">   ii. ප්‍රාදේශීය ලේකම් කොට්ටාශය<span style="color:red">*</span></label>
                      <div class="col-sm-3">

   <select id="ds" name="ds" class="form-control" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
   <option value="">තෝරන්න</option>
   <?php 
   // Fetch Department
   $sql_department = "SELECT * FROM divsec WHERE district='$dis'";
   $department_data = mysqli_query($conn,$sql_department);
   while($row = mysqli_fetch_assoc($department_data) ){
      $departid = $row['divno'];
      $depart_name = $row['divna'];
      
      // Option
      echo "<option value='".$departid."' >".$depart_name."</option>";
   }
   ?>
</select> 

					   <!-- <input type="text" class="form-control"  name="ds" placeholder="ප්‍රා. ලේ. කොට්ටාශය " required="required" oninvalid="this.setCustomValidity('කරුණාකර ප්‍රාදේශීය ලේකම් කොට්ටාශය ඇතුලත් කරන්න')"oninput="setCustomValidity('')"> -->
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">   (ආ). i.ග්‍රාම නිලධාරී වසම <span style="color:red">*</span></label>
                      <div class="col-sm-3">

                      <select id="gnd" name="gnd" class="form-control">
                      <option value="">තෝරන්න</option>
                      </select>

					   <!-- <input type="text" class="form-control" name="gnd" placeholder="ග්‍රාම නිලධාරී වසම " required="required" oninvalid="this.setCustomValidity('කරුණාකර ග්‍රාම නිලධාරී වසම ඇතුලත් කරන්න')"oninput="setCustomValidity('')"> -->
                      </div>

                    </div>




      <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">   (අ). ගල්වලට ආසන්නම පොලිස් ස්ථානය <span style="color:red">*</span></label>
                      <div class="col-sm-8">

  <select id="qpolice" name="qpolice" class="form-control" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
   <option value="">තෝරන්න</option>
   <?php 



$q2 = $conn->query("SELECT * FROM district WHERE dname='$dis'");
if($q2->num_rows>0)
{
  while($row=$q2->fetch_assoc()){

   $dno = $row["dno"];
}
}

   // Fetch Department
   $sqlpolice = "SELECT * FROM police_div WHERE district='$dno'";
   $poldata = mysqli_query($conn,$sqlpolice);
   while($row = mysqli_fetch_assoc($poldata) ){
      $pindex = $row['police_div'];
      $police_name = $row['police_div'];
      
      // Option
      echo "<option value='".$pindex."' >".$police_name."</option>";
   }
   ?>
</select>

					   <!-- <input type="text" class="form-control" name="qpolice" placeholder=" පොලිස් ස්ථානය " required="required" oninvalid="this.setCustomValidity('කරුණාකර පොලිස් ස්ථානය ඇතුලත් කරන්න')"oninput="setCustomValidity('')"> -->
                      </div>
                    </div>

                    <hr color="black">

					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">09. අනුනියෝජිතයන්ගේ විස්තර</label>
                      <div class="col-sm-3">
					   <input type="text" class="form-control" name="aname" placeholder=" නම ">
                      </div>
					  <div class="col-sm-3">
					   <input type="text" class="form-control"  name="aadd" placeholder=" ලිපිනය ">
                      </div>
					  <div class="col-sm-3">
					   <input type="text" class="form-control"  name="anic" placeholder=" හැදුනුම්පත් අංකය ">
                      </div>
                    </div>

                   
				
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-5 col-form-label">10. අයදුම්කරුට මෙයට පෙර අවසරපත්‍රයක් නිකුත් කර තිබේද?<span style="color:red"> *</span></label>
                      <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="yes" name="bpermit" required value="ඔව්" >ඔව්</p>
                    </div>
                    <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="no" name="bpermit" value="නැත"> නැත</p>&nbsp&nbsp&nbsp
				          	</div>
					<div class="form-group row">
						<input type="text" class="form-control" name="minfileno" placeholder=" අමාත්‍යංශ ලිපිගොනු අංකය ">	
						</div>
					</div>
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">(අ). අවසරපත්‍රයේ </label>
                   <div class="col-sm-3">
				   <input type="text" class="form-control" name="pno" placeholder=" අංකය ">
				 	</div>
					<div class="col-sm-3">
				   <input type="date" class="form-control" name="pdateee" placeholder="දිනය">
					</div>
					<div class="col-sm-3">
				   <input type="text" class="form-control" name="ps" placeholder="බලපත්‍ර අධිකාරිය " >
					</div>
					</div>
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-12 col-form-label">(ඇ). මෙම අවසරපත්‍රයේ වලංගු කාලය යටතේ ලබාගත්, භාවිතා කළ හා ඉතිරි පුපුරන ද්‍රව්‍ය පිළිබද විස්තර (කි.ග්‍රැම්) </label>
					  </div>

            <?php
          $queryb = $conn->query("SELECT * from expitem");
          if($queryb !== false && $queryb->num_rows > 0){
          while($row=$queryb->fetch_assoc()){
          $expname2=$row["expname"];
          $id=$row["id"];
          echo '<input type="hidden" name="eid[]" id="eid" value="'.$expname2.'">';
			  	echo"	<div class='form-group row'>
          <label for='inputPassword3' class='col-sm-2 col-form-label'>$expname2</label>
          <div class='col-sm-3'>
				   <input type='text' class='form-control' name='tqt[]' placeholder=' බලය දුන් ප්‍රමාණය '>
				 	</div>
					<div class='col-sm-2'>
				   <input type='text' class='form-control' name='sqt[]' placeholder='ලබාගත් ප්‍රමාණය'>
					</div>
					<div class='col-sm-3'>
				   <input type='text' class='form-control' name='useqt[]' placeholder='භාවිතා කළ ප්‍රමාණය'>
					</div>
          <div class='col-sm-2'>
				   <input type='text' class='form-control' name='reqty[]' placeholder='ඉතිරි ප්‍රමාණය'>
					</div>
					</div>"; 
        }
      }
      ?>
					
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-12 col-form-label">11. අයදුම්කරු අධිකරනයකදී කිසියම් වරදක් සම්බන්ධයෙන් වරදකරු කර ඇත්නම් ඒ පිළිබද විස්තර</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="details" placeholder="වරද පිළිබද විස්තර">
                      </div>
                    </div>
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">ඉල්ලුම් පත්‍රයේ දිනය <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control" name="perdates" placeholder="දිනය"  required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
                      </div>

                      <label for="inputEmail3" class="col-sm-3 col-form-label"> මගේ අංකය :</label>
                      <div class="col-sm-3">
                      <input type="text" class="form-control" name="num" required="required" oninvalid="this.setCustomValidity('කරුණාකර අංකය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
                      </div>
                    </div>


                  



                    <div class="form-group row">
					<div class="col-sm-5"></div>
                      <div class="col-sm-5">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary" onClick="return confirm('ඔබට මෙම පෝරමය ඉදිරිපත් කිරීමට අවශ්‍යද ?')">
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
  <script src="../../assets/js/form_validations.js"></script>

</body>

</html>