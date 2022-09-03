<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
$uid =  $_SESSION["id"] ;
$us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"]; 
}
}

$bc = $conn->query("SELECT * from applicant");
if($bc !== false && $bc->num_rows > 0){
while($row=$bc->fetch_assoc()){
$id=$row["id"];
  }
}
?>
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../../assets/img/logo/logo.png">
        </div>
        <marquee behavior="alternate" scrolldelay="400"><div class="sidebar-brand-text mx-3">Explosive MGT <?php echo $dis; ?></div></marquee>

       
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="view_table.php"  
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>View Applicant</span>
        </a>
</li>

<li class="nav-item">
<?php echo "<a class='nav-link collapsed'  href='approve.php?id=$id' aria-expanded='true' aria-controls='collapseBootstrap'> "; ?>
          <i class='fab fa-fw fa-wpforms'></i>
          <span>New Permit</span>
          <span class="badge badge-light">
<?php
$sql="SELECT * FROM permit WHERE expOffApprove='0' AND district='$dis'";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d\n",$rowcount);
  // Free result set 
  mysqli_free_result($result);
  }

?></span>

</a>  
</li>
 
<li class="nav-item">
        <a class="nav-link collapsed" href="view_approved_table.php"  
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Approved Permit</span>
        </a>
</li>


    </ul>

        