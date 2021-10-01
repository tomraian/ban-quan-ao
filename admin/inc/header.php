<?php
    session_start();
    include_once '../database/connect.php';
    include_once './inc/function.php';
?>
<?php 
    if(!isset($_SESSION['dangnhap'])){
        header('Location: login.php');
    }
?>
<?php 
if(isset($_GET['dangxuat'])){
    session_start();
    unset($_SESSION['dangnhap']);
    session_destroy();
    header('Location: login.php');
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
    <link rel="shortcut icon" type="image/x-icon" href="img\favicon.png">
    <title>
        <?php
        if(isset($title)){
            echo $title;
        }
        else{
            echo 'title';
        }
    ?>
    </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>