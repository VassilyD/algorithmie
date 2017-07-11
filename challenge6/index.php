<!DOCTYPE html>
<html>

<head>
	<title>Challenge 6</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="<?php if ($_GET['p'] == 'loop') echo 'active';?> dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Loop <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="?p=loop&sp=exo1">1 : n nombre</a></li>
						<li><a href="?p=loop&sp=exo2">2 : grand gap</a></li>
						<li><a href="?p=loop&sp=exo3">3 : fourchette</a></li>
					</ul>
				</li>
				<li class="<?php if ($_GET['p'] == 'caesar') echo 'active';?>">
					<a class="" href="?p=caesar">Caesar</a>
				</li>
				<li class="<?php if ($_GET['p'] == 'folders') echo 'active';?>">
					<a class="" href="?p=folders">Folders</a>
				</li>
				<li class="<?php if ($_GET['p'] == 'isogram') echo 'active';?>">
					<a class="" href="?p=isogram">Isogram</a>
				</li>
				<li class="<?php if ($_GET['p'] == 'pangram') echo 'active';?>">
					<a class="" href="?p=pangram">Pangram</a>
				</li>
			</ul>
		</div>
	</nav>
<?php
$_GET['p'] = 'loop';
if (isset($_GET['p'])) {
	$page = 'assets/pages/'.$_GET['p'].'.php';
	require $page;
}
?>

</body>

</html>