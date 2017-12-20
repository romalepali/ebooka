<!DOCTYPE html>
<?php
    include ('include/verify-notlogged.php');

    if(!isset($_GET['vstory_id'])||$_GET['vstory_id']==NULL){
        ?>
            <script type="text/javascript">
                window.location.href='index.php';
            </script>
        <?php
    }

    if(isset($_GET['vstory_id'])){
        $sql_query="SELECT * FROM posts WHERE post_id=".$_GET['vstory_id'];
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
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/loader.css">
        <link rel="shortcut icon" href="images/logo.png"/>
        <script src="js/loader.js"></script>
        <script src="js/account.js"></script>
        <title><?php echo $fetched_row[1];?></title>
    </head>

    <style>
        h1 {
            margin-bottom:0px;
        }
        h4 {
            margin-top:0px;
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
                            <h1 style="text-align:center;"><?php echo $fetched_row[1];?></h1>
                            <h4 style="text-align:center;"><?php echo $fetched_row[6];?></h4>
                            <div style="overflow-y:auto; box-shadow:0px 0px 5px; height:450px; padding:10px; margin-bottom:33px; text-align:justify;">
                                <?php echo $fetched_row[2];?>
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