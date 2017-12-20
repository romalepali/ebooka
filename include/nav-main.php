<html>
    <head>
        <script src="js/nav1.js"></script>
        <script src="js/logout.js"></script>
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" onclick="openNav1()">Log In</a>
            <a href="#" onclick="openNav2()">Sign Up</a>
        </div>
        <?php include ('include/login.php');?>
        <?php include ('include/signup.php');?>
    </body>
</html>