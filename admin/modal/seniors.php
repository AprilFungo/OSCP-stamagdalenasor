<?php
session_start(); 
date_default_timezone_set('Asia/Manila');
require_once('../../database/connection.php');

if(isset($_POST['viewBtn']))
{  
    $scid = $_POST['viewBtn'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">View Details</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      <div class="row">
        <div class="col-md-6">
          <label>Full Name</label><br>
          <h3>'.$row['clm_fullname'].'</h3>
          <label>Email Address</label><br>
          <h3>'.$row['clm_email'].'</h3>
          <label>Birthday</label><br>
          <h3>'.$row['clm_bday'].'</h3>
          <label>Address</label><br>
          <h3>'.$row['clm_address'].'</h3>
          <label>Religion</label><br>
          <h3>'.$row['clm_religion'].'</h3>
        </div>
        <div class="col-md-6">
          <label>Citizenship</label><br>
          <h3>'.$row['clm_citizenship'].'</h3>
          <label>Contact No.</label><br>
          <h3>'.$row['clm_contact'].'</h3>
          <label>Birth Place</label><br>
          <h3>'.$row['clm_bplace'].'</h3>
          <label>Civil Status</label><br>
          <h3>'.$row['clm_civil'].'</h3>
        </div>
      </div>   
      <h2>Valid ID</h2>
      <img src="../uploads/'.$row['clm_valid'].'" style="width: 100%;">   
      <h2>Senior Citizen ID</h2>
      <img src="../uploads/'.$row['clm_seniorid'].'" style="width: 100%;">  
      
    </div>      
    <div class="modal-footer">
      <button id="'.$scid.'" class="btn btn-success approveBtn" type="button" name="approve"><i class="fa fa-check-circle"></i>  Approve</button>
      <button id="'.$scid.'" class="btn btn-danger declineBtn" type="button" name="decline"><i class="fa fa-times-circle"></i>  Decline</button>
        <input type="hidden" name="scid" value="'.$scid.'">
    </div>  
  </div>';
} 

if(isset($_POST['viewDeclinedBtn']))
{  
    $scid = $_POST['viewDeclinedBtn'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">View Details</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      <div class="row">
        <div class="col-md-6">
          <label>Full Name</label><br>
          <h3>'.$row['clm_fullname'].'</h3>
          <label>Email Address</label><br>
          <h3>'.$row['clm_email'].'</h3>
          <label>Birthday</label><br>
          <h3>'.$row['clm_bday'].'</h3>
          <label>Address</label><br>
          <h3>'.$row['clm_address'].'</h3>
          <label>Religion</label><br>
          <h3>'.$row['clm_religion'].'</h3>
        </div>
        <div class="col-md-6">
          <label>Citizenship</label><br>
          <h3>'.$row['clm_citizenship'].'</h3>
          <label>Contact No.</label><br>
          <h3>'.$row['clm_contact'].'</h3>
          <label>Birth Place</label><br>
          <h3>'.$row['clm_bplace'].'</h3>
          <label>Civil Status</label><br>
          <h3>'.$row['clm_civil'].'</h3>
        </div>
      </div>   
      <h2>Valid ID</h2>
      <img src="../uploads/'.$row['clm_valid'].'" style="width: 100%;">   
      <h2>Senior Citizen ID</h2>
      <img src="../uploads/'.$row['clm_seniorid'].'" style="width: 100%;">  
      
    </div>      
    <div class="modal-footer">      
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Close</button></a>
    </div>  
  </div>';
} 

if(isset($_POST['viewApprovedBtn']))
{  
    $scid = $_POST['viewApprovedBtn'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">View Details</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal"></button></a>
    </div>  
    <div class="modal-body">
      <div class="row">
        <div class="col-md-6">
          <label>Full Name</label><br>
          <h3>'.$row['clm_fullname'].'</h3>
          <label>Email Address</label><br>
          <h3>'.$row['clm_email'].'</h3>
          <label>Birthday</label><br>
          <h3>'.$row['clm_bday'].'</h3>
          <label>Address</label><br>
          <h3>'.$row['clm_address'].'</h3>
          <label>Religion</label><br>
          <h3>'.$row['clm_religion'].'</h3>
        </div>
        <div class="col-md-6">
          <label>Citizenship</label><br>
          <h3>'.$row['clm_citizenship'].'</h3>
          <label>Contact No.</label><br>
          <h3>'.$row['clm_contact'].'</h3>
          <label>Birth Place</label><br>
          <h3>'.$row['clm_bplace'].'</h3>
          <label>Civil Status</label><br>
          <h3>'.$row['clm_civil'].'</h3>
        </div>
      </div>   
      <h2>Valid ID</h2>
      <img src="../uploads/'.$row['clm_valid'].'" style="width: 100%;">   
      <h2>Senior Citizen ID</h2>
      <img src="../uploads/'.$row['clm_seniorid'].'" style="width: 100%;">  
      
    </div>      
    <div class="modal-footer">      
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Close</button></a>
    </div>  
  </div>';
} 

if(isset($_POST['approveBtn']))
{  
    $scid = $_POST['approveBtn'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Confirmation</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      Are you sure you want to approve this account?
      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="confirm_approve_senior"><i class="fa fa-check-circle"></i>  Confirm</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Cancel</button></a>
        <input type="hidden" name="scid" value="'.$scid.'">
    </div>  
  </div>';
} 

if(isset($_POST['declineBtn']))
{  
    $scid = $_POST['declineBtn'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Confirmation</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      You are about to <span class="text-danger">decline</span> this account. Please input remarks.<br><br>
      <input type="text" name="remarks" class="form-control" required>
      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="confirm_decline_senior"><i class="fa fa-check-circle"></i>  Confirm</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Cancel</button></a>
        <input type="hidden" name="scid" value="'.$scid.'">
    </div>  
  </div>';
} 

if(isset($_POST['deleteSenior']))
{  
    $scid = $_POST['deleteSenior'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Confirmation</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      You are about to <span class="text-danger">DELETE</span> this account. Please input remarks.<br><br>
      <input type="text" name="remarks" class="form-control" required>
      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="confirm_delete_senior"><i class="fa fa-check-circle"></i>  Confirm</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Cancel</button></a>
        <input type="hidden" name="scid" value="'.$scid.'">
    </div>  
  </div>';
} 

if(isset($_POST['viewDeletedBtn']))
{  
    $scid = $_POST['viewDeletedBtn'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">View Details</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      <div class="row">
        <div class="col-md-6">
          <label>Full Name</label><br>
          <h3>'.$row['clm_fullname'].'</h3>
          <label>Email Address</label><br>
          <h3>'.$row['clm_email'].'</h3>
          <label>Birthday</label><br>
          <h3>'.$row['clm_bday'].'</h3>
          <label>Address</label><br>
          <h3>'.$row['clm_address'].'</h3>
          <label>Religion</label><br>
          <h3>'.$row['clm_religion'].'</h3>
        </div>
        <div class="col-md-6">
          <label>Citizenship</label><br>
          <h3>'.$row['clm_citizenship'].'</h3>
          <label>Contact No.</label><br>
          <h3>'.$row['clm_contact'].'</h3>
          <label>Birth Place</label><br>
          <h3>'.$row['clm_bplace'].'</h3>
          <label>Civil Status</label><br>
          <h3>'.$row['clm_civil'].'</h3>
        </div>
      </div>   
      <h2>Valid ID</h2>
      <img src="../uploads/'.$row['clm_valid'].'" style="width: 100%;">   
      <h2>Senior Citizen ID</h2>
      <img src="../uploads/'.$row['clm_seniorid'].'" style="width: 100%;">  
      
    </div>      
    <div class="modal-footer">      
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Close</button></a>
    </div>  
  </div>';
} 

if (isset($_POST['viewappBtn']))
{
  $_SESSION['view_application'] = $_POST['viewappBtn'];
  $_SESSION['pageName'] = $_POST['pageName'];
  echo '<script>location.replace("view_application");</script>';
}

if(isset($_POST['approveApplicationBtn']))
{  
    $id = $_POST['approveApplicationBtn'];
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Confirmation</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      Are you sure you want to approve this application?      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="approve_application"><i class="fa fa-check-circle"></i>  Confirm</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Cancel</button></a>
        <input type="hidden" name="id" value="'.$id.'">
    </div>  
  </div>';
} 

if(isset($_POST['declineApplicationBtn']))
{  
    $id = $_POST['declineApplicationBtn'];
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Confirmation</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      Are you sure you want to decline this application?    
      <br><br>
      <input type="text" name="remarks" placeholder="Please input remarks" class="form-control">  
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="decline_application"><i class="fa fa-check-circle"></i>  Confirm</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Cancel</button></a>
        <input type="hidden" name="id" value="'.$id.'">
    </div>  
  </div>';
} 

//
?>

<script>  
  $(document).ready(function(){ 

    $('.approveBtn').click(function(){  
      var approveBtn = $(this).attr("id");  
      $.ajax({  
        url:"modal/seniors.php",  
        method:"post",  
        data:{approveBtn:approveBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

    $('.declineBtn').click(function(){  
      var declineBtn = $(this).attr("id");  
      $.ajax({  
        url:"modal/seniors.php",  
        method:"post",  
        data:{declineBtn:declineBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

  });
</script>