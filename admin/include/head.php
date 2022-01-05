<?php 
    session_start();
    require_once('../database/connection.php');
    if (empty($_SESSION['adminid'])){echo '<script>location.replace("../logout");</script>';}
    else
    {
        $adminid = $_SESSION['adminid'];
        $q = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_adminid = '$adminid' ");
        $row_admin = mysqli_fetch_array($q);
        $fullname = $row_admin['clm_name'];
        $currentusername = $row_admin['clm_username'];
        $currentpass = $row_admin['clm_password'];
        $type = $row_admin['clm_type'];

    }
    if ($active != 'view_application'){unset($_SESSION['view_application']);unset($_SESSION['pageName']);}
?>
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../0/assets/img/titleicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php echo $title; ?></title>
    <!-- CSS files -->   
    <link href="../dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="../dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="../dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="../dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="../dist/css/demo.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="asset/img/favicon.png">    
    <link href="../dist/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  </head>
  <style>
    .background-logo {
       background-color: whitesmoke;
    }
    .space{
        margin-right: 5px;
    }
  </style>