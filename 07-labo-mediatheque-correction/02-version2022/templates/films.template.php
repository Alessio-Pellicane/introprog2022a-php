	<header>
		<form method="post" action="films.php">
			<input class="search" type="text" name="recherche" value="<?php echo $mode;?>"
						placeholder="Rechercher">
			<input type="image" src="public/icons/search.png" alt="Rechercher"/>
		</form>
	</header>
	<div id="main">
	<?php
		require_once("template.func.php");
		headerFilms($page,$indiceMaxPage,$mode);
		//var_dump($films);
		afficheFilms($films,$db);
	?>
	</div>
