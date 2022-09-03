<?php
require_once('../include/config.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (strlen($_SESSION['id']==0)) {
  header('<location:login/logout.php');
  } else{
  }
  $uid =  $_SESSION["id"] ;

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from users WHERE id='" . $_SESSION["id"] . "'");
    $row = mysqli_fetch_array($result);
    $password=$_POST["currentPassword"];
    $dec_password=md5($password);

    $npassword=$_POST["newPassword"];
    $enc_password=md5($npassword);
     
    if ($dec_password == $row["password"]) {
        mysqli_query($conn, "UPDATE users set password='" . $enc_password . "' WHERE id='" . $_SESSION["id"] . "'");
        $message = "Password Changed Successfully!";
    } else
        $message = "Current Password is not correct";
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
  <link href="../assets/img/logo/logo.png" rel="icon">
  <title>Password Change</title>
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">

  <script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>
          <div class="text-center">

          <center>

<form name="frmChange" method="post" action=""
    onSubmit="return validatePassword()">
    <div style="width: 500px;">
        <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
        <table border="0" cellpadding="10" cellspacing="0"
            width="500" align="center" class="tblSaveForm">
            <tr class="tableheader">
                <td colspan="2" style="color:white;">Change Password</td>
            </tr>
            <tr>
                <td width="40%"><label>Current Password</label></td>
                <td width="60%"><input type="password"
                    name="currentPassword" class="txtField" /><span
                    id="currentPassword" class="required"></span></td>
            </tr>
            <tr>
                <td><label>New Password</label></td>
                <td><input type="password" name="newPassword"
                    class="txtField" /><span id="newPassword"
                    class="required"></span></td>
            </tr>
            <td><label>Confirm Password</label></td>
            <td><input type="password" name="confirmPassword"
                class="txtField" /><span id="confirmPassword"
                class="required"></span></td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="2"><br><input type="submit" name="submit"
                    value="Submit" style="width:200px;height:38px;border-radius: 20px;" class="form btn btn-success "></td>
            </tr>
        </table>
    
    </div>
</form>
</center> 
          
            
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include '../include/footer.php';?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/ruang-admin.min.js"></script>

</body>

</html>