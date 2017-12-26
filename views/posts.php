<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');

    if(isset($_GET['dstory_id']))
    {
        $sql_query="DELETE FROM posts WHERE post_id=".$_GET['dstory_id'];
        if(mysqli_query($con,$sql_query)){
            ?>
                <script type="text/javascript">
                    alert('Successfully deleted your story!');
                    window.location.href='posts.php';
                </script>
            <?php
        }
        else{
            ?>
                <script type="text/javascript">
                    alert('Error occured while deleting your story!');
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
        <script src="../js/account.js"></script>
        <script src="../js/posts.js"></script>
        <title>Posts</title>
    </head>

    <style>
        .bookcover {
            float:left;
            margin:10px;
        }
        .bookimage {
            box-shadow:0px 0px 5px;
            transition:all ease 1s;
            opacity:.5;
        }
        .bookimage:hover {
            box-shadow:0px 0px 10px rgb(0, 94, 201);
            transition:all ease 1s;
            opacity:1;
        }
        .details {
            margin: 2px;
        }

        .apbut {
            color:white;
            background-color:rgb(0, 94, 201);
            border:none;
            width:60px;
            padding:5px 0px;
        }
    </style>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">All Posts</h1>
                            <div id="bydate" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="overflow-y:scroll; height:393px; background-color:whitesmoke;box-shadow: 0px 0px 5px;">
                                    <?php
                                        $sql_query="SELECT a.*,b.category_name FROM posts a INNER JOIN category b ON a.post_category_id=b.category_id WHERE a.user_id=".$_SESSION['user_id']." GROUP BY post_date DESC";
                                        $result_set=mysqli_query($con,$sql_query);
                                        if(mysqli_num_rows($result_set)>0)
                                        {
                                            while($row=mysqli_fetch_row($result_set))
                                            {
                                                ?>
                                                    <div class="bookcover">
                                                        <a href="javascript: void(0)" onclick="javascript: ucstory_id('<?php echo $row[0];?>')">
                                                            <img class="bookimage" src="covers/<?php echo $row[7];?>" style="height:180px;width:130px;">
                                                        </a>
                                                        <div class="details">
                                                            <?php echo $row[1];?>
                                                        </div>
                                                        <button class="apbut" onclick="javascript: vstory_id('<?php echo $row[0];?>')">view</button>
                                                        <button class="apbut" onclick="javascript: ustory_id('<?php echo $row[0];?>')">update</button>
                                                    </div>
                                                <?php
                                            }
                                        }
                                        else
                                          {
                                            ?>
                                                <div style="background-color:whitesmoke;padding:25px;">
                                                    No posted stories found!
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 94, 201); color:white; border:none" onclick="javascript: story_new()">new</button>
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