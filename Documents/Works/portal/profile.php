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
  						<h6><a href="./dasboard">Dashboard</a> > <a href="./courses">Profile</a></h6>
  					</div>

  					<div class="col-md-12 p-3">
              <div class="row">
                <div class="col-md-8">
                  <div class="container-fluid">
                    <div class="row text-center">
                      <div class="col-md-12">
                        <div class="img ">
                          <img src="img/user.png" class="img-fluid" style="border-radius: 50px;">
                        </div>
                      </div>
                      <div class="col-md-6 col-6">
                        <p>Name: <span>None</span></p>
                        <p>Phone: <span>09087898767</span></p>
                        <p>Mail: <span>Mail@mail.com</span></p>
                      </div>
                      <div class="col-md-6 col-6">
                        <p>Matric No: <span>15404054</span></p>
                        <p>Level: <span>100</span></p>
                        <p>Session: <span>2018/2019</span></p>
                      </div>
                      <div class="col-md-12 col-12">
                        <button id="toogleProfile" class="btn btn-primary pull-right">Edit Profile<span class="fa fa-pencil"></span></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div id="editProfileId">
                    <div class="p-3">
                      <label>Edit Profile</label>
                      <form id="editMyProfile" method="POST">
                        <div class="form-group">
                          <input type="text" class="form-control" name="fullName" value="<?php if ($getUserDetails['fullName']) {
                             echo $getUserDetails['fullName'];
                          } ?>" placeholder="Ful Name">
                        </div>
                        <div class="form-group">
                          <input type="number" name="mobile" value="<?php if ($getUserDetails['phone']) {
                             echo $getUserDetails['phone'];
                          } ?>" placeholder="Mobile Number" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="email" name="mail" value="<?php if ($getUserDetails['email']) {
                             echo $getUserDetails['email'];
                          } ?>" placeholder="Mail Address" class="form-control">
                        </div>
                        <div class="form-group">
                          <select class="form-control" name="level">
                            <?php if ($getUserDetails['level']) { ?>
                             <option><?php echo $getUserDetails['level']; ?></option> 
                          <?php }else{ ?>
                                <option>:: Select Level ::</option>
                          <?php } ?>
                            <option>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <select class="form-control" name="department">
                            <option>:: Select Department ::</option>
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
                          <input type="hidden" name="editAllMyProfile">
                          <button type="submit" class="btn btn-primary btn-block">Edit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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

 <script type="text/javascript">
   $('#toogleProfile').click(function(){
      $('#editProfileId').toggle();
   });

   $('#editMyProfile').submit(function(e){
    e.preventDefault();

    var datas = new FormData(this);

      $.ajax({
        url: 'php/controller.php',
        method: 'POST',
        data: datas,
        success: function(data){
          var row = JSON.parse(data)
          alert(row['msg']);
        },
        cache: false,
        contentType: false,
        processData: false
      })
   });

 </script>