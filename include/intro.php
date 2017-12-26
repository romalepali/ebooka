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
            <img src="images/logo.png" width="150px">
            <form action="search.php" method="POST">
                <input type="search" name="search" placeholder="search an ebook" style="width:100%;height:50px;padding:5px;text-align:center;font-size:22px;"><br><br>
                <button type="submit" name="submit" style="padding:10px;background-color:rgb(0, 94, 201);color:white;font-size:18px;border:none;">search</button><br><br>
            </form>

            <?php
                $sql_query="SELECT a.*,b.category_name FROM books a INNER JOIN category b ON a.book_category_id=b.category_id WHERE upload_type='Public' GROUP BY book_date DESC";
                $result_set=mysqli_query($con,$sql_query);
                
                $sql_query2="SELECT a.*,b.category_name FROM posts a INNER JOIN category b ON a.post_category_id=b.category_id  WHERE post_type='Public' GROUP BY post_date DESC";
                $result_set2=mysqli_query($con,$sql_query2);

                if(mysqli_num_rows($result_set)>0||mysqli_num_rows($result_set2)>0){
                    echo "<h1>eBooks & eStories</h1>";
                }

                if(mysqli_num_rows($result_set)>0)
                {
                    $count_book=0;
                    while($row=mysqli_fetch_row($result_set))
                    {
                        if($count_book<=6){
                            ?>
                                <div class="bookcover">
                                    <a href="javascript: void(0)" onclick="javascript: vdbook_id('<?php echo $row[0];?>')">
                                        <img class="bookimage" src="views/covers/<?php echo $row[6];?>" style="height:180px;width:130px;">
                                    </a>
                                    <div class="details">
                                        <?php echo $row[1];?>
                                    </div>
                                    <button class="apbut" onclick="javascript: vbook_id('<?php echo $row[0];?>')">view</button>
                                </div>
                            <?php
                        }
                        $count_book++;
                    }
                }

                if(mysqli_num_rows($result_set2)>0)
                {
                    $count_post=0;
                    while($row=mysqli_fetch_row($result_set2))
                    {
                        if($count_post<=6){
                            ?>
                                <div class="bookcover">
                                    <a href="javascript: void(0)" onclick="javascript: vdstory_id('<?php echo $row[0];?>')">
                                        <img class="bookimage" src="views/covers/<?php echo $row[7];?>" style="height:180px;width:130px;">
                                    </a>
                                    <div class="details">
                                        <?php echo $row[1];?>
                                    </div>
                                    <button class="apbut" onclick="javascript: vstory_id('<?php echo $row[0];?>')">view</button>
                                </div>
                            <?php
                        }
                        $count_post++;
                    }
                }
            ?>
        </div>
        
    </body>
</html>