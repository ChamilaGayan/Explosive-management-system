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
          //echo "<script>alert('????????????????????????????????? ?????????????????? ??????????????????????????????! ???????????? ??????????????? ?????????????????? ?????????????????????.');</script>";
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
		<div class="card mb-4"><h4 class="m-0 font-weight-bold text-primary"><br>(???) ??????????????????</h4>
		<div class="card-header py-3 d-flex flex-row align-items-center">

				  <h6>1956 ????????? 21 ????????? ?????????????????? ???????????????????????? ????????? ???????????? ?????????????????? ???????????????????????? ????????????????????????, ????????????????????? ????????? ??????????????? ?????? ???????????????????????? ??????????????? ??????????????? ?????????????????????????????? ????????????????????????/ ?????????????????????????????? ??????????????? ?????? ??????????????? ???????????? ?????????????????? ???????????????</h6>
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
              ????????? ??????????????????????????????????????? ??????.
              </div></div></center>';
   }  
  
   else{
    echo '<center><div class="col-sm-4" >       
    <div class="alert alert-primary alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          ????????? ??????????????????????????????????????? ?????????.
          </div></div></center>';
   }

   }
?>
    
<div class="card mb-4">
  <br><center><h6 class="m-0 font-weight-bold text-primary">????????? ?????????????????????????????????????????? ?????????????????? ????????????????????? ???????????????</h6></center><br>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
<div class="form-group row">

<div class="col-sm-2"> 
</div>
&ensp;&ensp;&ensp;<label for="inputPassword3" class="col-sm-2 col-form-label">??????.??????.???????????? :</label> 
<div class="col-sm-4"> 
 <input type="text" class="form-control" name="P" placeholder="Search" required="required" oninvalid="this.setCustomValidity('????????????????????? ????????????????????? ??????.??????.???????????? ?????????????????? ???????????????')" pattern="[0-9]{9}[vV]{1}|[0-9]{12}"oninput="setCustomValidity('')"  /> <br/>
</div>
<div class="col-sm-3">
   <input type="submit" value="Check" name="submitButton" class="btn btn-success" />
</div></div>
</form>
</div>

 <!-- Horizontal Form -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				
                  <h4 class="m-0 font-weight-bold text-primary">????????????????????????????????? ??????????????????</h4>
                </div>
                <div class="card-body"><code><span style="color:red">*</span> ???????????????????????????????????? ?????????????????? ??????????????????!</code><br><br>

                <form action="" name="aplicant" method="post" class="signin-form" enctype="multipart/form-data"> 
				  
                    <div class="form-group row">
  
                    <label for="inputPassword3" class="col-sm-2 col-form-label">01.(i) ??????.??????.???????????? <span style="color:red">*</span></label>  
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="nic" placeholder="??????????????? ????????????????????????????????? ????????????" required="required" oninvalid="this.setCustomValidity('????????????????????? ????????????????????? ??????.??????.???????????? ?????????????????? ???????????????')" pattern="[0-9]{9}[vV]{1}|[0-9]{12}" oninput="setCustomValidity('')" value="<?php echo $nicc; ?>">
                      </div>

                      <label for="inputEmail3" class="col-sm-3 col-form-label">(ii) ????????????????????????????????? ?????? <span style="color:red">*</span> </label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" placeholder="????????????????????????????????? ??????" required="required" oninvalid="this.setCustomValidity('????????????????????? ?????? ?????????????????? ???????????????')"oninput="setCustomValidity('')" value="<?php echo $fname; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">(iii) ?????????????????? <span style="color:red">*</span></label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" name="add" placeholder="??????????????????" required="required" oninvalid="this.setCustomValidity('????????????????????? ?????????????????? ?????????????????? ???????????????')" oninput="setCustomValidity('')" value="<?php echo $addr; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">(iv) ????????????????????? </label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="job" placeholder="?????????????????????"  value="<?php echo $jobs; ?>">
                      </div>
                
                      <label for="inputPassword3" class="col-sm-2 col-form-label">(v) ????????????????????? ??????????????? (??????.) </label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="income" placeholder="????????????????????? ???????????????"  value="<?php echo $Income; ?>">
                      </div>

                      <label for="inputPassword3" class="col-sm-2 col-form-label">(vi) ????????? (?????????.)</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="age" placeholder=" ?????????"  value="<?php echo $agee; ?>">
                      </div> 
                    </div>
				
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">(vii) ?????????????????? ???????????? (??????????????????) </label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="contact1" placeholder="?????????????????? ???????????? (??????????????????)"  value="<?php echo $mob1; ?>"> 
                      </div>
					   <label for="inputPassword3" class="col-sm-1 col-form-label">(viii) ???????????? <span style="color:red">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="contact2" placeholder=" ????????????" required="required" oninvalid="this.setCustomValidity('????????????????????? ????????? 10???????????? ????????????????????? ?????????????????? ???????????? ?????????????????? ???????????????')"  pattern="[0]{1}[0-9]{9}" oninput="setCustomValidity('')" value="<?php echo $mob2; ?>">
                      </div>
                    </div>
					<hr color="black">






          <div class="form-group row">
                      

                      <label for="inputPassword3" class="col-sm-3 col-form-label">02. ????????????????????????????????? ?????????????????? ????????????????????? ?????????????????? ?????????????????? ?????????????????? <span style="color:red">*</span></label>
                                <div class="col-sm-3">
          
                                <select id="dist" name="dist" class="form-control" required="required" oninvalid="this.setCustomValidity('????????????????????? ??????????????????')"oninput="setCustomValidity('')">
   <option value="">??????????????????????????????????????? ??????????????????</option>
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
                                <label for="inputPassword3" class="col-sm-3 col-form-label">   ?????????????????? ?????????????????? <span style="color:red">*</span></label>
                                <div class="col-sm-3">
          
                                <select id="police" name="police" class="form-control">
                      <option value="">?????????????????? ??????????????????</option>
                      </select>
          
                                </div>
          
                              </div>

                   <!-- <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">02. ????????????????????????????????? ?????????????????? ????????????????????? ?????????????????? ?????????????????? ?????????????????? <span style="color:red">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="police" placeholder="?????????????????? ??????????????????" required="required" oninvalid="this.setCustomValidity('????????????????????? ?????????????????? ?????????????????? ??????????????? ???????????????')" oninput="setCustomValidity('')">
                      </div>
                    </div> -->
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">03. ?????????????????? ????????? ?????????????????? ???????????????????????? ????????????????????????  : ??????????????????</label>
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
                    <label for="select2SinglePlaceholder" class="col-sm-3 col-form-label">04. ?????????????????? ???????????????????????? ???????????? ????????? ?????????????????? <span style="color:red">*</span></label>
					 <div class="col-sm-3">
                    <select class="form-control" name="state" id="state" required="required" oninvalid="this.setCustomValidity('????????????????????? ??????????????????')"oninput="setCustomValidity('')">
                      <option value="">??????????????????</option>
                      <option value="??????????????? ???????????????????????? ???????????? ??????????????????">??????????????? ???????????????????????? ???????????? ??????????????????</option>
                      <option value="????????????????????? ???????????????????????? ???????????? ??????????????????">????????????????????? ???????????????????????? ???????????? ??????????????????</option> 
					  <option value="????????????????????? ???????????????????????? ???????????? ??????????????????">???????????? ?????????????????? ?????? ????????????????????? ???????????????????????? ???????????? ??????????????????</option> 
                    </select>
					</div>
					<label for="inputPassword3" class="col-sm-3 col-form-label">05. ?????????????????????????????? ?????????????????? ????????? ??????????????? ????????? <span style="color:red">*</span></label>
					<div class="col-sm-3">
          <input type="number" class="form-control" name="ntime" placeholder=" ????????? " required="required" oninvalid="this.setCustomValidity('????????????????????? ?????????????????????????????? ?????????????????? ????????? ??????????????? ?????????????????? ???????????????')"oninput="setCustomValidity('')">
					</div>
          </div>
				  <div class="form-group row">
                    <label for="select2SinglePlaceholder" class="col-sm-3 col-form-label">06. ?????????????????? ???????????????????????? ????????? ??????????????? ??????????????? ????????? <span style="color:red">*</span></label>
					 <div class="col-sm-3">
                    <select class="form-control" name="state2" id="state2" required="required" oninvalid="this.setCustomValidity('????????????????????? ??????????????????')"oninput="setCustomValidity('')">
                      <option value="">??????????????????</option>
                      <option value="?????????????????? ????????????">?????????????????? ????????????</option>
                      <option value="????????? ??????????????? ????????????">????????? ??????????????? ????????????</option> 
						          <option value="??????????????????">??????????????????</option>
						          <option value="?????????????????????????????? ????????????">?????????????????????????????? ????????????</option>
					  
                    </select>
					</div>
					<label for="inputPassword3" class="col-sm-3 col-form-label">07. ?????????????????? ????????????????????????  ????????????????????????  ????????? ?????????????????? <span style="color:red">*</span></label>


          <div class="col-sm-3">
                    <select class="form-control" name="expwrk" id="expwrk" required="required" oninvalid="this.setCustomValidity('????????????????????? ??????????????????')"oninput="setCustomValidity('')">
                      <option value="">??????????????????</option>
                      <option value="??????????????????????????????">??????????????????????????????</option>
                      <option value="?????????????????????????????? ????????????">?????????????????????????????? ????????????</option> 
						          <option value="????????????????????? ????????????????????????">????????????????????? ????????????????????????</option>
						          
					  
                    </select>
					          </div>

                  </div>
				  <hr color="black">
				  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">08. ?????????????????? ???????????????????????? ????????? ?????????????????? ?????????????????? ???????????? ?????????</label>
                      <div class="col-sm-2">
                      </div>
                    </div>
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">   (???). ??????????????? ?????????????????? ????????????????????? ?????????????????? <span style="color:red">*</span></label>
                      <div class="col-sm-8">
					   <input type="text" class="form-control" name="qadd" placeholder=" ??????????????? ?????????????????? ????????????????????? ??????????????????" required="required" oninvalid="this.setCustomValidity('????????????????????? ??????????????? ?????????????????? ????????????????????? ?????????????????? ?????????????????? ???????????????')"oninput="setCustomValidity('')">
                      </div>
                    </div>
					<div class="form-group row">
                      

					  <label for="inputPassword3" class="col-sm-3 col-form-label">   ii. ?????????????????????????????? ??????????????? ????????????????????????<span style="color:red">*</span></label>
                      <div class="col-sm-3">

   <select id="ds" name="ds" class="form-control" required="required" oninvalid="this.setCustomValidity('????????????????????? ??????????????????')"oninput="setCustomValidity('')">
   <option value="">??????????????????</option>
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

					   <!-- <input type="text" class="form-control"  name="ds" placeholder="???????????????. ??????. ???????????????????????? " required="required" oninvalid="this.setCustomValidity('????????????????????? ?????????????????????????????? ??????????????? ???????????????????????? ?????????????????? ???????????????')"oninput="setCustomValidity('')"> -->
                      </div>
                      <label for="inputPassword3" class="col-sm-3 col-form-label">   (???). i.?????????????????? ????????????????????? ????????? <span style="color:red">*</span></label>
                      <div class="col-sm-3">

                      <select id="gnd" name="gnd" class="form-control">
                      <option value="">??????????????????</option>
                      </select>

					   <!-- <input type="text" class="form-control" name="gnd" placeholder="?????????????????? ????????????????????? ????????? " required="required" oninvalid="this.setCustomValidity('????????????????????? ?????????????????? ????????????????????? ????????? ?????????????????? ???????????????')"oninput="setCustomValidity('')"> -->
                      </div>

                    </div>




      <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">   (???). ?????????????????? ?????????????????? ?????????????????? ?????????????????? <span style="color:red">*</span></label>
                      <div class="col-sm-8">

  <select id="qpolice" name="qpolice" class="form-control" required="required" oninvalid="this.setCustomValidity('????????????????????? ??????????????????')"oninput="setCustomValidity('')">
   <option value="">??????????????????</option>
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

					   <!-- <input type="text" class="form-control" name="qpolice" placeholder=" ?????????????????? ?????????????????? " required="required" oninvalid="this.setCustomValidity('????????????????????? ?????????????????? ?????????????????? ?????????????????? ???????????????')"oninput="setCustomValidity('')"> -->
                      </div>
                    </div>

                    <hr color="black">

					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">09. ????????????????????????????????????????????? ??????????????????</label>
                      <div class="col-sm-3">
					   <input type="text" class="form-control" name="aname" placeholder=" ?????? ">
                      </div>
					  <div class="col-sm-3">
					   <input type="text" class="form-control"  name="aadd" placeholder=" ?????????????????? ">
                      </div>
					  <div class="col-sm-3">
					   <input type="text" class="form-control"  name="anic" placeholder=" ????????????????????????????????? ???????????? ">
                      </div>
                    </div>

                   
				
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-5 col-form-label">10. ?????????????????????????????? ???????????? ????????? ???????????????????????????????????? ?????????????????? ?????? ????????????????<span style="color:red"> *</span></label>
                      <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="yes" name="bpermit" required value="?????????" >?????????</p>
                    </div>
                    <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="no" name="bpermit" value="?????????"> ?????????</p>&nbsp&nbsp&nbsp
				          	</div>
					<div class="form-group row">
						<input type="text" class="form-control" name="minfileno" placeholder=" ??????????????????????????? ???????????????????????? ???????????? ">	
						</div>
					</div>
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">(???). ????????????????????????????????? </label>
                   <div class="col-sm-3">
				   <input type="text" class="form-control" name="pno" placeholder=" ???????????? ">
				 	</div>
					<div class="col-sm-3">
				   <input type="date" class="form-control" name="pdateee" placeholder="????????????">
					</div>
					<div class="col-sm-3">
				   <input type="text" class="form-control" name="ps" placeholder="????????????????????? ???????????????????????? " >
					</div>
					</div>
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-12 col-form-label">(???). ????????? ????????????????????????????????? ??????????????? ???????????? ???????????? ??????????????????, ?????????????????? ?????? ?????? ??????????????? ?????????????????? ???????????????????????? ?????????????????? ?????????????????? (??????.?????????????????????) </label>
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
				   <input type='text' class='form-control' name='tqt[]' placeholder=' ????????? ???????????? ???????????????????????? '>
				 	</div>
					<div class='col-sm-2'>
				   <input type='text' class='form-control' name='sqt[]' placeholder='?????????????????? ????????????????????????'>
					</div>
					<div class='col-sm-3'>
				   <input type='text' class='form-control' name='useqt[]' placeholder='?????????????????? ?????? ????????????????????????'>
					</div>
          <div class='col-sm-2'>
				   <input type='text' class='form-control' name='reqty[]' placeholder='??????????????? ????????????????????????'>
					</div>
					</div>"; 
        }
      }
      ?>
					
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-12 col-form-label">11. ??????????????????????????? ?????????????????????????????? ????????????????????? ??????????????? ????????????????????????????????? ?????????????????? ?????? ?????????????????? ??? ?????????????????? ??????????????????</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="details" placeholder="????????? ?????????????????? ??????????????????">
                      </div>
                    </div>
					<hr color="black">
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">????????????????????? ????????????????????? ???????????? <span style="color:red">*</span></label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control" name="perdates" placeholder="????????????"  required="required" oninvalid="this.setCustomValidity('????????????????????? ???????????? ?????????????????? ???????????????')" oninput="setCustomValidity('')">
                      </div>

                      <label for="inputEmail3" class="col-sm-3 col-form-label"> ????????? ???????????? :</label>
                      <div class="col-sm-3">
                      <input type="text" class="form-control" name="num" required="required" oninvalid="this.setCustomValidity('????????????????????? ???????????? ?????????????????? ???????????????')" oninput="setCustomValidity('')">
                      </div>
                    </div>


                  



                    <div class="form-group row">
					<div class="col-sm-5"></div>
                      <div class="col-sm-5">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary" onClick="return confirm('????????? ????????? ??????????????? ???????????????????????? ?????????????????? ????????????????????? ?')">
						<input type="reset" value="Reset" class="btn btn-outline-secondary" onClick="return confirm('????????? ????????? ??????????????? ????????? ?????????????????????????????? ????????????????????? ?')">
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