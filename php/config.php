<?php
 $db = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr','mert.epsileli','VweYOT4b','mert_epsileli') or die(mysqli_connect_error());
   if(!$db){
       echo 'Cannot connect!';
   }
?>