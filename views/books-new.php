<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(isset($_POST['uploadbtn']))
    {
        $book_title = $_POST['book_title'];
        $book_description = $_POST['book_description'];
        $book_author = $_POST['book_author'];
        $user_id = $_SESSION['user_id'];
        $book_category_id = $_POST['book_category_id'];
        $upload_type = $_POST['upload_type'];

        $file = rand(1000,100000)."-".$book_title;
        $file_loc = $_FILES['book_file']['tmp_name'];
        $file_size = $_FILES['book_file']['size'];
        $file_type = $_FILES['book_file']['type'];
        $folder_file="books/";
        $file_new_size = $file_size/1024;  
        $new_file_name = strtolower($file);        
        $final_file=str_replace(' ','-',$new_file_name);

        $final_cover="default_cover.jpg";

        if(move_uploaded_file($file_loc,$folder_file.$final_file))
        {
            $sql_query = "INSERT INTO books (book_title,book_description,book_author,book_category_id,book_file,book_cover,book_date,upload_type,user_id) VALUES ('$book_title','$book_description','$book_author','$book_category_id','$final_file','$final_cover',NOW(),'$upload_type','$user_id')";
            if(mysqli_query($con,$sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Successfully added a new book!');
                            window.location.href='books.php';
                    </script>
                <?php
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Error occured while adding a new book!');
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
        <title>Add New Book</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Add New Book</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="text" name="book_title" placeholder="book title" required>
                                    <textarea name="book_description" placeholder="write your book description here" style="width:100%;height:214px;"></textarea><br>
                                    <input type="text" name="book_author" placeholder="book author" required>
                                    <select style="margin-bottom:10px;width:100%;height:35px;" name="book_category_id" required>
                                        <option value="">Book Category</option>
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
                                    <select style="margin-bottom:10px;width:100%;height:35px;" name="upload_type" required>
                                        <option value="">Upload Type</option>
                                        <option value="Private">Private</option>
                                        <option value="Public">Public</option>
                                    </select>

                                    <div style="float:left;margin-bottom:20px;">
                                        Upload a Book<br>
                                        <input type="file" name="book_file" required>
                                    </div>
                                    <div style="float:right; width: 150px;"> 
                                        <button type="submit" name="uploadbtn" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(0, 94, 201);">upload</button>
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