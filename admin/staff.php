
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'staff'; 
    include 'include/head.php';
    if ($type == 0){echo '<script>location.replace("../logout");</script>';}
    if (isset($_POST['addBtn']))
    {
      $fname = mysqli_real_escape_string($dbc, $_POST['fname']);
      $username = mysqli_real_escape_string($dbc, $_POST['username']);
      $staffID = 'A'.date('ymdhis');
      $q = @mysqli_query($dbc, "INSERT INTO tbl_admin (clm_adminid, clm_name, clm_username, clm_password) VALUES ('$staffID', '$fname','$username', md5('1234'))");
      if ($q)
      {
        $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$staffID has been added','ADD','STAFF','$adminid')");
        echo '<script>location.replace("");</script>';
      }
      else
      {
        $_SESSION['error'] = mysqli_error($dbc);
      }
    }

    if (isset($_POST['updateBtn']))
    {
      $staffID = $_POST['staffID'];
      $fname = mysqli_real_escape_string($dbc, $_POST['fname']);
      $username = mysqli_real_escape_string($dbc, $_POST['username']);
      $q = @mysqli_query($dbc, "UPDATE tbl_admin SET clm_name = '$fname', clm_username = '$username' WHERE clm_adminid = '$staffID' ");
      if ($q)
      {
        $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$staffID has been update','EDIT','STAFF','$adminid')");
        echo '<script>location.replace("");</script>';
      }
      else
      {
        $_SESSION['error'] = mysqli_error($dbc);
      }
    }

    if (isset($_POST['confirm_delete_staff']))
    {
        $adminid1 = $_POST['adminid']; 
        $q = @mysqli_query($dbc, "UPDATE tbl_admin SET clm_status = '0' WHERE clm_adminid = '$adminid1' ");
        if ($q)
        {
            $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$adminid1 was deleted','DELETE','APPROVED ACCOUNTS','$adminid')");
            echo '<script>location.replace("");</script>';
        }
        else
        {          
            $_SESSION['error'] = mysqli_error($dbc);
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
                  Staff
                </h2>
              </div>   
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <button class="btn btn-primary newStaff"><i class="fa fa-plus-circle" style="margin-right: 5px;"></i> New Staff</button>
                </div>
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

                              $q = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_status = 1 AND clm_type = 0");
                              if (mysqli_num_rows($q) == 0)
                              {
                                  echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">All Staff will appear here.</h5>';
                              }
                              else
                              {                                    
                          ?>
                          <div class="table-responsive">
                              <table class="table table-bordered" style="margin-top: 10px; margin-bottom: 50px;">
                                      <tr>
                                          <th>Action</th>
                                          <th>Staff ID</th>
                                          <th>Name</th>
                                          <th>Username</th>
                                          <th>Password</th>
                                          <th>Date Registered</th>
                                      </tr>
                                      <?php
                                          while ($row = mysqli_fetch_array($q))
                                          {
                                              echo'
                                              <tr>
                                                  <td>
                                                      <form>
                                                          <button id="'.$row['clm_adminid'].'" type="button" name="editBtn" class="btn btn-info editBtn">Edit</button>
                                                          <button id="'.$row['clm_adminid'].'" type="button" name="deleteBtn" class="btn btn-danger deleteBtn">Delete</button>
                                                      </form>        
                                                  </td>
                                                  <td>'.$row['clm_adminid'].'</td>
                                                  <td>'.$row['clm_name'].'</td>
                                                  <td>'.$row['clm_username'].'</td>
                                                  <td>';
                                                    if ($row['clm_password'] != md5('1234'))
                                                    {
                                                      echo'<button id="'.$row['clm_adminid'].'" type="button" class="btn btn-info defaultpass">Set to default</button></td>';
                                                    }
                                                    else
                                                    {
                                                      echo'<button type="button" disabled class="btn btn-info">Default</button></td>';
                                                    }echo'                                                    
                                                  <td>'.$row['clm_date'].'</td>
                                              </tr>';
                                          }
                                      ?>
                              </table>
                          </div>
                          <?php
                              } // else
                          ?>                            
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
<script>  
  $(document).ready(function(){ 

    $('.newStaff').click(function(){  
      var newStaff = 1;  
      $.ajax({  
        url:"modal/staff.php",  
        method:"post",  
        data:{newStaff:newStaff},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

    $('.editBtn').click(function(){  
      var editBtn = $(this).attr("id");
      $.ajax({  
        url:"modal/staff.php",  
        method:"post",  
        data:{editBtn:editBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

    $('.deleteBtn').click(function(){  
      var deleteBtn = $(this).attr("id");
      $.ajax({  
        url:"modal/staff.php",  
        method:"post",  
        data:{deleteBtn:deleteBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

  });
  //
</script>
