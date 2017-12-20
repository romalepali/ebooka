<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');

    if(!isset($_GET['ucbook_id'])||$_GET['ucbook_id']==NULL){
        ?>
            <script type="text/javascript">
                window.location.href='books.php';
            </script>
        <?php
    }

    if(isset($_GET['ucbook_id'])){
        $sql_query="SELECT * FROM books WHERE book_id=".$_GET['ucbook_id'];
        $result_set=mysqli_query($con,$sql_query);
        if(mysqli_num_rows($result_set)>0){
            $fetched_row=mysqli_fetch_array($result_set);
        }
        else{
            ?>
                <script type="text/javascript">
                    window.location.href='books.php';
                </script>
            <?php
        }
    }
    if(isset($_POST['updatebtn']))
    {
        $cover = rand(1000,100000)."-".$_FILES['post_cover']['name'];
        $cover_loc = $_FILES['post_cover']['tmp_name'];
        $cover_size = $_FILES['post_cover']['size'];
        $cover_type = $_FILES['post_cover']['type'];
        $folder_cover="covers/";
        $cover_new_size = $cover_size/1024;  
        $new_cover_name = strtolower($cover);        
        $final_cover=str_replace(' ','-',$new_cover_name);

        if(move_uploaded_file($cover_loc,$folder_cover.$final_cover))
        {
            $sql_query = "UPDATE books SET book_cover='$final_cover',book_date=NOW() WHERE book_id=".$_GET['ucbook_id'];
            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully updated the cover of your book!');
                            window.location.href='books.php';
                    </script>
                <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error occured while updating the cover of your book!');
                    </script>
                <?php
            }
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
        <script src="../js/account.js"></script>
        <title>Update Cover Photo</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Update Cover Photo<br><?php echo $fetched_row[1];?></h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <div style="position:relative;width:375px;margin:75px auto; border:1px solid rgb(0, 94, 201);;">
                                        <input style="font-size:20px;" type="file" name="post_cover" required>
                                    </div>
                                    <div style="margin:auto;width:150px;"> 
                                        <button type="submit" name="updatebtn" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(0, 94, 201);">update</button>
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