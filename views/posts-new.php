<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(isset($_POST['createbtn']))
    {
        $post_title = $_POST['post_title'];
        $post_text = $_POST['post_text'];
        $post_description = $_POST['post_description'];
        $user_id = $_SESSION['user_id'];
        $post_author = $_SESSION['user_uname'];
        $post_category_id = $_POST['post_category_id'];
        $post_type = $_POST['post_type'];
        $final_cover="default_cover.jpg";

        $sql_query = "INSERT INTO posts (post_title,post_text,post_author,post_category_id,post_cover,post_date,post_type,post_description,user_id) VALUES ('$post_title','$post_text','$post_author','$post_category_id','$final_cover',NOW(),'$post_type','$post_description','$user_id')";
        if(mysqli_query($con,$sql_query))
        {
            ?>
                <script type="text/javascript">
                    alert('Successfully added a new story!');
                        window.location.href='posts.php';
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while adding a new story!');
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
        <title>Add New Story</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Add New Story</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="text" name="post_title" placeholder="story title" required>
                                    <textarea name="post_description" placeholder="write your story description here" style="width:100%;height:162px;margin-bottom:10px;"></textarea><br>
                                    <textarea name="post_text" placeholder="write your story here" style="width:100%;height:262px;margin-bottom:10px;"></textarea><br>
                                    <select style="margin-bottom:10px;width:100%;height:35px;" name="post_category_id" required>
                                        <option value="">Story Category</option>
                                        <?php
                                            $sql_query="SELECT category_id, category_name FROM category WHERE category_id!=1";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                        echo "<option value='$row[0]'>".$row[1]."</option>";
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    Not Available
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <select style="margin-bottom:10px;width:100%;height:35px;" name="post_type" required>
                                        <option value="">Post Type</option>
                                        <option value="Private">Private</option>
                                        <option value="Public">Public</option>
                                    </select>
                                    <div style="float:right; width: 150px;"> 
                                        <button type="submit" name="createbtn" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(0, 94, 201);">create</button>
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