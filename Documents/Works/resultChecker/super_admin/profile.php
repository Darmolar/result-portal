<?php require_once 'config/header.php'; ?>

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
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Update your profile</p>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control">
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mobile</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Edit Password</h4>
                  <p class="card-category">Change Password</p>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">New Password</label>
                          <input type="email" class="form-control">
                        </div>
                      </div>
                    
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Retype New Password</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-danger pull-right">Change Password</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#">
                    <img class="img" src="../assets/img/<?php echo $image; ?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category"><?php echo getrole($staffID, $mysqli); ?></h6>
                  <h4 class="card-title"><?php echo $name; ?></h4>
                  <p class="card-description">
                    <?php echo $email." | ".$mobile." | ".$address; ?>
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
<?php require_once 'config/footer.php'; ?>