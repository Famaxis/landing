<?php 
require_once "header.php";

$data = $_POST;
if (isset($data['do_signup'])) {

	$errors = array();
	
	if(trim($data['login']) == ''){
		$errors[] = 'Enter your login';
	}
	if(trim($data['email']) == ''){
		$errors[] = 'Enter your email';
	}
	if($data['password'] == ''){
		$errors[] = 'Enter your password';
	}
	if($data['password_2'] != $data['password']){
		$errors[] = 'Incorrect password';
	}


	if(empty($errors)){

		$sql = "CREATE TABLE IF NOT EXISTS `user1` ( 
			`ID` INT NOT NULL AUTO_INCREMENT, 
			`login` VARCHAR(40) NOT NULL, 
			`email` VARCHAR(40) NOT NULL, 
			`password` VARCHAR(250) NOT NULL, 
			PRIMARY KEY (`ID`)
		) ";
    	$db->exec($sql);

    	$password = password_hash($data['password'], PASSWORD_DEFAULT);

    	$sql = 'INSERT INTO user1(login, email, password) VALUES(:login, :email, :password)';
    	$query = $db->prepare($sql);
    	$query->execute(['login' => $data['login'], 'email' => $data['email'], 'password' => $password]);
    	echo '<div style="color: green;"> You have registered successfully </div><hr>';
    }
}

?>

<form action="signup.php" method="POST">
	<p>
		<strong>Your login</strong>
		<input type="text" name="login" value="<?= $data['login'] ?>">
	</p>
	<p>
		<strong>Your email</strong>
		<input type="email" name="email" value="<?= $data['email'] ?>">
	</p>
	<p>
		<strong>Your password</strong>
		<input type="password" name="password" value="<?= $data['password'] ?>">
	</p>
	<p>
		<strong>Your password again</strong>
		<input type="password" name="password_2" value="<?= $data['password_2'] ?>">
	</p>
	<p>
		<button type="submit" name="do_signup">Sign up</button>
	</p>
</form>