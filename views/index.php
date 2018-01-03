<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    $sql_query="SELECT * FROM users WHERE user_id=".$_SESSION['user_id'];
    $result_set=mysqli_query($con,$sql_query);
    if(mysqli_num_rows($result_set)>0){
        $fetched_row=mysqli_fetch_array($result_set);
    }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/loader.css">
        <link rel="shortcut icon" href="../images/logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/account.js"></script>
        <script src="../js/posts.js"></script>
        <script src="../js/books.js"></script>
        <title>eBooKa</title>
    </head>
    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:auto">
                        <?php include ('include/intro.php');?>
                        <?php include ('include/recent.php');?>
                    </div>
                    <?php include ('include/footer.php');?>
                </div>
            </div>
        </div>
    </body>
</html>