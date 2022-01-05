<?php
session_start();
session_destroy();
echo'<script> location.replace("0/index")</script>';
?>