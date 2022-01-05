
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'seniors'; 
    include 'include/head.php';  

    if (isset($_POST['confirm_delete_senior']))
    {
        $remarks = mysqli_real_escape_string($dbc, $_POST['remarks']);
        $scid = $_POST['scid']; 
        $q = @mysqli_query($dbc, "UPDATE tbl_seniors SET clm_status = '0', clm_delete_by = '$adminid', clm_date_deleted = NOW(), clm_status_remarks = '$remarks' WHERE clm_scid = '$scid' ");
        if ($q)
        {
            $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$scid was deleted','DELETE','APPROVED ACCOUNTS','$adminid')");
            echo '<script>location.replace("");</script>';
        }
        else
        {          
            $_SESSION['error'] = mysqli_error($dbc);
        }    
    }  
    include 'include/navbar.php';
    //
    
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
                  Approved Accounts
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
                            <?php
                                $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_status = 2 ");
                                if (mysqli_num_rows($q) == 0)
                                {
                                    echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">No Approved accounts.</h5>';
                                }
                                else
                                {                                    
                            ?>
                            <div class="table-responsive">
                            <table class="table table-bordered" style="margin-top: 10px; margin-bottom: 50px;">
                                    <tr>
                                        <th>Action</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Date Registered</th>
                                        <th>Approved By</th>
                                    </tr>
                                    <?php
                                        while ($row = mysqli_fetch_array($q))
                                        {
                                          $incharge = $row['clm_status_by'];
                                          $q1 = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_adminid = '$incharge' ");
                                          $row1 = mysqli_fetch_array($q1);
                                            echo'
                                            <tr>
                                                <td>
                                                    <form>
                                                      <button id="'.$row['clm_scid'].'" type="button" class="btn btn-info viewApprovedBtn">View</button>
                                                      <button id="'.$row['clm_scid'].'" type="button" class="btn btn-danger deleteSenior">Delete</button>
                                                    </form>        
                                                </td>
                                                <td>'.$row['clm_scid'].'</td>
                                                <td>'.$row['clm_fullname'].'</td>
                                                <td>'.$row['clm_email'].'</td>
                                                <td>'.$row['clm_contact'].'</td>
                                                <td>'.$row['clm_date'].'</td>
                                                <td>'.$row1['clm_username'].' | '.$row['clm_status_date'].'</td>
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

    $('.viewApprovedBtn').click(function(){  
      var viewApprovedBtn = $(this).attr("id");  
      $.ajax({  
        url:"modal/seniors.php",  
        method:"post",  
        data:{viewApprovedBtn:viewApprovedBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

    $('.deleteSenior').click(function(){  
      var deleteSenior = $(this).attr("id");  
      $.ajax({  
        url:"modal/seniors.php",  
        method:"post",  
        data:{deleteSenior:deleteSenior},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

  });
</script>
