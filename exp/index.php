<?php 
session_start();
require_once('include/config.php');
error_reporting(0);

// Code for login 
if(isset($_POST['login']))
{
 $password=$_POST['password'];
 $dec_password=md5($password); 
 $nicno=$_POST['nicno'];
 $sql="SELECT * FROM users WHERE nic='$nicno' and password='$dec_password'";
$ret= mysqli_query($conn,$sql);
$num=mysqli_fetch_array($ret);
$_SESSION['id']=$num['id'];
$_SESSION['role']=$num['role'];
$_SESSION['fname']=$num['fname'];
$_SESSION['lname']=$num['lname'];
$_SESSION['contactno']=$num['contactno'];
if($num>0)
{
 
	if($num["role"]=="admin")
	{	
	$_SESSION["email"]=$useremail;
	header("location:admin/index.php");
	}

	else if($num["role"]=="dadmin")
	{
		$_SESSION["email"]=$useremail;
		header("location:dadmin/index.php");
	}

	else if($num["role"]=="clerk")
	{
		$_SESSION["email"]=$useremail;
		header("location:users/clerk/index.php");
	}
	else if($num["role"]=="ga")
	{
		$_SESSION["email"]=$useremail;
		header("location:users/ga/index.php");
	}
  else if($num["role"]=="expc")
	{
		$_SESSION["email"]=$useremail;
		header("location:users/expc/index.php");
	}
  else if($num["role"]=="ministry")
	{
		$_SESSION["email"]=$useremail;
		header("location:users/ministry/index.php");
	}
  





	}
	else
	{
	echo "<script>alert('ජා.හැ.අංකය හෝ මුරපදය වැරදියි');</script>";
	echo '<script type="text/javascript">location.href = "index.php";</script>';
	exit();
	} 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <link href="assets/img/logo/logo.png" rel="icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Explosive Management System - Login</title>
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" style="background-size: cover ;background-image: url('assets/img/bg1.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
               <center><img src="assets/img/logo/logo.png" width="80" height="110"></center> 
                  <div class="text-center"><h5><b><span class="text-primary">Explosive Management System</span></b></h5>
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                      <input type="text" class="form-control" id="nicno" name="nicno" placeholder="Enter National Id No">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
					<input type="submit" name="login" value="Login" class="form-control btn-primary">
                      
                    </div>
                 
                  </form>
                  <hr>
                  <div class="text-center">
                  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
</body>

</html>