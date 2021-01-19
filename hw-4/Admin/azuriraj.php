<?php
if (isset($_POST['submit'])){
 $connection=new mysqli("localhost","root","","imdb",3308);
 
 
 $naslov=trim($_POST["naziv"]);
 $query="SELECT id_film AS id FROM film WHERE naslov='$naslov'";
 $result=$connection->query($query);
 $rez=$result->fetch_array();
 $id_film = $rez[0];
 echo "$id_film";
 
 if($id_film!=0){
    $Novinaziv=trim($_POST["Novinaziv"]);
    if($Novinaziv!=""){
        $query="UPDATE film SET naslov='$Novinaziv' WHERE id_film='$id_film'";
        $result=$connection->query($query);
    }
    $opis2=trim($_POST['opis']);
    if($opis2!=''){
          $query="SELECT opis FROM film WHERE id_film='$id_film'";
          $result=$connection->query($query);
          $rez=$result->fetch_array();
          $opis1=$rez[0];
          
          $opis=$opis1." ".$opis2;
          $query="UPDATE film SET opis='$opis' WHERE id_film='$id_film'";
          $result=$connection->query($query);      
    }
    
    
    $scenarista=trim($_POST["scenarista"]);
    if($scenarista!=""){
        $query="UPDATE film SET scenarista='$scenarista' WHERE id_film='$id_film'";
        $result=$connection->query($query);
    }
    
    
    $reziser=trim($_POST["reziser"]);
    if($reziser!=""){
        $query="UPDATE film SET reziser='$reziser' WHERE id_film='$id_film'";
        $result=$connection->query($query);
    }
    
    $prod_kuca=trim($_POST["prod_kuca"]);
    if($prod_kuca!=""){
        $query="UPDATE film SET prod_kuca='$prod_kuca' WHERE id_film='$id_film'";
        $result=$connection->query($query);
    }
    
    $godina=$_POST["godina"];
    if($godina!=""){
        $query="UPDATE film SET godina='$godina' WHERE id_film='$id_film'";
        $result=$connection->query($query);
    }
    
    $trajanje=$_POST["trajanje"];
    if($trajanje!=""){
        $query="UPDATE film SET trajanje='$trajanje' WHERE id_film='$id_film'";
        $result=$connection->query($query);
    }
    
    
   
   $targetDir =  realpath(dirname(__FILE__));
   $fileName = basename($_FILES["file"]["name"]);
   if($fileName!= ''){
       $novid=str_replace('\\','_',$fileName);
       $fileName=$novid;
       $targetDir='../User';
       $targetFilePath = $targetDir ."\upload"."\\". $fileName;
       $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
       move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
           
           
       $query="UPDATE film SET slika='$fileName' WHERE id_film='$id_film'";
       $result3=$connection->query($query);
   }
   
   
   $glumac = count($_POST["ime"]);
   if ($glumac > 0) {
   for ($i=0; $i < $glumac; $i++) { 
    if (trim($_POST['ime'] != '') && trim($_POST['prezime'] != '')) {
      $ime   = $_POST["ime"][$i];
      $prezime  = $_POST["prezime"][$i];
              $query =  "SELECT COUNT(id_glumca) FROM glumac WHERE ime = '$ime' AND prezime='$prezime'";
      
      $result=$connection->query($query);
      $rez=$result->fetch_array();
      
      
      $broj = $rez[0];
      
              if($broj!=0){
       
                  $query =  "SELECT id_glumca FROM glumac WHERE ime = '$ime' AND prezime='$prezime'";
        
                  $result=$connection->query($query);
        $rez=$result->fetch_array();
        $id_glumca=$rez[0];
        
                  $query = "INSERT INTO film_glumac(id_film,id_glumca) VALUES('$id_film','$id_glumca')";
                  $result=$connection->query($query);
              }else{
       
                  $query = "INSERT INTO glumac(ime,prezime) VALUES ('$ime','$prezime')";
                  $result=$connection->query($query);
                  
                  $query="SELECT MAX(id_glumca) AS id FROM glumac";
                  $result=$connection->query($query);
        $rez=$result->fetch_array();
        
                  $id_glumca = $rez[0];
                  $query = "INSERT INTO film_glumac(id_film,id_glumca) VALUES('$id_film','$id_glumca')";
                  $result=$connection->query($query);
              }
    }
   }
       
  }else{
       echo "Please Enter user name";
  }
  
  
 $zanri = count($_POST["zanr"]);
    if($zanri > 0)  
    {  
         for($i=0; $i<$zanri; $i++)  
         {  
              if(trim($_POST["zanr"][$i] != ''))  
              {  
                   $zanr  = $_POST["zanr"][$i];
                   $query =  "SELECT COUNT(id_zanr) FROM zanr WHERE naziv = '$zanr'";
                   $result=$connection->query($query);
         $rez=$result->fetch_array();
         $broj = $rez[0];
         if($broj!=0){
                       $query =  "SELECT id_zanr FROM zanr WHERE naziv = '$zanr'";
                       $result=$connection->query($query);
                       $rez=$result->fetch_array();
                       $id_zanr = $rez[0];
                       $query = "INSERT INTO film_zanr(id_film,id_zanr) VALUES('$id_film','$id_zanr')";
                       $result=$connection->query($query);
                   }else{
                       $query = "INSERT INTO zanr(naziv) VALUES ('$zanr')";
                       $result=$connection->query($query);
                       
                       $query="SELECT MAX(id_zanr) AS id FROM zanr";
                       $result=$connection->query($query);
                      $rez=$result->fetch_array();
                       $id_zanr = $rez[0];
                       
                       $query = "INSERT INTO film_zanr(id_film,id_zanr) VALUES('$id_film','$id_zanr')";
                       $result=$connection->query($query);
                   }
               }
         }  
         
    }  
    else  
    {  
         echo "Please Enter Name";  
    }
   
   header('Location: update.php');
 }
 
    echo "taj film ne postoji u bazi".'</br>';
    echo "<a href='update.php'>vrati se na predhodnu stranu</a>";
}


 ?> 