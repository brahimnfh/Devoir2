<?php
   $fp = fopen("commandes.txt","r");
        
   echo '<h2>Commande clients</h2>
   <table border="1">
   <thead style="background: lightgrey;">
   <tr>
   <th>Numéro commande</th>
   <th>Numéro client</th>
   <th>Date de commande</th>
   <th>Designation article</th>
   <th>Quantité (PAL)</th>
   <th>Prix Unitaire (HT)</th>
   <th>Date de livraison</th>
   <th>Adresse client</th>
   </tr>
   </thead>
   <tbody>';
   while(!feof($fp))
   {
       echo '<tr>';
       $ligne = explode ('|' , fgets($ligne,1024));
       for($i=0;$i<count($ligne);$i++) {
           echo "<td>".$ligne[$i]."</td>";
       }
       echo '</tr>';
   }
   echo '</tbody>';
   echo '</table>';

   fclose($fp);

?>