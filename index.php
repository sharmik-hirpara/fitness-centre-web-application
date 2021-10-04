<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Index" />
	<meta name="keywords" content="Index, Fitness Club, Gymnastic, Swimming, Yoga" />
	<meta name="author" content="Sharmik" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home | Stay Fit 24-hour Fitness Club</title>
	<link href="styles/style.css" rel="stylesheet" />
</head>

<body>
	<div class="content">
		<?php
			include "includes/header.inc";
			include 'includes/menu.inc';
		?>

		<p>WELCOME to our BRAND NEW CLUB!</p>
		<p class="justify">We are Over the moon to be a part of such a beautiful and Family Friendly community.</p>
		<p class="justify">Our focus is to get our community active &amp; healthy in a fun and non-intimidating environment so that individuals can become the BEST Version of themselves.</p>	
		<div class="categories">
		<div class="fitness" id="Gymnastics">
				<img src="images/Fitness.png" alt="Gymnastics" title="Gymnastics file size-312KB">
				<a href="product.php#gymnastics">Gymnastic</a>
			</div>
			<div class="fitness" id="Swimming">
				<img src="images/Swimming.png" alt="Swimming" title="Swimming file size-79.9KB">
				<a href="product.php#swimming">Swimming</a>
			</div>
			<div class="fitness" id="Yoga">
				<img src="images/Yoga.png" alt="Yoga" title="Yoga file size-119KB">
				<a href="product.php#yoga">Yoga</a>
			</div><br><br>
		</div>

		<?php 
			include 'includes/footer.inc';
		?>
	</div>
</body>
