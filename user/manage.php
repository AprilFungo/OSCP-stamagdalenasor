
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = ''; 
    include 'include/head.php';

    if (isset($_POST['updateBtn']))
    {
      $username = mysqli_real_escape_string($dbc, $_POST['username']);
      $oldpass = mysqli_real_escape_string($dbc, $_POST['oldpass']);
      $newpass = mysqli_real_escape_string($dbc, $_POST['newpass']);
      $conpass = mysqli_real_escape_string($dbc, $_POST['conpass']);
      // check old pass
      if ($currentpass == md5($oldpass))
      {
        // check newpass and confirm pass
        if ($newpass == $conpass)
        {
          // update
          $q = @mysqli_query($dbc, "UPDATE tbl_seniors SET clm_username = '$username', clm_password = md5('$newpass') WHERE clm_scid = '$userid' ");
          if ($q)
          {
            $_SESSION['success'] = 'You have been change your credential successfully. Please login your new credential.';
            echo '<script>location.replace("../0/index");</script>';
          }
          else
          {
          $_SESSION['error'] = mysqli_error($dbc);
          }
        }
        else
        {
          $_SESSION['error'] = 'Passwords not match!';
        }
      }
      else
      {
        $_SESSION['error'] = 'Invalid old password';
      }
    }

    include 'include/navbar.php';
  ?>
 
      <div class="page-wrapper">
          <!-- Page title -->
        <div class="container-xl">
          <div class="page-header text-white d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Module
                </div>
                <h2 class="page-title">
                  Manage Account
                </h2>
              </div>              
            </div>
          </div>
        </div>
        <!-- body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 m-auto">
                              <h3 style="margin-top: 10px; margin-bottom: 30px;">Change Login Details</h3>
                              <?php
                                if (!empty($_SESSION['error']))
                                {
                                    echo'
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="btn-close" data-dismiss="alert"></button>
                                        <strong>'.$_SESSION['error'].'</strong>
                                    </div>';
                                    unset($_SESSION['error']);
                                }
                              ?>
                              <form action="" method="POST">
                                <label>Your Name</label>
                                <input disabled type="text" name="name" value="<?php echo $fullname; ?>" class="form-control"><br>
                                <label>Username</label>
                                <input required type="text" name="username" value="<?php echo $currentusername; ?>" class="form-control"><br>
                                <label>Old Password</label>
                                <input required type="password" class="form-control" name="oldpass"><br>
                                <label>New Password</label>
                                <input required type="password" class="form-control" name="newpass"><br>
                                <label>Confirm Password</label>
                                <input required type="password" class="form-control" name="conpass"><br><br>
                                <button type="submit" name="updateBtn" class="btn btn-success w-100">Update</button>
                                
                                <br><br>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of content -->
          </div>
        </div>
      </div>
      <form method = "POST" action = "">
    <div id="dataModal" class="modal fade">  
        <div class="modal-dialog" id="modal-content">
        </div>  
    </div> 
</form>
<?php
    include('include/footer.php');
?>
