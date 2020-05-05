<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">
	
	<title>Блог</title>
</head>
<body>
  
    <?php require_once "blocks/database.php"; ?>
    <?php require_once "blocks/functions.php"; ?>
	
	<?php 
	$post_id = $_GET['post_id'];
    if (!is_numeric($post_id)) exit();

	require "blocks/header.php";
	
	$post = get_post_by_id($post_id);
	?>
	
    <div class="container mt-5 my-3 p-3 bg-white rounded shadow-sm">
	  
	    <h6 class="border-bottom border-gray pb-2 mb-0"><?=$post['title']?></h6>
	    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="fa fa-user d-block text-dark mt-1"> Пользователь: <?=$post['user']?></strong>
		    <strong class="fa fa-clock-o d-block text-dark mt-1"> Дата написание: <?=date('Y-m-d H:i:s', strtotime($post['date']))?></strong>
		    <strong class="mt-3 d-block text-dark"><?=$post['text']?></strong>
        </p>
	    </div>
		
    </div>
  
</body>
</html>