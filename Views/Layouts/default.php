<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blog de Jean Forteroche</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Blog de Jean Forteroche" />
	<meta name="keywords" content="Blog, Jean, Forteroche, Jean Forteroche, free template, bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo WEBROOT ?>assets/favicon/favicon.png">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="<?php echo WEBROOT ?>assets/css/animate.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="<?php echo WEBROOT ?>assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo WEBROOT ?>assets/css/bootstrap.css">

	<link rel="stylesheet" href="<?php echo WEBROOT ?>assets/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo WEBROOT ?>assets/js/modernizr.js" async></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
		
	</head>
	<body>

	<div class="container">

		<div id="fh5co-offcanvas">
			<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span style="font-size: 14px; line-height: 2.3;">Fermer</span></span></a>
			<div class="fh5co-bio">
				<h3 class="heading">A propos</h3>
				<h2>Jean Forteroche</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam suscipit ipsum vel elit congue rhoncus.</p>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
				</ul>
			</div>

			<div class="fh5co-menu">
				<div class="fh5co-box">
					<h3 class="heading">Categories</h3>
					<ul>
						<li><a href="<?php echo WEBROOT . 'news/category/roman' ?>">Roman</a></li>
						<li><a href="<?php echo WEBROOT . 'news/category/litterature' ?>">Littérature</a></li>
						<li><a href="<?php echo WEBROOT . 'news/category/culture' ?>">Culture</a></li>
						<li><a href="<?php echo WEBROOT . 'news/category/divers' ?>">Divers</a></li>
					</ul>
				</div>
				<?php 
				/*
				<div class="fh5co-box">
					<h3 class="heading">Recherche</h3>
					<form action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Mot-clé...">
						</div>
					</form>
				</div>
				*/
				?>
			</div>
			
		</div>
		<!-- END #fh5co-offcanvas -->

		<header id="fh5co-header">

			<div class="container">
				<div class="row">

					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
					<ul class="fh5co-social">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
					</ul>
					<div class="col-lg-12 col-md-12 text-center">
						<h1 id="fh5co-logo"><a href="<?php echo WEBROOT ?>">Forteroche</a></h1>
					</div>

				</div>
			</div>
		
		</header>
		<!-- END #fh5co-header -->
	</div>

	<div class="container">

		<?php echo $content_for_layout; ?>

	</div>

	<footer id="fh5co-footer">
		<p><small>
			<sm>&copy; 2020 - GM - OPC <a href="https://github.com/GuillaumeM-OPC/phpBlog" target="_blank">GitHub</a><br>
			&copy; 2016. Magazine Free HTML5. All Rights Reserverd. <br> Designed by <a href="http://freehtml5.co" target="_blank">FREEHTML5.co</a>  Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a>
		</small></p>
	</footer>

	<!-- jQuery -->
	<script src="<?php echo WEBROOT ?>assets/js/jquery.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo WEBROOT ?>assets/js/jquery.waypoints.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo WEBROOT ?>assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo WEBROOT ?>assets/js/bootstrap.min.js"></script>

	<!-- Main JS -->
	<script src="<?php echo WEBROOT ?>assets/js/main.js"></script>

	</body>
</html>