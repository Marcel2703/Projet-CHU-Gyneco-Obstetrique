<?php
   session_start();
   // --- Inclusion des bibliotheques
   require '../../../jpgraph/jpgraph.php'; // fichier principal (classe Graph)
   require '../../../jpgraph/jpgraph_line.php'; // courbes (classe LinePlot)
   // --- Donnees : ordonnees des courbes et etiquettes des abscisses
   if (isset($_SESSION['ordonneeCourbePatiente'])) {
   $y_patiente = $_SESSION['ordonneeCourbePatiente'];
   $y_accouchement = $_SESSION['ordonneeAccouchement'];
   $y_cesarienne = $_SESSION['ordonneeCesarienne'];
   $y_avortement = $_SESSION['ordonneeAvortement'];
   $y_autres = $_SESSION['ordonneeAutres'];
   $annee = $_SESSION['anneeCourbe'];
   $mois = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
   // --- Creation du conteneur graphique
   $graph = new Graph(825, 500);
   $graph->SetScale("textint"); // x = texte des mois, y = lineaire
   // --- Definir les titres et etiquettes
   $graph->title->Set("BILAN ACTIVITE EN ".$annee); // titre du graphique
   $graph->yaxis->SetTitle("nombre"); // titre axe vertical
   $graph->xaxis->SetTitle("mois"); // titre axe horizontal
   $graph->xaxis->SetTickLabels($mois); // etiquettes de l'axe horizontal 
   // --- Creer la courbe pour Marseille
   $courbe_patiente = new LinePlot($y_patiente);
   $courbe_patiente->SetColor('yellow'); // trait rouge
   $courbe_patiente->SetLegend("Patiente"); // legende
   // --- Creer la courbe pour Londres
   $courbe_accouchement = new LinePlot($y_accouchement);
   $courbe_accouchement->SetColor('green'); // trait bleu
   $courbe_accouchement->SetLegend("Accouchement"); // legende
   // --- Ajouter les courbes au conteneur graphique
   $courbe_cesarienne = new LinePlot($y_cesarienne);
   $courbe_cesarienne->SetColor('blue'); // trait rouge
   $courbe_cesarienne->SetLegend("Cesarienne"); // legende
   // --- Creer la courbe pour Londres
   $courbe_avortement = new LinePlot($y_avortement);
   $courbe_avortement->SetColor('red'); // trait bleu
   $courbe_avortement->SetLegend("Avortement"); // legende
   // --- Ajouter les courbes au conteneur graphique
   $courbe_autres = new LinePlot($y_autres);
   $courbe_autres->SetColor('black'); // trait bleu
   $courbe_autres->SetLegend("AMUI"); // legende
   // --- Ajouter les courbes au conteneur graphique
   $graph->Add($courbe_patiente);
   $graph->Add($courbe_accouchement);
   $graph->Add($courbe_cesarienne);
   $graph->Add($courbe_avortement);
   $graph->Add($courbe_autres);
   // --- Envoyer au navigateur
   $graph->Stroke();
   }
   else{
   $y_patiente = array(0,0,0,0,0,0,0,0,0,0,0,0);
   $y_accouchement = array(0,0,0,0,0,0,0,0,0,0,0,0);
   $y_cesarienne = array(0,0,0,0,0,0,0,0,0,0,0,0);
   $y_avortement = array(0,0,0,0,0,0,0,0,0,0,0,0);
   $y_autres = array(0,0,0,0,0,0,0,0,0,0,0,0);
   $mois = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
   // --- Creation du conteneur graphique
   $graph = new Graph(825, 500);
   $graph->SetScale("textint"); // x = texte des mois, y = lineaire
   // --- Definir les titres et etiquettes
   $graph->title->Set("ACTIVITE ANNUELLE"); // titre du graphique
   $graph->yaxis->SetTitle("nombre"); // titre axe vertical
   $graph->xaxis->SetTitle("mois"); // titre axe horizontal
   $graph->xaxis->SetTickLabels($mois); // etiquettes de l'axe horizontal 
   // --- Creer la courbe pour Marseille
   $courbe_patiente = new LinePlot($y_patiente);
   $courbe_patiente->SetColor('yellow'); // trait rouge
   $courbe_patiente->SetLegend("Patiente"); // legende
   // --- Creer la courbe pour Londres
   $courbe_accouchement = new LinePlot($y_accouchement);
   $courbe_accouchement->SetColor('green'); // trait bleu
   $courbe_accouchement->SetLegend("Accouchement"); // legende
   // --- Ajouter les courbes au conteneur graphique
   $courbe_cesarienne = new LinePlot($y_cesarienne);
   $courbe_cesarienne->SetColor('blue'); // trait rouge
   $courbe_cesarienne->SetLegend("Cesarienne"); // legende
   // --- Creer la courbe pour Londres
   $courbe_avortement = new LinePlot($y_avortement);
   $courbe_avortement->SetColor('red'); // trait bleu
   $courbe_avortement->SetLegend("Avortement"); // legende
   // --- Ajouter les courbes au conteneur graphique
   $courbe_autres = new LinePlot($y_autres);
   $courbe_autres->SetColor('black'); // trait bleu
   $courbe_autres->SetLegend("Autres"); // legende
   // --- Ajouter les courbes au conteneur graphique
   $graph->Add($courbe_patiente);
   $graph->Add($courbe_accouchement);
   $graph->Add($courbe_cesarienne);
   $graph->Add($courbe_avortement);
   $graph->Add($courbe_autres);
   // --- Envoyer au navigateur
   $graph->Stroke();
   }
   
?>