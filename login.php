<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	
	<title>Блог</title>
</head>
<body>

    <?php require "blocks/header.php" ?>
	
    <div class="col-md-8 col-md-offset-2 container mt-5">
	    
	    <form class="form-signin" method="POST">
    	<h1>Админ-панель</h1>
		
    		<div class="form-signin">
    		    <label for="user">Пользователь</label>
    		    <input type="user" class="form-control" name="user">
    		</div>
    		    
    		    <div class="form-signin">
    		        <label for="password">Пароль</label>
    		        <input type="password" class="form-control" name="password">
    		    </div><br>

    		    <div class="form-signin">
    		        <button type="submit" class="btn btn-primary" formaction="adminpanel.php">
    		            Войти
    		        </button>
    		        <button class="btn btn-default" formaction="index.php">
    		            Отмена
    		        </button>
    		    </div>
    	</form>
		
	</div>
	
	<?php
	require('blocks/connect.php');
	
	if (isset($_POST['user']) and isset($_POST['password']))
	{
		$user = $_POST['user'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM login WHERE user='$user' and password='$password'";
		$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
		$count = mysqli_num_rows($result);
		
		if ($count == 1)
		{
			$_SESSION['user'] = $user;
		}
		else
		{
			$fmsg = "Ошибка";
		}
	}
    ?>
  
</body>
</html>