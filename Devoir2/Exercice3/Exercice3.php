<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date</title>
</head>
<body>
<h3>Choisir une date</h3>
<form action="valideDate.php" method="post">
    <label for="jour">Jour</label> 
    <select name="jour" id="jour" required>
    <?php
    for($i=1;$i<32;$i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
    </select>
    <label for="mois">Mois</label>
    <select name="mois" id="mois" required>
    <?php
    for($i=1;$i<13;$i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
   </select>
    <label for="annee">Année</label> 
    <select name="annee" id="annee" required>
    <?php
    for($i=2010;$i<=date("yy");$i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
    </select>
    <button type="submit" value="enovyer" name="envoyer">Envoyer</button>
</form> 
</body>
</html>