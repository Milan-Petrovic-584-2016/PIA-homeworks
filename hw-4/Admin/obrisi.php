<?php
if (isset($_POST['submit'])){
 $connection=new mysqli("localhost","root","","imdb",3308);
 
 
 $naslov=trim($_POST["naziv"]);
 $query="SELECT id_film AS id FROM film WHERE naslov='$naslov'";
 $result=$connection->query($query);
 $result=$result->fetch_all(MYSQLI_ASSOC);
 foreach ($result as $id_film) {
    $query="DELETE FROM ocenio WHERE id_film='$id_film[id]'";
    $res=$connection->query($query);
    
    $query="DELETE FROM film_glumac WHERE id_film='$id_film[id]'";
    $res=$connection->query($query);
    
    $query="DELETE FROM film_zanr WHERE id_film='$id_film[id]'";
    $res=$connection->query($query);
 }
 $query="DELETE FROM film WHERE naslov='$naslov'";
 $result=$connection->query($query);
    header('Location: delete.php');
}


 ?> 