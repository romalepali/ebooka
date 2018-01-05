<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(isset($_GET['dbook_id']))
    {
        $del_query="SELECT * FROM books WHERE book_id=".$_GET['dbook_id'];
        $result_set2=mysqli_query($con,$del_query);
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

        $sql_query="DELETE FROM books WHERE book_id=".$_GET['dbook_id'];
        if(mysqli_query($con,$sql_query)){
            ?>
                <script type="text/javascript">
                    alert('Successfully deleted your book!');
                    window.location.href='books.php';
                </script>
            <?php
        }
        else{
            ?>
                <script type="text/javascript">
                    alert('Error occured while deleting your book!');
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
        <script src="../js/shared.js"></script>
        <title>Books</title>
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
        .share {
            margin: 2px;
        }
        .apbut {
            color:white;
            background-color:rgb(0, 94, 201);
            border:none;
            width:60px;
            padding:5px 0px;
        }
        #myUL {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #mySelect {
            width: 99%;
            font-size: 16px;
            padding: 12px 20px 12px 12px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            text-align:left;
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
                            <h1 style="text-align:center;">All Books</h1>
                            
                            <select id="mySelect" onchange="shared()">
                                <option value="">All</option>
                                <option value="Private">Private</option>
                                <option value="Public">Public</option>
                            </select>

                            <div id="bydate" style="margin:auto; margin-bottom:20px; width:100%; padding:5px;">
                                <div style="overflow-y:scroll; height:393px; background-color:whitesmoke;box-shadow: 0px 0px 5px;">
                                    <ul id="myUL">
                                        <?php
                                            $sql_query="SELECT a.*,b.category_name FROM books a INNER JOIN category b ON a.book_category_id=b.category_id WHERE a.user_id=".$_SESSION['user_id']." GROUP BY book_title ASC";
                                            $result_set=mysqli_query($con,$sql_query);
                                            if(mysqli_num_rows($result_set)>0)
                                            {
                                                while($row=mysqli_fetch_row($result_set))
                                                {
                                                    ?>
                                                        <li>                                                    
                                                            <div class="bookcover">
                                                                <a href="javascript: void(0)" onclick="javascript: ucbook_id('<?php echo $row[0];?>')">
                                                                    <img class="bookimage" src="covers/<?php echo $row[6];?>" style="height:180px;width:130px;">
                                                                </a>
                                                                <div class="details">
                                                                    <b><?php echo $row[1];?></b>
                                                                </div>
                                                                <div class="share">
                                                                    (<?php echo $row[8];?>)
                                                                </div>
                                                                <button class="apbut" onclick="javascript: vbook_id('<?php echo $row[0];?>')">view</button>
                                                                <button class="apbut" onclick="javascript: ubook_id('<?php echo $row[0];?>')">update</button>
                                                            </div>
                                                        </li>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <div style="background-color:whitesmoke;padding:25px;">
                                                        No posted books found!
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <button style="margin-top:20px; height:40px; padding:0px 20px; background-color:rgb(0, 94, 201); color:white; border:none" onclick="javascript: book_new()">new</button>
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