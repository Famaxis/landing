<?php 
require_once "header.php";

$data = $_POST;
if (isset($data['do_login'])) {
	$errors = array();
	$sql = $db->prepare('SELECT * FROM user1 WHERE `login` = ?');
	$sql->execute([$data['login']]);
	$query = $sql->fetch(PDO::FETCH_ASSOC);
	if ($query) {
		if (password_verify($data['password'], $query['password'])) {
			$_SESSION['logged_user'] = $query;
			echo '<div style="color: green;"> You have authorized successfully </div>';
			echo '<br><a href="index.php">Main page</a><hr>';
		} else {
			$errors[] = 'Wrong password';
		}
	} else {
		$errors[] = 'Wrong user';
	}

	if (!empty($errors)) {
		echo '<div style="color: red;">'. array_shift($errors) . '</div><hr>';
	}

} 

?>

<form action="login.php" method="POST">
	<p>
		<strong>Your login</strong>
		<input type="text" name="login" value="<?= $data['login'] ?>">
	</p>
	<p>
		<strong>Your password</strong>
		<input type="password" name="password" value="<?= $data['password'] ?>">
	</p>
	<p>
		<button type="submit" name="do_login">Login</button>
	</p>
</form>