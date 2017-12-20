<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');

    if(!isset($_GET['ubook_id'])||$_GET['ubook_id']==NULL){
        ?>
            <script type="text/javascript">
                window.location.href='books.php';
            </script>
        <?php
    }

    if(isset($_GET['ubook_id'])){
        $sql_query="SELECT * FROM books WHERE book_id=".$_GET['ubook_id'];
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
        $book_title = $_POST['book_title'];
        $book_description = $_POST['book_description'];
        $book_author = $_POST['book_author'];
        $book_category_id = $_POST['book_category_id'];
        $upload_type = $_POST['upload_type'];

        $sql_query = "UPDATE books SET book_title='$book_title',book_description='$book_description',book_author='$book_author',book_category_id='$book_category_id',book_date=NOW(),upload_type='$upload_type' WHERE book_id=".$_GET['ubook_id'];
        if(mysqli_query($con,$sql_query))
        {
            ?>
                <script type="text/javascript">
                    alert('Successfully updated your book!');
                        window.location.href='books.php';
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while updating your book!');
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
        <script src="../js/books.js"></script>
        <title>Update Your Book</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Update Your Book</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="text" name="book_title" placeholder="book title" value="<?php echo $fetched_row[1];?>" required>
                                    <textarea name="book_description" placeholder="write your book description here" style="width:100%;height:262px;margin-bottom:10px;"><?php echo $fetched_row[2];?></textarea><br>
                                    <input type="text" name="book_author" placeholder="book author" value="<?php echo $fetched_row[3];?>" required>
                                    <select style="margin-bottom:10px;width:100%;height:35px;" name="book_category_id" required>
                                        <?php
                                            $sql_query="SELECT category_id, category_name FROM category";
                                            $result_set=mysqli_query($con,$sql_query);
                                            
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    if ($fetched_row[5] == $row[0]){
                                                        echo "<option value='$row[0]' selected>".$row[1]."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$row[0]'>".$row[1]."</option>";
                                                    }
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
                                    <select style="margin-bottom:10px;width:100%;height:35px;" name="upload_type" required>
                                        <?php
                                            if ($fetched_row[4] == 'Private')
                                            {
                                                echo "<option value='Private' selected>Private</option>";
                                                echo "<option value='Public'>Public</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='Private'>Private</option>";
                                                echo "<option value='Public' selected>Public</option>";
                                            }
                                        ?>
                                    </select>
                                    <div style="float:right;"> 
                                        <button type="submit" name="updatebtn" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(2, 160, 29);">update</button>
                                    </div>
                                </form>
                                <div style="float:right; margin-right:5px;"> 
                                    <button onclick="javascript: dbook_id('<?php echo $fetched_row[0];?>')" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(207, 4, 4);">delete</button>
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