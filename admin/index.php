<?php
    ob_start();
    require_once 'sqlconfig.php';
    mysqli_set_charset($conn, "utf8");
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="admin_assets/favicon-black-tie.ico" type="image/x-icon"/>

    <title>Slipseknuden-Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

           




    <?php
    include 'admin_includes/header.php';
    ?>
    <div id="wrapper">

        <div id="page-wrapper">
    <?php
    if(isset($_GET['p'])){
        $page = 'admin_pages/' . $_GET['p'] . '.php';
        if(file_exists($page)){
            include $page;
        } else {
            //404
            header('Location: index.php?p=frontpage');
        }
    } else {
        header('Location: index.php?p=frontpage');
    }
    ?>
    </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include 'admin_includes/footer.php';
    ?>
        
</body>
</html>
