<?php
session_start(); 
date_default_timezone_set('Asia/Manila');
require_once('../../database/connection.php');

if(isset($_POST['newStaff']))
{  
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">New Staff</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">

      <h4>Full Name</h4>
      <input required type="text" name="fname" class="form-control">      
      <br>
      <h4>Username</h4>
      <input required type="text" name="username" class="form-control"><br>
      <h4>Default Password: 1234</h4>
      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="addBtn"><i class="fa fa-check-circle" style="margin-right: 5px;"></i>  ADD</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button" name="decline"><i class="fa fa-times-circle" style="margin-right: 5px;"></i>  CANCEL</button></a>       
    </div>  
  </div>';
} 
 
if(isset($_POST['editBtn']))
{  
  $staffID = $_POST['editBtn'];
  $q = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_adminid = '$staffID' ");
  $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Edit Staff</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">

      <h4>Full Name</h4>
      <input required type="text" name="fname" class="form-control" value="'.$row['clm_name'].'">      
      <br>
      <h4>Username</h4>
      <input required type="text" name="username" class="form-control" value="'.$row['clm_username'].'"><br>
      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="updateBtn"><i class="fa fa-check-circle" style="margin-right: 5px;"></i>  UPDATE</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button" name="decline"><i class="fa fa-times-circle" style="margin-right: 5px;"></i>  CANCEL</button></a>       
      <input type="hidden" name="staffID" value="'.$staffID.'">
    </div>  
  </div>';
} 

if(isset($_POST['deleteBtn']))
{  
    $adminid = $_POST['deleteBtn'];
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_adminid = '$adminid' ");
    $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Confirmation</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      You are about to <span class="text-danger">DELETE</span> this account. Please input remarks.<br><br>
      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="confirm_delete_staff"><i class="fa fa-check-circle"></i>  Confirm</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button"><i class="fa fa-times-circle"></i>  Cancel</button></a>
        <input type="hidden" name="adminid" value="'.$adminid.'">
    </div>  
  </div>';
} 
?>