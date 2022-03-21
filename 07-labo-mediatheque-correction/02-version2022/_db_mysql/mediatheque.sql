DROP DATABASE IF EXISTS mediatheque;
CREATE DATABASE mediatheque DEFAULT CHARACTER SET utf8;
USE mediatheque;
DROP TABLE IF EXISTS realisateurs;
CREATE TABLE realisateurs (
    real_id INT PRIMARY KEY AUTO_INCREMENT,
    real_nom VARCHAR(255) NOT NULL CHECK (TRIM(real_nom) <> '')
);
DROP TABLE IF EXISTS films;
CREATE TABLE films (
    films_id INT PRIMARY KEY AUTO_INCREMENT,
    films_titre VARCHAR(255) NOT NULL,
    films_resume TEXT,
    films_annee YEAR,
    films_affiche VARCHAR(255),
    films_duree SMALLINT CHECK (films_duree > 0 AND films_duree < 720),
    films_real_id INT REFERENCES realisateurs
);
DROP TABLE IF EXISTS genres;
CREATE TABLE genres (
    genres_id INT PRIMARY KEY AUTO_INCREMENT,
    genres_nom VARCHAR(255) NOT NULL UNIQUE CHECK (TRIM(genres_nom) <> '')
);
DROP TABLE IF EXISTS films_genres;
CREATE TABLE films_genres (  
    fg_films_id INT REFERENCES films,
    fg_genres_id INT REFERENCES genres,
    PRIMARY KEY (fg_films_id,fg_genres_id)
);
DROP TABLE IF EXISTS acteurs;
CREATE TABLE acteurs (
    acteurs_id INT PRIMARY KEY AUTO_INCREMENT,
    acteurs_nom VARCHAR(255) NOT NULL UNIQUE CHECK (TRIM(acteurs_nom) <> '')
);
DROP TABLE IF EXISTS films_acteurs;
CREATE TABLE films_acteurs (
    fa_films_id INT REFERENCES films ,
    fa_acteurs_id INT REFERENCES acteurs,
    PRIMARY KEY(fa_films_id,fa_acteurs_id)
);
INSERT INTO realisateurs(real_nom) VALUES ('Christopher Nolan');
INSERT INTO realisateurs(real_nom) VALUES ('David Fincher');
INSERT INTO realisateurs(real_nom) VALUES ('Martin Scorsese');
INSERT INTO realisateurs (real_nom)VALUES ('Quentin Tarantino');
INSERT INTO realisateurs (real_nom)VALUES ('Zack Snyder');
INSERT INTO realisateurs (real_nom)VALUES ('Clint Eastwood');
INSERT INTO realisateurs (real_nom)VALUES ('Edgar Wright');
INSERT INTO realisateurs (real_nom)VALUES ('Darren Aronofsky');
INSERT INTO realisateurs (real_nom)VALUES ('Andrew Niccol');
INSERT INTO realisateurs (real_nom)VALUES ('Andy&Lana Wachowski');
INSERT INTO realisateurs (real_nom)VALUES ('Joseph Kosinski');
INSERT INTO realisateurs (real_nom)VALUES ('J.J. Abrams');
INSERT INTO realisateurs (real_nom)VALUES ('Marc Webb');
INSERT INTO realisateurs (real_nom)VALUES ('Matthew Vaughn');
INSERT INTO realisateurs (real_nom)VALUES ('Bryan Singer');
INSERT INTO realisateurs (real_nom)VALUES ('David O. Russell');
INSERT INTO realisateurs (real_nom)VALUES ('Nicolas Winding Refn');
INSERT INTO realisateurs (real_nom)VALUES ('Derek Cianfrance');
INSERT INTO realisateurs (real_nom)VALUES ('Sam Mendes');
INSERT INTO realisateurs (real_nom)VALUES ('Tony Kaye');  
INSERT INTO realisateurs (real_nom)VALUES ('Alan Parker ');  
INSERT INTO realisateurs (real_nom)VALUES ('Francis Lawrence'); 
INSERT INTO realisateurs (real_nom)VALUES ('Michel Gondry'); 
INSERT INTO realisateurs (real_nom)VALUES ('Frank Darabont'); 
INSERT INTO realisateurs (real_nom)VALUES ('Tim burton');
INSERT INTO realisateurs (real_nom)VALUES ('Martin Campbell');

INSERT INTO films VALUES (NULL,'Interstellar',
    'Le film raconte les aventures d\'un groupe d\'explorateurs qui utilisent une faille récemment découverte dans l\'espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire.',
    2014,'interstellar.jpg',169,1);
INSERT INTO films VALUES (NULL,'The Dark Knight Rises ',
    'Il y a huit ans, Batman a disparu dans la nuit : lui qui était un héros est alors devenu un fugitif. S\'accusant de la mort du procureur-adjoint Harvey Dent, le Chevalier Noir a tout sacrifié au nom de ce que le commissaire Gordon et lui-même considéraient être une noble cause...',
    2012,'dark-rises.jpg',164,1);
INSERT INTO films VALUES (NULL,'Inception ','Dom Cobb est un voleur expérimenté – le meilleur qui soit dans l’art périlleux de l’extraction : sa spécialité consiste à s’approprier les secrets les plus précieux d’un individu, enfouis au plus profond de son subconscient, pendant qu’il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l’univers trouble de l’espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier qui a perdu tout ce qui lui est cher. ',
    2010,'inception.jpg',148,1);
INSERT INTO films VALUES (NULL,'The Dark Knight, 
    Le Chevalier Noir','Dans ce nouveau volet, Batman augmente les mises dans sa guerre contre le crime. Avec l\'appui du lieutenant de police Jim Gordon et du procureur de Gotham, Harvey Dent, Batman vise à éradiquer le crime organisé qui pullule dans la ville. Leur association est très efficace mais elle sera bientôt bouleversée par le chaos déclenché par un criminel extraordinaire que les citoyens de Gotham connaissent sous le nom de Joker. ',
    2008,'dark-k.jpg',147,1);
INSERT INTO films VALUES (NULL,'Le Prestige','Londres, au début du siècle dernier... Robert Angier et Alfred Borden sont deux magiciens surdoués, promis dès leur plus jeune âge à un glorieux avenir. Une compétition amicale les oppose d\'abord l\'un à l\'autre, mais l\'émulation tourne vite à la jalousie, puis à la haine. Devenus de farouches ennemis, les deux rivaux vont s\'efforcer de se détruire l\'un l\'autre en usant des plus noirs secrets de leur art. Cette obsession aura pour leur entourage des conséquences dramatiques...',
    2006,'prestige.jpg',128,1);
INSERT INTO films VALUES (NULL,'Batman Begins','Comment un homme seul peut-il changer le monde ? Telle est la question qui hante Bruce Wayne depuis cette nuit tragique où ses parents furent abattus sous ses yeux, dans une ruelle de Gotham City. Torturé par un profond sentiment de colère et de culpabilité, le jeune héritier de cette richissime famille fuit Gotham pour un long et discret voyage à travers le monde. Le but de ses pérégrinations : sublimer sa soif de vengeance en trouvant de nouveaux moyens de lutter contre l\'injustice.',
    2005,'batman-b.jpg',139,1);
INSERT INTO films VALUES (NULL,'Memento','Leonard Shelby ne porte que des costumes de grands couturiers et ne se déplace qu\'au volant de sa Jaguar. En revanche, il habite dans des motels miteux et règle ses notes avec d\'épaisses liasses de billets.
Leonard n\'a qu\'une idée en tête : traquer l\'homme qui a violé et assassiné sa femme afin de se venger. Sa recherche du meurtrier est rendue plus difficile par le fait qu\'il souffre d\'une forme rare et incurable d\'amnésie. Bien qu\'il puisse se souvenir de détails de son passé, il est incapable de savoir ce qu\'il a fait dans le quart d\'heure précédent, où il se trouve, où il va et pourquoi.',
2000,'memento.jpg',114,1);

INSERT INTO films VALUES (NULL,'Gone Girl','A l’occasion de son cinquième anniversaire de mariage, Nick Dunne signale la disparition de sa femme, Amy. Sous la pression de la police et l’affolement des médias, l’image du couple modèle commence à s’effriter. Très vite, les mensonges de Nick et son étrange comportement amènent tout le monde à se poser la même question : a-t-il tué sa femme ?',
    2014,'gone-girl.jpg',149,2);
INSERT INTO films VALUES (NULL,'Millenium : Les hommes qui n’aimaient pas les femmes','Mikael Blomkvist, brillant journaliste d’investigation, est engagé par un des plus puissants industriels de Suède, Henrik Vanger, pour enquêter sur la disparition de sa nièce, Harriet, survenue des années auparavant. Vanger est convaincu qu’elle a été assassinée par un membre de sa propre famille.Lisbeth Salander, jeune femme rebelle mais enquêtrice exceptionnelle, est chargée de se renseigner sur Blomkvist, ce qui va finalement la conduire à travailler avec lui.',
2012,'millenium.jpg',158,2);
INSERT INTO films VALUES (NULL,'The Social Network','Une soirée bien arrosée d\'octobre 2003, Mark Zuckerberg, un étudiant qui vient de se faire plaquer par sa petite amie, pirate le système informatique de l\'Université de Harvard pour créer un site, une base de données de toutes les filles du campus. Il affiche côte à côte deux photos et demande à l\'utilisateur de voter pour la plus canon. Il baptise le site Facemash. Le succès est instantané : l\'information se diffuse à la vitesse de l\'éclair et le site devient viral, détruisant tout le système de Harvard et générant une controverse sur le campus à cause de sa misogynie.',
    2010,'the-social-network.jpg',120,2);
INSERT INTO films VALUES (NULL,'L\'Etrange histoire de Benjamin Button','"Curieux destin que le mien..." Ainsi commence l\'étrange histoire de Benjamin Button, cet homme qui naquit à 80 ans et vécut sa vie à l\'envers, sans pouvoir arrêter le cours du temps. Situé à La Nouvelle-Orléans et adapté d\'une nouvelle de F. Scott Fitzgerald, le film suit ses tribulations de 1918 à nos jours. L\'étrange histoire de Benjamin Button : l\'histoire d\'un homme hors du commun. Ses rencontres et ses découvertes, ses amours, ses joies et ses drames. Et ce qui survivra toujours à l\'emprise du temps...',
    2009,'ben-button.jpg',155,2);
INSERT INTO films VALUES (NULL,'Fight Club','Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d\'autres personnes seules qui connaissent la misère humaine, morale et sexuelle. C\'est pourquoi il va devenir membre du Fight club, un lieu clandestin ou il va pouvoir retrouver sa virilité, l\'échange et la communication. Ce club est dirigé par Tyler Durden, une sorte d\'anarchiste entre gourou et philosophe qui prêche l\'amour de son prochain. ',
    1999,'fight-club.jpg',135,2);
INSERT INTO films VALUES (NULL,'The Game','Nicholas Van Orton, homme d\'affaires avisé, reçoit le jour de son anniversaire un étrange cadeau que lui offre son frère Conrad. Il s\'agit d\'un jeu. Nicholas découvre peu à peu que les enjeux en sont très élevés, bien qu\'il ne soit certain ni des règles, ni même de l\'objectif réel. Il prend peu à peu conscience qu\'il est manipulé jusque dans sa propre maison par des conspirateurs inconnus qui semblent vouloir faire voler sa vie en eclats. ',
    1997,'game.jpg',128,2);
INSERT INTO films VALUES (NULL,'Seven','Pour conclure sa carrière, l\'inspecteur Somerset, vieux flic blasé, tombe à sept jours de la retraite sur un criminel peu ordinaire. John Doe, c\'est ainsi que se fait appeler l\'assassin, a decidé de nettoyer la societé des maux qui la rongent en commettant sept meurtres basés sur les sept pechés capitaux: la gourmandise, l\'avarice, la paresse, l\'orgueil, la luxure, l\'envie et la colère. ',
    1996,'seven.jpg',130,2);


INSERT INTO films VALUES (NULL,'Le Loup de Wall Street','L’argent. Le pouvoir. Les femmes. La drogue. Les tentations étaient là, à portée de main, et les autorités n’avaient aucune prise. Aux yeux de Jordan et de sa meute, la modestie était devenue complètement inutile. Trop n’était jamais assez…',
    2013,'loup.jpg',179,3);
INSERT INTO films VALUES (NULL,'Shutter Island','En 1954, le marshal Teddy Daniels et son coéquipier Chuck Aule sont envoyés enquêter sur l\'île de Shutter Island, dans un hôpital psychiatrique où sont internés de dangereux criminels. L\'une des patientes, Rachel Solando, a inexplicablement disparu. Comment la meurtrière a-t-elle pu sortir d\'une cellule fermée de l\'extérieur ? Le seul indice retrouvé dans la pièce est une feuille de papier sur laquelle on peut lire une suite de chiffres et de lettres sans signification apparente. Oeuvre cohérente d\'une malade, ou cryptogramme ? ',
    2010,'shutter.jpg',137,3);
INSERT INTO films VALUES (NULL,'Les Infiltrés','A Boston, une lutte sans merci oppose la police à la pègre irlandaise.Pour mettre fin au règne du parrain Frank Costello, la police infiltre son gang avec "un bleu" issu des bas quartiers, Billy Costigan.',
    2006,'infiltres.jpg',150,3);
INSERT INTO films VALUES (NULL,'Gangs of New York','En 1846, le quartier de Five Points, un faubourg pauvre de New York, est le théâtre d\'une guerre des gangs entre émigrants irlandais d\'un côté, les Dead Rabbits menés par Père Vallon, et les Native Americans de l\'autre, dirigés par le sanguinaire Bill le Boucher. Ce dernier met rapidement en déroute les Dead Rabbits en assassinant leur chef, et prend par la même occasion le contrôle exclusif des rues de la grosse pomme. Afin de renforcer ses pouvoirs, Bill s\'allie avec Boss Tweed, un politicien influent.',
    2003,'gangs.jpg',170,3);

INSERT INTO films VALUES (NULL,'Django Unchained','Dans le sud des États-Unis, deux ans avant la guerre de Sécession, le Dr King Schultz, un chasseur de primes allemand, fait l’acquisition de Django, un esclave qui peut l’aider à traquer les frères Brittle, les meurtriers qu’il recherche. Schultz promet à Django de lui rendre sa liberté lorsqu’il aura capturé les Brittle – morts ou vifs.',
    2013,'django.jpg',164,4);
INSERT INTO films VALUES (NULL,'Inglourious Basterds','Dans la France occupée de 1940, Shosanna Dreyfus assiste à l\'exécution de sa famille tombée entre les mains du colonel nazi Hans Landa. Shosanna s\'échappe de justesse et s\'enfuit à Paris où elle se construit une nouvelle identité en devenant exploitante d\'une salle de cinéma. Quelque part ailleurs en Europe, le lieutenant Aldo Raine forme un groupe de soldats juifs américains pour mener des actions punitives particulièrement sanglantes contre les nazis. ',
    2009,'inglorious.jpg',153,4);
INSERT INTO films VALUES (NULL,'Pulp Fiction','L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent. ',
    1994,'pulp.jpg',149,4);


INSERT INTO films VALUES (NULL,'Man of Steel','Un petit garçon découvre qu\'il possède des pouvoirs surnaturels et qu\'il n\'est pas né sur Terre. Plus tard, il s\'engage dans un périple afin de comprendre d\'où il vient et pourquoi il a été envoyé sur notre planète. Mais il devra devenir un héros s\'il veut sauver le monde de la destruction totale et incarner l\'espoir pour toute l\'humanité.'
    ,2013,'man-steel.jpg',143,5);
INSERT INTO films VALUES (NULL,'Sucker Punch','Fermez les yeux. Libérez-vous l\'esprit. Rien ne vous prépare à ce qui va suivre. Bienvenue dans l\'imaginaire débordant d\'une jeune fille dont les rêves sont la seule échappatoire à sa vie cauchemardesque… S\'affranchissant des contraintes de temps et d\'espace, elle est libre d\'aller là où l\'entraîne son imagination, jusqu\'à brouiller la frontière entre réalité et fantasme…',
    2011,'sucker-punch.jpg',110,5);
INSERT INTO films VALUES (NULL,'Watchmen - Les Gardiens','venture à la fois complexe et mystérieuse sur plusieurs niveaux, "Watchmen - Les Gardiens" - se passe dans une Amérique alternative de 1985 où les super-héros font partie du quotidien et où l\'Horloge de l\'Apocalypse -symbole de la tension entre les Etats-Unis et l\'Union Soviétique- indique en permanence minuit moins cinq. Lorsque l\'un de ses anciens collègues est assassiné, Rorschach, un justicier masqué un peu à plat mais non moins déterminé, va découvrir un complot qui menace de tuer et de discréditer tous les super-héros du passé et du présent.',
    2009,'watchmen.jpg',162,5);
INSERT INTO films VALUES (NULL,'300','Adapté du roman graphique de Frank Miller, 300 est un récit épique de la Bataille des Thermopyles, qui opposa en l\'an - 480 le roi Léonidas et 300 soldats spartiates à Xerxès et l\'immense armée perse. Face à un invincible ennemi, les 300 déployèrent jusqu\'à leur dernier souffle un courage surhumain ; leur vaillance et leur héroïque sacrifice inspirèrent toute la Grèce à se dresser contre la Perse, posant ainsi les premières pierres de la démocratie. ',
    2007,'300.jpg',115,5);


INSERT INTO films VALUES (NULL,'Gran Torino ','Walt Kowalski est un ancien de la guerre de Corée, un homme inflexible, amer et pétri de préjugés surannés. Après des années de travail à la chaîne, il vit replié sur lui-même, occupant ses journées à bricoler, traînasser et siroter des bières. Avant de mourir, sa femme exprima le voeu qu\'il aille à confesse, mais Walt n\'a rien à avouer, ni personne à qui parler. Hormis sa chienne Daisy, il ne fait confiance qu\'à son M-1, toujours propre, toujours prêt à l\'usage...',
    2009,'torino.jpg',111,6);
INSERT INTO films VALUES (NULL,'L\'Echange','Los Angeles, 1928. Un matin, Christine dit au revoir à son fils Walter et part au travail. Quand elle rentre à la maison, celui-ci a disparu. Une recherche effrénée s\'ensuit et, quelques mois plus tard, un garçon de neuf ans affirmant être Walter lui est restitué. Christine le ramène chez elle mais au fond d\'elle, elle sait qu\'il n\'est pas son fils... ',
    2008,'echange.jpg',141,6);
INSERT INTO films VALUES (NULL,'Million Dollar Baby','Rejeté depuis longtemps par sa fille, l\'entraîneur Frankie Dunn s\'est replié sur lui-même et vit dans un désert affectif, en évitant toute relation qui pourrait accroître sa douleur et sa culpabilité. Le jour où Maggie Fitzgerald, 31 ans, pousse la porte de son gymnase à la recherche d\'un coach, elle n\'amène pas seulement avec elle sa jeunesse et sa force, mais aussi une histoire jalonnée d\'épreuves et une exigence, vitale et urgente : monter sur le ring, entraînée par Frankie, et enfin concrétiser le rêve d\'une vie.',
    2005,'million.jpg',132,6);
INSERT INTO films VALUES (NULL,'Mystic River','Jimmy Markum, Dave Boyle et Sean Devine ont grandi ensemble dans les rues de Boston. Rien ne semblait devoir altérer le cours de leur amitié jusqu\'au jour où Dave se fit enlever par un inconnu sous les yeux de ses amis. Leur complicité juvénile ne résista pas à un tel événement et leurs chemins se séparèrent inéluctablement.',
    2003,'mystic.jpg',137,6);

INSERT INTO films VALUES (NULL,'Shaun of the Dead','À presque 30 ans, Shaun ne fait pas grand-chose de sa vie. Entre l\'appart qu\'il partage avec ses potes et le temps qu\'il passe avec eux au pub, Liz, sa petite amie, n\'a pas beaucoup de place. Elle qui voudrait que Shaun s\'engage, ne supporte plus de le voir traîner. Excédée par ses vaines promesses et son incapacité à se consacrer un peu à leur couple, Liz décide de rompre. Shaun est décidé à tout réparer, et tant pis si les zombies déferlent sur Londres, tant pis si la ville devient un véritable enfer. Retranché dans son pub préféré, le temps est venu pour lui de montrer enfin de quoi il est capable... ',
    2005,'shaun.jpg',99,7);
INSERT INTO films VALUES (NULL,'Hot Fuzz','A Londres, le policier Nicholas Angel est le meilleur de son équipe. Tellement bon qu\'il fait passer ses collègues pour de simples gardiens de la paix. Le chef de la brigade décide donc de le "promouvoir" dans le petit village de Sandford, où il ne se passe rien. Aux côtés du policier local Danny Butterman qui rêve de devenir Mel Gibson, Nicholas règle quelques contraventions sans grand intérêt. Une série de crimes étranges va le remettre dans l\'action... ',
    2007,'hot-fuzz.jpg',120,7);

INSERT INTO films VALUES (NULL,'Black Swan','Rivalités dans la troupe du New York City Ballet. Nina est prête à tout pour obtenir le rôle principal du Lac des cygnes que dirige l’ambigu Thomas. Mais elle se trouve bientôt confrontée à la belle et sensuelle nouvelle recrue, Lily...',
    2011,'black-swan.jpg',103,8);


INSERT INTO films VALUES (NULL,'Bienvenue à Gattaca','Dans un monde parfait, Gattaca est un centre d\'études et de recherches spatiales pour des jeunes gens au patrimoine génétique impeccable. Jérôme, candidat idéal, voit sa vie détruite par un accident tandis que Vincent, enfant naturel, rêve de partir pour l\'espace. Chacun des deux va permettre à l\'autre d\'obtenir ce qu\'il souhaite en déjouant les lois de Gattaca.',
    1998,'gattaca.jpg',106,9);

INSERT INTO films VALUES (NULL,'Cloud Atlas','À travers une histoire qui se déroule sur cinq siècles dans plusieurs espaces temps, des êtres se croisent et se retrouvent d’une vie à l’autre, naissant et renaissant successivement… Tandis que leurs décisions ont des conséquences sur leur parcours, dans le passé, le présent et l’avenir lointain, un tueur devient un héros et un seul acte de générosité suffit à entraîner des répercussions pendant plusieurs siècles et à provoquer une révolution. Tout, absolument tout, est lié. '
    ,2013,'clous-atlas.jpg',165,10);
INSERT INTO films VALUES (NULL,'Matrix Reloaded','Neo apprend à mieux contrôler ses dons naturels, alors même que Sion s\'apprête à tomber sous l\'assaut de l\'Armée des Machines. D\'ici quelques heures, 250 000 Sentinelles programmées pour anéantir notre espèce envahiront la dernière enclave humaine de la Terre.',
    2003,'matrix-reloaded.jpg',138,10);
INSERT INTO films VALUES (NULL,'Matrix Revolutions','La longue quête de liberté des rebelles culmine en une bataille finale explosive. Tandis que l\'armée des Machines sème la désolation sur Zion, ses citoyens organisent une défense acharnée. Mais pourront-ils retenir les nuées implacables des Sentinelles en attendant que Neo s\'approprie l\'ensemble de ses pouvoirs et mette fin à la guerre ?',
    2003,'matrix-rev.jpg',128,10);
INSERT INTO films VALUES (NULL,'Matrix','Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l\'un des pirates les plus recherchés du cyber-espace. A cheval entre deux mondes, Neo est assailli par d\'étranges songes et des messages cryptés provenant d\'un certain Morpheus. Celui-ci l\'exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu\'est-ce que la Matrice ? Nul ne le sait, et aucun homme n\'est encore parvenu à en percer les defenses. Mais Morpheus est persuadé que Neo est l\'Elu, le libérateur mythique de l\'humanité annoncé selon la prophétie. Ensemble, ils se lancent dans une lutte sans retour contre la Matrice et ses terribles agents...',
    1999,'matrix.jpg',135,10);

INSERT INTO films VALUES (NULL,'Oblivion','2077 : Jack Harper, en station sur la planète Terre dont toute la population a été évacuée, est en charge de la sécurité et de la réparation des drones. Suite à des décennies de guerre contre une force extra-terrestre terrifiante qui a ravagé la Terre, Jack fait partie d’une gigantesque opération d’extraction des dernières ressources nécessaires à la survie des siens.',
    2013,'oblivion.jpg',126,11);


INSERT INTO films VALUES (NULL,'Star Trek Into Darkness','Alors qu’il rentre à sa base, l’équipage de l’Enterprise doit faire face à des forces terroristes implacables au sein même de son organisation. L’ennemi a fait exploser la flotte et tout ce qu’elle représentait, plongeant notre monde dans le chaos…',
    2013,'star-trek-dark.jpg',130,12);

INSERT INTO films VALUES (NULL,'The Amazing Spider-Man : le destin d\'un Héros ','Ce n’est un secret pour personne que le combat le plus rude de Spider-Man est celui qu’il mène contre lui-même en tentant de concilier la vie quotidienne de Peter Parker et les lourdes responsabilités de Spider-Man. Mais Peter Parker va se rendre compte qu’il fait face à un conflit de bien plus grande ampleur. Être Spider-Man, quoi de plus grisant ? Peter Parker trouve son bonheur entre sa vie de héros, bondissant d’un gratte-ciel à l’autre, et les doux moments passés aux côté de Gwen. Mais être Spider-Man a un prix : il est le seul à pouvoir protéger ses concitoyens new-yorkais des abominables méchants qui menacent la ville.  ',
    2014,'spiderman-destin.jpg',141,13);
INSERT INTO films VALUES (NULL,'The Amazing Spider-Man','Abandonné par ses parents lorsqu’il était enfant, Peter Parker a été élevé par son oncle Ben et sa tante May. Il est aujourd’hui au lycée, mais il a du mal à s’intégrer. Comme la plupart des adolescents de son âge, Peter essaie de comprendre qui il est et d’accepter son parcours. Amoureux pour la première fois, lui et Gwen Stacy découvrent les sentiments, l’engagement et les secrets. En retrouvant une mystérieuse mallette ayant appartenu à son père, Peter entame une quête pour élucider la disparition de ses parents, ce qui le conduit rapidement à Oscorp et au laboratoire du docteur Curt Connors, l’ancien associé de son père. Spider-Man va bientôt se retrouver face au Lézard, l’alter ego de Connors. En décidant d’utiliser ses pouvoirs, il va choisir son destin… ',
    2012,'amazing-spiderman.jpg',137,13);

INSERT INTO films VALUES (NULL,'X-Men: Le Commencement','Avant que les mutants n’aient révélé leur existence au monde, et avant que Charles Xavier et Erik Lehnsherr ne deviennent le Professeur X et Magneto, ils n’étaient encore que deux jeunes hommes découvrant leurs pouvoirs pour la première fois. Avant de devenir les pires ennemis, ils étaient encore amis, et travaillaient avec d’autres mutants pour empêcher la destruction du monde, l’Armageddon. Au cours de cette opération, le conflit naissant entre les deux hommes s’accentua, et la guerre éternelle entre la Confrérie de Magneto et les X-Men du Professeur X éclata… X-Men : le commencement nous entraîne aux origines de la saga X-Men, révélant une histoire secrète autour des événements majeurs du XXe siècle. ',
    2011,'x-men.jpg',130,14);
INSERT INTO films VALUES (NULL,'Stardust, le mystère de l\'étoile','l était une fois un petit village anglais si tranquille qu\'on aurait pu le croire endormi. Niché au creux d\'une vallée, il devait son nom inhabituel - "Wall" - au mur d\'enceinte qui depuis des siècles dissuadait ses habitants de s\'aventurer dans le royaume voisin, peuplé de lutins, sorcières, pirates volants et autres engeances malfaisantes. Un jour, un candide jeune homme, Tristan, qui convoitait la plus jolie fille de Wall, s\'engagea à lui rapporter en gage de son amour... une étoile tombée du ciel. Pour honorer sa promesse, il fit ce que personne n\'avait encore osé : il escalada le mur interdit et pénétra dans le royaume magique de Stormhold... ',
    2007,'stardust.jpg',122,14);

INSERT INTO films VALUES (NULL,'X-Men: Days of Future Past','Les X-Men envoient Wolverine dans le passé pour changer un événement historique majeur, qui pourrait impacter mondialement humains et mutants. ',
    2014,'x-men-days.jpg',132,15);
INSERT INTO films VALUES (NULL,'Usual Suspects','Une légende du crime contraint cinq malfrats à aller s\'acquitter d\'une tâche très périlleuse. Ceux qui survivent pourront se partager un butin de 91 millions de dollars. ',
    1995,'usual-suspects.jpg',106,15);

INSERT INTO films VALUES (NULL,'Happiness Therapy','La vie réserve parfois quelques surprises... Pat Solatano a tout perdu : sa maison, son travail et sa femme. Il se retrouve même dans l’obligation d’emménager chez ses parents. Malgré tout, Pat affiche un optimisme à toute épreuve et est déterminé à se reconstruire et à renouer avec son ex-femme.
Rapidement, il rencontre Tiffany, une jolie jeune femme ayant eu un parcours mouvementé. Tiffany se propose d’aider Pat à reconquérir sa femme, à condition qu’il lui rende un service en retour. Un lien inattendu commence à se former entre eux et, ensemble, ils vont essayer de reprendre en main leurs vies respectives. ',
2013,'happiness.jpg',122,16);

INSERT INTO films VALUES (NULL,'Drive','Un jeune homme solitaire, "The Driver", conduit le jour à Hollywood pour le cinéma en tant que cascadeur et la nuit pour des truands. Ultra professionnel et peu bavard, il a son propre code de conduite. Jamais il n’a pris part aux crimes de ses employeurs autrement qu’en conduisant - et au volant, il est le meilleur !
Shannon, le manager qui lui décroche tous ses contrats, propose à Bernie Rose, un malfrat notoire, d’investir dans un véhicule pour que son poulain puisse affronter les circuits de stock-car professionnels. Celui-ci accepte mais impose son associé, Nino, dans le projet.
C’est alors que la route du pilote croise celle d’Irene et de son jeune fils. Pour la première fois de sa vie, il n’est plus seul.',2011,'drive.jpg',100,17);

INSERT INTO films VALUES (NULL,'The Place Beyond the Pines','Cascadeur à moto, Luke est réputé pour son spectaculaire numéro du «globe de la mort». Quand son spectacle itinérant revient à Schenectady, dans l’État de New York, il découvre que Romina, avec qui il avait eu une aventure, vient de donner naissance à son fils… Pour subvenir aux besoins de ceux qui sont désormais sa famille, Luke quitte le spectacle et commet une série de braquages. ',
    2013,'place-pines.jpg',140,18);

INSERT INTO films VALUES (NULL,'American Beauty','Une maison de rêve, un pavillon bourgeois discrètement cossu dissimule dans une banlieue résidentielle, c\'est ici que résident Lester Burnhamm, sa femme Carolyn et leur fille Jane. L\'agitation du monde et sa violence semblent bien loin ici. Mais derrière cette respectable façade se tisse une étrange et grinçante tragi-comédie familiale ou désirs inavoués, frustrations et violences refoulées conduiront inexorablement un homme vers la mort. ',
    2000,'american-b.jpg',122,19);
INSERT INTO films VALUES (NULL,'Skyfall','Lorsque la dernière mission de Bond tourne mal, plusieurs agents infiltrés se retrouvent exposés dans le monde entier. Le MI6 est attaqué, et M est obligée de relocaliser l’Agence. Ces événements ébranlent son autorité, et elle est remise en cause par Mallory, le nouveau président de l’ISC, le comité chargé du renseignement et de la sécurité. Le MI6 est à présent sous le coup d’une double menace, intérieure et extérieure. Il ne reste à M qu’un seul allié de confiance vers qui se tourner : Bond. Plus que jamais, 007 va devoir agir dans l’ombre. Avec l’aide d’Eve, un agent de terrain, il se lance sur la piste du mystérieux Silva, dont il doit identifier coûte que coûte l’objectif secret et mortel… ',
    2012,'skyfall.jpg',143,19);

INSERT INTO films VALUES (NULL,'American History X','A travers l\'histoire d\'une famille américaine, ce film tente d\'expliquer l\'origine du racisme et de l\'extrémisme aux États-Unis. Il raconte l\'histoire de Derek qui, voulant venger la mort de son père, abattu par un dealer noir, a épousé les thèses racistes d\'un groupuscule de militants d\'extrême droite et s\'est mis au service de son leader, brutal théoricien prônant la suprématie de la race blanche. Ces théories le mèneront à commettre un double meurtre entrainant son jeune frère, Danny, dans la spirale de la haine. ',
    1999,'american-historyX.jpg',119,20);

INSERT INTO films VALUES (NULL,'La Vie de David Gale',' Militant contre la peine capitale au Texas, le docteur David Gale, un professeur d\'université, se retrouve à tort condamné à mort pour le viol et le meurtre de l\'activiste Constance Harraway. Dans sa cellule, il reçoit Elizabeth Bloom, une journaliste qui mettra tout en œuvre pour prouver son innocence. Mais y parviendra-t-elle ? ',
    2003,'david-gale.jpg',130,21);

INSERT INTO films VALUES (NULL,'Je suis une légende','Robert Neville était un savant de haut niveau et de réputation mondiale, mais il en aurait fallu plus pour stopper les ravages de cet incurable et terrifiant virus d\'origine humaine. Mystérieusement immunisé contre le mal, Neville est aujourd\'hui le dernier homme à hanter les ruines de New York. Peut-être le dernier homme sur Terre... Depuis trois ans, il diffuse chaque jour des messages radio dans le fol espoir de trouver d\'autres survivants. Nul n\'a encore répondu.
Mais Neville n\'est pas seul. Des mutants, victimes de cette peste moderne - on les appelle les "Infectés" - rôdent dans les ténèbres... observent ses moindres gestes, guettent sa première erreur. Devenu l\'ultime espoir de l\'humanité, Neville se consacre tout entier à sa mission : venir à bout du virus, en annuler les terribles effets en se servant de son propre sang.'
,2007,'legende.jpg',100,22);
INSERT INTO films VALUES (NULL,'De l\'eau pour les éléphants','1931, période de Grande Dépression aux Etats-Unis. A la suite d\'une tragédie familiale, Jacob, un jeune étudiant en école vétérinaire, se retrouve subitement plongé dans la misère et rejoint par hasard un cirque itinérant de seconde classe. Il se fait accepter en échange des soins qu’il pourra apporter aux animaux et ne tarde pas à tomber sous le charme de la belle écuyère Marlène. Elle est l\'épouse du directeur du cirque, un être d’une rare violence et totalement imprévisible. Derrière la beauté et la magie des spectacles, Jacob découvre un univers impitoyable et miséreux. Lorsqu’une éléphante rejoint le cirque, Marlène et Jacob se rapprochent l’un de l’autre et préparent un nouveau spectacle qui permet un temps de renouer avec le succès. Mais leurs sentiments deviennent de plus en plus perceptibles et sous les yeux d\'August, cette histoire d\'amour les met irrémédiablement en danger.',
    2011,'eau-elephants.jpg',115,22);

INSERT INTO films VALUES (NULL,'Eternal Sunshine of the Spotless Mind','Joel et Clementine ne voient plus que les mauvais côtés de leur tumultueuse histoire d\'amour, au point que celle-ci fait effacer de sa mémoire toute trace de cette relation. Effondré, Joel contacte l\'inventeur du procédé Lacuna, le Dr. Mierzwiak, pour qu\'il extirpe également de sa mémoire tout ce qui le rattachait à Clementine. Deux techniciens, Stan et Patrick, s\'installent à son domicile et se mettent à l\'oeuvre, en présence de la secrétaire, Mary. Les souvenirs commencent à défiler dans la tête de Joel, des plus récents aux plus
anciens, et s\'envolent un à un, à jamais.',2004,'eternal.jpg',108,23);

INSERT INTO films VALUES (NULL,'Les Evadés','En 1947, Andy Dufresne, un jeune banquier, est condamné à la prison à vie pour le meurtre de sa femme et de son amant. Ayant beau clamer son innocence, il est emprisonné à Shawshank, le pénitencier le plus sévère de l\'Etat du Maine. Il y fait la rencontre de Red, un Noir désabusé, détenu depuis vingt ans. Commence alors une grande histoire d\'amitié entre les deux hommes... ',
    1995,'shawshank.jpg',140,24);

INSERT INTO films VALUES (NULL,'Beetlejuice','Pour avoir voulu sauver un chien, Adam et Barbara Maitland passent tout de go dans l\'autre monde. Peu après, occupants invisibles de leur antique demeure ils la voient envahie par une riche et bruyante famille new-yorkaise. Rien à redire jusqu\'au jour où cette honorable famille entreprend de donner un cachet plus urbain à la vieille demeure. Adam et Barbara, scandalisés, décident de déloger les intrus. Mais leurs classiques fantômes et autres sortilèges ne font aucun effet. C\'est alors qu\'ils font appel à un "bio-exorciste" freelance connu sous le sobriquet de Beetlejuice. ',1988,'beetlejuice.jpg',92,25);
INSERT INTO films VALUES (NULL,'Sleepy Hollow, la légende du cavalier sans tête','En 1799, dans une bourgade de La Nouvelle-Angleterre, plusieurs cadavres sont successivement retrouvés décapités. Les têtes ont disparu. Terrifiés, les habitants sont persuadés que ces meurtres sont commis par un étrange et furieux cavalier, dont la rumeur prétend qu\'il est lui-même sans tête. Les autorités new-yorkaises envoient alors leur plus fin limier pour éclaircir ce mystère. Ichabod Crane ne croit ni aux légendes, ni aux vengeances post-mortem. Mais, à peine arrive, il succombe au charme étrange et vénéneux de la belle Katrina Van Tassel.',
    2000,'sleepy.jpg',105,25);
INSERT INTO films VALUES (NULL,'Big Fish','L\'histoire à la fois drôle et poignante d\'Edward Bloom, un père débordant d\'imagination, et de son fils William. Ce dernier retourne au domicile familial après l\'avoir quitté longtemps auparavant, pour être au chevet de son père, atteint d\'un cancer. Il souhaite mieux le connaître et découvrir ses secrets avant qu\'il ne soit trop tard. L\'aventure débutera lorsque William tentera de discerner le vrai du faux dans les propos de son père mourant. ',
    2004,'big-fish.jpg',125,25);
INSERT INTO films VALUES (NULL,'Charlie et la chocolaterie','Charlie est un enfant issu d\'une famille pauvre. Travaillant pour subvenir aux besoins des siens, il doit économiser chaque penny, et ne peut s\'offrir les friandises dont raffolent les enfants de son âge. Pour obtenir son comptant de sucreries, il participe à un concours organisé par l\'inquiétant Willy Wonka, le propriétaire de la fabrique de chocolat de la ville. Celui qui découvrira l\'un des cinq tickets d\'or que Wonka a caché dans les barres de chocolat de sa fabrication gagnera une vie de sucreries. ',
    2005,'charlie.jpg',116,25);

INSERT INTO films VALUES (NULL,'Casino Royale','Pour sa première mission, James Bond affronte le tout-puissant banquier privé du terrorisme international, Le Chiffre. Pour achever de le ruiner et démanteler le plus grand réseau criminel qui soit, Bond doit le battre lors d\'une partie de poker à haut risque au Casino Royale. La très belle Vesper, attachée au Trésor, l\'accompagne afin de veiller à ce que l\'agent 007 prenne soin de l\'argent du gouvernement britannique qui lui sert de mise, mais rien ne va se passer comme prévu. ',
    2006,'casino.jpg',138,26);

INSERT INTO genres VALUES (NULL,'Science-fiction');
INSERT INTO genres VALUES (NULL,'Fantastique');
INSERT INTO genres VALUES (NULL,'Thriller');
INSERT INTO genres VALUES (NULL,'Action');
INSERT INTO genres VALUES (NULL,'Drame');
INSERT INTO genres VALUES (NULL,'Horreur');
INSERT INTO genres VALUES (NULL,'Romance');
INSERT INTO genres VALUES (NULL,'Comédie');
INSERT INTO genres VALUES (NULL,'Biopic');
INSERT INTO genres VALUES (NULL,'Policier');
INSERT INTO genres VALUES (NULL,'Historique');
INSERT INTO genres VALUES (NULL,'Western');
INSERT INTO genres VALUES (NULL,'Guerre');
INSERT INTO genres VALUES (NULL,'Aventure');
INSERT INTO genres VALUES (NULL,'Peplum');
INSERT INTO genres VALUES (NULL,'Espionage');

INSERT INTO films_genres VALUES (1,1);
INSERT INTO films_genres VALUES (1,5);
INSERT INTO films_genres VALUES (2,3);
INSERT INTO films_genres VALUES (2,4);
INSERT INTO films_genres VALUES (2,5);
INSERT INTO films_genres VALUES (3,1);
INSERT INTO films_genres VALUES (3,3);
INSERT INTO films_genres VALUES (4,3);
INSERT INTO films_genres VALUES (4,4);
INSERT INTO films_genres VALUES (5,3);
INSERT INTO films_genres VALUES (5,2);
INSERT INTO films_genres VALUES (5,5);
INSERT INTO films_genres VALUES (6,4);
INSERT INTO films_genres VALUES (6,3);
INSERT INTO films_genres VALUES (7,3);
INSERT INTO films_genres VALUES (8,3);
INSERT INTO films_genres VALUES (8,5);
INSERT INTO films_genres VALUES (9,3);
INSERT INTO films_genres VALUES (9,5);
INSERT INTO films_genres VALUES (10,5);
INSERT INTO films_genres VALUES (11,2);
INSERT INTO films_genres VALUES (11,7);
INSERT INTO films_genres VALUES (12,3);
INSERT INTO films_genres VALUES (12,5);
INSERT INTO films_genres VALUES (13,3);
INSERT INTO films_genres VALUES (14,3);
INSERT INTO films_genres VALUES (15,9);
INSERT INTO films_genres VALUES (15,5);
INSERT INTO films_genres VALUES (15,10);
INSERT INTO films_genres VALUES (16,3);
INSERT INTO films_genres VALUES (17,3);
INSERT INTO films_genres VALUES (17,5);
INSERT INTO films_genres VALUES (17,10);
INSERT INTO films_genres VALUES (18,11);
INSERT INTO films_genres VALUES (18,4);
INSERT INTO films_genres VALUES (18,5);
INSERT INTO films_genres VALUES (19,12);
INSERT INTO films_genres VALUES (20,13);
INSERT INTO films_genres VALUES (20,4);
INSERT INTO films_genres VALUES (21,4);
INSERT INTO films_genres VALUES (21,10);
INSERT INTO films_genres VALUES (22,4);
INSERT INTO films_genres VALUES (22,14);
INSERT INTO films_genres VALUES (22,2);
INSERT INTO films_genres VALUES (23,3);
INSERT INTO films_genres VALUES (23,2);
INSERT INTO films_genres VALUES (23,4);
INSERT INTO films_genres VALUES (24,4);
INSERT INTO films_genres VALUES (24,3);
INSERT INTO films_genres VALUES (24,1);
INSERT INTO films_genres VALUES (25,15);
INSERT INTO films_genres VALUES (25,4);
INSERT INTO films_genres VALUES (25,13);
INSERT INTO films_genres VALUES (26,5);
INSERT INTO films_genres VALUES (27,3);
INSERT INTO films_genres VALUES (27,5);
INSERT INTO films_genres VALUES (28,5);
INSERT INTO films_genres VALUES (29,10);
INSERT INTO films_genres VALUES (29,5);
INSERT INTO films_genres VALUES (29,3);
INSERT INTO films_genres VALUES (30,8);
INSERT INTO films_genres VALUES (31,8);
INSERT INTO films_genres VALUES (32,5);
INSERT INTO films_genres VALUES (33,1);
INSERT INTO films_genres VALUES (33,5);
INSERT INTO films_genres VALUES (34,2);
INSERT INTO films_genres VALUES (34,5);
INSERT INTO films_genres VALUES (35,1);
INSERT INTO films_genres VALUES (35,4);
INSERT INTO films_genres VALUES (36,1);
INSERT INTO films_genres VALUES (36,4);
INSERT INTO films_genres VALUES (37,1);
INSERT INTO films_genres VALUES (37,4);
INSERT INTO films_genres VALUES (38,1);
INSERT INTO films_genres VALUES (38,4);
INSERT INTO films_genres VALUES (39,1);
INSERT INTO films_genres VALUES (39,4);
INSERT INTO films_genres VALUES (40,4);
INSERT INTO films_genres VALUES (40,2);
INSERT INTO films_genres VALUES (41,1);
INSERT INTO films_genres VALUES (41,2);
INSERT INTO films_genres VALUES (43,2);
INSERT INTO films_genres VALUES (43,14);
INSERT INTO films_genres VALUES (43,8);
INSERT INTO films_genres VALUES (44,1);
INSERT INTO films_genres VALUES (44,4);
INSERT INTO films_genres VALUES (45,3);
INSERT INTO films_genres VALUES (45,10);
INSERT INTO films_genres VALUES (47,5);
INSERT INTO films_genres VALUES (47,3);
INSERT INTO films_genres VALUES (48,5);
INSERT INTO films_genres VALUES (48,10);
INSERT INTO films_genres VALUES (49,5);
INSERT INTO films_genres VALUES (50,4);
INSERT INTO films_genres VALUES (50,15);
INSERT INTO films_genres VALUES (51,5);
INSERT INTO films_genres VALUES (52,5);
INSERT INTO films_genres VALUES (53,1);
INSERT INTO films_genres VALUES (53,3);
INSERT INTO films_genres VALUES (54,5);
INSERT INTO films_genres VALUES (54,7);
INSERT INTO films_genres VALUES (55,2);
INSERT INTO films_genres VALUES (55,5);
INSERT INTO films_genres VALUES (55,7);
INSERT INTO films_genres VALUES (56,5);
INSERT INTO films_genres VALUES (57,2);
INSERT INTO films_genres VALUES (58,2);
INSERT INTO films_genres VALUES (58,3);
INSERT INTO films_genres VALUES (59,5);
INSERT INTO films_genres VALUES (59,14);
INSERT INTO films_genres VALUES (60,8);
INSERT INTO films_genres VALUES (60,1);
INSERT INTO films_genres VALUES (61,4);
INSERT INTO films_genres VALUES (61,15);

INSERT INTO acteurs VALUES (NULL,'Matthew McConaughey');
INSERT INTO acteurs VALUES (NULL,'Anne Hathaway');
INSERT INTO acteurs VALUES (NULL,'Michael Caine');
INSERT INTO acteurs VALUES (NULL,'Christian Bale');
INSERT INTO acteurs VALUES (NULL,'Gary Oldman');
INSERT INTO acteurs VALUES (NULL,'Tom Hardy');
INSERT INTO acteurs VALUES (NULL,'Leonardo Di Caprio');
INSERT INTO acteurs VALUES (NULL,'Marion Cotillard');
INSERT INTO acteurs VALUES (NULL,'Ellen Page');
INSERT INTO acteurs VALUES (NULL,'Joseph Gordon-Levitt ');
INSERT INTO acteurs VALUES (NULL,'Cillian Murphy ');
INSERT INTO acteurs VALUES (NULL,'Heath Ledger');
INSERT INTO acteurs VALUES (NULL,'Aaron Eckhart');
INSERT INTO acteurs VALUES (NULL,'Maggie Gyllenhaal');
INSERT INTO acteurs VALUES (NULL,'Morgan Freeman');
INSERT INTO acteurs VALUES (NULL,'Hugh Jackman');
INSERT INTO acteurs VALUES (NULL,'Rebecca Hall');
INSERT INTO acteurs VALUES (NULL,'Scarlett Johansson');
INSERT INTO acteurs VALUES (NULL,'Guy Pearce');
INSERT INTO acteurs VALUES (NULL,'Carrie-Anne Moss');
INSERT INTO acteurs VALUES (NULL,'Ben Affleck');
INSERT INTO acteurs VALUES (NULL,'Rosamund Pike');
INSERT INTO acteurs VALUES (NULL,'Daniel Craig');
INSERT INTO acteurs VALUES (NULL,'Rooney Mara');
INSERT INTO acteurs VALUES (NULL,'Christopher Plummer');
INSERT INTO acteurs VALUES (NULL,'Jesse Eisenberg');
INSERT INTO acteurs VALUES (NULL,'Andrew Garfield ');
INSERT INTO acteurs VALUES (NULL,'Justin Timberlake');
INSERT INTO acteurs VALUES (NULL,'Brad Pitt');
INSERT INTO acteurs VALUES (NULL,'Cate Blanchett');
INSERT INTO acteurs VALUES (NULL,'Edward Norton');
INSERT INTO acteurs VALUES (NULL,'Helena Bonham Carter');
INSERT INTO acteurs VALUES (NULL,'Michael Douglas');
INSERT INTO acteurs VALUES (NULL,'Sean Penn');
INSERT INTO acteurs VALUES (NULL,'Jonah Hill');
INSERT INTO acteurs VALUES (NULL,'Margot Robbie');
INSERT INTO acteurs VALUES (NULL,'Mark Ruffalo');
INSERT INTO acteurs VALUES (NULL,'Ben Kingsley');
INSERT INTO acteurs VALUES (NULL,'Jack Nicholson');
INSERT INTO acteurs VALUES (NULL,'Matt Damon');
INSERT INTO acteurs VALUES (NULL,'Charlie Sheen');
INSERT INTO acteurs VALUES (NULL,'Cameron Diaz');
INSERT INTO acteurs VALUES (NULL,'Daniel Day-Lewis');
INSERT INTO acteurs VALUES (NULL,'Jamie Foxx');
INSERT INTO acteurs VALUES (NULL,'Christoph Waltz');
INSERT INTO acteurs VALUES (NULL,'Mélanie Laurent');
INSERT INTO acteurs VALUES (NULL,'Diane Krüger');
INSERT INTO acteurs VALUES (NULL,'John Travolta');
INSERT INTO acteurs VALUES (NULL,'Uma Thurman');
INSERT INTO acteurs VALUES (NULL,'Samuel L. Jackson');
INSERT INTO acteurs VALUES (NULL,'Henry Cavill');
INSERT INTO acteurs VALUES (NULL,'Amy Adams');
INSERT INTO acteurs VALUES (NULL,'Michael Shannon');
INSERT INTO acteurs VALUES (NULL,'Emily Browning');
INSERT INTO acteurs VALUES (NULL,'Abbie Cornish');
INSERT INTO acteurs VALUES (NULL,'Jena Malone');
INSERT INTO acteurs VALUES (NULL,'Jackie Earle Haley');
INSERT INTO acteurs VALUES (NULL,'Patrick Wilson');
INSERT INTO acteurs VALUES (NULL,'Malin Ackerman');
INSERT INTO acteurs VALUES (NULL,'Jeffrey Dean Morgan ');
INSERT INTO acteurs VALUES (NULL,'Gerard Butler');
INSERT INTO acteurs VALUES (NULL,'Lena Headey');
INSERT INTO acteurs VALUES (NULL,'Michael Fassbender');
INSERT INTO acteurs VALUES (NULL,'Clint Eastwood');
INSERT INTO acteurs VALUES (NULL,'Bee Vang');
INSERT INTO acteurs VALUES (NULL,'Angelina Jolie');
INSERT INTO acteurs VALUES (NULL,'John Malkovich');
INSERT INTO acteurs VALUES (NULL,'Hilary Swank');
INSERT INTO acteurs VALUES (NULL,'Kevin Bacon');
INSERT INTO acteurs VALUES (NULL,'Tim Robbins');
INSERT INTO acteurs VALUES (NULL,'Simon Pegg');
INSERT INTO acteurs VALUES (NULL,'Nick Frost');
INSERT INTO acteurs VALUES (NULL,'Nathalie Portman');
INSERT INTO acteurs VALUES (NULL,'Vincent Cassel');
INSERT INTO acteurs VALUES (NULL,'Mila Kunis');
INSERT INTO acteurs VALUES (NULL,'Ethan Hawke');
INSERT INTO acteurs VALUES (NULL,'Jude Law');
INSERT INTO acteurs VALUES (NULL,'Halle Berry');
INSERT INTO acteurs VALUES (NULL,'Tom Hanks');
INSERT INTO acteurs VALUES (NULL,'Ben Whishaw');
INSERT INTO acteurs VALUES (NULL,'Laurence Fishburne');
INSERT INTO acteurs VALUES (NULL,'Keanu Reeves');
INSERT INTO acteurs VALUES (NULL,'Hugo Weaving');
INSERT INTO acteurs VALUES (NULL,'Tom Cruise');
INSERT INTO acteurs VALUES (NULL,'Olga Kurylenko');
INSERT INTO acteurs VALUES (NULL,'Chris Pine');
INSERT INTO acteurs VALUES (NULL,'Zachary Quinto');
INSERT INTO acteurs VALUES (NULL,'Benedict Cumberbatch');
INSERT INTO acteurs VALUES (NULL,'Emma Stone');
INSERT INTO acteurs VALUES (NULL,'Rhys Ifans');
INSERT INTO acteurs VALUES (NULL,'James McAvoy');
INSERT INTO acteurs VALUES (NULL,'Jennifer Lawrence');
INSERT INTO acteurs VALUES (NULL,'Robert de Niro');
INSERT INTO acteurs VALUES (NULL,'Michelle Peifer');
INSERT INTO acteurs VALUES (NULL,'Michelle Pfeiffer');
INSERT INTO acteurs VALUES (NULL,'Claire Danes');
INSERT INTO acteurs VALUES (NULL,'Benicio del Toro');
INSERT INTO acteurs VALUES (NULL,'Kevin Spacey');
INSERT INTO acteurs VALUES (NULL,'Gabriel Byrne');
INSERT INTO acteurs VALUES (NULL,'Ryan Gosling');
INSERT INTO acteurs VALUES (NULL,'Bradley Cooper');
INSERT INTO acteurs VALUES (NULL,'Carey Mulligan');
INSERT INTO acteurs VALUES (NULL,'Eva Mendes');
INSERT INTO acteurs VALUES (NULL,'Anette Bening');
INSERT INTO acteurs VALUES (NULL,'Thora Birch');
INSERT INTO acteurs VALUES (NULL,'Eva Green');
INSERT INTO acteurs VALUES (NULL,'Javier Bardem');
INSERT INTO acteurs VALUES (NULL,'Judi Dench');
INSERT INTO acteurs VALUES (NULL,'Bérénice Marlohe');
INSERT INTO acteurs VALUES (NULL,'Edward Furlong');
INSERT INTO acteurs VALUES (NULL,'Kate Winslet');
INSERT INTO acteurs VALUES (NULL,'Laura Linney');
INSERT INTO acteurs VALUES (NULL,'Will Smith');
INSERT INTO acteurs VALUES (NULL,'Reese Witherspoon');
INSERT INTO acteurs VALUES (NULL,'Robert Pattinson');
INSERT INTO acteurs VALUES (NULL,'Kirsten Dunst');
INSERT INTO acteurs VALUES (NULL,'Jim Carrey');
INSERT INTO acteurs VALUES (NULL,'Geena Davis');
INSERT INTO acteurs VALUES (NULL,'Micheal Keaton');
INSERT INTO acteurs VALUES (NULL,'Alec Baldwin');
INSERT INTO acteurs VALUES (NULL,'Winona Ryder');
INSERT INTO acteurs VALUES (NULL,'Johnny Depp');
INSERT INTO acteurs VALUES (NULL,'Cristina Ricci');
INSERT INTO acteurs VALUES (NULL,'Christopher Walken');
INSERT INTO acteurs VALUES (NULL,'Ewan McGregor');
INSERT INTO acteurs VALUES (NULL,'Albert Finney');
INSERT INTO acteurs VALUES (NULL,'Jessica Lange');
INSERT INTO acteurs VALUES (NULL,'Freddy Highmore');
INSERT INTO acteurs VALUES (NULL,'Liam Neeson');

INSERT INTO films_acteurs VALUES (1,1);
INSERT INTO films_acteurs VALUES (1,2);
INSERT INTO films_acteurs VALUES (1,3);
INSERT INTO films_acteurs VALUES (2,4);
INSERT INTO films_acteurs VALUES (2,5);
INSERT INTO films_acteurs VALUES (2,6);
INSERT INTO films_acteurs VALUES (2,3);
INSERT INTO films_acteurs VALUES (2,15);
INSERT INTO films_acteurs VALUES (3,7);
INSERT INTO films_acteurs VALUES (3,8);
INSERT INTO films_acteurs VALUES (3,9);
INSERT INTO films_acteurs VALUES (3,10);
INSERT INTO films_acteurs VALUES (3,6);
INSERT INTO films_acteurs VALUES (3,2);
INSERT INTO films_acteurs VALUES (3,11);
INSERT INTO films_acteurs VALUES (4,4);
INSERT INTO films_acteurs VALUES (4,12);
INSERT INTO films_acteurs VALUES (4,5);
INSERT INTO films_acteurs VALUES (4,3);
INSERT INTO films_acteurs VALUES (4,14);
INSERT INTO films_acteurs VALUES (4,13);
INSERT INTO films_acteurs VALUES (5,4);
INSERT INTO films_acteurs VALUES (5,16);
INSERT INTO films_acteurs VALUES (5,17);
INSERT INTO films_acteurs VALUES (5,18);
INSERT INTO films_acteurs VALUES (6,4);
INSERT INTO films_acteurs VALUES (6,3);
INSERT INTO films_acteurs VALUES (6,62);
INSERT INTO films_acteurs VALUES (7,19);
INSERT INTO films_acteurs VALUES (7,20);
INSERT INTO films_acteurs VALUES (8,21);
INSERT INTO films_acteurs VALUES (8,22);
INSERT INTO films_acteurs VALUES (9,23);
INSERT INTO films_acteurs VALUES (9,24);
INSERT INTO films_acteurs VALUES (9,25);
INSERT INTO films_acteurs VALUES (10,26);
INSERT INTO films_acteurs VALUES (10,27);
INSERT INTO films_acteurs VALUES (10,28);
INSERT INTO films_acteurs VALUES (11,29);
INSERT INTO films_acteurs VALUES (11,30);
INSERT INTO films_acteurs VALUES (12,31);
INSERT INTO films_acteurs VALUES (12,29);
INSERT INTO films_acteurs VALUES (12,32);
INSERT INTO films_acteurs VALUES (13,33);
INSERT INTO films_acteurs VALUES (13,34);
INSERT INTO films_acteurs VALUES (14,29);
INSERT INTO films_acteurs VALUES (14,15);
INSERT INTO films_acteurs VALUES (14,98);
INSERT INTO films_acteurs VALUES (15,7);
INSERT INTO films_acteurs VALUES (15,35);
INSERT INTO films_acteurs VALUES (15,36);
INSERT INTO films_acteurs VALUES (16,7);
INSERT INTO films_acteurs VALUES (16,37);
INSERT INTO films_acteurs VALUES (16,38);
INSERT INTO films_acteurs VALUES (17,7);
INSERT INTO films_acteurs VALUES (17,39);
INSERT INTO films_acteurs VALUES (17,40);
INSERT INTO films_acteurs VALUES (17,41);
INSERT INTO films_acteurs VALUES (18,7);
INSERT INTO films_acteurs VALUES (18,42);
INSERT INTO films_acteurs VALUES (18,43);
INSERT INTO films_acteurs VALUES (19,44);
INSERT INTO films_acteurs VALUES (19,7);
INSERT INTO films_acteurs VALUES (19,45);
INSERT INTO films_acteurs VALUES (20,29);
INSERT INTO films_acteurs VALUES (20,45);
INSERT INTO films_acteurs VALUES (20,46);
INSERT INTO films_acteurs VALUES (20,47);
INSERT INTO films_acteurs VALUES (21,48);
INSERT INTO films_acteurs VALUES (21,49);
INSERT INTO films_acteurs VALUES (21,50);
INSERT INTO films_acteurs VALUES (22,51);
INSERT INTO films_acteurs VALUES (22,52);
INSERT INTO films_acteurs VALUES (22,53);
INSERT INTO films_acteurs VALUES (23,54);
INSERT INTO films_acteurs VALUES (23,55);
INSERT INTO films_acteurs VALUES (23,56);
INSERT INTO films_acteurs VALUES (24,57);
INSERT INTO films_acteurs VALUES (24,58);
INSERT INTO films_acteurs VALUES (24,59);
INSERT INTO films_acteurs VALUES (24,60);
INSERT INTO films_acteurs VALUES (25,61);
INSERT INTO films_acteurs VALUES (25,62);
INSERT INTO films_acteurs VALUES (25,63);
INSERT INTO films_acteurs VALUES (26,64);
INSERT INTO films_acteurs VALUES (26,65);
INSERT INTO films_acteurs VALUES (27,66);
INSERT INTO films_acteurs VALUES (27,67);
INSERT INTO films_acteurs VALUES (28,64);
INSERT INTO films_acteurs VALUES (28,15);
INSERT INTO films_acteurs VALUES (28,68);
INSERT INTO films_acteurs VALUES (29,69);
INSERT INTO films_acteurs VALUES (29,70);
INSERT INTO films_acteurs VALUES (29,34);
INSERT INTO films_acteurs VALUES (30,71);
INSERT INTO films_acteurs VALUES (30,72);
INSERT INTO films_acteurs VALUES (31,71);
INSERT INTO films_acteurs VALUES (31,72);
INSERT INTO films_acteurs VALUES (32,73);
INSERT INTO films_acteurs VALUES (32,74);
INSERT INTO films_acteurs VALUES (32,75);
INSERT INTO films_acteurs VALUES (33,76);
INSERT INTO films_acteurs VALUES (33,77);
INSERT INTO films_acteurs VALUES (33,49);
INSERT INTO films_acteurs VALUES (34,78);
INSERT INTO films_acteurs VALUES (34,79);
INSERT INTO films_acteurs VALUES (34,80);
INSERT INTO films_acteurs VALUES (35,81);
INSERT INTO films_acteurs VALUES (35,82);
INSERT INTO films_acteurs VALUES (35,20);
INSERT INTO films_acteurs VALUES (35,83);
INSERT INTO films_acteurs VALUES (36,81);
INSERT INTO films_acteurs VALUES (36,82);
INSERT INTO films_acteurs VALUES (36,20);
INSERT INTO films_acteurs VALUES (36,83);
INSERT INTO films_acteurs VALUES (37,81);
INSERT INTO films_acteurs VALUES (37,82);
INSERT INTO films_acteurs VALUES (37,20);
INSERT INTO films_acteurs VALUES (37,83);
INSERT INTO films_acteurs VALUES (38,84);
INSERT INTO films_acteurs VALUES (38,85);
INSERT INTO films_acteurs VALUES (39,86);
INSERT INTO films_acteurs VALUES (39,87);
INSERT INTO films_acteurs VALUES (39,88);
INSERT INTO films_acteurs VALUES (40,27);
INSERT INTO films_acteurs VALUES (40,89);
INSERT INTO films_acteurs VALUES (40,44);
INSERT INTO films_acteurs VALUES (41,27);
INSERT INTO films_acteurs VALUES (41,89);
INSERT INTO films_acteurs VALUES (41,90);
INSERT INTO films_acteurs VALUES (42,91);
INSERT INTO films_acteurs VALUES (42,63);
INSERT INTO films_acteurs VALUES (42,92);
INSERT INTO films_acteurs VALUES (44,91);
INSERT INTO films_acteurs VALUES (44,63);
INSERT INTO films_acteurs VALUES (44,92);
INSERT INTO films_acteurs VALUES (44,16);
INSERT INTO films_acteurs VALUES (43,93);
INSERT INTO films_acteurs VALUES (43,95);
INSERT INTO films_acteurs VALUES (43,96);
INSERT INTO films_acteurs VALUES (45,98);
INSERT INTO films_acteurs VALUES (45,97);
INSERT INTO films_acteurs VALUES (45,99);
INSERT INTO films_acteurs VALUES (46,101);
INSERT INTO films_acteurs VALUES (46,92);
INSERT INTO films_acteurs VALUES (46,93);
INSERT INTO films_acteurs VALUES (47,100);
INSERT INTO films_acteurs VALUES (47,102);
INSERT INTO films_acteurs VALUES (48,100);
INSERT INTO films_acteurs VALUES (48,101);
INSERT INTO films_acteurs VALUES (48,103);
INSERT INTO films_acteurs VALUES (49,98);
INSERT INTO films_acteurs VALUES (49,104);
INSERT INTO films_acteurs VALUES (49,105);
INSERT INTO films_acteurs VALUES (50,23);
INSERT INTO films_acteurs VALUES (50,108);
INSERT INTO films_acteurs VALUES (50,107);
INSERT INTO films_acteurs VALUES (50,109);
INSERT INTO films_acteurs VALUES (51,31);
INSERT INTO films_acteurs VALUES (51,110);
INSERT INTO films_acteurs VALUES (52,98);
INSERT INTO films_acteurs VALUES (52,111);
INSERT INTO films_acteurs VALUES (52,112);
INSERT INTO films_acteurs VALUES (53,113);
INSERT INTO films_acteurs VALUES (54,114);
INSERT INTO films_acteurs VALUES (54,115);
INSERT INTO films_acteurs VALUES (54,45);
INSERT INTO films_acteurs VALUES (55,117);
INSERT INTO films_acteurs VALUES (55,111);
INSERT INTO films_acteurs VALUES (55,116);
INSERT INTO films_acteurs VALUES (56,15);
INSERT INTO films_acteurs VALUES (56,70);
INSERT INTO films_acteurs VALUES (57,118);
INSERT INTO films_acteurs VALUES (57,119);
INSERT INTO films_acteurs VALUES (57,120);
INSERT INTO films_acteurs VALUES (57,121);
INSERT INTO films_acteurs VALUES (58,122);
INSERT INTO films_acteurs VALUES (58,124);
INSERT INTO films_acteurs VALUES (58,123);
INSERT INTO films_acteurs VALUES (59,125);
INSERT INTO films_acteurs VALUES (59,126);
INSERT INTO films_acteurs VALUES (59,127);
INSERT INTO films_acteurs VALUES (60,122);
INSERT INTO films_acteurs VALUES (60,128);
INSERT INTO films_acteurs VALUES (60,32);
INSERT INTO films_acteurs VALUES (61,23);
INSERT INTO films_acteurs VALUES (61,106);
INSERT INTO films_acteurs VALUES (61,108);
