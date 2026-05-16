<nav class="navbar sticky-top bg-danger" id="navbar">
 
 <div class="container-fluid">
 	
 	<button class="navbar-toggler d-flex bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
 		<span class="navbar-toggler-icon"></span>
 	</button>
 	
 	<h5 class="position-absolute animate__animated animate__pulse animate__infinite infinite text-light mt-2 ps-3 ms-5">CAEDPOTRSHELPDESK</h5>

 	<div class="offcanvas offcanvas-start" id="offcanvas">
 		
 	  <div class="offcanvas-header">
    	<h5 class="offcanvas-title text-muted fw-bolder"><?= $full_name	. " | " . $initials ?></h5>
    <button type="button" class="btn-close btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  	</div><hr class="border border-2 border-muted">

  	<div class="offcanvas-body">
  		
  	 <div class="text-dark">Dashboard</div><hr class="border border-1 border-dark">

	  	<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
	  			
	  		<li class="nav-item mb-3">
	  			<a href="index" class="text-decoration-none text-muted">Home</a>
	  		</li>

	  		<li class="nav-item mb-3">
	  		  <a href="complete_records" class="text-decoration-none text-muted">Completed Records</a>	
	  		</li>

	  		<li class="nav-item mb-3">
	  			<a href="incident_records" class="text-decoration-none text-muted">Incident Reports</a>
	  		</li>

	  		<li class="nav-item mb-3">
	  			<a href="settings" class="text-decoration-none text-muted">Settings</a>
	  		</li>

	  		<li class="nav-item">
  				<a href="../logout" class="text-decoration-none text-muted">Logout</a>
  			</li>

	  	</ul>

  	</div>

 	</div>

 </div>

</nav>


