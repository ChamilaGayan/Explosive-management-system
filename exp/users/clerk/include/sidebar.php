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
          <i class="fas fa-fw fa-tachometer-alt "></i>
          <span>Dashboard </span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="view_table.php"  
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>View All Applicants</span>
        </a>
	</li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="applicant_details.php"  
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-users"></i>
          <span>Add New Application</span>
        </a>
	</li>
	<li class="nav-item">
        <a class="nav-link collapsed" href="dash_view.php?type=1"  
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>View New Applicants</span>
        </a>
	</li>
	<!--<li class="nav-item">
        <a class="nav-link collapsed" href="permit.php"  
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class='fab fa-fw fa-wpforms'></i>
          <span>Permit Detail</span>
        </a>
	</li>-->

    </ul>

        