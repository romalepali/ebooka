<html>
    <body>
        <div class="right">
            <h2 style="margin-bottom:0px;">Recent Activity</h2>
            <h4 style="margin-top:0px;">(Book & Stories)</h4>
            <?php
                $sql_query="SELECT * FROM activities WHERE user_id=".$_SESSION['user_id']." GROUP BY activity_date DESC";
                $result_set=mysqli_query($con,$sql_query);
                $count=0;
                if(mysqli_num_rows($result_set)>0)
                {
                    while($row=mysqli_fetch_row($result_set))
                    {
                        if($count<=5){
                            ?>
                                <div style="position:relative; width:90%; margin:auto; margin-bottom:10px;">
                                    <p style="text-align:center; font-size:18px"><?php echo $row[1];?></p>
                                    <p style="text-align:center; font-size:10px; position:relative; width:100%; bottom:15px;"><?php echo $row[2];?></p>
                                </div>
                            <?php
                        }
                        $count++;
                    }
                }
                else{
                    ?>
                        No updates yet!
                    <?php
                }
            ?>

            <?php
                if($_SESSION['user_type']=='Administrator'){
                    $sql_query="SELECT * FROM category_activity GROUP BY activity_date DESC";
                    $result_set=mysqli_query($con,$sql_query);
                    $count2=0;
                    ?>
                        <hr>

                        <h2 style="margin-bottom:0px;">Recent Activity</h2>
                        <h4 style="margin-top:0px;">(Categories)</h4>
                    <?php
                    if(mysqli_num_rows($result_set)>0)
                    {
                        while($row=mysqli_fetch_row($result_set))
                        {
                            if($count2<=5){
                                ?>
                                    <div style="position:relative; width:90%; margin:auto; margin-bottom:10px;">
                                        <p style="text-align:center; font-size:18px"><?php echo $row[1];?></p>
                                        <p style="text-align:center; font-size:10px; position:relative; width:100%; bottom:15px;"><?php echo $row[2];?></p>
                                    </div>
                                <?php
                            }
                            $count2++;
                        }
                    }
                    else{
                        ?>
                            No updates yet!
                        <?php
                    }
                }
            ?>
        </div>
    </body>
</html>