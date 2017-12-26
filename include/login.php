<html>
    <body>
        <div id="mySidenav1" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
            <div style="margin-top:100px;">
                <img src="images/logo.png" width="150px">
                <form style="color:white; margin: 0px 10px; text-align:center;" action="session.php" method="POST">
                    <input type="text" style="width:40%;" name="username" placeholder="enter username" required><br><br>
                    <input type="password" style="width:40%;" name="password" placeholder="enter password" required><br><br>
                    <button style="border:none; padding: 10px; color:black; background-color:white;border-radius:10px;" name="login">Log In</button>
                </form>
            </div>
        </div>
    </body>
</html>