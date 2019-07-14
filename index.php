<?php 
require_once "header.php";
?>
<body>
	<aside>
		<?php if (isset($_SESSION['logged_user'])) : ?>
			<p>Hi, <?= $_SESSION['logged_user']['login']; ?></p>
			<a href="admin.php">Admin page</a><br>
			<a href="logout.php">Logout</a>
			<?php else : ?>
				<a href="login.php">Login</a><br>
				<a href="signup.php">Sign up</a>
			<?php endif; ?>	
		</aside>
		
		<header>
			<h1><?= $query['title'] ?></h1>
			<h2><?= $query['descr'] ?></h2>
		</header>
		<main>
			<section>
				<h3>Fish text</h3>
				<p>
					Bandfish ocean sunfish rock beauty southern grayling armoured catfish: zebrafish gianttail carpsucker triplespine lemon shark whitebait, largemouth bass elephantnose fish. Prowfish deepwater stingray firefish: clownfish morid cod? Bonefish, Bombay duck arowana longjaw mudsucker yellowtail barracuda scat. Emperor blackchin round stingray spiderfish yellowtail snapper Bombay duck, firefish Atlantic herring ridgehead yellowfin tuna straptail rudderfish. Yellowbanded perch cod icefish striped burrfish temperate perch porbeagle shark, snipefish frilled shark. Titan triggerfish lagena, northern pike Colorado squawfish píntano barracuda. Flyingfish sarcastic fringehead blackfish silverside Sacramento splittail. Spinefoot baikal oilfish smooth dogfish mosquitofish Steve fish?
				</p>
			</section>
		</main>

	</body>
	</html>