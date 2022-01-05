
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
    $active = 'announcements'; 
    include 'include/head.php';

    if (isset($_POST['publishBtn']))
    {
      $title = mysqli_real_escape_string($dbc, $_POST['title']);
      $body = mysqli_real_escape_string($dbc, $_POST['body']);
      $file = strtotime(date('y-m-d H:i')).'_'.$_FILES['img1']['name'];
      $move = move_uploaded_file($_FILES['img1']['tmp_name'],'../uploads/'. $file);   
      $q = @mysqli_query($dbc, "INSERT INTO tbl_announcements (clm_title, clm_body, clm_author, clm_file) VALUES ('$title','$body','$adminid', '$file')");
      if ($q)
      {
        $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$title has been publish','ADD','ANNOUNCEMENTS','$adminid')");
        echo '<script>location.replace("");</script>';
      }
      else
      {
        $_SESSION['error'] = mysqli_error($dbc);
      }
    }

    if (isset($_POST['updateBtn']))
    {
      $annID = $_POST['annID'];
      $title = mysqli_real_escape_string($dbc, $_POST['title']);
      $body = mysqli_real_escape_string($dbc, $_POST['body']);
      if(empty($_FILES['img1']['tmp_name']))
      {
        $q = @mysqli_query($dbc, "UPDATE tbl_announcements SET clm_title = '$title', clm_body = '$body' WHERE clm_id = '$annID' ");
      }
      else
      {
        $file = strtotime(date('y-m-d H:i')).'_'.$_FILES['img1']['name'];
        $move = move_uploaded_file($_FILES['img1']['tmp_name'],'../uploads/'. $file);   
        $q = @mysqli_query($dbc, "UPDATE tbl_announcements SET clm_title = '$title', clm_body = '$body', clm_file = '$file' WHERE clm_id = '$annID' ");
      }
      if ($q)
      {
        $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$title has been update','EDIT','ANNOUNCEMENTS','$adminid')");
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
                  Announcements
                </h2>
              </div>  
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <button class="btn btn-primary newAnnouncement"><i class="fa fa-plus-circle" style="margin-right: 5px;"></i> New Announcement</button>
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
                                      <button '; if ($author != $adminid){echo ' disabled ';} echo'id="'.$row['clm_id'].'" class="btn btn-info editBtn" style="float: right;"><i class="fa fa-edit space"></i> Edit</button>
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
            </div>
            <!-- end of content -->
          </div>
        </div>
      </div>
      <form method = "POST" action = "" enctype="multipart/form-data"> 
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

    $('.newAnnouncement').click(function(){  
      var newAnnouncement = 1;  
      $.ajax({  
        url:"modal/announcements.php",  
        method:"post",  
        data:{newAnnouncement:newAnnouncement},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

    $('.editBtn').click(function(){  
      var editBtn = $(this).attr("id");
      $.ajax({  
        url:"modal/announcements.php",  
        method:"post",  
        data:{editBtn:editBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

  });
  //
</script>


