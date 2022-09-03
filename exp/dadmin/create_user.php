<?php session_start();
require_once('../include/config.php');

$uid =  $_SESSION["id"] ; 

$query = $conn->query("SELECT * from users  WHERE id = $uid ");
if($query !== false && $query->num_rows > 0){
while($row=$query->fetch_assoc()){
$dis=$row["district"]; 
  }
}
    //Code for Registration 

    if(isset($_POST['signup']))
    { 
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $contact=$_POST['contact'];
        $nic=$_POST['nic'];
        $role=$_POST['role'];
        $enc_password=md5($password);
        $sql=mysqli_query($conn,"select id from users where nic='$nic'");
        $row=mysqli_num_rows($sql);

        if($row>0)
        {
          echo "<script>alert('User already exist with another account. Please try again');</script>";
        } else{
            $msg=mysqli_query($conn,"insert into users(fname,lname,email,password,contactno,role,district,uploaded_on,nic) values('$fname','$lname','$email','$enc_password','$contact','$role','$dis',NOW(),'$nic')");

            if($msg)
            {
              echo "<script>alert('Registration successfully');</script>";
              echo '<script type="text/javascript">location.href = "index.php";</script>';
            }
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
  <link href="../assets/img/logo/logo.png" rel="icon">
  <title>Create Users</title>
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">
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
          <form action="" name="registration" method="post" class="signin-form" enctype="multipart/form-data"> 
          <div class="form-group mb-3">
                           
                           <select class="form-control" name="role" style="color:black;width:400px" class="dash" id="dis" required="required" oninvalid="this.setCustomValidity('කරුණාකර කාර්යභාරය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                           <option value="">Select User Role</option>
                           <option value="ga">GA</option>
                           <option value="expc">Explosive Controller</option>
                           <option value="clerk">Clerk</option>
                           </select>
                           </div>
                        <div class="form-group mb-3">
                                
                                <input class="form-control" type="text" name="fname" style="width:400px" placeholder="First Name" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඔබගේ නම ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                            </div>
                           
                           

                        <div class="form-group mb-3">
                                
                                <input class="form-control" type="text" name="lname" style="width:400px" placeholder="Last Name" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඔබගේ නම ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                            </div>

                        <div class="form-group mb-3">
                               
                                <input class="form-control" type="email" name="email" style="width:400px" placeholder="Email" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඔබගේ විදුත් තැපැල් ලිපිනය ඇතුලත් කරන්න')"oninput="setCustomValidity('')">
                            </div>


                            <div class="form-group mb-3">
                               
                                <input class="form-control" type="nic" name="nic" style="width:400px" placeholder="NIC No" required="required" oninvalid="this.setCustomValidity('කරුණාකර නිවැරදි ජා.හැ.අංකය ඇතුලත් කරන්න')" pattern="[0-9]{9}[vV]{1}|[0-9]{12}" oninput="setCustomValidity('')">
                            </div>
                     
                        <div class="form-group mb-3">
                                
                                <input class="form-control" type="text" name="contact"  style="width:400px" placeholder="Phone Number" required="required" oninvalid="this.setCustomValidity('කරුණාකර ඔබගේ අංක 10කින් සමන්විත දුරකතන අංකය ඇතුලත් කරන්න')"  pattern="[0]{1}[0-9]{9}" oninput="setCustomValidity('')">
                                
                            </div>

                    <div class="form-group mb-3">
                               
                                <input class="form-control" type="password" name="password" required style="width:400px" placeholder="Password"><br>  
                                <button style="width:200px;height:38px;border-radius: 20px;" class="form btn btn-success " name="signup" type="submit" style="float:right">Create User</button>

                            </div>
                           
                        
                </form>
          </div>
</center>
         

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