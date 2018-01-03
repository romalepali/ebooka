<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');
    unset($_SESSION['search']);
    unset($_SESSION['category']);
    unset($_SESSION['sortby']);
    unset($_SESSION['orderby']);

    if(!isset($_GET['vdbook_id'])||$_GET['vdbook_id']==NULL){
        ?>
            <script type="text/javascript">
                window.location.href='index.php';
            </script>
        <?php
    }

    if(isset($_GET['vdbook_id'])){
        $sql_query="SELECT a.*,b.* FROM books a INNER JOIN category b ON a.book_category_id=b.category_id WHERE book_id=".$_GET['vdbook_id'];
        $result_set=mysqli_query($con,$sql_query);
        if(mysqli_num_rows($result_set)>0){
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
        <link rel="shortcut icon" href="../images/logo.png"/>
        <script src="../js/loader.js"></script>
        <script src="../js/account.js"></script>
        <script src="../js/books.js"></script>
        <title><?php echo $fetched_row[1];?></title>
    </head>

    <style>
        .apbut {
            color:white;
            background-color:rgb(0, 94, 201);
            border:none;
            width:60px;
            margin-top:8px;
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
                            <div style="position:relative;margin:10px;">
                                <img class="bookimage" src="covers/<?php echo $fetched_row[6];?>" style="box-shadow:0px 0px 5px;height:480px;width:360px;"><br>
                                <button class="apbut" onclick="javascript: vbook_id('<?php echo $fetched_row[0];?>')">view</button>
                            </div>
                            <div style="position:relative;width:360px;margin:auto;margin-bottom:10px;text-align:left;">
                                <b>Title:</b> <?php echo $fetched_row[1];?><br>
                                <b>Author:</b> <?php echo $fetched_row[3];?><br>
                                <b>Category:</b> <?php echo $fetched_row[11];?><br>
                                <b>Description:</b> <?php echo $fetched_row[2];?>
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