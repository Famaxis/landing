<?php 
require_once "header.php";

if (!isset($_SESSION['logged_user'])){
	header('Location: /');
}

?>
<body>
	<main>
		<h1>Admin page</h1>
		<a href="/">Go to main page</a>
		<section>
			<h2>Config</h2>
			<form action="config.php" method="POST">
				<p>Title: <input type="text" name="title" value="<?= $query['title'] ?>" required></p>
				<p>Description: <input type="text" name="descr" value="<?= $query['descr'] ?>" required></p>
				
				<p>Сolor scheme: </p>
				<p><input name="style" type="radio" value="1" <?php if($query['style'] == 1) echo('checked'); ?>>Dark</p>
				<p><input name="style" type="radio" value="2" <?php if($query['style'] != 1) echo('checked'); ?>>Light</p>
				
				<p><button type="submit" name="do_conf">Update</button></p>
			</form>
		</section>

		
	</main>
	
</body>
