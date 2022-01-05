
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'logs'; 
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
                  Activity Logs
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
                            <form action="" method="POST">
                              <div class="input-group mb-3">
                                <input type="text" name="searchtxt" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                  <button class="btn btn-success" type="submit">Search</button>
                                </div>
                              </div>
                            </form>
                            <?php
                                // display
                                if (isset($_POST['searchtxt']))
                                {
                                  $searchtxt = mysqli_real_escape_string($dbc, $_POST['searchtxt']);
                                  $q = @mysqli_query($dbc, "SELECT * FROM tbl_logs WHERE CONCAT(clm_date,clm_desc,clm_mode,clm_module,clm_incharge) LIKE '%$searchtxt%' ORDER BY clm_date DESC");
                                }
                                else
                                {
                                  $q = @mysqli_query($dbc, "SELECT * FROM tbl_logs ORDER BY clm_date DESC");                                                              
                                }
                            ?>                         
                            <div class="table-responsive">
                            <table class="table table-bordered table-sm" style="margin-top: 10px; margin-bottom: 50px;">
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>Mode</th>
                                        <th>Module</th>
                                        <th>Incharge</th>
                                    </tr>
                                    <?php
                                        while ($row = mysqli_fetch_array($q))
                                        {
                                            $incharge = $row['clm_incharge'];
                                            $q1 = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_adminid = '$incharge' ");
                                            $row1 = mysqli_fetch_array($q1);
                                            echo'
                                            <tr>                                               
                                                <td>'.$row['clm_date'].'</td>
                                                <td>'.$row['clm_desc'].'</td>
                                                <td>'.$row['clm_mode'].'</td>
                                                <td>'.$row['clm_module'].'</td>
                                                <td>'.$row1['clm_username'].'</td>
                                            </tr>';
                                        }
                                    ?>
                            </table>
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
