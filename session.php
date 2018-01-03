<?php
	include ('connect.php');
	
	if(empty($_SESSION)){
		session_start();
	}

	if(!isset($_POST['login']))
	{
		?>
			<script type="text/javascript">
				window.location.href='index.php';
			</script>
		<?php
	}

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$query="SELECT * FROM users WHERE BINARY user_uname='$username' AND BINARY user_pword='$password'";
	$result=mysqli_query($con, $query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_row($result)){
			$_SESSION['user_id']=$row[0];
			$_SESSION['user_uname']=$row[1];
			$_SESSION['user_type']=$row[9];
		}
        echo "<script>window.location='views/';</script>";
	}
	else
	{
		$message="Incorrect Username/Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>window.location='index.php';</script>";
	}
?>