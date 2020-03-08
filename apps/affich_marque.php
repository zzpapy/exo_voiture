<?php 
 $manager = new AutoManager($db);
 $test = $manager->affich('FR');
 $test1 = $manager->affichNb();
 foreach ($test1 as $key => $value) {
     # code...
     var_dump($value["nb"]);
     foreach ($value as $key => $value) {
         # code...
     }
 }

?>