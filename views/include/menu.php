<?php 
    $sql_query="SELECT * FROM users WHERE user_id=".$_SESSION['user_id'];
    $result_set=mysqli_query($con,$sql_query);
    if(mysqli_num_rows($result_set)>0){
        $menu=mysqli_fetch_array($result_set);
    }
?>
<html>
    <body>
        <div class="menu">
            <button class="menuitem" style="cursor:pointer;float:left;" onclick="openNav4()">
                <img src="../images/home.png" style="width:25px;height:25px;">
            </button>
            <button class="menuitem" style="cursor:pointer;float:right;" onclick="openNav()">
                <img src="../uploads/<?php echo $menu[7];?>" style="border-radius:100%;width:25px;height:25px;">
            </button>
        </div>
    </body>
</html>