<?php
/*
Création semi-automatique d'un questionnaire

Philippe MICHEL
<philippe_at_docteur-michel.fr>
12/10/2017
Licence GNU 3.0

Les données doivent être contenues dans une table MySQL nommée "test"
dans cet exemple

Les variables sont :
nom : code de la variable
titre : intitulé de la question
post : une indication qui veint aen fin de ligne (par ex : une unité)
mini & maxi : minimum & maximum pour les données numériques
base : table qui contient les intitulés pour des boutons radio ou une
liste déroulante par ex.

----------------------------------------------------------------

   Connection à la base de données via une page ddédiée
*/
include('connect.php');
/*
Liaison à la table
*/
$reponse = $base->query('SELECT * FROM test ORDER BY ordre');
/*
Pour chaque ligne du tableau
*/
while ($donnees = $reponse->fetch())
{
$knom = $donnees['nom'];
$klab = '<p><label for = "'.$knom.'">'.$donnees['titre'].'</label> &nbsp;';
$kfin = ' &nbsp;'.$donnees['post'].'</p>';
/* -----------------------------------------------
Texte court
*/ 
if ($donnees['type'] == "texte")
{
$quest = '<input type="TEXT" name="'.$knom.'" id = "'.$knom.'" size
="20">';
echo $klab.$quest.$kfin;
}
/* -----------------------------------------------
Nombre entier
*/
if ($donnees['type'] == "nombre")
{
$quest = '<input type="NUMBER" name="'.$knom.'" id = "'.$knom.'"
min="'.$donnees['mini'].'" max="'.$donnees['maxi'].'">';
echo $klab.$quest.$kfin;
}
/* -----------------------------------------------
Boutons radio
Les intitulés des boutons sont situés dans la table tab1
*/
elseif ($donnees['type'] == "radio")
{
$radio1 = $base->query('SELECT * FROM sexe');
$quest = " ";
while ($radio = $radio1->fetch())
{
$quest = $quest.'&nbsp; <input type="RADIO" Name="'.knom.
'"id = "'.knom.
'" value="'.$radio['nom'].
'">'.$radio['nom'];
}
echo $klab.$quest.$kfin;
}
/* -----------------------------------------------
Boutons radio en oui/non
*/
elseif ($donnees['type'] == "ouinon")
{
$quest = '<input type="RADIO" Name="'.knom.
'" id="'.knom.
'" value="oui">Oui &nbsp;<input type="RADIO" Name="'.knom.
'" id="'.knom.
'" value="non"> Non';
echo $klab.$quest.$kfin;
}
/* -----------------------------------------------
Boutons radio en oui/non/NSP
*/
elseif ($donnees['type'] == "ouinonnsp")
{
$quest = '<input type="RADIO" Name="'.knom.
'" id="'.knom.
'" value="oui">Oui &nbsp;<input type="RADIO" Name="'.knom.
'" id="'.knom.
'" value="non"> Non &nbsp;<input type="RADIO" Name="'.knom.
'" id="'.knom.
'" value="nsp"> NSP'; 
echo $klab.$quest.$kfin;
}
/* -----------------------------------------------
Liste déroulante
Les intitulés des boutons sont situés dans la table tab1
*/
elseif ($donnees['type'] == "liste")
{
echo $klab;
echo '<select name="'.$knom.
  '" id="'.$knom.
  '">';
  $requete=$base->query('SELECT * FROM knauss');
 while($art = $requete->fetch()){
    $val=$art["nom"];
     echo '<option value="'.$val .'" ';
        echo '>'.$val.'</option>';}
echo '</select></P>';
}
elseif ($donnees['type'] == "autre")
{
$quest='<textarea name="'.knom.'" rows="8" cols="40"></textarea>';
echo $klab.$quest.$kfin; 
}
}
?>

