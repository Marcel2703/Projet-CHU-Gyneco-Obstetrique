<?php
   session_start();
   // --- Inclusion des bibliotheques
   require '../../../jpgraph/jpgraph.php'; // fichier principal (classe Graph)
   require '../../../jpgraph/jpgraph_line.php'; // courbes (classe LinePlot)
   // --- Donnees : ordonnees des courbes et etiquettes des abscisses
   if (isset($_SESSION['ordonneeNaissanceVivant']) AND isset($_SESSION['ordonneeNaissanceMort']) AND isset($_SESSION['anneeNaissanceCourbe'])) 
   {
   $y_vivant = $_SESSION['ordonneeNaissanceVivant'];
   $y_mort = $_SESSION['ordonneeNaissanceMort'];

   $annee = $_SESSION['anneeNaissanceCourbe'];
   $mois = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
   // --- Creation du conteneur graphique
   $graph = new Graph(825, 500);
   $graph->SetScale("textint"); // x = texte des mois, y = lineaire
   // --- Definir les titres et etiquettes
   $graph->title->Set("VARIATION DE NAISSANCE EN ".$annee); // titre du graphique
   $graph->yaxis->SetTitle("nombre"); // titre axe vertical
   $graph->xaxis->SetTitle("mois"); // titre axe horizontal
   $graph->xaxis->SetTickLabels($mois); // etiquettes de l'axe horizontal 
   // --- Creer la courbe pour Marseille
   $courbe_vivant = new LinePlot($y_vivant);
   $courbe_vivant->SetColor('green'); // trait rouge
   $courbe_vivant->SetLegend("Naissance vivant"); // legende
   // --- Creer la courbe pour Londres
   $courbe_mort = new LinePlot($y_mort);
   $courbe_mort->SetColor('red'); // trait bleu
   $courbe_mort->SetLegend("Naissance mort"); // legende

   $graph->Add($courbe_vivant);
   $graph->Add($courbe_mort);

   // --- Envoyer au navigateur
   $graph->Stroke();
   }
   else{
   $y_vivant = array(0,0,0,0,0,0,0,0,0,0,0,0);
   $y_mort = array(0,0,0,0,0,0,0,0,0,0,0,0);

   $mois = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
   // --- Creation du conteneur graphique
   $graph = new Graph(825, 500);
   $graph->SetScale("textint"); // x = texte des mois, y = lineaire
   // --- Definir les titres et etiquettes
   $graph->title->Set("VARIATION NAISSANCE"); // titre du graphique
   $graph->yaxis->SetTitle("nombre"); // titre axe vertical
   $graph->xaxis->SetTitle("mois"); // titre axe horizontal
   $graph->xaxis->SetTickLabels($mois); // etiquettes de l'axe horizontal 
   // --- Creer la courbe pour Marseille
   $courbe_vivant = new LinePlot($y_vivant);
   $courbe_vivant->SetColor('green'); // trait rouge
   $courbe_vivant->SetLegend("Naissance vivant"); // legende
   // --- Creer la courbe pour Londres
   $courbe_mort = new LinePlot($y_mort);
   $courbe_mort->SetColor('red'); // trait bleu
   $courbe_mort->SetLegend("Naissance mort"); // legende

   $graph->Add($courbe_vivant);
   $graph->Add($courbe_mort);

   // --- Envoyer au navigateur
   $graph->Stroke();
   }
   
?>