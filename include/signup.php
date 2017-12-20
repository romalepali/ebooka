<?php
    if(isset($_POST['signup']))
    {
        $user_uname = $_POST['user_uname'];
        $pword = md5($_POST['pword']);
        $cpword = md5($_POST['cpword']);
        $fname = $_POST['user_fname'];
        $mname = $_POST['user_mname'];
        $lname = $_POST['user_lname'];
        $gender = $_POST['user_gender'];

        if(strcmp($pword,$cpword) != 0){
            ?>
                <script type="text/javascript">
                    alert('Passwords does not match!');
                </script>
            <?php
        }
        else{
            $sql_query2="SELECT * FROM users WHERE BINARY (user_fname='$fname' && user_mname='$mname' && user_lname='$lname') || (user_uname='$user_uname')";
            $result_set2=mysqli_query($con,$sql_query2);
            $fetched_row2=mysqli_num_rows($result_set2);
        
            if($fetched_row2>0){
                ?>
                    <script type="text/javascript">
                        alert('Account already exists!');
                    </script>
                <?php
            }
            else{
                $sql_query = "INSERT INTO users (user_uname,user_pword,user_fname,user_mname,user_lname,user_gender,user_profile,user_date_created) VALUES ('$user_uname','$pword','$fname','$mname','$lname','$gender','profile.jpg',NOW())";

                if(mysqli_query($con,$sql_query))
                {
                    ?>
                        <script type="text/javascript">
                            alert('Successfully created your account, please verify it to the administrator!');
                            window.location.href='index.php';
                        </script>
                    <?php
                }
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert('Error occured while creating your account!');
                        </script>
                    <?php
                }
            }
        }
    }
?>
<html>
    <style>
        input[type=text],input[type=password] {
            border-radius:10px;
        }
    </style>

    <body>
        <div id="mySidenav2" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
            <div style="width:40%; position:relative; margin:auto;">
                <h1 style="color:white; text-align:center;">SIGN UP</h1>
                <form style="color:white; text-align:center;" method="POST">
                    <input type="text" name="user_uname" placeholder="enter username" required><br>
                    <input type="password" name="pword" placeholder="enter password" required><br>
                    <input type="password" name="cpword" placeholder="enter confirm password" required><br>
                    <input type="text" name="user_fname" placeholder="enter first name" required><br>
                    <input type="text" name="user_mname" placeholder="enter middle name" required><br>
                    <input type="text" name="user_lname" placeholder="enter last name" required><br>
                    <select name="user_gender" style="width:100%; margin: 10px 0px; height:35px; border-radius:10px;" required>
                        <option value="">Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                    <button style="border:none; padding: 10px; color:black; background-color:white; margin: 10px 0px;border-radius:10px;" name="signup">Sign Up</button>
                </form>
            </div>
        </div>
    </body>
</html>