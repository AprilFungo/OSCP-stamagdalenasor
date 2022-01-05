
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'view_application'; 
    include 'include/head.php';
    include 'include/navbar.php';
    if (empty($_SESSION['view_application'])){echo '<script>location.replace("pending_applications");</script>';}
    else
    {
      $id = $_SESSION['view_application'];
      $q = @mysqli_query($dbc, "SELECT * FROM tbl_applications WHERE clm_id = '$id'");
      $row = mysqli_fetch_array($q);
    }

    if (isset($_POST['approve_application']))
    {
      $id = $_POST['id'];
      $q = @mysqli_query($dbc, "UPDATE tbl_applications SET clm_status = 2, clm_status_by = '$fullname', clm_date_status = NOW() WHERE clm_id = '$id' ");
      if ($q)
      {
        $_SESSION['success'] = 'Application has been successfully approved';
        echo '<script>location.replace("approved_applications");</script>';
      }
      else
      {
        $_SESSION['error'] = mysqli_error($dbc);
      }
    }

    if (isset($_POST['decline_application']))
    {
      $id = $_POST['id'];
      $remarks = mysqli_real_escape_string($dbc, $_POST['remarks']);
      $q = @mysqli_query($dbc, "UPDATE tbl_applications SET clm_status = 3, clm_status_by = '$fullname', clm_date_status = NOW(), clm_remarks = '$remarks' WHERE clm_id = '$id' ");
      if ($q)
      {
        $_SESSION['success'] = 'Application has been declined';
        echo '<script>location.replace("declined_applications");</script>';
      }
      else
      {
        $_SESSION['error'] = mysqli_error($dbc);
      }
    }
  ?>
 
      <div class="page-wrapper">
          <!-- Page title -->
        <div class="container-xl">
          <div class="page-header text-white d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <a href="<?php echo $_SESSION['pageName']; ?>"><button class="btn btn-primary">Back</button></a>
                <div class="page-pretitle">
                  Module
                </div>
                <h2 class="page-title">
                  View Application
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
                    <div class="text-center">
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
                      ?>
                      <img src="asset/img/dswd_logo_new.png" style="width: 150px;">
                      <?php
                        if ($row['clm_status'] == 2)
                        {
                          echo'<h2 style="margin-top: 10px;" class="text-success">APPROVED</h2>';
                        }
                        else if ($row['clm_status'] == 3)
                        {
                          echo'<h2 style="margin-top: 10px;" class="text-red">CANCELLED</h2>';
                        }
                      ?>
                      <h4 style="margin-top: 10px;">SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h4>
                      <h2 style="margin-top: 10px; margin-bottom: 50px;">GENERAL INTAKE SHEET</h2>
                    </div>
                    <h3>I. IDENTIFYING INFORMATION</h3>
                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-md-6">
                          <b>Name:</b> <input disabled type="text" name="name" class="form-control" value="<?php echo $row['clm_name']; ?>">
                        </div>  
                        <div class="col-md-6">
                          <b>Citizenship:</b> <input disabled type="text" name="citizenship" class="form-control" value="<?php echo $row['clm_citizenship']; ?>">
                        </div>  
                        <div class="col-md-12">
                          <b>Present Address:</b> <input disabled type="text" name="address" class="form-control" value="<?php echo $row['clm_address']; ?>">
                        </div>
                        <div class="col-md-3">
                          <b>Age:</b> <input disabled type="text" name="age" class="form-control" value="<?php echo $row['clm_age']; ?>">
                        </div>
                        <div class="col-md-3">
                          <b>Sex:</b> 
                          <select disabled name="sex" class="form-control">
                            <option><?php echo $row['clm_sex']; ?></option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <b>Civil Status:</b> 
                          <select disabled name="civil" class="form-control">
                            <option><?php echo $row['clm_civil_status']; ?></option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <b>Religion:</b> <input disabled type="text" name="religion" class="form-control" value="<?php echo $row['clm_religion']; ?>">
                        </div>
                        <div class="col-md-4">
                          <b>Birthdate:</b> <input disabled type="date" name="bday" class="form-control" value="<?php echo $row['clm_bday']; ?>">
                        </div>
                        <div class="col-md-4">
                          <b>Birthplace:</b> <input disabled type="text" name="bplace" class="form-control" value="<?php echo $row['clm_birthplace']; ?>">
                        </div>
                        <div class="col-md-4">
                          <b>Educational Attainment:</b>
                          <select disabled name="education" class="form-control">
                            <option><?php echo $row['clm_education']; ?></option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <b>Affiliation / Group:</b><br><br>
                          <div style="margin-left: 10px;">
                          <label class="form-check-label" for="myCheck">
                          <input disabled class="form-check-input" type="checkbox" name="listahanan" <?php if ($row['clm_listahanan'] == 1){echo 'checked';}?>> Listahanan <br></label>
                            <div>
                              (Please specify household number): <input disabled type="text" id="text" name="household" class="form-control" value="<?php echo $row['clm_household_number']; ?>">
                            </div>
                          <label class="form-check-label" for="checkbox1">
                          <input disabled class="form-check-input" type="checkbox" name="pantawid" id="checkbox1" <?php if ($row['clm_pantawid'] == 1){echo 'checked';}?>> Pantawid Beneficiary <br> </label>
                          <label class="form-check-label" for="checkbox2">
                          <input disabled class="form-check-input" type="checkbox" name="sco" id="checkbox2" <?php if ($row['clm_senior_organization'] == 1){echo 'checked';}?>> Senior Citizen Organization <br> </label>
                          <label class="form-check-label" for="myCheck1">
                          <input disabled class="form-check-input" type="checkbox" name="indigenous" <?php if ($row['clm_indigenous_people'] == 1){echo 'checked';}?>> Indigenous People <br> </label>
                            <div>
                              (Please specify): <input disabled type="text" id="text1" name="indigenous_details" class="form-control" value="<?php echo $row['clm_please_specify']; ?>">
                            </div>
                          <label class="form-check-label" for="myCheck2">
                          <input disabled class="form-check-input" type="checkbox" name="group_others" <?php if ($row['clm_others'] == 1){echo 'checked';}?>> Others <br> </label>
                            <div>
                              (Please specify): <input disabled type="text" id="text2" name="group_others_details" class="form-control" value="<?php echo $row['clm_other_specify']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <b>ID Number:</b><br><br>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">OSCA:</span>
                            </div>
                            <input disabled type="text" class="form-control" name="osca" value="<?php echo $row['clm_osca']; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">TIN:</span>
                            </div>
                            <input disabled type="text" class="form-control" name="tin" value="<?php echo $row['clm_tin']; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">GSIS:</span>
                            </div>
                            <input disabled type="text" class="form-control" name="gsis" value="<?php echo $row['clm_gsis']; ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <br><br>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">SSS:</span>
                            </div>
                            <input disabled type="text" class="form-control" name="sss" value="<?php echo $row['clm_sss']; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Philhealth:</span>
                            </div>
                            <input disabled type="text" class="form-control" name="philhealth" value="<?php echo $row['clm_philhealth']; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Others:</span>
                            </div>
                            <input disabled type="text" class="form-control" name="others_id" value="<?php echo $row['clm_others_id']; ?>">
                          </div>
                        </div>
                        <br>
                        <h3>II. FAMILY COMPOSITION</h3>
                        <br>
                        <div class="col-md-12">
                          <table class="table table-bordered">
                            <tr>
                              <th>Name</th>
                              <th>Relationship</th>
                              <th>Age</th>
                              <th>Civil Status</th>
                              <th>Occupation</th>
                              <th>Income</th>
                            </tr>
                            <tr>
                              <td><input disabled type="text" name="name1" class="form-control" value="<?php echo $row['clm_name1']; ?>"></td>
                              <td><input disabled type="text" name="relationship1" class="form-control" value="<?php echo $row['clm_relationship1']; ?>"></td>
                              <td><input disabled type="number" name="age1" class="form-control" value="<?php echo $row['clm_age1']; ?>"></td>
                              <td>
                                <select disabled name="civil1" class="form-control">
                                  <option><?php echo $row['clm_civil_status1']; ?></option>
                                </select>
                              </td>
                              <td><input disabled type="text" name="occupation1" class="form-control" value="<?php echo $row['clm_occupation1']; ?>"></td>
                              <td><input disabled type="number" name="income1" class="form-control" value="<?php echo $row['clm_income1']; ?>"></td>                                      
                            </tr>
                            <tr>
                              <td><input disabled type="text" name="name1" class="form-control" value="<?php echo $row['clm_name2']; ?>"></td>
                              <td><input disabled type="text" name="relationship1" class="form-control" value="<?php echo $row['clm_relationship2']; ?>"></td>
                              <td><input disabled type="number" name="age1" class="form-control" value="<?php echo $row['clm_age2']; ?>"></td>
                              <td>
                                <select disabled name="civil1" class="form-control">
                                  <option><?php echo $row['clm_civil_status2']; ?></option>
                                </select>
                              </td>
                              <td><input disabled type="text" name="occupation1" class="form-control" value="<?php echo $row['clm_occupation2']; ?>"></td>
                              <td><input disabled type="number" name="income1" class="form-control" value="<?php echo $row['clm_income2']; ?>"></td>                                      
                            </tr>  
                            <tr>
                              <td><input disabled type="text" name="name1" class="form-control" value="<?php echo $row['clm_name3']; ?>"></td>
                              <td><input disabled type="text" name="relationship1" class="form-control" value="<?php echo $row['clm_relationship3']; ?>"></td>
                              <td><input disabled type="number" name="age1" class="form-control" value="<?php echo $row['clm_age3']; ?>"></td>
                              <td>
                                <select disabled name="civil1" class="form-control">
                                  <option><?php echo $row['clm_civil_status3']; ?></option>
                                </select>
                              </td>
                              <td><input disabled type="text" name="occupation1" class="form-control" value="<?php echo $row['clm_occupation3']; ?>"></td>
                              <td><input disabled type="number" name="income1" class="form-control" value="<?php echo $row['clm_income3']; ?>"></td>                                      
                            </tr>                           
                          </table>
                        </div>
                        <div class="col-md-2">
                          <b>Living Arrangement:</b>
                        </div>
                        <div class="col-md-2">
                          <label class="form-check-label" for="radio1">
                          <input class="form-check-input" disabled type="radio" id="radio1" name="living" value="Owned" <?php if ($row['clm_living'] == 'Owned'){echo 'checked';}?>> Owned
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="form-check-label" for="radio2">
                          <input class="form-check-input" disabled type="radio" name="living" id="radio2" value="Living Alone" <?php if ($row['clm_living'] == 'Living Alone'){echo 'checked';}?>> Living Alone
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="form-check-label" for="radio3">
                          <input class="form-check-input" disabled type="radio" name="living" id="radio3" value="Living with relatives" <?php if ($row['clm_living'] == 'Living with relatives'){echo 'checked';}?>> Living with relatives
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="form-check-label" for="radio4">
                          <input class="form-check-input" disabled type="radio" name="living" id="radio4" value="Rent" <?php if ($row['clm_living'] == 'Rent'){echo 'checked';}?>> Rent
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="form-check-label" for="myCheck3">
                          <input class="form-check-input" disabled type="radio" name="living" value="Others" <?php if ($row['clm_living'] == 'Others'){echo 'checked';}?>> Others
                          </label>
                          <div>
                            Please specify:
                            <input disabled type="text" id="text3" name="living_others" class="form-control" value="<?php if ($row['clm_living'] == 'Others'){echo $row['clm_living'];}?>">
                          </div>                                  
                        </div><br><br><br>
                        <hr style="margin-top: 15px;">
                        <h3>III. ECONOMIC STATUS</h3>
                        <br><br>
                        <div class="col-md-4">
                          <b>Pensioner? </b>
                          <label class="form-check-label" for="radio5">
                          <input class="form-check-input" disabled type="radio" id="radio5" name="pensioner" value="Yes" <?php if ($row['clm_pensioner'] == 'Yes'){echo 'checked';}?>> Yes
                          </label>      
                          <label class="form-check-label" for="radio6">
                          <input class="form-check-input" disabled type="radio" id="radio6" name="pensioner" value="No" <?php if ($row['clm_pensioner'] == 'No'){echo 'checked';}?>> No
                          </label>                           
                        </div>
                        <div class="col-md-4">
                          <b>If yes, How much? </b>
                          <input class="form-control" disabled type="text" name="how_much" value="<?php echo $row['clm_how_much']; ?>">        
                        </div>
                        <div class="col-md-4">
                          <b>Source:</b>
                          <label class="form-check-label" for="cb">
                          <input class="form-check-input" disabled type="checkbox" id="cb" name="gsis1" <?php if ($row['clm_source_gsis'] == 1){echo 'checked';}?>> GSIS
                          </label>      
                          <label class="form-check-label" for="cb1">
                          <input class="form-check-input" disabled type="checkbox" id="cb1" name="sss1" <?php if ($row['clm_source_sss'] == 1){echo 'checked';}?>> SSS
                          </label>    
                          <label class="form-check-label" for="cb2">
                          <input class="form-check-input" disabled type="checkbox" id="cb2" name="afpslai" <?php if ($row['clm_source_afpslai'] == 1){echo 'checked';}?>> AFPSLAI
                          </label>   
                          <label class="form-check-label" for="cb3">
                          <input class="form-check-input" disabled type="checkbox" id="cb3" name="others_source" <?php if ($row['clm_source_others'] == 1){echo 'checked';}?>> Others
                          </label>   
                        </div>                               
                        <hr style="margin-top: 15px;">
                        <div class="col-md-6" style="margin-top: 10px;">
                          <b>Permanent Source of Income? </b>
                          <label class="form-check-label" for="radio7">
                          <input class="form-check-input" disabled type="radio" id="radio7" name="permanent" value="Yes" <?php if ($row['clm_permanent_source'] == 'Yes'){echo 'checked';}?>> Yes
                          </label>      
                          <label class="form-check-label" for="radio8">
                          <input class="form-check-input" disabled type="radio" id="radio8" name="permanent" value="None" <?php if ($row['clm_permanent_source'] == 'None'){echo 'checked';}?>> None
                          </label>                           
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                          <b>If yes, From what source? </b>
                          <input class="form-control" disabled type="text" name="what_source" value="<?php echo $row['clm_what_source']; ?>">        
                        </div>
                        <hr style="margin-top: 15px;">
                        <div class="col-md-4" style="margin-top: 20px;">
                          <b>Regular Support from family? </b>
                          <label class="form-check-label" for="radio9">
                          <input class="form-check-input" disabled type="radio" id="radio9" name="family" value="Yes" <?php if ($row['clm_regular_support'] == 'Yes'){echo 'checked';}?>> Yes
                          </label>      
                          <label class="form-check-label" for="radio10">
                          <input class="form-check-input" disabled type="radio" id="radio10" name="family" value="No" <?php if ($row['clm_regular_support'] == 'No'){echo 'checked';}?>> No
                          </label>                           
                        </div>
                        <div class="col-md-4" style="margin-top: 20px;">
                          <b>Type of Support? </b>
                          <input class="form-control" disabled type="text" name="typeSupport" value="<?php echo $row['clm_type_of_support']; ?>">        
                        </div>
                        <div class="col-md-4" style="margin-top: 20px;">
                          <b>If Cash, How much and how often</b>
                          <input class="form-control" disabled type="text" name="support_details" value="<?php echo $row['clm_how_much_cash']; ?>">        
                        </div>      
                        <hr style="margin-top: 15px;">                          
                        <h3 style="margin-top: 20px;">IV. HEALTH CONDITION</h3>
                        <br><br>
                        <div class="col-md-6" style="margin-top: 20px;">
                          <b>Condition / Illness: </b>
                          <input class="form-control" disabled type="text" name="condition" value="<?php echo $row['clm_condition']; ?>">        
                        </div>
                        <div class="col-md-3" style="margin-top: 20px;">
                          <b>With Maintenance: </b>
                          <label class="form-check-label" for="radio11">
                          <input class="form-check-input" disabled type="radio" id="radio11" name="maintenance" value="Yes" <?php if ($row['clm_maintenance'] == 'Yes'){echo 'checked';}?>> Yes
                          </label>      
                          <label class="form-check-label" for="radio12">
                          <input class="form-check-input" disabled type="radio" id="radio12" name="maintenance" value="No" <?php if ($row['clm_maintenance'] == 'No'){echo 'checked';}?>> No
                          </label>     
                        </div>
                        <div class="col-md-3" style="margin-top: 20px;">
                          <b>If yes, Please specify: </b>
                          <input class="form-control" disabled type="text" name="maintenance_details" value="<?php echo $row['clm_maintenance_details']; ?>">        
                        </div>
                      </div>    
                      <?php if ($row['clm_status'] == 1) { ?>
                      <div class="text-center " style="margin-top: 100px;">                        
                        <button type="button" id="<?php echo $id; ?>" class="btn btn-success btn-lg approveApplicationBtn">Approve</button>
                        <button type="button" id="<?php echo $id; ?>" class="btn btn-danger btn-lg declineApplicationBtn" style="margin-left: 10px;">Decline</button>
                      </div>
                      <?php } ?>
                    </form>

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
?><script>  
$(document).ready(function(){ 

  $('.approveApplicationBtn').click(function(){  
    var approveApplicationBtn = $(this).attr("id");  
    $.ajax({  
      url:"modal/seniors.php",  
      method:"post",  
      data:{approveApplicationBtn:approveApplicationBtn},  
      success:function(data){  
          $('#modal-content').html(data);  
          $('#dataModal').modal("show");  
      }  
    });  
  });

  $('.declineApplicationBtn').click(function(){  
    var declineApplicationBtn = $(this).attr("id");  
    $.ajax({  
      url:"modal/seniors.php",  
      method:"post",  
      data:{declineApplicationBtn:declineApplicationBtn},  
      success:function(data){  
          $('#modal-content').html(data);  
          $('#dataModal').modal("show");  
      }  
    });  
  });

});
</script>
