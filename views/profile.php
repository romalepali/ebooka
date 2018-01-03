<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(!isset($_GET['user_id'])){
        header("Location: index.php");
        exit;
    }

    if(isset($_GET['user_id']))
    {
        if($_GET['user_id']==$_SESSION['user_id']){
            $sql_query="SELECT * FROM users WHERE user_id=".$_GET['user_id'];
            $result_set=mysqli_query($con,$sql_query);
            $fetched_row=mysqli_fetch_array($result_set);
        }
        else{
            ?>
                <script type="text/javascript">
                    window.location.href='index.php';
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
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="shortcut icon" href="../images/logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/nav2.js"></script>
        <script src="../js/account-profile.js"></script>
        <title>Profile</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <a href="javascript: upload_prof('<?php echo $fetched_row[0]; ?>')">
                                    <div class="studentpic">
                                        <img class="profilepic" src="../uploads/<?php echo $fetched_row[7]?>">
                                    </div>
                                </a>
                                <div class="studentsinfo">
                                    <div class="title">Information</div>
                                    <table align="center">
                                        <tr>
                                            <th width="200px">Name</th>
                                            <td width="200px"><?php echo $fetched_row[5].", ".$fetched_row[3]." ".$fetched_row[4]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $fetched_row[6]; ?></td>
                                        </tr>
                                        
                                    </table>
                                    <button class="studprofbut" onclick="javascript: update_id('<?php echo $_SESSION['user_id']; ?>')">Update</button>
                                </div>
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