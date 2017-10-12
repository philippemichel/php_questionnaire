# php_questionnaire
Création semi automatique d'un questionnaire html à partir de la table des variables.

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

12/10/2017 Premier jet. Peut créer:
   - texte
   - number
   - boutons radio 
   - boutons radio oui/non
   - boutons radio oui/non/NSP
   - liste déroulante
L'appel aux tables via la variable "base" n'est pas encore géré
