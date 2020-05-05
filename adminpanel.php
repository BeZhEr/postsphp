<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
	<title>Админ-панель</title>
	
</head>
<body>

	<?php require "blocks/header.php" ?>
	  
	<?php require_once "blocks/database.php"; ?>
	<?php require_once "blocks/functions.php"; ?>
		
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
	    if (isset($_SESSION['user']))
		{
			$user = $_SESSION['user'];
			echo "<div class='container mt-5 my-3 p-3 bg-white rounded shadow-sm'>";
			echo "<div class='d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-0 border-bottom border-gray'>";
			echo "<h5 class='my-0 mr-md-auto font-weight-normal'>Посты</h5>";
			echo "<nav class='my-2 my-md-0 mr-md-3'>";
			echo "Привет " . $user . " ";
			echo "<a href='logout.php'>Выйти</a>";
			echo "</nav>";
			echo "</div>";
		}

		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM posts WHERE id='$id'");
			if(mysqli_num_rows($result) == 1)
			{
				if(isset($_POST['title']) && isset($_POST['user']) && isset($_POST['text']))
				{
					$update = mysqli_query($connection,"UPDATE posts SET title='$_POST[title]', user='$_POST[user]', text='$_POST[text]' WHERE id='$id'");
					if($update)
					{
						$result = mysqli_query($connection,"SELECT * FROM posts WHERE id='$id'");
						$message = "Успешно обновлено!";
					}
				}
				$article = mysqli_fetch_array($result);
				echo "<div class='col-md-8 col-md-offset-2 container mt-5'>" .
				"<h4>{$message}</h4>" .
				"<form action='' method='post'>" .
					"<div class='form-create'>" .
							"<label for='title'>Название</label>" .
							"<input type='text' name='title' class='form-control' value='{$article['title']}'>" .
						"</div>" .
						"<div class='form-create'>" .
							"<label for='user'>Пользователь</label>" .
							"<input type='text' name='user' class='form-control' value='{$article['user']}'>" .
						"</div>" .
						"<div class='form-create'>" .
							"<label for='text'>Содержание</label>" .
							"<textarea rows='5' name='text' class='form-control'>{$article['text']}</textarea>" .
						"</div><br>" .
						"<tr>" .
							"<td colspan='2'><input type='submit' value='Сохранить'></td>" .
						"</tr>" .
					"</form>" .
				"</div>";
			}
		}
		if (isset($_GET['delete']))
		{
			$update = mysqli_query($connection, "DELETE FROM `posts` WHERE id = '$id'");
			echo "<div class='col-md-8 col-md-offset-2 container mt-5'>" .
				 "<h4>Пост успешно удален</h4>";
		}
	?>
	
	<?php
	if (isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		echo "<form method='POST'>";
		echo "<div class='col-md-8 col-md-offset-2 container mt-5'>";
		$sql = mysqli_query($link, 'SELECT `id`, `title`, `user`, `text` FROM `posts`');
		while ($result = mysqli_fetch_array($sql)) 
		{
		echo "<h6 class='pb-2 mb-0'>Название: {$result['title']}</h6>" .
			 "<h6> Пользователь: {$result['user']}</h6>" .
			 "<h6> Содержание: {$result['text']}</h6>" .
			 "<td><a href='?change=&id={$result['id']}'>Изменить</a> | </td>" .
			 "<td><a href='?delete=&id={$result['id']}'>Удалить</a></td>" .
			 "<small class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray d-block text-right mt-1'>" .
			 "</small><br>";
		}
		echo "</div>";
	}
    ?>
	
	<?php
	
	?>
	
</body>
</html>