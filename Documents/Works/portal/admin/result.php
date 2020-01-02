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
  						<h6><a href="./dasboard">Dashboard</a> > <a href="./departments">Results</a></h6>
  					</div>

  					<div class="col-md-4 p-3 text-center con">
  						<p>Upload a Result</p>
  						<div class="form">
  							<form method="post" id="submitResult">
  							  <div class="form-group"> 	
  								  <select class="form-control" name="selectSession" id="selectSession">
                      <option disabled selected>:: Select Session ::</option>  
                      <option>2018/2019</option>  
                      <option>2019/2020</option>        
                    </select>
  							  </div>
                  <div class="form-group">   
                    <select class="form-control" name="selectDepartment" id="selectDepartment">
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
                    <select class="form-control" name="selectCourse" id="selectCourse">
                      <option disabled selected>:: Select Course ::</option>  
                       <?php
                         $row = getAllTable('courses', $mysqli); $i = 0;
                          while($rows = $row->fetch_assoc()){ 
                            $i++;
                          ?>
                            
                          <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                      <?php }                        
                      ?>       
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Upload Result(must be a CSV file)</label>
                    <input type="file" name="uploadResult">
                  </div>
  							  <div class="form-group">
                    <input type="hidden" name="uploadAllResult">
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
  									<th>Course</th>
                    <th>Date</th>
  									<th>Action</th>
  								</thead>
  								<tbody>
                    <?php
                        $row = getAllTable('result', $mysqli); $i = 0;
                        while($rows = $row->fetch_assoc()){ 
                            $i++;
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php
                                    $course = select('courses', 'id', $rows['course'], $mysqli); 
                                    echo $course['name'];
                                       ?></td>
                            <td><?php echo $rows['date']; ?></td>
                            <td>
                              <a download href="file/<?php echo $rows['file'];  ?>">
                                <button class="btn btn-outline-success btn-sm">Download</button>
                              </a>
                            </td>
                          </tr>
                      <?php }                        
                      ?>      
  								</tbody>
  								<tfoot>
  									<th>S/N</th>
  									<th>Course</th>
                    <th>Date</th>
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