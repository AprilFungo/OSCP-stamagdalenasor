
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'applications'; 
    include 'include/head.php';
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
                  Application Status
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
                            if (!empty($_SESSION['success']))
                            {
                                echo'
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="btn-close" data-dismiss="alert"></button>
                                    <strong>'.$_SESSION['success'].'</strong>
                                </div>';
                                unset($_SESSION['success']);
                            }
                          ?>
                          <?php
                            $q = @mysqli_query($dbc, "SELECT *, DATE_FORMAT(clm_date, '%b %e, %Y') as DateFiled FROM tbl_applications WHERE clm_scid = '$userid' ORDER BY clm_date DESC");
                            if (mysqli_num_rows($q) >= 1)
                            {
                              echo'
                              <table class="table table-bordered">
                                <tr>
                                  <th>Date Filed</th>
                                  <th>Application Name</th>
                                  <th>Status</th>
                                  <th>Remarks</th>
                                  <th>Action</th>
                                </tr>';
                                while ($row = mysqli_fetch_array($q))
                                {
                                  echo'
                                  <tr>
                                    <td>'.$row['DateFiled'].'</td>
                                    <td>SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</td>
                                    <td>';
                                      if ($row['clm_status'] == 1){echo '<span class="badge badge-warning bg-warning">Pending for approval</span>';}
                                      else if ($row['clm_status'] == 2){echo '<span class="badge badge-success bg-success">Approved</span>';}
                                      else if ($row['clm_status'] == 3){echo '<span class="badge badge-danger bg-danger">Declined</span>';}echo'
                                    </td>
                                    <td>'.$row['clm_remarks'].'</td>
                                    <td>
                                      <form action="seniorform" method="POST"  target="_blank">
                                        <button type="submit" class="btn btn-info">Print</button>
                                        <input name="appid" value="'.$row['clm_id'].'" hidden>
                                      </form>
                                    </td> 
                                  </tr>';
                                }
                              echo'
                              </table>';
                            }
                            else
                            {
                              echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">Application Status will appear here.</h3>';
                            }
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
