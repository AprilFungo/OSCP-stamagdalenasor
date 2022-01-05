
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'staff'; 
    include 'include/head.php';
    if ($type == 0){echo '<script>location.replace("../logout");</script>';}
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
                              $q = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_status = 0 AND clm_type = 0");
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
                                          <th>Staff ID</th>
                                          <th>Name</th>
                                          <th>Username</th>
                                          <th>Date Registered</th>
                                      </tr>
                                      <?php
                                          while ($row = mysqli_fetch_array($q))
                                          {
                                              echo'
                                              <tr>
                                                  <td>'.$row['clm_adminid'].'</td>
                                                  <td>'.$row['clm_name'].'</td>
                                                  <td>'.$row['clm_username'].'</td>                                                 
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
