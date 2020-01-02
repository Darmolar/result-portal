<?php 
  require_once 'config/header.php';

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["updateStaff"])){
      $staff_id = htmlentities(trim($_POST["staff_id"]), ENT_QUOTES, "UTF-8");
      $name = htmlentities(trim($_POST["name"]), ENT_QUOTES, "UTF-8");
      $email = htmlentities(trim($_POST["email"]), ENT_QUOTES, "UTF-8");
      $mobile = htmlentities(trim($_POST["mobile"]), ENT_QUOTES, "UTF-8");
      $gender = htmlentities(trim($_POST["gender"]), ENT_QUOTES, "UTF-8");
      $address = htmlentities(trim($_POST["address"]), ENT_QUOTES, "UTF-8");
      $role = htmlentities(trim($_POST["role"]), ENT_QUOTES, "UTF-8");

      if (empty($name) || empty($email) || empty($mobile) || empty($gender) || empty($address) || empty($role)) {
        $errUpdate = "Fill the form";
      }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errUpdate = "Invalid email address";
      }else{
        $image = 'IMAGE';
        $update = $mysqli->prepare("UPDATE staff_profile SET name = ?, email = ?, mobile = ?, gender = ?, address = ?, image = ? WHERE staff_id = ?");
        $update->bind_param("ssissss", $name, $email, $mobile, $gender, $address, $image, $staff_id);
        $update->execute();

        if ($update->affected_rows > 0) {
          $update2 = $mysqli->prepare("UPDATE staff SET role = ? WHERE staff_id = ?");
          $update2->bind_param("ss", $role, $staff_id);
          $update2->execute();

          if ($update2->affected_rows > 0) {
            $successUpdate = "Staff Account Updated successfully";
          }else{
            die($update2->error);
          }
        }else{
          die($update->error);
        }
      }
    }else if (isset($_POST["addStaff"])) {
      $name = htmlentities(trim($_POST["name"]), ENT_QUOTES, "UTF-8");
      $email = htmlentities(trim($_POST["email"]), ENT_QUOTES, "UTF-8");
      $mobile = htmlentities(trim($_POST["mobile"]), ENT_QUOTES, "UTF-8");
      $gender = htmlentities(trim($_POST["gender"]), ENT_QUOTES, "UTF-8");
      $address = htmlentities(trim($_POST["address"]), ENT_QUOTES, "UTF-8");
      $role = htmlentities(trim($_POST["role"]), ENT_QUOTES, "UTF-8");

      if (empty($name) || empty($email) || empty($mobile) || empty($gender) || empty($address) || empty($role)) {
        $err = "Fill the form";
      }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Invalid email address";
      }else if(email_exist($email, $mysqli)){
        $err = "Email exist already";
      }else{
        $staff_id = "staff".uniqid();
        $pass = password_hash($email, PASSWORD_BCRYPT);
        $hash = md5(rand(1,1000000000));
        $image = 'IMAGE';
        $insert = $mysqli->prepare("INSERT INTO staff_profile(staff_id, name, email, mobile, gender, address, image) VALUES(?,?,?,?,?,?,?)");
        $insert->bind_param("sssisss", $staff_id, $name, $email, $mobile, $gender, $address, $image);
        $insert->execute();

        if ($insert->affected_rows > 0) {
          $insert2 = $mysqli->prepare("INSERT INTO staff(staff_id, pass, hash, role) VALUES(?,?,?,?)");
          $insert2->bind_param("ssss", $staff_id, $pass, $hash, $role);
          $insert2->execute();

          if ($insert2->affected_rows > 0) {
            $success = "Staff Account Created successfully";
          }else{
            die($insert2->error);
          }
        }else{
          die($insert->error);
        }
      }
    }
  }else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["delete"]) && !empty($_GET["delete"])) {
      $staff_id = htmlentities(trim($_GET["delete"]), ENT_QUOTES, "UTF-8");

      $delete = $mysqli->prepare("DELETE FROM staff_profile WHERE staff_id = ?");
      $delete->bind_param("s", $staff_id);
      $delete->execute();

      if ($delete->affected_rows > 0) {
        $delete2 = $mysqli->prepare("DELETE FROM staff WHERE staff_id = ?");
        $delete2->bind_param("s", $staff_id);
        $delete2->execute();

        if ($delete2->affected_rows > 0) {
          $successDelete = "$staff_id deleted successfully";
        }
      }
    }
  }
?>

<body>
  <div class="wrapper">
    
    <!-- Require Side Bar Script -->
    <?php require_once 'config/sidebar.php'; ?>
    <!-- End of Side Bar Script-->

    <div class="main-panel">
      
      <!-- Navbar -->
      <?php require_once 'config/top_nav.php'; ?>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <?php 
            if (isset($errUpdate)) { ?>
              <h5 style="color: red;"><?php echo $errUpdate; ?></h5>
            <?php }else if(isset($successUpdate)){ ?>
              <h5 style="color: green;"><?php echo $successUpdate; ?></h5>
            <?php }
          ?>
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <?php 
                if (isset($_GET["edit"]) && !empty($_GET["edit"])) {
                  $staff_id = htmlentities(trim($_GET["edit"]), ENT_QUOTES, "UTF-8");

                  $t = getStaffDetails($staff_id, $mysqli);
                  if ($t->num_rows > 0) {
                    $to = $t->fetch_assoc();
                    ?>
                    <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Edit Staff</h4>
                      <p class="card-category">Edit staff details below</p>
                    </div>
                    <div class="card-body">
                      <?php 
                        if (isset($err)) { ?>
                          <h5 style="color: red;"><?php echo $err; ?></h5>
                        <?php }else if(isset($success)){ ?>
                          <h5 style="color: green;"><?php echo $success; ?></h5>
                        <?php }
                      ?>
                      <form method="POST">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="bmd-label-floating">Name</label>
                              <input type="text" class="form-control" name="staff_id" value="<?php echo $to["staff_id"]; ?>" hidden>
                              <input type="text" class="form-control" name="name" value="<?php echo $to["name"]; ?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="bmd-label-floating">Email address</label>
                              <input type="email" class="form-control" name="email" value="<?php echo $to["email"]; ?>">
                            </div>
                          </div>
                        
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="bmd-label-floating">Mobile</label>
                              <input type="text" class="form-control" name="mobile" value="<?php echo $to["mobile"]; ?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Select Gender</label>
                              <select class="form-control" name="gender">
                                <option>::Select Gender::</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="bmd-label-floating">Adress</label>
                              <input type="text" class="form-control" name="address" value="<?php echo $to["address"]; ?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Select Role</label>
                              <select class="form-control" name="role">
                                <option>::Select Role::</option>
                                <option>super_admin</option>
                                <option>teacher</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        
                        <button type="submit" name="updateStaff" class="btn btn-primary pull-right">Update Staff Details</button>
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>
                  <?php }
                }else{ ?>
                  <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Add Staff</h4>
                  <p class="card-category">Fill the form below</p>
                </div>
                <div class="card-body">
                  <?php 
                    if (isset($err)) { ?>
                      <h5 style="color: red;"><?php echo $err; ?></h5>
                    <?php }else if(isset($success)){ ?>
                      <h5 style="color: green;"><?php echo $success; ?></h5>
                    <?php }
                  ?>
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                    
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mobile</label>
                          <input type="text" class="form-control" name="mobile">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Select Gender</label>
                          <select class="form-control" name="gender">
                            <option>::Select Gender::</option>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control" name="address">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Select Role</label>
                          <select class="form-control" name="role">
                            <option>::Select Role::</option>
                            <option>super_admin</option>
                            <option>teacher</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" name="addStaff" class="btn btn-info pull-right">Add Staff</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
                <?php }
              ?>
              
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-info">
                  <h4 class="card-title mt-0"> Staff Table</h4>
                  <p class="card-category"> List of all Staff currently engaged</p>
                </div>
                <div class="card-body">
                  <?php 
                    if(isset($successDelete)){ ?>
                      <h5 style="color: green;"><?php echo $successDelete; ?></h5>
                    <?php }
                  ?>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Actions</th>
                        <th>Date Added</th>
                      </thead>
                      <tbody>
                        <?php 
                          $result = getAllStaffExceptMe($staffID, $mysqli);

                          if ($result->num_rows > 0) {
                            while ($rows = $result->fetch_assoc()) { ?>
                              <tr>
                                <td><?php echo $rows["staff_id"]; ?></td>
                                <td><?php echo $rows["name"]; ?></td>
                                <td><?php echo $rows["email"]; ?></td>
                                <td><?php echo $rows["mobile"]; ?></td>
                                <td><?php echo $rows["gender"]; ?></td>
                                <td><?php echo $rows["address"]; ?></td>
                                <td><?php echo getrole($rows["staff_id"], $mysqli); ?></td>
                                <td>
                                  <a href="./add_staff.php?delete=<?php echo $rows["staff_id"]; ?>" class="badge badge-danger" >D</a>
                                  <a href="./add_staff.php?edit=<?php echo $rows["staff_id"]; ?>" class="badge badge-info">E</a>
                                </td>
                                <td><?php echo date($rows["date"]); ?></td>
                              </tr>      
                            <?php }
                          }else{ ?>
                            <tr>
                              <td colspan="10" style="text-align: center;">No staff yet!</td>
                            </tr>
                          <?php }
                        ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
<?php require_once 'config/footer.php'; ?>