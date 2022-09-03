<?php

include '../include/config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (strlen($_SESSION['id']==0)) {
      header('<location:login/logout.php');
      } else{
      }
$uid =  $_SESSION["id"] ;

 $nid=$_GET["id"];
  
?>

<?php

if(isset($_POST["submit"])){
      
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $nic=$_POST["nic"];

        $sql = "update users set fname='$fname',lname='$lname',email='$email',contactno='$contact',nic='$nic',uploaded_on=NOW()  WHERE id='$nid'; ";

 
        if($conn -> query($sql)){
        echo '<script language="javascript">';
        echo 'alert("Change successfully")';
        echo '</script>';
        echo '<script type="text/javascript">location.href = "index.php";</script>';
        }
        else{
            echo "<script>alert ('Check you entered Details and Try Again..!')</script>".$conn->error;
        }
        mysqli_close($conn);
    }

if(isset($_POST["submit2"])){
$sql2 = "DELETE FROM users WHERE id='$nid';";

if ($conn->query($sql2) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("successfully Deleted")';
    echo '</script>';
    echo '<script type="text/javascript">location.href = "index.php?id=',$nid,'";</script>';
} else {
  echo "Error deleting record: " . $conn->error;
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
  <title>Edit Users</title>
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


          <form action="" method="post" enctype="multipart/form-data"> 
         
         <center>
          
<?php

$queryaa = $conn->query("SELECT * from users  WHERE id = $nid");

if($queryaa !== false && $queryaa->num_rows > 0){
  while($row=$queryaa->fetch_assoc()){

                        echo "<h5> $row[district] district $row[role]</h5>";
                        echo "<h5> Registered Date : $row[uploaded_on] </h5>";

                        echo' 
                        <table>
                        <tr><td><p>First Name :</p>
                        </td><td>
                        <input class="form-control" type="text" name="fname" required style="width:400px"';  echo" value='$row[fname]'>";
                        echo'<br> </div>
                        </td></tr><tr><td><p>Last Name :</p></td><td>
                        <div class="form-group mb-3">
                                
                        <input class="form-control" type="text" name="lname" required style="width:400px"'; echo" value='$row[lname]'>";
                        echo'  </div>
                        </td></tr><tr><td><p>Email :</p></td><td>
                        <div class="form-group mb-3">
                               
                        <input class="form-control" type="email" name="email" required style="width:400px"'; echo" value='$row[email]'>";
                        echo'  </div>
                        </td></tr><td><p>Contact Number :</p></td><td>
                        <div class="form-group mb-3">
                                
                        <input class="form-control" type="text" name="contact" required style="width:400px"'; echo" value='$row[contactno]'>";
                                
                        echo'  </div>
                        </td></tr><td><p>NIC Number :</p></td><td>
                        <div class="form-group mb-3">
                                           
                        <input class="form-control" type="text" name="nic" required style="width:400px"'; echo" value='$row[nic]'>";

                        echo' </div>
                        </td></tr></table>
                        <div class="form-group mb-3">
                        <br>
                        <input type="submit" name="submit" value="Edit Users" style="width:200px;height:38px;border-radius: 20px;" class="form btn btn-success">
                        <br><br>
                        <input type="submit" style="width:200px;height:38px;border-radius: 20px;" class="form btn btn-danger" name="submit2" value="Delete User" > 

                        </div>

                      </div>
                    </div>
                  </div>
                  </center>
                </form>

            </div>
        </div>
    </div>
</div>
</center>';
  }
}
?>
            
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