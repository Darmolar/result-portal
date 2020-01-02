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
  						<h6><a href="./dasboard">Dashboard</a> > <a href="./courses">Courses</a></h6>
  					</div>

  					<div class="col-md-4 p-3 text-center con">
  						<p>Register a new Course</p>
  						<div class="form">
  							<form method="post" id="submitCourse">
  							  <div class="form-group"> 	
  								  <input type="text" name="preCouser" placeholder="Enter Course" class="form-control" required>
  							  </div>
  							  <div class="form-group"> 	
  								  <input type="text" name="preCouserName" placeholder="Enter Course Title" class="form-control" required>
  							  </div>
                  <div class="form-group">  
                   <select class="form-control" name="department" required>
                      <option disabled selected>:: Select Department ::</option>
                      <?php
                      $row = getAllTable('departments', $mysqli); $i = 0;
                        while($rows = $row->fetch_assoc()){ 
                            $i++;
                          ?>
                            
                          <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php }                        
                    ?>
                    </select>
                  </div>
                  <div class="form-group">  
                   <select class="form-control" name="semester" required>
                      <option disabled selected>:: Select Semester ::</option>
                      <option value="1">Frist Semester</option>
                      <option value="2">Second Semester</option>
                    </select>
                  </div>
  							  <div class="form-group"> 	
  								 <select class="form-control" name="level" required>
    									<option disabled selected>:: Select Level ::</option>
    									<option>100</option>
    									<option>200</option>
    									<option>300</option>
    									<option>400</option>
    									<option>500</option>
    								</select>
  							  </div>
  							  <div class="form-group">
                    <input type="hidden" name="addcourse">
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
  									<th>Cousres</th>
  									<th>Title</th>
  									<th>Action</th>
  								</thead>
  								<tbody>
                      <?php
                      $row = getAllTable('courses', $mysqli); $i = 0;
                        while($rows = $row->fetch_assoc()){ 
                            $i++;
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rows['name']; ?></td>
                            <td><?php echo $rows['title']; ?></td>
                            <td>
                              <button data-id="<?php echo $rows['id']; ?>" class="btn btn-outline-danger btn-sm">Delete</button>
                            </td>
                          </tr>
                    <?php }                        
                    ?>
  								
  								</tbody>
  								<tfoot>
  									<th>S/N</th>
  									<th>Cousres</th>
  									<th>Title</th>
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