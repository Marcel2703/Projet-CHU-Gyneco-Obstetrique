<?php
   session_start();
   // --- Inclusion des bibliotheques
   require '../../../jpgraph/jpgraph.php'; // fichier principal (classe Graph)
   require '../../../jpgraph/jpgraph_pie.php'; // secteurs (classe PiePlot)
   require '../../../jpgraph/jpgraph_pie3d.php'; // secteurs 3D (classe PiePlot3d)
   // --- Donnees : pourcentages + legendes
   
   if (isset( $_SESSION['ordonneeRepartition']) AND isset($_SESSION['anneeRepartition'])) {
   $annee=$_SESSION['anneeRepartition'];
   $donnees = $_SESSION['ordonneeRepartition'];
      if($donnees['0']+$donnees['1']+$donnees['2']+$donnees['3']==0){
         $donnees = array(100);
         $acte = array('Aucune activite');
   // --- Creer le conteneur graphique
         $graph = new PieGraph(825, 450);
         $graph->title->Set("POURCENTAGE DES ACTIVITES EN ".$annee); // titre du graphique
   // --- Creer le diagramme a secteurs
         $camembert = new PiePlot3d($donnees);
         $camembert->SetLegends($acte);
   // --- Personnaliser
         $camembert->SetSize(0.4); // dimension du rayon
         $camembert->SetCenter(0.4, 0.6); // position du centre
         $camembert->SetAngle(45); // inclinaison
         $camembert->SetStartAngle(75); // angle de depart du 1er secteur
         $camembert->SetHeight(50); // epaisseur des secteurs
         $camembert->SetTheme('sand'); // theme de couleur
         $camembert->value->SetFormat('%.2f%%'); // 2 chiffres decimaux
   // --- Ajouter au conteneur graphique
         $graph->Add($camembert);
   // --- Envoyer au navigateur
         $graph->Stroke();
      }
      else{
         $acte = array('Accouchement', 'Cesarienne', 'Avortement', 'AMUI');
   // --- Creer le conteneur graphique
         $graph = new PieGraph(825, 450);
         $graph->title->Set("POURCENTAGE DES ACTIVITES EN ".$annee); // titre du graphique
   // --- Creer le diagramme a secteurs
         $camembert = new PiePlot3d($donnees);
         $camembert->SetLegends($acte);
   // --- Personnaliser
         $camembert->SetSize(0.4); // dimension du rayon
         $camembert->SetCenter(0.4, 0.6); // position du centre
         $camembert->SetAngle(45); // inclinaison
         $camembert->SetStartAngle(75); // angle de depart du 1er secteur
         $camembert->SetHeight(50); // epaisseur des secteurs
         $camembert->SetTheme('sand'); // theme de couleur
         $camembert->ExplodeSlice(0, 8); // ecarter le dernier secteur de 10
         $camembert->ExplodeSlice(1, 8); // ecarter le dernier secteur de 10
         $camembert->ExplodeSlice(2, 8); // ecarter le dernier secteur de 10
         $camembert->ExplodeSlice(3, 8); // ecarter le dernier secteur de 10
         $camembert->value->SetFormat('%.2f%%'); // 2 chiffres decimaux
   // --- Ajouter au conteneur graphique
         $graph->Add($camembert);
   // --- Envoyer au navigateur
         $graph->Stroke();
      }
   
   }
   else{
   $donnees = array(100);
   $acte = array('Patiente');
   // --- Creer le conteneur graphique
   $graph = new PieGraph(825, 450);
   $graph->title->Set("POURCENTAGE DES ACTIVITES"); // titre du graphique
   // --- Creer le diagramme a secteurs
   $camembert = new PiePlot3d($donnees);
   $camembert->SetLegends($acte);
   // --- Personnaliser
   $camembert->SetSize(0.4); // dimension du rayon
   $camembert->SetCenter(0.4, 0.6); // position du centre
   $camembert->SetAngle(45); // inclinaison
   $camembert->SetStartAngle(75); // angle de depart du 1er secteur
   $camembert->SetHeight(50); // epaisseur des secteurs
   $camembert->SetTheme('sand'); // theme de couleur
   $camembert->value->SetFormat('%.2f%%'); // 2 chiffres decimaux
   // --- Ajouter au conteneur graphique
   $graph->Add($camembert);
   // --- Envoyer au navigateur
   $graph->Stroke();
   }
  ?>