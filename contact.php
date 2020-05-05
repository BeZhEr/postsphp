<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
	<title>Контактная форма</title>
	
</head>
<body>

	<?php require "blocks/header.php" ?>
	  
	<div class="container mt-5">
	<h3>Контактная форма</h3>
	    <form action="blocks/check.php" method="post">
		    <input type="email" name="email" class="form-control" placeholder="Введите Email"><br>
		    <textarea name="message" class="form-control" placeholder="Введите ваше сообщение"></textarea><br>
		    <button type="submit" name="send" class="btn btn-success">Отправить</button>
		    </input>
	    </form>
	</div>
</body>
</html>