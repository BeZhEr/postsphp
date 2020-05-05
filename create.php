<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
	<title>Создать пост</title>
</head>
<body>

  <?php require "blocks/header.php" ?>
  
  <?php
		require('blocks/database.php');
		
		if (isset($_POST['user']) && isset($_POST['text']))
		{
			$title = $_POST['title'];
			$user = $_POST['user'];
			$text = $_POST['text'];
			
			$query = "INSERT INTO posts (title, user, text) VALUES ('$title', '$user', '$text')";
			$result = mysqli_query($connection, $query);
			
			if ($result)
			{
				$smsg = "Пост создан";
			}
			else
			{
				$fsmsg = "Не удалось создать пост";
			}
		}
  ?>

    <div class="col-md-8 col-md-offset-2 container mt-5">
	    
	    <form class="form-create" method="POST">
    	<h1>Создать пост</h1>
			<div class="form-create">
    		    <label for="title">Название</label>
    		    <input type="text" class="form-control" name="title">
    		</div>
    		    
			<div class="form-create">
				<label for="user">Пользователь</label>
				<input type="text" class="form-control" name="user">
			</div>
			
			<div class="form-create">
				<label for="text">Текст</label>
				<textarea rows="5" class="form-control" name="text"></textarea>
			</div><br>

			<div class="form-create">
				<button type="submit" class="btn btn-primary">
					Создать
				</button>
				<button class="btn btn-default" formaction="index.php">
					Отмена
				</button>
			</div><br>
			<div class="form-create"><?php if(isset($smsg)) { ?><div class="alert alert-success" role="alert" <?php echo $smsg; ?><h5>Успешно создан</h5></div><?php }?>
									 <?php if(isset($fsmsg)) { ?><div class="alert alert-danger" role="alert" <?php echo $fsmsg; ?><h5>Ошибка</h5></div><?php }?>
			</div>
    	</form>
		
	</div>