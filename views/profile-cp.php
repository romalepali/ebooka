<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(!isset($_GET['user_id'])||$_GET['user_id']==NULL){
        ?>
            <script type="text/javascript">
                window.location.href='index.php';
            </script>
        <?php
    }

    if(isset($_GET['user_id']))
    {
        if($_GET['user_id']==$_SESSION['user_id']){
            $sql_query="SELECT user_id,user_pword FROM users WHERE user_id=".$_GET['user_id'];
            $result_set=mysqli_query($con,$sql_query);
            $fetched_row=mysqli_fetch_array($result_set);
        }
        else
        {
            ?>
                <script type="text/javascript">
                    window.location.href='index.php';
                </script>
            <?php
        }       
    }

    if(isset($_POST['updatebtn']))
    {
        $password = md5($_POST['password']);
        $npassword = md5($_POST['npassword']);
        $cnpassword = md5($_POST['cnpassword']);

        if($password != $fetched_row[1]){
            ?>
                <script type="text/javascript">
                    alert('Current password is incorrect!');
                </script>
            <?php
        }
        if(strcmp($npassword,$cnpassword) != 0){
            ?>
                <script type="text/javascript">
                    alert('Passwords does not match!');
                </script>
            <?php
        }
        else{
            $sql_query = "UPDATE users SET user_pword='$npassword' WHERE user_id=".$_GET['user_id'];
            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully changed the password!');
                        function back(id){   
                            window.location.href='profile.php?user_id='+id;
                        }
    
                        back(<?php echo $_GET['user_id']?>);
                    </script>
                <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error occured while updating the password!');
                    </script>
                <?php
            }
        }
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
        <title>Change Password</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Change Password</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                            <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                <b>Current Password</b>
                                <input type="password" name="password" placeholder="enter current password" required><br><br>
                                <b>New Password</b>
                                <input type="password" name="npassword" placeholder="enter new password" required><br><br>
                                <b>Confirm New Password</b>
                                <input type="password" name="cnpassword" placeholder="enter new password" required><br><br>
                                <div style="position:relative; top:40px; width: 150px; margin:auto; margin-bottom:80px;"> 
                                    <button type="submit" name="updatebtn" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(2, 160, 29);">update</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <?php include ('include/recent2.php');?>
                    </div>
                    <?php include ('include/footer.php');?>
                </div>
            <div>
        </div>
    </body>
</html>