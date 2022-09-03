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
      $apid =  $_SESSION["last_aplicantid"] ;
      $perid =  $_SESSION["last_perid"] ;
      $statusMsg = '';
      $us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"]; 
}
}
?>

<?php

// File upload path
$targetDir1 = "../../../data/exp/div/";
$targetDir2 = "../../../data/exp/env/";
$targetDir3 = "../../../data/exp/excavate/";
$targetDir4 = "../../../data/exp/merchant/";
$targetDir5 = "../../../data/exp/police/";
$targetDir6 = "../../../data/exp/ins_report/";
function generateRandomString($length = 10) { 
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 
    ceil($length/strlen($x)) )),1,$length);
    }
        
if(isset($_POST["submit"])){

    if(!empty($_FILES["img1"]["name"])  ){ 

        $img1 = basename($_FILES["img1"]["name"]);
        $img1 = generateRandomString() . $img1;
        $targetFilePath = $targetDir1 . $img1;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);     

        $img2 = basename($_FILES["img2"]["name"]);
        $img2 = generateRandomString() . $img2;
        $targetFilePath2 = $targetDir5 . $img2;
        $fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);

        $img3 = basename($_FILES["img3"]["name"]);
        $img3 = generateRandomString() . $img3;
        $targetFilePath3 = $targetDir3 . $img3;
        $fileType3 = pathinfo($targetFilePath3,PATHINFO_EXTENSION);

        $img4 = basename($_FILES["img4"]["name"]);
        $img4 = generateRandomString() . $img4;
        $targetFilePath4 = $targetDir2 . $img4;
        $fileType4 = pathinfo($targetFilePath4,PATHINFO_EXTENSION);

        $img5 = basename($_FILES["img5"]["name"]);
        $img5 = generateRandomString() . $img5;
        $targetFilePath5 = $targetDir4 . $img5;
        $fileType5 = pathinfo($targetFilePath5,PATHINFO_EXTENSION);

        $ins_img = basename($_FILES["ins_img"]["name"]);
        $ins_img = generateRandomString() . $ins_img;
        $targetFilePath6 = $targetDir6 . $ins_img;
        $fileType6 = pathinfo($targetFilePath6,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)|| in_array($fileType2, $allowTypes)|| in_array($fileType3, $allowTypes)|| in_array($fileType4, $allowTypes)|| in_array($fileType5, $allowTypes)|| in_array($fileType6, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["img1"]["tmp_name"], $targetFilePath)){
            if(move_uploaded_file($_FILES["img2"]["tmp_name"], $targetFilePath2)){
              if(move_uploaded_file($_FILES["img3"]["tmp_name"], $targetFilePath3)){
                if(move_uploaded_file($_FILES["img4"]["tmp_name"], $targetFilePath4)){
                  if(move_uploaded_file($_FILES["img5"]["tmp_name"], $targetFilePath5)){
                    if(move_uploaded_file($_FILES["ins_img"]["tmp_name"], $targetFilePath6)){

                    //DivReport
                    $qtyper=$_POST['qtyper'];
                    $dt1=$_POST['dt1'];
                    $gov=$_POST['gov'];
                    $edt1=$_POST['edt1'];
                    
                    $sql1="INSERT into divreport (landtype,pdate,img,qtypermit,aplicant_id,perid,edate,district) 
                    VALUES ('".$gov."','". $dt1."','". $img1."','". $qtyper."','". $apid."','". $perid."','". $edt1."','". $dis."')";
                    $insert = $conn->query($sql1);

                    //PoliceReport
                    $plic=$_POST['plic'];
                    $stat=$_POST['stat'];
                    $dt2=$_POST['dt2'];
                    $edt2=$_POST['edt2'];
                   
                    $sql2="INSERT into policereport (poldiv,polst,pdate,img,aplicant_id,perid,edate,district) 
                    VALUES ('".$plic."','". $stat."','". $dt2."','". $img2."','". $apid."','". $perid."','". $edt2."','". $dis."')";
                    $insert = $conn->query($sql2);

                    //Excavate_Permit
                    $ptype=$_POST['ptype'];
                    $pn2=$_POST['pn2'];
                    $month=$_POST['month'];
                    $depth=$_POST['depth'];
                    $north=$_POST['north'];
                    $east=$_POST['east'];
                    $one=$_POST['one'];
                    $day=$_POST['day'];
                    $wk=$_POST['wk'];
                    $mnth=$_POST['mnth'];
                    $dt3=$_POST['dt3'];
                    $edt3=$_POST['edt3'];

                    $lotno=$_POST['lotno'];
                    $deedno=$_POST['deedno'];
                    $gsd=$_POST['gsd'];
                    $lndname=$_POST['lndname'];
                    
                    $sql3="INSERT into excavate_permit (permittype,permitno,maxqty,depth,north,east,holespertime,blastperday,blastperweek,blastpermonth,pdate,img,aplicant_id,perid,lotno,deedno,lndname,gsd,edate,district) 
                    VALUES ('".$ptype."','". $pn2."','". $month."','". $depth."','". $north."','". $east."','". $one."','". $day."','". $wk."','". $mnth."','". $dt3."','". $img3."','". $apid."','". $perid."','". $lotno."','". $deedno."','". $lndname."','". $gsd."','". $edt3."','". $dis."')";
                    $insert = $conn->query($sql3);

                     //Envpermit
                     $ptype4=$_POST['ptype4'];
                     $pn4=$_POST['pn4'];
                     $dt4=$_POST['dt4'];
                     $edt4=$_POST['edt4'];
                     
                     $sql4="INSERT into envpermit (ptype,permitno,pdate,img,aplicant_id,perid,edate,district) 
                     VALUES ('".$ptype4."','". $pn4."','". $dt4."','". $img4."','". $apid."','". $perid."','". $edt4."','". $dis."')";
                     $insert = $conn->query($sql4);
                     
                     //Merchantpermit
                     $ps=$_POST['ps'];
                     $pn5=$_POST['pn5'];
                     $dt5=$_POST['dt5'];
                     $edt5=$_POST['edt5'];
                     
                     $sql5="INSERT into merchantpermit (merno,institute,pdate,img,aplicant_id,perid,edate,district) 
                     VALUES ('".$pn5."','". $ps."','". $dt5."','". $img5."','". $apid."','". $perid."','". $edt5."','". $dis."')";
                     $insert = $conn->query($sql5);




                     //Merchantpermit
                     $ins_dt=$_POST['ins_dt'];
              
                     
                     $sql6="INSERT into ins_report (`date`,img,aplicant_id) 
                     VALUES ('".$ins_dt."','". $ins_img."','". $apid."')";
                     $insert = $conn->query($sql6);



            if($insert){
                $statusMsg = "The file has been uploaded successfully.";
                
                //Button
                echo "<script>alert('අවසරපත්‍ර විස්තර සම්පූර්ණයි.');</script>";
                echo '<script type="text/javascript">location.href = "index.php";</script>';

            }else{
              echo "<script>alert('File upload failed, please try again');</script>";
                // $statusMsg = "File upload failed, please try again.";
            } 
        }else{
          echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            // $statusMsg = "Sorry, there was an error uploading your file.  ";
        }
    }else{
      echo "<script>alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.');</script>";
        // $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
  echo "<script>alert('කරුණාකර අවසරපත්‍ර පින්තූර ඇතුලත් කරන්න.');</script>";
    // $statusMsg = 'Please select a file to upload.';
}
}
}
}
}
} echo "<script>alert('කරුණාකර අවසරපත්‍ර පින්තූර ඇතුලත් කරන්න.');</script>";
}
// Display status message
echo $statusMsg;
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
  <title>Permit</title>
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

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>
          <div class="text-center">
   
              </div>

              <div class="card mb-4">
			
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h4 class="m-0 font-weight-bold text-primary">අයදුම් කරුගේ විස්තර</h4>
      </div>
      <div class="card-body"><code><span style="color:red">*</span> අනිවාර්යයෙන් පිරවිය යුතුයි!</code>

<?php
$queryr = $conn->query("SELECT * from applicant WHERE id=$apid");
if($queryr !== false && $queryr->num_rows > 0){
while($row=$queryr->fetch_assoc()){
$name=$row["fullname"];
$add=$row["addres"];
$nic=$row["nic"];
$police=$row["police"];
                    echo"   <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-1 col-form-label'>නම:</label>
                    <div class='col-sm-5'>
                    <label for='inputEmail3' > $name</label>
                    </div>
                 
                  <label for='inputPassword3' class='col-sm-3 col-form-label'>ජා.හැ.අංකය:</label>
                  <div class='col-sm-3'>
                  <label for='inputEmail3' class='col-sm-6 col-form-label'> $nic</label>
                  </div></div>
                  <div class='form-group row'>
                    <label for='inputPassword3' class='col-sm-1 col-form-label'>ලිපිනය:</label>
                    <div class='col-sm-5'>
                    <label for='inputEmail3'> $add</label>
                    </div>
                    <label for='inputPassword3' class='col-sm-3 col-form-label'>පොලිස් ස්ථානය:</label>
                    <div class='col-sm-3'>
                    <label for='inputEmail3' class='col-sm-7 col-form-label'> $police</label>
                    </div>
                  </div>";
}
}
?>
      <form action="" name="aplicant" method="post" class="signin-form" enctype="multipart/form-data"> 
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">සහකාර පුපුරන ද්‍රව්‍ය පාලකගේ නිරීක්ෂන වාර්තාව</h5>
      </div>

          

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">දිනය <span style="color:red">*</span></label>
            <div class="col-sm-4">
            <input type="date" class="form-control" name="ins_dt" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>

           
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">තෝරන්න <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="file" name="ins_img" style="width:390px;" class="btn btn-outline-primary" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">

            </div>
          </div>







<hr color="black">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">ප්‍රාදේශීය ලේකම් අවසරපත්‍රය</h5>
      </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">ඉඩම් වර්ගය <span style="color:red">*</span></label>
            <div class="col-sm-4">
            <select class="form-control" name="gov" id="gov" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="පෞද්ගලික">පෞද්ගලික</option>
                      <option value="ප්‍රාදේශීය ලේකම් සතුය">ප්‍රාදේශීය ලේකම් සතුය</option>
                      <option value="ඉඩම් ප්‍රතිසංස්කරණ කොමිෂන් සභාව සතුය">ඉඩම් ප්‍රතිසංස්කරණ කොමිෂන් සභාව සතුය</option> 
						          <option value="මහවැලි සංවර්ධන අධිකාරිය සතුය">මහවැලි සංවර්ධන අධිකාරිය සතුය</option>
						          <option value="වන සං‍රක්ෂණ දෙපාර්තමේන්තුව සතුය">වන සං‍රක්ෂණ දෙපාර්තමේන්තුව සතුය</option>
					  
                    </select>
            </div>
          
            <label for="select2SinglePlaceholder" class="col-sm-2 col-form-label">ප්‍රාදේශීය ලේකම් සතුනම් ප්‍රමාණය</label>
					 <div class="col-sm-4">
           <input type="text" class="form-control" name="qtyper" >
					</div>
         
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="dt1" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>

            <label for="inputEmail3" class="col-sm-1 col-form-label">අවලංගු දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="edt1" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">තෝරන්න <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="file" name="img1" style="width:330px;" class="btn btn-outline-primary" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">

            </div>
          </div>





          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h5 class="m-0 font-weight-bold text-primary">පොලිස් අවසරපත්‍රය</h5>
      </div>

  <div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">පොලිස් ස්ථානය</label>
            <div class="col-sm-4">
            <?php echo " <label for='inputEmail3' class='col-sm-7 col-form-label'> $police</label>"; 
             echo '<input type="hidden" name="plic" id="plic" value="'.$police.'">';
            ?>
            </div>
          
            <label for="inputPassword3" class="col-sm-2 col-form-label">නිර්දේශය <span style="color:red">*</span></label>
            <div class="col-sm-4">
            <div class="form-check form-check-inline">
                      <p class="form-control"><input type="radio" id="yes" name="stat" value="නිර්දේශ කරමි"> නිර්දේශ කරමි</p>
                    </div>
                    <div class="form-check form-check-inline">
                    <p class="form-control"><input type="radio" id="no" name="stat" value="නොකරමි"> නොකරමි</p>
				          	</div>
            </div>
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="dt2" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>

            <label for="inputEmail3" class="col-sm-1 col-form-label">අවලංගු දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="edt2" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">තෝරන්න <span style="color:red">*</span></label>
            <div class="col-sm-4">
            <input type="file" name="img2" style="width:330px;" class="btn btn-outline-primary" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">

            </div>
          </div>

          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h5 class="m-0 font-weight-bold text-primary">භූ විද්‍යා සමීක්ෂණ හා පතල් කාර්‍යාංශ බලපත්‍රය</h5>
      </div>
          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">බලපත්‍ර වර්ගය <span style="color:red">*</span></label>

          <div class="col-sm-4">
           <select class="form-control" name="ptype" id="ptype" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="A">A</option>
                      <option value="‍B">B</option>  
                      <option value="C">C</option>
                      <option value="‍D">D</option>              
                    </select>
					</div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">බලපත්‍ර අංකය <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="pn2"  required="required" oninvalid="this.setCustomValidity('කරුණාකර බලපත්‍ර අංකය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">මාසික නිෂ්පාදන පරිමාව <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="month" required="required" oninvalid="this.setCustomValidity('කරුණාකර මාසික නිෂ්පාදන පරිමාව ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">වලේ ගැඹුර(මීටර්) <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="depth" required="required" oninvalid="this.setCustomValidity('කරුණාකර වලේ ගැඹුර ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">ඉඩමේ නම <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="lndname" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඉඩමේ නම ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">ප්‍රාදේශීය ලේකම් කොට්ඨාශය <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="gsd" required="required" oninvalid="this.setCustomValidity('කරුණාකර ප්‍රා.ලේ.කොට්ඨාශය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">ඔප්පු අංකය <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="deedno" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඕප්පු අංකය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">කැබලි අංකය <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="lotno" required="required" oninvalid="this.setCustomValidity('කරුණාකර කැබලි අංකය')"oninput="setCustomValidity('')">
            </div>
          </div>


          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">ඛණ්ඩාංක - උතුරු <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="north" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඛණ්ඩාංක ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          
            <label for="inputPassword3" class="col-sm-2 col-form-label">නැගෙනහිර <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="east" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඛණ්ඩාංක ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          </div>


          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">බෝර වලවල් පිපිරවීම් සංඛ්‍යාව <span style="color:red">*</span></label>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="one" placeholder="එක් වරක">
            </div>
   
              
              <div class="col-sm-2">
              <input type="text" class="form-control" name="day" placeholder="දිනක" >
            </div>

            <div class="col-sm-3">
              <input type="text" class="form-control" name="wk" placeholder="සතියක" >
            </div>
              <div class="col-sm-3">
              <input type="text" class="form-control" name="mnth" placeholder="මසක">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="dt3" placeholder="දිනය" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>

            <label for="inputEmail3" class="col-sm-1 col-form-label">අවලංගු දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="edt3" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">තෝරන්න <span style="color:red">*</span></label>
            <div class="col-sm-4">
            <input type="file" name="img3" style="width:330px;" class="btn btn-outline-primary" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">

            </div>
          </div>


          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h5 class="m-0 font-weight-bold text-primary">පරිසර බලපත්‍රය</h5>
      </div>
          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">බලපත්‍ර වර්ගය <span style="color:red">*</span></label>

          <div class="col-sm-4">
           <select class="form-control" name="ptype4" id="ptype4" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
                      <option value="">තෝරන්න</option>
                      <option value="පලාත්">පලාත්</option>
                      <option value="‍මධ්‍යම">‍මධ්‍යම</option>  
                          
                    </select>
					</div>

           
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">බලපත්‍ර අංකය <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="pn4" required="required" oninvalid="this.setCustomValidity('කරුණාකර බලපත්‍ර අංකය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="dt4" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>

            <label for="inputEmail3" class="col-sm-1 col-form-label">අවලංගු දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="edt4" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">තෝරන්න <span style="color:red">*</span></label>
            <div class="col-sm-4">
            <input type="file" name="img4" style="width:330px;" class="btn btn-outline-primary" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">

            </div>
          </div>

          <hr color="black">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h5 class="m-0 font-weight-bold text-primary">ප්‍රාදේශීය සභා අවසරපත්‍රය</h5>
      </div>
          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">ප්‍රාදේශීය සභාව <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ps" required="required" oninvalid="this.setCustomValidity('කරුණාකර ප්‍රාදේශීය සභාව ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-2 col-form-label">අවසරපත්‍ර අංකය <span style="color:red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="pn5" required="required" oninvalid="this.setCustomValidity('කරුණාකර අවසරපත්‍ර අංකය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="dt5" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>
          
            <label for="inputEmail3" class="col-sm-1 col-form-label">අවලංගු දිනය <span style="color:red">*</span></label>
            <div class="col-sm-2">
            <input type="date" class="form-control" name="edt5" required="required" oninvalid="this.setCustomValidity('කරුණාකර දිනය ඇතුලත් කරන්න')" oninput="setCustomValidity('')">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">තෝරන්න <span style="color:red">*</span></label>
            <div class="col-sm-4">
            <input type="file" name="img5" style="width:330px;" class="btn btn-outline-primary" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">

            </div>
          </div>
<br><br>
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