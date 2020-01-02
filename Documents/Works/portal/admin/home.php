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

  					<div class="col-md-12 p-3 text-center">
              <div class="table">
                <label>Student table</label>
                <table class="table table-hover" id="myTable">
                  <thead>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Matric No.</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Date Reg</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Darlington Damola</td>
                      <td>150404054</td>
                      <td>Computer Science</td>
                      <td>400</td>
                      <td>10/12/2019</td>
                      <td>
                        <button class="btn btn-info btn-sm">Withdraw</button><!-- 
                        <button class="btn btn-danger btn-sm">Rusticated</button>
                        <button class="btn btn-success btn-sm">Approved</button>
                        <button class="btn btn-primary btn-sm">Suspended</button> -->
                      </td>
                      <td>
                        <button class="btn btn-info btn-sm">W</button>
                        <button class="btn btn-danger btn-sm">D</button>
                        <button class="btn btn-success btn-sm">A</button>
                        <button class="btn btn-primary btn-sm">S</button>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Matric No.</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Date Reg</th>
                    <th>Status</th>
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