<?php 
require '../../class/database.class.php';
$bdd= new Database();
$rechercheRegistre=$_POST['rechercheRegistre'];
$patiente=$bdd->requete("SELECT patiente.id_registre AS id_registre,patiente.nom_patiente AS nom_patiente,patiente.gestite AS gestite,patiente.parite AS parite, DATE_FORMAT(renseignement.naissance, '%d/%m/%Y') AS naissance,renseignement.lieu AS lieu,renseignement.pere AS pere,
renseignement.mere AS mere, renseignement.domicile AS domicile, renseignement.croyance AS croyance, 
renseignement.profession AS profession, renseignement.situation AS situation FROM patiente,
renseignement WHERE (patiente.id_registre LIKE '%$rechercheRegistre%' OR patiente.nom_patiente LIKE '%$rechercheRegistre%') AND patiente.id_registre=renseignement.id_registre");
if($patiente->rowCount()==0)
{
  echo 'tisy';
}
else{
  while( $fetch = $patiente->fetch(PDO::FETCH_ASSOC) )
  {
    $idRegistre = $fetch['id_registre'];
    $nomPatiente = $fetch['nom_patiente'];
    $gestite = $fetch['gestite'];
    $parite = $fetch['parite'];
    $naissance = $fetch['naissance'];
    $lieu = $fetch['lieu'];
    $pere = $fetch['pere'];
    $mere = $fetch['mere'];
    $croyance = $fetch['croyance'];
    $profession = $fetch['profession'];
    $situation = $fetch['situation'];
      $sejour=$bdd->requete("SELECT id_sejour FROM sejour WHERE id_registre='{$idRegistre}'");
      if ($sejour->rowCount()==0) {
        echo "aucune reservation";
      }
      else
      {
                while( $fetch = $sejour->fetch(PDO::FETCH_ASSOC) ){
                 $categorieFinal='';
                 $idSejour = $fetch['id_sejour'];
                 $categ=$bdd->requete("SELECT chambre.code_categorie AS code_categorie FROM sejour,chambre WHERE sejour.id_sejour='{$idSejour}' AND sejour.id_chambre=chambre.id_chambre");
                  while( $fetch = $categ->fetch(PDO::FETCH_ASSOC) ){
                      $categorie=$fetch['code_categorie'];
                    }
                      $categorieFinal=$categorieFinal.$categorie;
                }
            $entree=$bdd->requete("SELECT DATE_FORMAT(date_entree, '%d/%m/%Y') AS dateEntree FROM sejour WHERE id_registre='{$idRegistre}' ORDER BY id_sejour LIMIT 1");
            while( $fetch = $entree->fetch(PDO::FETCH_ASSOC) ){
              $dateEntree=$fetch['dateEntree'];
            }
               $sortie=$bdd->requete("SELECT DATE_FORMAT(date_sortie, '%d/%m/%Y') AS dateSortie FROM sejour WHERE id_registre='{$idRegistre}' ORDER BY id_sejour DESC LIMIT 1");
            while( $fetch = $sortie->fetch(PDO::FETCH_ASSOC) ){
              $dateSortie=$fetch['dateSortie'];
            }
           $examen=$bdd->requete("SELECT GROUP_CONCAT(element) AS groupementElementExam,GROUP_CONCAT(valeur) AS groupementValeurExam FROM examen WHERE id_registre='{$idRegistre}' ");
            if($examen->rowCount()==0){
              $chaineExam="Compléter l'examen clinique avant admission";
            }
            else{
              while( $fetch = $examen->fetch(PDO::FETCH_ASSOC) )
                        {
                      $elementExam=$fetch['groupementElementExam'];
                      $valeurExam=$fetch['groupementValeurExam'];
                      $chaineExam='';
                      $tabElementExam=explode(',', $elementExam);
                      $tabValeurExam=explode(',', $valeurExam);
                      $tailleExam=sizeof($tabElementExam);
                      $h=0;
                      while ( $h<$tailleExam) {
                        $chaineExam.='<b>'.$tabElementExam[$h].' : </b>'.$tabValeurExam[$h].'<br/>';
                        $h++;
                                }
                        }
            }
            recupOperation( $idRegistre,$nomPatiente,$gestite ,$parite,$naissance,$lieu,$pere,$mere,$croyance,$profession,$situation,$dateEntree,$dateSortie,$chaineExam);               

       }
  }
}
function recupCategorie($idRegistre){
  $bdd= new Database();
  $sejour=$bdd->requete("SELECT id_sejour FROM sejour WHERE id_registre='{$idRegistre}'");
  while( $fetch = $sejour->fetch(PDO::FETCH_ASSOC) ){
          $categorieFinal='';
          $idSejour = $fetch['id_sejour'];
            $categ=$bdd->requete("SELECT chambre.code_categorie AS code_categorie FROM sejour,chambre WHERE sejour.id_sejour='{$idSejour}' AND sejour.id_chambre=chambre.id_chambre");
              while( $fetch = $categ->fetch(PDO::FETCH_ASSOC) ){
                $categorie=$fetch['code_categorie'];
              }
              $categorieFinal=$categorieFinal.$categorie;
             }
}
function recupDateEntree( $idRegistre){
  $bdd= new Database();
  $entree=$bdd->requete("SELECT DATE_FORMAT(date_entree, '%d/%m/%Y') AS dateEntree FROM sejour WHERE id_registre='{$idRegistre}' ORDER BY id_sejour LIMIT 1");
            while( $fetch = $entree->fetch(PDO::FETCH_ASSOC) ){
              $dateEntree=$fetch['dateEntree'];
            }
}
function recupSortie( $idRegistre){
  $bdd= new Database();
   $sortie=$bdd->requete("SELECT DATE_FORMAT(date_sortie, '%d/%m/%Y') AS dateSortie FROM sejour WHERE id_registre='{$idRegistre}' ORDER BY id_sejour DESC LIMIT 1");
            while( $fetch = $sortie->fetch(PDO::FETCH_ASSOC) ){
              $dateSortie=$fetch['dateSortie'];
            }
}
function recupExam( $idRegistre){
  $bdd= new Database();
   $examen=$bdd->requete("SELECT GROUP_CONCAT(element) AS groupementElementExam,GROUP_CONCAT(valeur) AS groupementValeurExam FROM examen WHERE id_registre='{$idRegistre}' ");
            if($examen->rowCount()==0){
              $chaineExam="Compléter l'examen clinique avant admission";
            }
            else{
              while( $fetch = $examen->fetch(PDO::FETCH_ASSOC) )
                        {
                      $elementExam=$fetch['groupementElementExam'];
                      $valeurExam=$fetch['groupementValeurExam'];
                      $chaineExam='';
                      $tabElementExam=explode(',', $elementExam);
                      $tabValeurExam=explode(',', $valeurExam);
                      $tailleExam=sizeof($tabElementExam);
                      $h=0;
                      while ( $h<$tailleExam) {
                        $chaineExam.='<b>'.$tabElementExam[$h].' : </b>'.$tabValeurExam[$h].'<br/>';
                        $h++;
                                }
                        }
            }
}
function recupOperation($idRegistre,$nomPatiente,$gestite ,$parite,$naissance,$lieu,$pere,$mere,$croyance,$profession,$situation,$dateEntree,$dateSortie,$chaineExam){
  $bdd= new Database();
  $operation=$bdd->requete("SELECT operation.id_operation AS id_operation, acte.designation AS designation, DATE_FORMAT(operation.date_heure, '%d/%m/%Y') AS dateOperation FROM operation,acte WHERE operation.id_registre='{$idRegistre}' AND operation.id_acte=acte.id_acte LIMIT 1");
            if($operation->rowCount()==0){
              echo "aucune operation";
            }
            else
            {
              while( $fetch = $operation->fetch(PDO::FETCH_ASSOC) )
              {
                $idOperation=$fetch['id_operation'];
                $designation=$fetch['designation'];
                $dateOperation=$fetch['dateOperation'];
                $protocole=$bdd->requete("SELECT DISTINCT id_bebe FROM protocoleA WHERE id_operation='{$idOperation}'");
                $chaineProtocole="";
                $chaineBebe="";
                  while( $fetch = $protocole->fetch(PDO::FETCH_ASSOC) )
                  {
                    $idBebe=$fetch['id_bebe'];
                    $bebe=$bdd->requete("SELECT GROUP_CONCAT(element) AS groupementElement,GROUP_CONCAT(valeur) AS groupementValeur FROM protocoleA WHERE id_bebe='{$idBebe}' AND element IN('date de délivrance','date d\'extraction','heure de délivrance','heure de délivrance','Heure extraction','nom du bébé','Prenom du bébé','Sexe','Etat','Poids','pt','pc','pb','t')");
                    while( $fetch = $bebe->fetch(PDO::FETCH_ASSOC) )
                    {
                      $elementBebe=$fetch['groupementElement'];
                      $valeurBebe=$fetch['groupementValeur'];
                      $chaine='';
                      $tabElementBebe=explode(',', $elementBebe);
                      $tabValeurBebe=explode(',', $valeurBebe);
                      $taille=sizeof($tabElementBebe);
                      $i=0;
                      while ( $i<$taille AND $tabElementBebe[$i]!='') {
                        $chaine.='<b>'.$tabElementBebe[$i].' : </b>'.$tabValeurBebe[$i].'<br/>';
                        $i++;
                      }
                      
                    }
                    $chaineBebe.='<b style=\'text-decoration:underline\'>Bébé N°'.$idBebe.':</b><br/>'.$chaine.'<br/>';
                    $protocoleDetails=$bdd->requete("SELECT GROUP_CONCAT(element) AS groupementElementPro,GROUP_CONCAT(valeur) AS groupementValeurPro FROM protocoleA WHERE id_bebe='{$idBebe}' AND element NOT IN('date de délivrance','date d\'extraction','heure de délivrance','heure de délivrance','Heure extraction','nom du bébé','Prenom du bébé','Sexe','Etat','Poids','pt','pc','pb','t')");
                        while( $fetch = $protocoleDetails->fetch(PDO::FETCH_ASSOC) )
                        {
                      $element=$fetch['groupementElementPro'];
                      $valeur=$fetch['groupementValeurPro'];
                      $chainePro='';
                      $tabElement=explode(',', $element);
                      $tabValeur=explode(',', $valeur);
                      $taille1=sizeof($tabElement);
                      $j=0;
                      while ( $j<$taille1) {
                        $chainePro.='<b>'.$tabElement[$j].' : </b>'.$tabValeur[$j].'<br/>';
                        $j++;
                                }
                        }
                        $chaineProtocole.='<b style=\'text-decoration:underline\'>Protocole '.$idBebe.':</b><br/>'.$chainePro.'<br/>';
                      }
                      echo "<tr style='font-size:15px;'>
                                <td class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='border: 1px solid rgb(180,180,180)'>
                                      <b>N° registre : </b> $idRegistre<br/>
                                      <b>Nom :</b> $nomPatiente<br/>
                                      <b>Date naissance : </b> $naissance<br/>
                                      <b>Lieu naissance :</b> $lieu<br/>
                                      <b>Nom père : </b> $pere<br/>
                                      <b>Nom mère :</b> $mere<br/>
                                      <b>Croyance : </b> $croyance<br/>
                                      <b>Profession :</b> $profession<br/>
                                      <b>Situation : </b> $situation<br/>
                                </td>
                                <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='border: 1px solid rgb(180,180,180)'>
                                      <b>Entrée : </b> $dateEntree<br/>
                                      <b>Acte : </b>$designation<br/>
                                      <b>Date acte : </b>$dateOperation<br/>
                                      <b>Sortie : </b> $dateSortie<br/>
                                </td>           
                                <td class='col-lg-1 col-md-1 col-sm-1 col-xs-1' style='border: 1px solid rgb(180,180,180)'>
                                      <b>Gestité:</b> $gestite
                                </td>
                                <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='border: 1px solid rgb(180,180,180)'>
                                        $chaineProtocole
                                </td>           
                                <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='border: 1px solid rgb(180,180,180)'>
                                        $chaineBebe
                                </td>
                                <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='border: 1px solid rgb(180,180,180)'>$chaineExam</td>
                            </tr>";
            
              } 
          }
}