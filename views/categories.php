<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(isset($_GET['dcategory_id']))
    {
        $del_queryb="SELECT * FROM books WHERE book_category_id=".$_GET['dcategory_id'];
        $result_set2=mysqli_query($con,$del_queryb);
        if(mysqli_num_rows($result_set2)>0){
            $fetched=mysqli_fetch_array($result_set2);
            $book = $fetched[5];
            $bookdir = "books";
            unlink($bookdir."/".$book);

            $cover = $fetched[6];
            if($cover != "default_cover.jpg"){
                $coverdir = "covers";
                unlink($coverdir."/".$cover);
            }
        }

        $del_queryp="SELECT * FROM posts WHERE post_category_id=".$_GET['dcategory_id'];
        $result_set3=mysqli_query($con,$del_queryp);
        if(mysqli_num_rows($result_set3)>0){
            $fetched2=mysqli_fetch_array($result_set3);

            $cover2 = $fetched2[7];
            if($cover2 != "default_cover.jpg"){
                $coverdir2 = "covers";
                unlink($coverdir2."/".$cover2);
            }
        }

        $sql_queryb="DELETE FROM books WHERE book_category_id=".$_GET['dcategory_id'];
        $sql_queryp="DELETE FROM posts WHERE post_category_id=".$_GET['dcategory_id'];

        $sql_query="DELETE FROM category WHERE category_id=".$_GET['dcategory_id'];
        if(mysqli_query($con,$sql_query)&&mysqli_query($con,$sql_queryb)&&mysqli_query($con,$sql_queryp)){
            ?>
                <script type="text/javascript">
                    alert('Successfully deleted a category!');
                    window.location.href='categories.php';
                </script>
            <?php
        }
        else{
            ?>
                <script type="text/javascript">
                    alert('Error occured while deleting a category!');
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
        <title>Categories</title>
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
                            <h1 style="text-align:center;">All Categories</h1>
                            <div id="bydate" style="margin: 20px auto; width:100%; padding:5px;">
                                <div style="overflow-y:scroll; height:393px; background-color:whitesmoke;box-shadow: 0px 0px 5px;">
                                    <?php
                                        $sql_query="SELECT * FROM category WHERE category_id!=1 GROUP BY category_name ASC";
                                        $result_set=mysqli_query($con,$sql_query);
                                        if(mysqli_num_rows($result_set)>0)
                                        {
                                            while($row=mysqli_fetch_row($result_set))
                                            {
                                                ?>
                                                    <div class="bookcover">
                                                        <a href="javascript: void(0)" onclick="javascript: uccategory_id('<?php echo $row[0];?>')">
                                                            <img class="bookimage" src="covers/<?php echo $row[2];?>" style="height:180px;width:130px;">
                                                        </a>
                                                        <div class="details">
                                                            <?php echo $row[1];?>
                                                        </div>
                                                        <button class="apbut" onclick="javascript: ucategory_id('<?php echo $row[0];?>')">update</button>
                                                    </div>
                                                <?php
                                            }
                                        }
                                        else
                                          {
                                            ?>
                                                <div style="background-color:whitesmoke;padding:25px;">
                                                    No posted categories found!
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 94, 201); color:white; border:none" onclick="javascript: category_new()">new</button>
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