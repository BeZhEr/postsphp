<?php

$link = mysqli_connect('localhost', 'root', 'root', 'blog');

$connection = mysqli_connect('localhost', 'root', 'root', 'blog');
$select_db = mysqli_select_db($connection, 'blog');

if (mysqli_connect_errno())
{
	echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '.mysqli_connect_error();
	exit();
}