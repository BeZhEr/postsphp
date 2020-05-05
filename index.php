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

  <?php require "blocks/header.php" ?>
  
  <?php require_once "blocks/database.php"; ?>
  <?php require_once "blocks/functions.php"; ?>
	
  <div class="container mt-5 my-3 p-3 bg-white rounded shadow-sm">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-0 border-bottom border-gray">
    <h5 class="my-0 mr-md-auto font-weight-normal">Посты</h5>
    <nav class="my-2 my-md-0 mr-md-3">
	    
        <a class="p-2 text-g" href="login.php">Админ-панель</a>

    </nav>
    </div><br>
    
	<?php $posts = get_posts(); ?>
	<?php foreach($posts as $post): ?>
	<h6 class="pb-2 mb-0"><a href="/post.php?post_id=<?=$post['id']?>"><?=$post['title']?></a></h6>
	<div class="media text-muted pt-3">
    <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="fa fa-user d-block text-dark mt-1"> Пользователь: <?=$post['user']?></strong>
		<strong class="fa fa-clock-o d-block text-dark mt-1"> Дата написание: <?=date('Y-m-d H:i:s', strtotime($post['date']))?></strong>
		<strong class="mt-3 d-block text-dark"><?=mb_substr($post['text'], 0, 256, 'UTF-8').'...'?></strong>
    </p>
	</div>
	<small class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray d-block text-right mt-1">
    <a href="/post.php?post_id=<?=$post['id']?>">Читать полностью</a>
    </small><br>
	  
	<?php endforeach; ?>
	  
  </div>

</body>
</html>