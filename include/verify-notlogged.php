<?php
    include ('connect.php');

    if(empty($_SESSION))    
    session_start();

    if(isset($_SESSION['user_id'])){
        ?>
            <script type="text/javascript">
                window.location.href='views/index.php';
            </script>
        <?php
    }
?>