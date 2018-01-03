<html>
    <style>
        select {
            width:20%;
            height:30px;
            border: 1px solid rgb(0, 94, 201);
            margin-top:5px;
            border-radius:10px;
        }
    </style>
    <body>
        <div class="right" style="width:100%;">
            <form action="search.php" method="POST">
                <input name="search" type="search" placeholder="search an ebook" style="text-align:center;position:relative; margin: 5px auto; width:99%; height:35px;padding:10px; border:none;" required>
                <select name="category" required>
                    <?php
                        $sql_query="SELECT category_id, category_name FROM category";
                        $result_set=mysqli_query($con,$sql_query);                    
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_row($result_set))
                            {
                                echo "<option value='$row[0]' >".$row[1]."</option>";
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
                    <option value="atoz">Alphabetical</option>
                    <option value="date">Date Added</option>
                </select>
                <select name="orderby" required>
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select><br><br>
                <button name="submit" type="submit" style="position:relative; width:60px; height:35px; background-color:white; margin:auto; border:none;">search</button>
            </form>
        </div>
    </body>
</html>