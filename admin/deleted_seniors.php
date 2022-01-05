
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'seniors'; 
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
                  Deleted Accounts
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
                                // display
                                $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_status = 0 ");
                                if (mysqli_num_rows($q) == 0)
                                {
                                    echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">No deleted accounts.</h5>';
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
                                        <th>Date Registered</th>
                                        <th>Deleted By</th>
                                        <th>Remarks</th>
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
                                                      <button id="'.$row['clm_scid'].'" type="button" class="btn btn-info viewDeletedBtn">View</button>
                                                  </form>        
                                              </td>
                                              <td>'.$row['clm_scid'].'</td>
                                              <td>'.$row['clm_fullname'].'</td>
                                              <td>'.$row['clm_date'].'</td>
                                              <td>'.$row1['clm_username'].' | '.$row['clm_date_deleted'].'</td>
                                              <td>'.$row['clm_status_remarks'].'</td>

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

    $('.viewDeletedBtn').click(function(){  
      var viewDeletedBtn = $(this).attr("id");  
      $.ajax({  
        url:"modal/seniors.php",  
        method:"post",  
        data:{viewDeletedBtn:viewDeletedBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

  });
</script>
