<?php
    session_start();
    unset($_SESSION['user_id']);
    session_destroy();
    ?>
        <script type="text/javascript">
            window.location.href='index.php';
        </script>
    <?php
    exit; 
?> 