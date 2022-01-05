
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'applications'; 
    include 'include/head.php';
 
    if (isset($_POST['submitBtn']))
    {
      $name = mysqli_real_escape_string($dbc, $_POST['name']);
      $citizenship = mysqli_real_escape_string($dbc, $_POST['citizenship']);
      $address = mysqli_real_escape_string($dbc, $_POST['address']);
      $age = mysqli_real_escape_string($dbc, $_POST['age']);
      $sex = mysqli_real_escape_string($dbc, $_POST['sex']);
      $civil = mysqli_real_escape_string($dbc, $_POST['civil']);
      $religion = mysqli_real_escape_string($dbc, $_POST['religion']);
      $bday = mysqli_real_escape_string($dbc, $_POST['bday']);
      $bplace = mysqli_real_escape_string($dbc, $_POST['bplace']);
      $education = mysqli_real_escape_string($dbc, $_POST['education']);
      if (isset($_POST['listahanan'])){ $listahanan = 1; $household = mysqli_real_escape_string($dbc, $_POST['household']);}else{$listahanan = 0; $household = '';}
      if (isset($_POST['pantawid'])){ $pantawid = 1;}else{$pantawid = 0;}
      if (isset($_POST['sco'])){ $sco = 1;}else{$sco = 0;}
      if (isset($_POST['indigenous'])){ $indigenous = 1; $indigenous_details = mysqli_real_escape_string($dbc, $_POST['indigenous_details']);}else{$indigenous = 0; $indigenous_details = '';}
      if (isset($_POST['group_others'])){ $group_others = 1; $group_others_details = mysqli_real_escape_string($dbc, $_POST['group_others_details']);}else{$group_others = 0; $group_others_details = '';}
      $osca = mysqli_real_escape_string($dbc, $_POST['osca']);
      $tin = mysqli_real_escape_string($dbc, $_POST['tin']);
      $gsis = mysqli_real_escape_string($dbc, $_POST['gsis']);
      $sss = mysqli_real_escape_string($dbc, $_POST['sss']);
      $philhealth = mysqli_real_escape_string($dbc, $_POST['philhealth']);
      $others_id = mysqli_real_escape_string($dbc, $_POST['others_id']);
      $name1 = mysqli_real_escape_string($dbc, $_POST['name1']);
      $relationship1 = mysqli_real_escape_string($dbc, $_POST['relationship1']);
      $age1 = mysqli_real_escape_string($dbc, $_POST['age1']);
      $civil1 = mysqli_real_escape_string($dbc, $_POST['civil1']);
      $occupation1 = mysqli_real_escape_string($dbc, $_POST['occupation1']);
      $income1 = mysqli_real_escape_string($dbc, $_POST['income1']);
      $name2 = mysqli_real_escape_string($dbc, $_POST['name2']);
      $relationship2 = mysqli_real_escape_string($dbc, $_POST['relationship2']);
      $age2 = mysqli_real_escape_string($dbc, $_POST['age2']);
      $civil2 = mysqli_real_escape_string($dbc, $_POST['civil2']);
      $occupation2 = mysqli_real_escape_string($dbc, $_POST['occupation2']);
      $income2 = mysqli_real_escape_string($dbc, $_POST['income2']);
      $name3 = mysqli_real_escape_string($dbc, $_POST['name3']);
      $relationship3 = mysqli_real_escape_string($dbc, $_POST['relationship3']);
      $age3 = mysqli_real_escape_string($dbc, $_POST['age3']);
      $civil3 = mysqli_real_escape_string($dbc, $_POST['civil3']);
      $occupation3 = mysqli_real_escape_string($dbc, $_POST['occupation3']);
      $income3 = mysqli_real_escape_string($dbc, $_POST['income3']);
      if(empty($_POST['living'])){$living = 'N/A';}else if($_POST['living'] == 'Others'){$living = mysqli_real_escape_string($dbc, $_POST['living_others']);}else{$living = mysqli_real_escape_string($dbc, $_POST['living']);}
      if ($_POST['pensioner'] == 'Yes'){$pensioner = mysqli_real_escape_string($dbc, $_POST['pensioner']); $how_much = mysqli_real_escape_string($dbc, $_POST['how_much']);} else {$pensioner = mysqli_real_escape_string($dbc, $_POST['pensioner']); $how_much = '';}
      if (isset($_POST['gsis1'])){ $gsis1 = 1;}else{ $gsis1 = 0;}
      if (isset($_POST['sss1'])){ $sss1 = 1;}else{ $sss1 = 0;}
      if (isset($_POST['afpslai'])){ $afpslai = 1;}else{ $afpslai = 0;}
      if (isset($_POST['others_source'])){ $others_source = 1;}else{ $others_source = 0;}
      if (isset($_POST['permanent'])){ $permanent = mysqli_real_escape_string($dbc, $_POST['permanent']);}else{ $permanent = '';}
      if (isset($_POST['family'])){ $family = mysqli_real_escape_string($dbc, $_POST['family']);}else{ $family = '';}
      if (isset($_POST['maintenance'])){ $maintenance = mysqli_real_escape_string($dbc, $_POST['maintenance']);}else{ $maintenance = '';}      
      $what_source = mysqli_real_escape_string($dbc, $_POST['what_source']);
      $typeSupport = mysqli_real_escape_string($dbc, $_POST['typeSupport']);
      $support_details = mysqli_real_escape_string($dbc, $_POST['support_details']);
      $condition = mysqli_real_escape_string($dbc, $_POST['condition']);
      $maintenance_details = mysqli_real_escape_string($dbc, $_POST['maintenance_details']);

      $q = @mysqli_query($dbc, "INSERT INTO tbl_applications 
      (clm_scid,clm_name,clm_citizenship,clm_address,clm_age,clm_sex,clm_civil_status,clm_religion,clm_bday,clm_birthplace,clm_education,clm_listahanan,clm_household_number,clm_pantawid,clm_senior_organization,clm_indigenous_people,clm_please_specify,clm_others,clm_other_specify,clm_osca,clm_tin,clm_gsis,clm_sss,clm_philhealth,clm_others_id,clm_name1,clm_relationship1,clm_age1,clm_civil_status1,clm_occupation1,clm_income1,clm_name2,clm_relationship2,clm_age2,clm_civil_status2,clm_occupation2,clm_income2,clm_name3,clm_relationship3,clm_age3,clm_civil_status3,clm_occupation3,clm_income3,clm_living,clm_pensioner,clm_how_much,clm_source_gsis,clm_source_sss,clm_source_afpslai,clm_source_others,clm_permanent_source,clm_what_source,clm_regular_support,clm_type_of_support,clm_how_much_cash,clm_condition,clm_maintenance,clm_maintenance_details) VALUES 
      ('$userid','$name','$citizenship','$address','$age','$sex','$civil','$religion','$bday','$bplace','$education','$listahanan','$household','$pantawid','$sco','$indigenous','$indigenous_details','$group_others','$group_others_details','$osca','$tin','$gsis','$sss','$philhealth','$others_id','$name1','$relationship1','$age1','$civil1','$occupation1','$income1','$name2','$relationship2','$age2','$civil2','$occupation2','$income2','$name3','$relationship3','$age3','$civil3','$occupation3','$income3','$living','$pensioner','$how_much','$gsis1','$sss1','$afpslai','$others_source','$permanent','$what_source','$family','$typeSupport','$support_details','$condition','$maintenance','$maintenance_details')");
      if ($q)
      {
        $q = @mysqli_query($dbc, "INSERT INTO tbl_notif (clm_desc) VALUES ('$name filed application for pension and waiting for your approval')");
        $_SESSION['success'] = 'Your application has been submitted successfully and waiting for approval.';
        echo '<script>location.replace("application_status");</script>';
      }
      else
      {
        $_SESSION['error'] = mysqli_error($dbc).'<br>'.$q;
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
                  Apply for Pension
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
                              <h4 style="margin-top: 10px;">SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h4>
                              <h2 style="margin-top: 10px; margin-bottom: 50px;">GENERAL INTAKE SHEET</h2>
                            </div>
                            <h3>I. IDENTIFYING INFORMATION</h3>
                            <form action="" method="POST">
                              <div class="row">
                                <div class="col-md-6">
                                  <b>Name:</b> <input required type="text" name="name" class="form-control" value="<?php echo $fullname; ?>">
                                </div>  
                                <div class="col-md-6">
                                  <b>Citizenship:</b> <input required type="text" name="citizenship" class="form-control" value="<?php echo $logged_citizenship; ?>">
                                </div>  
                                <div class="col-md-12">
                                  <b>Present Address:</b> <input required type="text" name="address" class="form-control" value="<?php echo $logged_address; ?>">
                                </div>
                                <div class="col-md-3">
                                  <b>Age:</b> <input type="text" name="age" class="form-control" value="<?php echo $logged_age; ?>">
                                </div>
                                <div class="col-md-3">
                                  <b>Sex:</b> 
                                  <select required name="sex" class="form-control">
                                    <option></option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Prefer not to say</option>
                                  </select>
                                </div>
                                <div class="col-md-3">
                                  <b>Civil Status:</b> 
                                  <select required name="civil" class="form-control">
                                    <option><?php echo $logged_civil; ?></option>
                                    <option>Married</option>
                                    <option>Widowed</option>
                                    <option>Separated</option>
                                    <option>Divorced</option>
                                    <option>Single</option>
                                  </select>
                                </div>
                                <div class="col-md-3">
                                  <b>Religion:</b> <input required type="text" name="religion" class="form-control" value="<?php echo $logged_religion; ?>">
                                </div>
                                <div class="col-md-4">
                                  <b>Birthdate:</b> <input required type="date" name="bday" class="form-control" value="<?php echo $logged_bday; ?>">
                                </div>
                                <div class="col-md-4">
                                  <b>Birthplace:</b> <input required type="text" name="bplace" class="form-control" value="<?php echo $logged_bplace; ?>">
                                </div>
                                <div class="col-md-4">
                                  <b>Educational Attainment:</b>
                                  <select required name="education" class="form-control">
                                    <option></option>
                                    <option>Elementary</option>
                                    <option>High School</option>
                                    <option>Vocational Graduate</option>
                                    <option>College Graduate</option>
                                    <option>Undergraduate</option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <b>Affiliation / Group:</b><br><br>
                                  <div style="margin-left: 10px;">
                                  <label class="form-check-label" for="myCheck">
                                  <input class="form-check-input" type="checkbox" name="listahanan" onclick="myFunction()" id="myCheck"> Listahanan <br></label>
                                    <div id="showDiv" style="display: none;">
                                      (Please specify household number): <input type="text" id="text" name="household" class="form-control" >
                                    </div>
                                  <label class="form-check-label" for="checkbox1">
                                  <input class="form-check-input" type="checkbox" name="pantawid" id="checkbox1"> Pantawid Beneficiary <br> </label>
                                  <label class="form-check-label" for="checkbox2">
                                  <input class="form-check-input" type="checkbox" name="sco" id="checkbox2"> Senior Citizen Organization <br> </label>
                                  <label class="form-check-label" for="myCheck1">
                                  <input class="form-check-input" type="checkbox" name="indigenous" onclick="myFunction1()" id="myCheck1"> Indigenous People <br> </label>
                                    <div id="showDiv1" style="display: none;">
                                      (Please specify): <input type="text" id="text1" name="indigenous_details" class="form-control" >
                                    </div>
                                  <label class="form-check-label" for="myCheck2">
                                  <input class="form-check-input" type="checkbox" name="group_others" onclick="myFunction2()" id="myCheck2"> Others <br> </label>
                                    <div id="showDiv2" style="display: none;">
                                      (Please specify): <input type="text" id="text2" name="group_others_details" class="form-control" >
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <b>ID Number:</b><br><br>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">OSCA:</span>
                                    </div>
                                    <input type="text" class="form-control" name="osca">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">TIN:</span>
                                    </div>
                                    <input type="text" class="form-control" name="tin">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">GSIS:</span>
                                    </div>
                                    <input type="text" class="form-control" name="gsis">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <br><br>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">SSS:</span>
                                    </div>
                                    <input type="text" class="form-control" name="sss">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Philhealth:</span>
                                    </div>
                                    <input type="text" class="form-control" name="philhealth">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Others:</span>
                                    </div>
                                    <input type="text" class="form-control" name="others_id">
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
                                      <td><input type="text" name="name1" class="form-control"></td>
                                      <td><input type="text" name="relationship1" class="form-control"></td>
                                      <td><input type="number" name="age1" class="form-control"></td>
                                      <td>
                                        <select name="civil1" class="form-control">
                                          <option></option>
                                          <option>Married</option>
                                          <option>Widowed</option>
                                          <option>Separated</option>
                                          <option>Divorced</option>
                                          <option>Single</option>
                                        </select>
                                      </td>
                                      <td><input type="text" name="occupation1" class="form-control"></td>
                                      <td><input type="number" name="income1" class="form-control"></td>                                      
                                    </tr>
                                    <tr>
                                      <td><input type="text" name="name2" class="form-control"></td>
                                      <td><input type="text" name="relationship2" class="form-control"></td>
                                      <td><input type="number" name="age2" class="form-control"></td>
                                      <td>
                                        <select name="civil2" class="form-control">
                                          <option></option>
                                          <option>Married</option>
                                          <option>Widowed</option>
                                          <option>Separated</option>
                                          <option>Divorced</option>
                                          <option>Single</option>
                                        </select>
                                      </td>
                                      <td><input type="text" name="occupation2" class="form-control"></td>
                                      <td><input type="number" name="income2" class="form-control"></td>                                      
                                    </tr>
                                    <tr>
                                      <td><input type="text" name="name3" class="form-control"></td>
                                      <td><input type="text" name="relationship3" class="form-control"></td>
                                      <td><input type="number" name="age3" class="form-control"></td>
                                      <td>
                                        <select name="civil3" class="form-control">
                                          <option></option>
                                          <option>Married</option>
                                          <option>Widowed</option>
                                          <option>Separated</option>
                                          <option>Divorced</option>
                                          <option>Single</option>
                                        </select>
                                      </td>
                                      <td><input type="text" name="occupation3" class="form-control"></td>
                                      <td><input type="number" name="income3" class="form-control"></td>                                      
                                    </tr>
                                  </table>
                                </div>
                                <div class="col-md-2">
                                  <b>Living Arrangement:</b>
                                </div>
                                <div class="col-md-2">
                                  <label class="form-check-label" for="radio1">
                                  <input class="form-check-input" type="radio" id="radio1" name="living" value="Owned"> Owned
                                  </label>
                                </div>
                                <div class="col-md-2">
                                  <label class="form-check-label" for="radio2">
                                  <input class="form-check-input" type="radio" name="living" id="radio2" value="Living Alone"> Living Alone
                                  </label>
                                </div>
                                <div class="col-md-2">
                                  <label class="form-check-label" for="radio3">
                                  <input class="form-check-input" type="radio" name="living" id="radio3" value="Living with relatives"> Living with relatives
                                  </label>
                                </div>
                                <div class="col-md-2">
                                  <label class="form-check-label" for="radio4">
                                  <input class="form-check-input" type="radio" name="living" id="radio4" value="Rent"> Rent
                                  </label>
                                </div>
                                <div class="col-md-2">
                                  <label class="form-check-label" for="myCheck3">
                                  <input class="form-check-input" type="radio" name="living" onclick="myFunction3()" id="myCheck3" value="Others"> Others
                                  </label>
                                  <div style="display: none;" id="showDiv3">
                                    Please specify:
                                    <input type="text" id="text3" name="living_others" class="form-control">
                                  </div>                                  
                                </div><br><br><br>
                                <hr style="margin-top: 15px;">
                                <h3>III. ECONOMIC STATUS</h3>
                                <br><br>
                                <div class="col-md-4">
                                  <b>Pensioner? </b>
                                  <label class="form-check-label" for="radio5">
                                  <input class="form-check-input" type="radio" id="radio5" name="pensioner" value="Yes"> Yes
                                  </label>      
                                  <label class="form-check-label" for="radio6">
                                  <input class="form-check-input" type="radio" id="radio6" name="pensioner" value="No"> No
                                  </label>                           
                                </div>
                                <div class="col-md-4">
                                  <b>If yes, How much? </b>
                                  <input class="form-control" type="text" name="how_much">        
                                </div>
                                <div class="col-md-4">
                                  <b>Source:</b>
                                  <label class="form-check-label" for="cb">
                                  <input class="form-check-input" type="checkbox" id="cb" name="gsis1"> GSIS
                                  </label>      
                                  <label class="form-check-label" for="cb1">
                                  <input class="form-check-input" type="checkbox" id="cb1" name="sss1"> SSS
                                  </label>    
                                  <label class="form-check-label" for="cb2">
                                  <input class="form-check-input" type="checkbox" id="cb2" name="afpslai"> AFPSLAI
                                  </label>   
                                  <label class="form-check-label" for="cb3">
                                  <input class="form-check-input" type="checkbox" id="cb3" name="others_source"> Others
                                  </label>   
                                </div>                               
                                <hr style="margin-top: 15px;">
                                <div class="col-md-6" style="margin-top: 10px;">
                                  <b>Permanent Source of Income? </b>
                                  <label class="form-check-label" for="radio7">
                                  <input class="form-check-input" type="radio" id="radio7" name="permanent" value="Yes"> Yes
                                  </label>      
                                  <label class="form-check-label" for="radio8">
                                  <input class="form-check-input" type="radio" id="radio8" name="permanent" value="None"> None
                                  </label>                           
                                </div>
                                <div class="col-md-6" style="margin-top: 10px;">
                                  <b>If yes, From what source? </b>
                                  <input class="form-control" type="text" name="what_source">        
                                </div>
                                <hr style="margin-top: 15px;">
                                <div class="col-md-4" style="margin-top: 20px;">
                                  <b>Regular Support from family? </b>
                                  <label class="form-check-label" for="radio9">
                                  <input class="form-check-input" type="radio" id="radio9" name="family" value="Yes"> Yes
                                  </label>      
                                  <label class="form-check-label" for="radio10">
                                  <input class="form-check-input" type="radio" id="radio10" name="family" value="No"> No
                                  </label>                           
                                </div>
                                <div class="col-md-4" style="margin-top: 20px;">
                                  <b>Type of Support? </b>
                                  <input class="form-control" type="text" name="typeSupport">        
                                </div>
                                <div class="col-md-4" style="margin-top: 20px;">
                                  <b>If Cash, How much and how often</b>
                                  <input class="form-control" type="text" name="support_details">        
                                </div>      
                                <hr style="margin-top: 15px;">                          
                                <h3 style="margin-top: 20px;">IV. HEALTH CONDITION</h3>
                                <br><br>
                                <div class="col-md-6" style="margin-top: 20px;">
                                  <b>Condition / Illness: </b>
                                  <input class="form-control" type="text" name="condition">        
                                </div>
                                <div class="col-md-3" style="margin-top: 20px;">
                                  <b>With Maintenance: </b>
                                  <label class="form-check-label" for="radio11">
                                  <input class="form-check-input" type="radio" id="radio11" name="maintenance" value="Yes"> Yes
                                  </label>      
                                  <label class="form-check-label" for="radio12">
                                  <input class="form-check-input" type="radio" id="radio12" name="maintenance" value="No"> No
                                  </label>     
                                </div>
                                <div class="col-md-3" style="margin-top: 20px;">
                                  <b>If yes, Please specify: </b>
                                  <input class="form-control" type="text" name="maintenance_details">        
                                </div>

                              </div>
                              <br>
                              <div class="text-center">
                                <br><br>
                                <label class="form-check-label" for="myCheck4">
                                  <input class="form-check-input" type="checkbox" id="myCheck4" onclick="myFunction4()"> <b>I hereby certify that the above mentioned information are true and correct to the best of my knowledge.</b>
                                </label>
                                <br><br>
                                <button type="submit" disabled name="submitBtn" id="submitBtn" class="btn btn-success btn-lg">Submit</button>
                              </div>
                              
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
?>
<script>
  function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var showDiv = document.getElementById("showDiv");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      showDiv.style.display = "block";//text
      document.getElementById("text").required = true;
    } else {
      showDiv.style.display = "none";
      document.getElementById("text").required = '';
    }
  } 
  function myFunction1() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck1");
    // Get the output text
    var showDiv1 = document.getElementById("showDiv1");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      showDiv1.style.display = "block";//text
      document.getElementById("text1").required = true;
    } else {
      showDiv1.style.display = "none";
      document.getElementById("text1").required = '';
    }
  } 
  function myFunction2() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck2");
    // Get the output text
    var showDiv2 = document.getElementById("showDiv2");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      showDiv2.style.display = "block";//text
      document.getElementById("text2").required = true;
    } else {
      showDiv2.style.display = "none";
      document.getElementById("text2").required = '';
    }
  } 
  function myFunction3() {
    // Get the checkbox
    var checkBox1 = document.getElementById("myCheck3");
    // Get the output text
    var showDiv3 = document.getElementById("showDiv3");

    // If the checkbox is checked, display the output text
    if (checkBox1.checked == true){
      showDiv3.style.display = "block";//text
    } else {
      showDiv3.style.display = "none";
    }
  } 
  function myFunction4() {
    // Get the checkbox
    var myCheck4 = document.getElementById("myCheck4");
    // Get the output text
    var submitBtn = document.getElementById("submitBtn");

    // If the checkbox is checked, display the output text
    if (myCheck4.checked == true){
      document.getElementById("submitBtn").disabled = '';//text
    } else {
      document.getElementById("submitBtn").disabled = 'true';
    }
  } 
</script>
