<?php

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
?>

<?php
error_reporting(0);
$statusMsg = '';

$targetDir = "../../assets/img/logo/";
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 
    ceil($length/strlen($x)) )),1,$length);
        }
if(isset($_POST["submit"])){

    if(!empty($_FILES["file"]["name"])){
        $fileName = basename($_FILES["file"]["name"]);
        $fileName = generateRandomString() . $fileName;
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
       
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
      
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        
        $sql = "update users set fname='$fname',lname='$lname',email='$email',contactno='$contact',file_name='$fileName',uploaded_on=NOW()  WHERE id='$uid'";

        $insert = $conn->query($sql);

            if($insert){
                echo "<script>alert('Update successfully');</script>";
                echo "<script type='text/javascript'>location.href = 'index.php';</script>";
        
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{ 
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
}
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
  <title>Update Profile</title>
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
        <main class="bg-gradient-login" style="background-size: cover ;background-image: url('../../assets/img/bg1.jpg') ; background-repeat: no-repeat;background-attachment: fixed">

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>
          <div class="text-center">

          <form action="" method="post" enctype="multipart/form-data"> 
          <center>
         <div class="form-group mb-3">
                 
                 <input class="form-control" type="text" name="fname" required style="width:400px" placeholder="First Name">
             </div>

         <div class="form-group mb-3">
                 
                 <input class="form-control" type="text" name="lname" required style="width:400px" placeholder="Last Name">
             </div>

         <div class="form-group mb-3">
                
                 <input class="form-control" type="email" name="email" required style="width:400px" placeholder="Email">
             </div>
      
         <div class="form-group mb-3">
                 
                 <input class="form-control" type="text" name="contact" required style="width:400px" placeholder="Phone Number">
                 
             </div>
                 
                 <label  >&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;Upload Profile Image</label> 
                 <input type="file" class="dash" style="width:415px" name="file">                             
            

     <div class="form-group mb-3">
     <br><br>
                 <input type="submit" name="submit" value="Update Profile" style="width:200px;height:38px;border-radius: 20px;" class="form btn btn-success ">

             </div>

            </center>
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