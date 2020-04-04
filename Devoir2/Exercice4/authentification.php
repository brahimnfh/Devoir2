<?php

    // on crée des fonctions des validation en utilisant les expression régulière
    function emailV($email) {
        if (preg_match_all('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/im',$email)) 
            return true;
        else 
            return false;
    }
    function passwordV($password) {
        if (strlen( $password) >= 8 && preg_match('/\d/',$password) && preg_match('/[^A-Za-z0-9]/',$password) && preg_match('/[A-Z]+/',$password)) 
            return TRUE;
        else 
            return FALSE;
    }

    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {
        //appel des fonctions de validation
        if(emailV($_POST['email']) && passwordV($_POST['mot_de_passe'])) {
            //ouvrir le fichier login.txt en mode lecture r
            $accounts = fopen("login.txt","r");
            $passvalid = FALSE;
            $emailvalid = FALSE;
            //boucler sur le fichier ouvert
            while(!feof($accounts))
            {
                list($email, $pass) = explode (' | ' , fgets($accounts,1024));
                $pass = trim($pass); // pour supprimer \n du mot de passe
                // valider si le mot de passe et l'email sont valides
                if(($email == $_POST['email']) && ($pass == $_POST['mot_de_passe']))
                {   
                    $passvalid = TRUE;
                    $emailvalid = TRUE;
                    echo "<p style='color:green'>Authentification réussite</p>";
                    break;
                }
                else {
                    // valider si le mot de passe est invalide
                    if (($email == $_POST['email']) && ($pass != $_POST['mot_de_passe']))
                    {
                        echo "<p style='color:red'>Mot de passe invalide</p>";
                        $emailvalid = TRUE;
                    break;
                    }
                    // si l'email est invalide
                    if (($email != $_POST['email']) && ($pass == $_POST['mot_de_passe']))
                    {
                        echo "<p style='color:red'>Email invalide</p>";
                        $passvalid = TRUE;
                    break;
                    }

                }   
            }
            //si les deux sont invalides
            if ($passvalid == FALSE && $emailvalid == FALSE)
            {
                echo "<h2>Login inexistant et Mot de passe invalide</h2>";
            }
            fclose($accounts);
        }
        else 
            echo "<p style='color:red'>Merci de vérifier votre adresse et votre mot de passe</p>";
    }


?>