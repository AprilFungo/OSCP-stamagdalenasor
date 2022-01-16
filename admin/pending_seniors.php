
<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP';
    $active = 'seniors'; 
    include 'include/head.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['confirm_decline_senior']))
    {
        $remarks = mysqli_real_escape_string($dbc, $_POST['remarks']);
        $scid = $_POST['scid'];       
        $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
        $row = mysqli_fetch_array($q);
        $email = $row['clm_email'];

        // send email address
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        require 'PHPMailer/class.smtp.php';
        require 'PHPMailer/credentials.php';

        $mail = new PHPMailer();
        // server settings
        //When hosted in a live server, replace the SMTP username  with the email used in the credentials and replace SMTP password with the email password. Do this only if you will host this website in a free hosting that doesn't support SMTP. Vistit this site for the instructions: https://github.com/InfinityFreeHosting/contactform
        $mail->isSMTP();                         // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;          // Enable SMTP authentication
                $mail->Username = EMAIL;         // SMTP username  
                $mail->Password = PASS;          // SMTP password
                $mail->SMTPSecure = 'tsl';       // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

        //Recipients
                $mail->setFrom(EMAIL, 'Online Senior Citizen Portal');
                $mail->addAddress($email); // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Declined Registration';
                $mail->Body    = 'Your registration form has been declined with remarks:<br>
                                  <b>"'.$remarks.'"</b><br><br>
                                  This is system generated email please do not reply.';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send())
        {
            $_SESSION['error'] = 'Message could not be sent!<br><strong>Mailer Error:</strong>' .$mail->ErrorInfo;                       
        }else{
            $q = @mysqli_query($dbc, "UPDATE tbl_seniors SET clm_status = '3', clm_status_by = '$adminid', clm_status_date = NOW(), clm_status_remarks = '$remarks' WHERE clm_scid = '$scid' ");
            if ($q)
            {
                $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$scid was declined','DECLINED','PENDING ACCOUNTS','$adminid')");

                echo '<script>location.replace("");</script>';
            }
            else
            {
                $_SESSION['error'] = mysqli_error($dbc);
            }
        }        
    }

    if (isset($_POST['confirm_approve_senior']))
    {
        $scid = $_POST['scid'];       
        $generate_pass = random_int(100000, 999999);
        $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_scid = '$scid' ");
        $row = mysqli_fetch_array($q);
        $email = $row['clm_email'];

        // send email address
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        require 'PHPMailer/class.smtp.php';
        require 'PHPMailer/credentials.php';

        $mail = new PHPMailer();
        // server settings
          //When hosted in a live server, replace the SMTP username  with the email used in the credentials and replace SMTP password with the email password. Do this only if you will host this website in a free hosting that doesn't support SMTP. Vistit this site for the instructions: https://github.com/InfinityFreeHosting/contactform
        $mail->isSMTP();                         // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;          // Enable SMTP authentication
                $mail->Username = EMAIL;         // SMTP username
                $mail->Password = PASS;          // SMTP password
                $mail->SMTPSecure = 'tsl';       // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

        //Recipients
                $mail->setFrom(EMAIL, 'Online Senior Citizen Portal');
                $mail->addAddress($email); // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Approved Registration';
                $mail->Body    = 'Your registration form has been approved. You can now login to Online Senior Citizen Portal with your credential below:<br>
                                    <b>Username: '.$email.'</b><br>
                                    <b>Password: '.$generate_pass.'</b><br><br>                                    
                                  This is system generated email please do not reply.';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send())
        {
            $_SESSION['error'] = 'Message could not be sent!<br><strong>Mailer Error:</strong>' .$mail->ErrorInfo;                       
        }else{
            $q = @mysqli_query($dbc, "UPDATE tbl_seniors SET clm_username = '$email', clm_password = md5('$generate_pass'), clm_status = '2', clm_status_by = '$adminid', clm_status_date = NOW() WHERE clm_scid = '$scid' ");
            if ($q)
            {
                $q = @mysqli_query($dbc, "INSERT INTO tbl_logs (clm_desc, clm_mode, clm_module, clm_incharge) VALUES ('$scid was approved','APPROVED','PENDING ACCOUNTS','$adminid')");
                echo '<script>location.replace("");</script>';
            }
            else
            {
                $_SESSION['error'] = mysqli_error($dbc);
            }
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
                  Pending Accounts
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
                                if (!empty($_SESSION['error']))
                                {
                                    echo'
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="btn-close" data-dismiss="alert"></button>
                                        <strong>'.$_SESSION['error'].'</strong>
                                    </div>';
                                    unset($_SESSION['error']);
                                }

                                $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_status = 1 ");
                                if (mysqli_num_rows($q) == 0)
                                {
                                    echo'<h3 style="margin-top: 10px; margin-bottom: 50px;">No pending accounts.</h5>';
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
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Date Registered</th>
                                        </tr>
                                        <?php
                                            while ($row = mysqli_fetch_array($q))
                                            {
                                                echo'
                                                <tr>
                                                    <td>
                                                        <form>
                                                            <button id="'.$row['clm_scid'].'" type="button" name="viewBtn" class="btn btn-info viewBtn">View</button>
                                                        </form>        
                                                    </td>
                                                    <td>'.$row['clm_scid'].'</td>
                                                    <td>'.$row['clm_fullname'].'</td>
                                                    <td>'.$row['clm_address'].'</td>
                                                    <td>'.$row['clm_email'].'</td>
                                                    <td>'.$row['clm_contact'].'</td>
                                                    <td>'.$row['clm_date'].'</td>
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

    $('.viewBtn').click(function(){  
      var viewBtn = $(this).attr("id");  
      $.ajax({  
        url:"modal/seniors.php",  
        method:"post",  
        data:{viewBtn:viewBtn},  
        success:function(data){  
            $('#modal-content').html(data);  
            $('#dataModal').modal("show");  
        }  
      });  
    });

  });
</script>
