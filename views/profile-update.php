<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');

    if(!isset($_GET['user_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['user_id']))
    {
        $sql_query="SELECT * FROM users WHERE user_id=".$_GET['user_id'];
        $result_set=mysqli_query($con,$sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }

    if(isset($_POST['updatebtn']))
    {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];

        $sql_query = "UPDATE users SET user_fname='$fname',user_mname='$mname',user_lname='$lname',user_gender='$gender' WHERE user_id=".$_GET['user_id'];

        if(mysqli_query($con,$sql_query))
        {
            ?>
                <script type="text/javascript">
                    alert('Successfully updated the data!');
                    function back(id){   
                        window.location.href='profile.php?profile='+id;
                    }

                    back(<?php echo $_GET['user_id']?>);
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while updating the data!');
                </script>
            <?php
        }
    }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/loader.css">
        <link rel="stylesheet" href="../css/tables.css">
        <link rel="shortcut icon" href="../images/logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/account.js"></script>
        <title>Update Profile Info</title>
    </head>
    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Update Profile Info</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                            <form method="POST" style="border:none; padding: 10px; color:black; background-color:white;">
                                <b>First Name</b>
                                <input type="text" name="fname" placeholder="enter first name" value="<?php echo $fetched_row['user_fname']; ?>" required><br><br>
                                <b>Middle Name</b>
                                <input type="text" name="mname" placeholder="enter middle name" value="<?php echo $fetched_row['user_mname']; ?>" required><br><br>
                                <b>Last Name</b>
                                <input type="text" name="lname" placeholder="enter last name" value="<?php echo $fetched_row['user_lname']; ?>" required><br><br>
                                <b>Gender</b><br>
                                <select name="gender" required>
                                    <?php
                                        if ($fetched_row['user_gender'] == 'Female')
                                        {
                                            echo "<option value='Female' selected>Female</option>";
                                            echo "<option value='Male'>Male</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='Female'>Female</option>";
                                            echo "<option value='Male' selected>Male</option>";
                                        }
                                    ?>
                                </select><br><br>
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