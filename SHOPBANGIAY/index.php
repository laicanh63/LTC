<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_detal.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/style_cart.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/style_ads.css">
    <link rel="stylesheet" type="text/css" href="style_bill.css">
    <link rel="stylesheet" type="text/css" href="css/product1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
            integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="website icon" type="jpg" href="ka.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Shop</title>
</head>
<body style="background-color: #DDDDDD; font-family: Arial, Helvetica, sans-serif; width: 100%; margin-top: 0;">
    
    <div class="wrapper">
        <?php
            session_start();
            include("admincp/config/connect.php");
            include("pages/menu.php");
            include("pages/main.php");
            include("pages/show_product.php");
            include("pages/footer.php");
        ?>
    </div>
</body>
</html>