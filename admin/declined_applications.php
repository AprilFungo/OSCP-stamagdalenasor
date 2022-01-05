
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
                  Declined Applications
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

                            $q = @mysqli_query($dbc, "SELECT *, DATE_FORMAT(clm_date, '%b %e, %Y') as DateFiled, DATE_FORMAT(clm_date_status, '%b %e, %Y') as DateStatus FROM tbl_applications WHERE clm_status = 3 ORDER BY clm_date_status DESC");
                            if (mysqli_num_rows($q) >= 1)
                            {
                              echo'
                              <table class="table table-bordered">
                                <tr>
                                  <th>Date Filed</th>
                                  <th>Application Name</th>
                                  <th>Senior Name</th>
                                  <th>Declined By</th>
                                  <th>Remarks</th>
                                  <th>Action</th>
                                </tr>';
                                while ($row = mysqli_fetch_array($q))
                                {
                                  echo'
                                  <tr>
                                    <td>'.$row['DateFiled'].'</td>
                                    <td>SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</td>                                    
                                    <td>'.$row['clm_name'].'</td>
                                    <td>'.$row['clm_status_by'].' | '.$row['clm_date_status'].'</td>
                                    <td>'.$row['clm_remarks'].'</td>
                                    <td>
                                      <form action= "seniorform" method= "POST"  target="_blank">
                                        <button name="prntbtn" id="'.$row['clm_id'].'" type="button" class="btn btn-info viewappBtn">View</button> 
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
                              echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">Declined applications will appear here.</h3>';
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
<script>  
$(document).ready(function(){ 

  $('.viewappBtn').click(function(){  
    var viewappBtn = $(this).attr("id");  
    var pageName = 'declined_applications';  
    $.ajax({  
      url:"modal/seniors.php",  
      method:"post",  
      data:{viewappBtn:viewappBtn, pageName:pageName},  
      success:function(data){  
          $('#modal-content').html(data);  
          //$('#dataModal').modal("show");  
      }  
    });  
  });

});
</script>
