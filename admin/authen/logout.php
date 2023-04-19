<?php
  require_once('../../utils/utility.php');
  require_once('../../Database/dbhelper.php');
  session_start();
  $token = getCookie('token');
  setcookie('token','',time()-10,'/');
  session_destroy();
  header('Location: login.php')
?>