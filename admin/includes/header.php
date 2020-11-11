<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>

<?php ob_start(); ?>
<?php session_start(); ?>

<?php
if(isset($_SESSION['user_role'])) {
  
  if($_SESSION['user_role'] !== 'admin') {
    header("location: ../index.php");
  }

}else{
  header("Location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Harshit-Admin Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="css/all.css" >

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script src="js/ckeditor.js"></script>

    <script src="js/loader.js"></script>

  </head>

  <body>