<html>
    <style>
        select {
            width:99%;
            border: 1px solid rgb(0, 94, 201);
            margin-top:5px;
            border-radius:6px;
        }
    </style>
    <body>
        <div class="right">
            <form action="search.php" method="POST">
                <input name="search" type="search" value="<?php if(isset($_SESSION['search'])){ echo $_SESSION['search'];}?>" placeholder="search an ebook" style="text-align:center;position:relative; margin: 2px auto; width:99%; height:35px;padding:10px; border:none;" required>
                <select name="category" required>
                    <?php
                        $sql_query="SELECT category_id, category_name FROM category";
                        $result_set=mysqli_query($con,$sql_query);                    
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_row($result_set))
                            {
                                if(isset($_SESSION['category'])){
                                    if ($_SESSION['category'] == $row[0]){
                                        echo "<option value='$row[0]' selected>".$row[1]."</option>";
                                    }
                                    else{
                                        echo "<option value='$row[0]'>".$row[1]."</option>";
                                    }
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
                <select name="sortby" required>
                    <?php
                        if(isset($_SESSION['sortby'])){
                            if($_SESSION['sortby']=="atoz"){
                                ?><option value="atoz" selected>Alphabetical</option><?php
                                ?><option value="date">Date Added</option><?php
                            }
                            else{
                                ?><option value="atoz">Alphabetical</option><?php
                                ?><option value="date" selected>Date Added</option><?php
                            }
                        }
                        else
                        {
                            ?><option value="atoz">Alphabetical</option><?php
                            ?><option value="date">Date Added</option><?php
                        }
                    ?>
                </select>
                <select name="orderby" required>
                    <?php
                        if(isset($_SESSION['sortby'])){
                            if($_SESSION['orderby']=="asc"){
                                ?><option value="asc" selected>Ascending</option><?php
                                ?><option value="desc">Descending</option><?php
                            }
                            else{
                                ?><option value="asc">Ascending</option><?php
                                ?><option value="desc" selected>Descending</option><?php
                            }
                        }
                        else
                        {
                            ?><option value="asc">Ascending</option><?php
                            ?><option value="desc">Descending</option><?php
                        }
                    ?>
                </select><br><br>
                <button name="submit" type="submit" style="position:relative; width:60px; height:35px; background-color:white; margin:auto; border:none;">search</button>
            </form>
        </div>
        <div class="right" style="float:right;">
            <h2>Recent Activity</h2>
            <?php
                $sql_query="SELECT * FROM activities WHERE user_id=".$_SESSION['user_id']." GROUP BY activity_date DESC";
                $result_set=mysqli_query($con,$sql_query);
                if(mysqli_num_rows($result_set)>0)
                {
                    while($row=mysqli_fetch_row($result_set))
                    {
                        ?>
                            <div style="position:relative; width:90%; margin:auto; margin-bottom:10px;">
                                <p style="text-align:center; font-size:18px"><?php echo $row[1];?></p>
                                <p style="text-align:center; font-size:10px; position:relative; width:100%; bottom:15px;"><?php echo $row[2];?></p>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        No updates yet!
                    <?php
                }
            ?>
        </div>
    </body>
</html>