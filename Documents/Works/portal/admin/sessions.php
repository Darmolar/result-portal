<?php
  require_once "php/header.php";
?>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="./">Portal</a>
	  <div id="navbarNav" class="float-right">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Features</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	      </li>
	    </ul>
	  </div>
	</nav>
</header>

<section>
  <div class="container-fluid"> 
  	<div class="row">
  		<?php require_once "php/sidebar.php"; ?>
  		<div class="col-md-10 mainbar p-4">
  			<div class="container-fluid">
  				<div class="row">
  					<div class="col-md-12 col-12">
  						<h6><a href="./dasboard">Dashboard</a> > <a href="./departments">Sessions</a></h6>
  					</div>

  					<div class="col-md-4 p-3 text-center con">
  						<p>Register a Session</p>
  						<div class="form">
  							<form method="post" id="submitSession">
  							  <div class="form-group"> 	
  								<input type="text" name="addSession" placeholder="Enter Session" class="form-control">
  							  </div>
  							  <div class="form-group">
                    <input type="hidden" name="addSessions">
  							  	<button class="btn btn-outline-primary" type="submit">Register</button>
  							  </div>	
  							</form>
  						</div>
  					</div>
  					<div class="col-md-8">
  						<div class="table-responsive">
  							<table class="table table-hover" id="myTable">
  								<thead>
  									<th>S/N</th>
  									<th>Session</th>
  									<th>Action</th>
  								</thead>
  								<tbody>
                    <?php 
                        $row = getAllTable('sessions', $mysqli); $i = 0;
                        while($rows = $row->fetch_assoc()){ 
                            $i++;
                          ?>
                            
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rows['name']; ?></td>
                            <td>
                              <button data-id="<?php echo $rows['id']; ?>" class="btn btn-outline-danger btn-sm">Delete</button>
                            </td>
                          </tr>
                    <?php }                        
                    ?>
  								</tbody>
  								<tfoot>
  									<th>S/N</th>
  									<th>Department</th>
  									<th>Action</th>
  								</tfoot>
  							</table>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</section>

<?php
  require_once "php/footer.php";
 ?>