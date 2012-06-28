<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jacques Berger - informaticien</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript">
	function toggleArticles(tagId) {
		$("#" + tagId).slideToggle();
	}
</script>
</head>
<body>
	<div id="page">
		<header>
			<h1>Développement de logiciels et enseignement de l'informatique</h1>
			<h2>Jacques Berger</h2>
		</header>

		<div id="leftbar">
			<div class="bar-section">
				<h2 class="title">Sites de cours</h2>
				<ul>
					<li><a href="inf2005">INF2005</a>
						<p class="desc">Programmation web</p></li>
					<li><a href="inf2015">INF2015</a>
						<p class="desc">Développement de logiciels dans un
							environnement Agile</p></li>
					<li><a href="inf4170">INF4170</a>
						<p class="desc">Architecture des ordinateurs</p></li>
					<li><a href="inf4375">INF4375</a>
						<p class="desc">Paradigmes des échanges Internet</p></li>
					<li><a href="mgl7460">MGL7460</a>
						<p class="desc">Réalisation et maintenance des logiciels</p></li>
				</ul>
			</div>

			<div class="bar-section">
				<h2 class="title">Autres sites</h2>
				<ul>
					<li><a href="http://www.curism.net/"><img class="curism"
							src="images/curism.jpg" alt="Curism logo"></a></li>
				</ul>
			</div>
		</div>

		<div id="rightbar">
			<div class="bar-section">
				<h2 class="title">Articles</h2>
				<ul>
					<li><span class="category" onclick="toggleArticles('cat1');">Littérature
							technique (2)</span>
						<ul class="articles" id="cat1">
							<li><a href="#">Critique de Clean Code : A Handbook of
									Agile Software Craftmanship</a></li>
							<li><a href="#">Critique de Working Effectively with
									Legacy Code</a></li>
						</ul></li>
					<li><span class="category" onclick="toggleArticles('cat2');">Carrière
							(1)</span>
						<ul class="articles" id="cat2">
							<li><a href="#">Améliorer son salaire en trois ans</a></li>
						</ul></li>
					<li><span class="category" onclick="toggleArticles('cat3');">Technologie
							(4)</span>
						<ul class="articles" id="cat3">
							<li><a href="#">Programmation par aspects</a></li>
							<li><a href="#">Comparaison d'Oracle et SQL Server</a></li>
							<li><a href="#">Architecture Javascript</a></li>
							<li><a href="#">PHP en 2012</a></li>
						</ul></li>
				</ul>
			</div>

			<div class="bar-section">
				<h2 class="title">Nouvelles</h2>
				<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
				<script>
					new TWTR.Widget({
						version : 2,
						type : 'profile',
						rpp : 4,
						interval : 30000,
						width : 250,
						height : 300,
						theme : {
							shell : {
								background : '#333333',
								color : '#ffffff'
							},
							tweets : {
								background : '#000000',
								color : '#ffffff',
								links : '#4aed05'
							}
						},
						features : {
							scrollbar : false,
							loop : false,
							live : false,
							behavior : 'all'
						}
					}).render().setUser('jacquesberger').start();
				</script>
			</div>
		</div>

		<div id="content">
			<h2 class="title">Mises à jour</h2>
			<div class="post">
				<div class="post-title">Lorem Ipsum</div>
				<div class="publication">Publiée le 28 juin 2012</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="author">Jacques Berger</div>
			</div> 
			<hr>
			<div class="post">
				<div class="post-title">Lorem Ipsum</div>
				<div class="publication">Publiée le 28 juin 2012</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="author">Jacques Berger</div>
			</div>
			<hr>
			<div class="post">
				<div class="post-title">Lorem Ipsum</div>
				<div class="publication">Publiée le 28 juin 2012</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
					do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="author">Jacques Berger</div>
			</div>
		</div>
		
		<footer>&copy 2012 Jacques Berger</footer>
	</div>
</body>
</html>