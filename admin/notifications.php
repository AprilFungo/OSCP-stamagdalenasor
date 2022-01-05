
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'notifications'; 
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
                  Notifications
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
                              $q = @mysqli_query($dbc, "SELECT *, DATE_FORMAT(clm_date, '%b %e, %Y | %h:%i %p') as dateformatted FROM tbl_notif ORDER BY clm_date DESC");
                              if (mysqli_num_rows($q) == 0)
                              {
                                  echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">All notifications will appear here.</h3>';
                              }
                              else
                              { 
                                while ($row = mysqli_fetch_array($q))
                                {                                  
                                  echo'
                                  <div class="alert alert-info">
                                    <strong>'.$row['clm_desc'].'</strong> - 
                                    <span>'.$row['dateformatted'].'</span>
                                  </div>';                                  
                                }
                              } //else
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
