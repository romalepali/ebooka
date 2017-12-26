<html>
    <body>
        <div class="right">
            <form action="search.php" method="POST">
                <input name="search" type="search" placeholder="search an ebook" style="text-align:center;position:relative; margin: 5px auto; width:99%; height:35px;padding:10px; border:none;" required>
                <button name="submit" type="submit" style="position:relative; width:60px; height:35px; background-color:white; margin:auto; border:none;">search</button>
            </form>
        </div>
        <div class="right">
            <h2>Recent Activity</h2>
            <?php
                $sql_query="SELECT * FROM activities GROUP BY activity_date DESC";
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