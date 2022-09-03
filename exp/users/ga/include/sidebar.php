<?php 
  $uid =  $_SESSION["id"] ;
      
  $k = $conn->query("SELECT * from users  WHERE id = $uid ");
  if($k !== false && $k->num_rows > 0){
  while($row=$k->fetch_assoc()){
  $d=$row["district"]; 
    } 
  }
?>

<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../../assets/img/logo/logo.png">
        </div>
        <marquee behavior="alternate" scrolldelay="400"><div class="sidebar-brand-text mx-3">Explosive MGT <?php echo $d; ?></div></marquee>

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
<a class='nav-link collapsed'  href='exp_approved.php' aria-expanded='true' aria-controls='collapseBootstrap'>
          <i class='fab fa-fw fa-wpforms'></i>
          <span>New Permit</span>
          <span class="badge badge-light">
<?php

$uid =  $_SESSION["id"] ;
$us = $conn->query("SELECT * from users  WHERE id = $uid ");
if($us !== false && $us->num_rows > 0){
while($row=$us->fetch_assoc()){
$dis=$row["district"]; 
}
}

$sql="SELECT * FROM permit WHERE expOffApprove='1' AND district='$dis'";

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
        <a class="nav-link collapsed" href="app_permit.php"  
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Approved Permit</span>
        </a>
	</li>
	 
    </ul>

        