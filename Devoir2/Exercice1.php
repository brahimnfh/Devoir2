<?php
    function separate($string,$car) {
        // on coupe la chaine stockée dans la variable $string en utilisant le délimiteur qu'on a mis dans la variable $car
        // pour délimiter cette chaine on a utilisée la fonction explode
        $array = explode($car,$string);
        return $array;
    }

    // appel de la fonction nommée separate
    $array = separate("chaine1|chaine2|chaine3","|");
    // affichage du tableau array en utilisant la boucle for
    for($i=0;$i<count($array);$i++)
    {
        echo $array[$i]."<br>";
    }
    /*résultat de l'affichage : 
        chaine1
        chaine2
        chaine3
    */
?>