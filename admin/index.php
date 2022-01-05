<!doctype html>
<html lang="en">
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
<?php 
    $title = 'OSCP'; 
    $module = "Dashboard"; 
    $active = 'index'; 
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
                  Dashboard
                </h2>
              </div>              
            </div>
          </div>
        </div>
        <!-- body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
            <!-- content -->
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">PENDING APPLICATION FORM</div>
                        </div>
                        <a href="pending_applications" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-clipboard-list fa-xl text-warning" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">
                                    <?php 
                                        $q = @mysqli_query($dbc, "SELECT * FROM tbl_applications WHERE clm_status = 1");
                                        echo mysqli_num_rows($q);
                                    ?>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">APPROVED APPLICATION FORM</div>
                        </div>
                        <a href="approved_applications" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-clipboard-check fa-xl text-success" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">
                                    <?php 
                                        $q = @mysqli_query($dbc, "SELECT * FROM tbl_applications WHERE clm_status = 2");
                                        echo mysqli_num_rows($q);
                                    ?>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">DECLINED APPLICATION FORM</div>
                        </div>
                        <a href="declined_applications" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-times-circle fa-xl text-danger" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">
                                    <?php 
                                        $q = @mysqli_query($dbc, "SELECT * FROM tbl_applications WHERE clm_status = 3");
                                        echo mysqli_num_rows($q);
                                    ?>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">SENIOR CITIZEN</div>
                        </div>
                        <a href="approved_seniors" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-users fa-xl text-info" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">
                                    <?php 
                                        $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_status = 2");
                                        echo mysqli_num_rows($q);
                                    ?>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col pt-4">
                <h2 class="page-title">
                    ANNOUNCEMENTS
                </h2>
            </div>
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