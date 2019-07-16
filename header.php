<?php 
require_once "db.php";
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="<?= $query['descr'] ?>">
	<link rel="stylesheet" href="<?php if($query['style'] == 1){echo "dark_style.css";}else{echo "light_style.css";}?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<title><?= $query['title'] ?></title>
</head>