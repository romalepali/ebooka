<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(!isset($_GET['ucategory_id'])||$_GET['ucategory_id']==NULL){
        ?>
            <script type="text/javascript">
                window.location.href='categories.php';
            </script>
        <?php
    }

    if(isset($_GET['ucategory_id'])){
        $sql_query="SELECT * FROM category WHERE category_id=".$_GET['ucategory_id'];
        $result_set=mysqli_query($con,$sql_query);
        if(mysqli_num_rows($result_set)>0){
            $fetched_row=mysqli_fetch_array($result_set);
        }
        else{
            ?>
                <script type="text/javascript">
                    window.location.href='categories.php';
                </script>
            <?php
        }
    }

    if(isset($_POST['updatebtn']))
    {
        $category_name = $_POST['category_name'];

        $sql_query = "UPDATE category SET category_name='$category_name' WHERE category_id=".$_GET['ucategory_id'];
        if(mysqli_query($con,$sql_query))
        {
            ?>
                <script type="text/javascript">
                    alert('Successfully updated a category!');
                        window.location.href='categories.php';
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
                    alert('Error occured while updating a category!');
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
        <script src="../js/categories.js"></script>
        <title>Update A Category</title>
    </head>

    <body style="font-family:Verdana;" onload="myFunction()">
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <?php include ('include/nav-main.php');?>
                <div id="main">
                    <?php include ('include/menu.php');?>
                    <div style="overflow:hidden;">
                        <div class="main">
                            <h1 style="text-align:center;">Update A Category</h1>
                            <div style="position relative; width:80%; margin:auto; text-align:left;">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="text" name="category_name" placeholder="category name" value="<?php echo $fetched_row[1];?>" required>
                                    <div style="float:right;"> 
                                        <button type="submit" name="updatebtn" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(2, 160, 29);">update</button>
                                    </div>
                                </form>
                                <div style="float:right; margin-right:5px;"> 
                                    <button onclick="javascript: dcategory_id('<?php echo $fetched_row[0];?>')" style="margin-bottom:20px;border:none; width: 150px; padding: 13px 0px; color:white; background-color:rgb(207, 4, 4);">delete</button>
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