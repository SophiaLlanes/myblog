<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark  fixed-top bg-dark  ">
    <div class="container">
        <div class="navbar-brand">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php" >My Blog</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="active nav-link "><a href="index.php">Home</a></li>
                <li class="nav-link"><a href="blog.php">Blog</a></li>
                <?php if(!is_logged_in()) { ?>
                    <li class="nav-link"><a href="login.php">Login</a></li>
                <?php }else{ ?>
                    <li class="nav-link"><a href="logout.php">Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>