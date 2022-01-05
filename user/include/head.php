<?php
    session_start();
    require_once('../database/connection.php');
    if (empty($_SESSION['userid'])){echo '<script>location.replace("../logout");</script>';}
    else
    {
        $userid = $_SESSION['userid'];
        $q = @mysqli_query($dbc, "SELECT *, YEAR(CURDATE()) - YEAR(clm_bday) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(clm_bday, '%m%d')) as age FROM tbl_seniors WHERE clm_scid = '$userid' ");
        $row_user = mysqli_fetch_array($q);
        $fullname = $row_user['clm_fullname'];
        $currentusername = $row_user['clm_username'];
        $currentpass = $row_user['clm_password'];

        // Other Details
        $logged_citizenship = $row_user['clm_citizenship'];
        $logged_age = $row_user['age'];
        $logged_address = $row_user['clm_address'];
        $logged_religion = $row_user['clm_religion'];
        $logged_bday = $row_user['clm_bday'];
        $logged_bplace = $row_user['clm_bplace'];
        $logged_civil = $row_user['clm_civil'];

    }
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