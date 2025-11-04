<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_admincp.css">
    <title>AdminCp</title>
</head>

<body style="background-color:#DDDDDD;">
    <div class="admin_page">
    <div class="header_admin">
    <div class="title_admin">
        <a href="http://localhost/nike/admincp/index.php"><h1 style="margin-left: 10px; color: white;">Welcome to AdminPage</h1></a>
    </div>
    <div class="log_inout">
        <?php include("modules/header.php"); ?>
    </div>
</div>

        </div>
    <div class="container-admin">
        <div class="menu-admin">
            <?php 
                include("modules/menu.php");
            ?>
        </div>
        <div class="content-admin">
        <div class="wrapper" style="border: none;">
        <?php
            include("config/connect.php");
            include("modules/main.php");
        ?>
        </div>
        </div>
    </div>
    </div>
</body>
</html>