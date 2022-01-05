<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP'; 
    $module = "Dashboard"; 
    $active = 'index'; 
    include 'include/head.php';
    include 'include/navbar.php';
  ?>
 <style>
    img#cimg{
        max-height: 20vh;
        max-width: 20vw;
    }
    img#cimg1{
        max-height: 20vh;
        max-width: 20vw;
    }
  </style>
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
                  Announcements
                </h2>
              </div>              
            </div>
          </div>
        </div>
        <!-- body -->
        <div class="page-body">
          <div class="container-xl">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php                           
                            $q = @mysqli_query($dbc, "SELECT *, DATE_FORMAT(clm_date, '%b %e, %Y | %h:%i %p') as date_published FROM tbl_announcements WHERE clm_status = 1 ORDER BY clm_date DESC");
                            if (mysqli_num_rows($q) == 0)
                            {
                                echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">All announcements will appear here.</h3>';
                            }
                            else
                            { 
                            while ($row = mysqli_fetch_array($q))
                            {
                                $sanitized = htmlspecialchars($row['clm_body'], ENT_QUOTES);
                                $author = $row['clm_author'];
                                $q1 = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_adminid = '$author' ");
                                $row1 = mysqli_fetch_array($q1);
                                echo'
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="text-info">'.$row1['clm_name'].'</h4>
                                    '.$row['date_published'].'<br><br>
                                    <div class="text-left" style="margin-top:10px;"><img src="../uploads/'.$row['clm_file'].'" alt="" id="cimg1"></div>
                                    <h3>'.$row['clm_title'].'</h3>';                                     
                                    echo str_replace(array("\r\n", "\n"), array("<br />", "<br />"), $sanitized);
                                    echo'
                                </div>
                                </div><br>';
                                 
                            }
                            } //else
                        ?>
                        
                    </div>
                </div>
            </div>
            <!-- end of content -->
          </div>
        </div>
      </div>
<?php
    include('include/footer.php');
?>