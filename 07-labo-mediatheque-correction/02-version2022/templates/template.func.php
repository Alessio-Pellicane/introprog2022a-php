<?php
function headerFilms($page,$indiceMaxPage,$mode){
	if($page > 0){
			echo '<a class="previous" href="?page='.($page-1).'&mode='.$mode.'">Précédent</a>';
	}else{
			echo '<a class="previous"></a>';
	}
	echo '<div class="paging">Page '.($page+1).' sur '.($indiceMaxPage+1).' </div>';
	if($page < $indiceMaxPage){
		echo '<a class="next" href="?page='.($page+1).'&mode='.$mode.'">Suivant</a>';
	}else{
		echo '<a class="next"></a>';
	}
}


function afficheFilms($films,$db){

/*"SELECT films_id,films_titre, films_resume, films_affiche, films_duree, films_annee, real_id, real_nom, GROUP_CONCAT(DISTINCT acteurs_nom SEPARATOR ', ') AS acteurs, GROUP_CONCAT(DISTINCT genres_nom SEPARATOR ' | ') AS genres FROM films LEFT OUTER JOIN realisateurs ON films_real_id = real_id LEFT OUTER JOIN films_acteurs ON films_id = fa_films_id LEFT OUTER JOIN acteurs ON fa_acteurs_id = acteurs_id LEFT OUTER JOIN films_genres ON fg_films_id = films_id LEFT OUTER JOIN genres ON fg_genres_id = genres_id GROUP BY films_id HAVING acteurs LIKE :search OR films_titre LIKE :search OR real_nom LIKE :search OR genres LIKE :search OR films_resume LIKE :search limit "
*/
	//boucle pour chaque film du tableau $films
		$changeColor = true;

		foreach ($films as $film) {

		/*if($changeColor) $class="rouge";
		else $class="bleu";	*/

			//opérateur ternaire : si changeColor vaut true alors rouge sinon bleu
		$class = $changeColor ? "rouge" : "bleu";

		$changeColor = !$changeColor;
			
		echo '<div class="film '.$class.'">';

			echo '<div class="image">
					<img src="public/images/'.$film['films_affiche'].'" 
					title="'.$film['films_titre'].'" 
					alt="'.$film['films_titre'].'"/>
				   </div>';


			echo '<div class="contenu">';	   
				echo '<h2 class="titre" >'.$film['films_titre'].'</h2><div class="annee">'.$film['films_annee'].'</div>';

				/*********** GENRES **************/
				//récupération des genres pour le film courant grâce à l'identifiant du film
				
				echo '<div>';
				echo $film["genres"];
				
				echo '</div>';
					

				/*********** REALISATEUR ****************/
				echo '<div> <label>Réalisateur : </label> '
				.$film['real_nom'].'</div>';

				/*********** ACTEURS **************/
				
				echo '<div><label> Acteurs : </label>';
				echo $film["acteurs"];
				
				echo '</div>';


				/*********** DUREE **************/
				$duree = $film['films_duree'];
				$heures = (int) ($duree/60);
				$minutes = $duree%60;
				if($minutes<10){
					$minutes = '0'.$minutes;
				}
				echo '<div> <label>Durée : </label>'
						.$heures.'h'.$minutes.
					'</div>';

				/*********** RESUME **************/	
				echo '<div class="resume">'.$film['films_resume'].'</div>';
			echo '</div>';	


		echo '</div>';
		}
}

?>