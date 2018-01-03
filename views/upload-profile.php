<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);
    
    if(!isset($_GET['user_id'])){
        header("location: index.php");
        exit;
    }

    if(isset($_GET['user_id']))
    {
        if($_GET['user_id']!=$_SESSION['user_id']){
            ?>
                <script type="text/javascript">
                    window.location.href='index.php';
                </script>
            <?php
        }       
    }

    if(isset($_POST['uploadbtn']))
    {
        $file = rand(1000,100000)."-".$_FILES['prof_pic']['name'];
        $file_loc = $_FILES['prof_pic']['tmp_name'];
        $file_size = $_FILES['prof_pic']['size'];
        $file_type = $_FILES['prof_pic']['type'];
        $folder="../uploads/";
        
        // new file size in KB
        $new_size = $file_size/1024;  
        // new file size in KB
        
        // make file name in lower case
        $new_file_name = strtolower($file);
        // make file name in lower case
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file))
        {
            $sql="UPDATE users SET user_profile='$final_file' WHERE user_id=".$_GET['user_id'];
            mysqli_query($con,$sql);
            ?>
                <script>
                    alert('Successfully uploaded!');

                    function back(id){   
                        window.location.href='profile.php?profile='+id;
                    }

                    back(<?php echo $_GET['user_id'];?>);
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert('Error while uploading file!');
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
        <link rel="shortcut icon" href="../images/logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/nav2.js"></script>
        <title>Upload File</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Upload File</h1>
                            <div style="position relative; width:80%; margin:auto; margin-top:100px; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="position:relative; width:300px; padding:10px; margin:auto;">
                                        <input style="font-size:20px;" type="file" name="prof_pic" required><br><br>
                                    </div>
                                    <div style="position:relative; top:40px; width:150px; margin:auto; margin-bottom:120px; margin-top:50px;"> 
                                        <button type="submit" name="uploadbtn" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(2, 160, 29);">upload</button>
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