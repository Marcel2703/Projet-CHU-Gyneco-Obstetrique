<?php
session_start();
   // --- Inclusion des bibliotheques
   require '../../../jpgraph/jpgraph.php'; // fichier principal (classe Graph)
   require '../../../jpgraph/jpgraph_bar.php'; // diagramme en barres (classe BarPlot)
   // --- Donnees : ordonnees + etiquettes en abscisse (mois)
   if (isset($_SESSION['ordonneeNaissance']) AND isset($_SESSION['anneeNaissance'])) {
   $naissance = $_SESSION['ordonneeNaissance'];
   $annee=$_SESSION['anneeNaissance']; 
   $mois = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
   // --- Creer le conteneur graphique
   $graph = new Graph(count($naissance)*69, 500);
   $graph->SetScale("textlin"); // x = texte des mois, y = lineaire
   // --- Definir les titres et etiquettes
   $graph->title->Set("NAISSANCE EN ".$annee); // titre du graphique
   $graph->yaxis->SetTitle("nombre de bebe"); // titre axe vertical
   $graph->xaxis->SetTitle("mois"); // titre axe horizontal
   $graph->xaxis->SetTickLabels($mois); // etiquettes de l'axe horizontal 
   // --- Creer le diagramme en barres
   $barre = new BarPlot($naissance);
   // --- Personnaliser
   $barre->SetWidth(0.8); // largeur des barres
   $barre->SetFillGradient('green', 'purple', GRAD_HOR); // remplissage
   $barre->SetPattern(PATTERN_DIAG2, 'pink'); // motif de remplissage
   $barre->value->Show(); // montrer les valeurs pour chaque barre 
   $barre->value->SetFormat('%d'); // format entier pour les valeurs
   $barre->SetValuePos('top'); // placer les valeurs en haut
   $graph->yaxis->scale->SetGrace(20); // ajouter de l'espace en haut de l'axe y
   // --- Ajouter le diagramme au conteneur graphique
   $graph->Add($barre);
   // --- Envoyer au navigateur
   $graph->Stroke();
}
   else{
   $naissance = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0); 
   $mois = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
   // --- Creer le conteneur graphique
   $graph = new Graph(count($naissance)*69, 500);
   $graph->SetScale("textlin"); // x = texte des mois, y = lineaire
   // --- Definir les titres et etiquettes
   $graph->title->Set("NAISSANCE ANNUELLE"); // titre du graphique
   $graph->yaxis->SetTitle("nombre de bebe"); // titre axe vertical
   $graph->xaxis->SetTitle("mois"); // titre axe horizontal
   $graph->xaxis->SetTickLabels($mois); // etiquettes de l'axe horizontal 
   // --- Creer le diagramme en barres
   $barre = new BarPlot($naissance);
   // --- Personnaliser
   $barre->SetWidth(0.8); // largeur des barres
   $barre->SetFillGradient('green', 'purple', GRAD_HOR); // remplissage
   $barre->SetPattern(PATTERN_DIAG2, 'pink'); // motif de remplissage
   $barre->value->Show(); // montrer les valeurs pour chaque barre 
   $barre->value->SetFormat('%d'); // format entier pour les valeurs
   $barre->SetValuePos('top'); // placer les valeurs en haut
   $graph->yaxis->scale->SetGrace(20); // ajouter de l'espace en haut de l'axe y
   // --- Ajouter le diagramme au conteneur graphique
   $graph->Add($barre);
   // --- Envoyer au navigateur
   $graph->Stroke();
   }
?>