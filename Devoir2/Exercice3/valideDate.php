<?php 

    if(isset($_POST['envoyer']))
    {
        //cette fonction nous permet de savoir si une année est bissextile ou non
        function bissextile($annee) {
            if( (is_int($annee/4) && !is_int($annee/100)) || is_int($annee/400)) {
                // cas ou l'annee est bissextile
                return true;
            } else {
                // non bissextile
                return false;
            }
        }
        // srocker les valeurs saisies dans des variables
        $jour = $_POST["jour"];  
        $mois = $_POST["mois"];  
        $annee = $_POST["annee"];  
        // appeler la fonction bissextile
        $bissextile = bissextile($annee); 
        $message="";
        $color="";
        if($bissextile){
            $color="green";
            $message="La date saise";
            $valid = "est valide";
        }
        else{
            $color="red";
            $message="L'annee est non bissextile: ";
            $valid = "Date invalide";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation de date</title>
</head>
<body>
    <h1>Validation de la date</h1>
    <!--Affichage de date-->
    <p>La date saisie est : <b><?php echo $jour."/".$mois."/".$annee; ?></b> </p>
        <!--Affichage de validité si l'année est bissextile-->
    <p><?php echo $message ?><span style="color:<?php echo "$color"; ?>"> <?php echo $valid; ?></span></p>
</body>
</html>