<html>
    <head>
        <script src="../js/logout.js"></script>
        <script src="../js/nav2.js"></script>
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="javascript:void(0)" onclick="openNav1()">Account</a>
            <a href="javascript:void(0)" onclick="openNav2()">Manage</a>
            <a href="javascript:void(0)" onclick="openNav3()">About</a>
        </div>
        <div id="mySidenav1" class="sidenav">
            <a href="javascript: void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
            <a href="javascript: void(0)" onclick="profile('<?php echo $_SESSION['user_id'];?>')">Profile</a>
            <a href="javascript: void(0)" onclick="openNav1_2()">Settings</a>
            <a href="javascript: void(0)" onclick="logout()">Logout</a>
        </div>
        <div id="mySidenav1_2" class="sidenav">
            <a href="javascript: void(0)" class="closebtn" onclick="closeNav1_2()">&times;</a>
            <a href="javascript: void(0)" onclick="javascript: update_uname('<?php echo $_SESSION['user_id'];?>')">Change Username</a>
            <a href="javascript: void(0)" onclick="javascript: update_upass('<?php echo $_SESSION['user_id'];?>')">Change Password</a>
        </div>
        <div id="mySidenav2" class="sidenav">
            <a href="javascript: void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
            <a href="javascript: void(0)" onclick="openNav2_1()">Books</a>
            <a href="javascript: void(0)" onclick="openNav2_2()">Stories</a>
        </div>
        <div id="mySidenav2_1" class="sidenav">
            <a href="javascript: void(0)" class="closebtn" onclick="closeNav2_1()">&times;</a>
            <a href="books.php">Browse</a>
            <a href="books-new.php">Add New</a>
        </div>
        <div id="mySidenav2_2" class="sidenav">
            <a href="javascript: void(0)" class="closebtn" onclick="closeNav2_2()">&times;</a>
            <a href="posts.php">Browse</a>
            <a href="posts-new.php">Add New</a>
        </div>
        <div id="mySidenav3" class="sidenav">
            <a href="javascript: void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
            <a href="about.php">eBooKa</a>
            <a href="developers.php">Developers</a>
            <a href="contacts.php">Contacts</a>
        </div>
    </body>
</html>