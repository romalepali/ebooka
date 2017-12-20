<!DOCTYPE html>
<?php
    include ('include/verify-logged.php');

    if(!isset($_GET['vdbook_id'])||$_GET['vdbook_id']==NULL){
        ?>
            <script type="text/javascript">
                window.location.href='index.php';
            </script>
        <?php
    }

    if(isset($_GET['vdbook_id'])){
        $sql_query="SELECT * FROM books WHERE book_id=".$_GET['vdbook_id'];
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
        .dtails {
            text-align:left;
        }
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
                            <div style="float:left;margin:10px;">
                                <img class="bookimage" src="covers/<?php echo $fetched_row[6];?>" style="box-shadow:0px 0px 5px;height:360px;width:260px;"><br>
                                <button class="apbut" onclick="javascript: vbook_id('<?php echo $fetched_row[0];?>')">view</button>
                            </div>
                            <div style="float:left;margin:10px;">
                                <div class="dtails">
                                    <b>Title:</b> <?php echo $fetched_row[1];?>
                                </div>
                                <div class="dtails">
                                    <b>Author:</b> <?php echo $fetched_row[3];?>
                                </div>
                                <div class="dtails">
                                    <b>Description:</b> <?php echo $fetched_row[2];?>
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