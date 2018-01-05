<?php
    if(!isset($_POST['submit'])||!isset($_POST['search']))
	{
		?>
            <script type="text/javascript">
                window.location.href='index.php';
            </script>
        <?php
	}
    
    $_SESSION['search'] = $_POST['search'];
    $_SESSION['category'] = $category = $_POST['category'];
    $_SESSION['sortby'] = $sortby = $_POST['sortby'];
    $_SESSION['orderby'] = $orderby = $_POST['orderby'];

    $search = mysqli_real_escape_string($con,$_POST['search']);
    $keywords = explode(" ",$search);

    $query="SELECT * FROM books WHERE (";
    $keyCount = 0;
    foreach($keywords as $keys){
        if($keyCount > 0){
            $query .= " AND";
        }
        $query .= " book_title LIKE '%$keys%' OR book_author LIKE '%$keys%'";
        ++$keyCount;
    }

    if($category=="1"){
        $query .= ") AND upload_type='Public'";
    }
    else{
        $query .= ") AND upload_type='Public' AND book_category_id='$category'";
    }

    if($sortby=="atoz"){
        $query .= " GROUP BY book_title";
    }
    else if($sortby=="date"){
        $query .= " GROUP BY book_date";
    }

    if($orderby=="asc"){
        $query .= " ASC";
    }
    else if($orderby=="desc"){
        $query .= " DESC";
    }


    $query2="SELECT * FROM posts WHERE (";
    $keyCount2 = 0;
    foreach($keywords as $keys2){
        if($keyCount2 > 0){
            $query2 .= " AND";
        }
        $query2 .= " post_title LIKE '%$keys2%' OR post_author LIKE '%$keys2%'";
        ++$keyCount2;
    }

    if($category=="1"){
        $query2 .= ") AND post_type='Public'";
    }
    else{
        $query2 .= ") AND post_type='Public' AND post_category_id='$category'";
    }

    if($sortby=="atoz"){
        $query2 .= " GROUP BY post_title";
    }
    else if($sortby=="date"){
        $query2 .= " GROUP BY post_date";
    }

    if($orderby=="asc"){
        $query2 .= " ASC";
    }
    else if($orderby=="desc"){
        $query2 .= " DESC";
    }
?>
<html>
    <style>
        p {
            text-align:justify;
            font-size:20px;
        }

        h1 {
            text-align:center;
            font-size:40px;
            color:rgb(0, 94, 201);
            margin:auto;
            margin-top:20px;
        }

        .bookcover {
            float:left;
            margin:11px;
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

    <body>
        <div class="main">
            <?php 
                $result_set=mysqli_query($con,$query);
                $result_set2=mysqli_query($con,$query2);
                if(mysqli_num_rows($result_set)>0||mysqli_num_rows($result_set2)>0)
                {
                    ?><h1 style="text-align:center;">Search result for "<?php echo $search;?>"</h1><?php
                    while($row=mysqli_fetch_row($result_set))
                    {
                        ?>
                            <div class="bookcover">
                                <a href="javascript: void(0)" onclick="javascript: vdbook_id('<?php echo $row[0];?>')">
                                    <img class="bookimage" src="covers/<?php echo $row[6];?>" style="height:180px;width:130px;">
                                </a>
                                <div class="details">
                                    <b><?php echo $row[1];?></b>
                                </div>
                                <div class="details">
                                    <?php echo "by ".$row[3];?>
                                </div>
                                <div class="details">
                                    (Book)
                                </div>
                                <button class="apbut" onclick="javascript: vbook_id('<?php echo $row[0];?>')">view</button>
                            </div>
                        <?php
                    }
                     
                    while($row2=mysqli_fetch_row($result_set2))
                    {
                        ?>
                            <div class="bookcover">
                                <a href="javascript: void(0)" onclick="javascript: vdstory_id('<?php echo $row2[0];?>')">
                                    <img class="bookimage" src="covers/<?php echo $row2[7];?>" style="height:180px;width:130px;">
                            </a>
                                <div class="details">
                                    <b><?php echo $row2[1];?></b>
                                </div>
                                <div class="details">
                                    <?php echo "by ".$row2[6];?>
                                </div>
                                <div class="details">
                                    (Story)
                                </div>
                                <button class="apbut" onclick="javascript: vstory_id('<?php echo $row2[0];?>')">view</button>
                            </div>
                        <?php
                    }
                }
                else{
                    ?><h1 style="text-align:center;margin-bottom:30px;">No result found for "<?php echo $search;?>"</h1><?php
                }
            ?>
        </div>
    </body>
</html>