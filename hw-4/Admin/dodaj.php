<?php
if (isset($_POST['submit'])){
 $connection=new mysqli("localhost","root","","imdb",3308);
 $zanri = count($_POST["zanr"]);
 $glumac = count($_POST["ime"]);
 
 $naslov=$_POST["naziv"];
 
$opis=trim($_POST['opis']);
 $scenarista=$_POST["scenarista"];
 
 $reziser=$_POST["reziser"];
 $prod_kuca=$_POST["prod_kuca"];
 $godina=$_POST["godina"];
 
 $trajanje=$_POST["trajanje"];
 $s_ocena=0.0;
 $b_glasova=0;
 

$query="INSERT INTO film(naslov, opis, scenarista,  reziser, prod_kuca, godina, trajanje, s_ocena, b_glasova, slika) VALUES ('$naslov','$opis','$scenarista','$reziser','$prod_kuca','$godina','$trajanje','$s_ocena','$b_glasova','')";
$result1=$connection->query($query);




//GRESKA
$query="SELECT MAX(id_film) AS id FROM film";
$result=$connection->query($query);
$rez=$result->fetch_array();
$id_film = $rez[0];

$opis=trim($_POST['opis']);


$targetDir =  realpath(dirname(__FILE__));
$fileName = basename($_FILES["file"]["name"]);
$novid=str_replace('\\','_',$id_film);
$fileName=$novid.'.png';
$targetDir='../User';
$targetFilePath = $targetDir ."\upload"."\\". $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

//$query="UPDATE film SET slika='$fileName' WHERE id_film='$id_film['id']'";
$query="UPDATE film SET slika='$fileName' WHERE id_film='$id_film'";
$result3=$connection->query($query);

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
                    $query = "INSERT INTO film_glumac(id_film,id_zanr) VALUES('$id_film','$id_zanr')";
                    $result=$connection->query($query);
                }
            }
      }  
      
 }  
 else  
 {  
      echo "Please Enter Name";  
 }
}

header('Location: index.php');
 ?> 