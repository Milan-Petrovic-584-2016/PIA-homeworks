<?php
   session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
       
        <link 
            rel="stylesheet" 
            href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
            crossorigin="anonymous"
         />
        
        <link rel="stylesheet" href="style.css">
        <title> Registracija Korisnika</title>
    </head>
    <body>
        
        <div id="content">
            <?php
                
                if (isset($_POST['submit'])){
                    $connection=new mysqli("localhost","root","","imdb",3308);
                    if ($connection -> connect_errno) {
                        echo "Failed to connect to MySQL: " . $connection -> connect_error;
                        exit();
                    }
                    $ime=$_POST['ime'];
                    $prezime=$_POST['surname'];
                    $Uname= $_POST['Uname'];
                    $password=hash('sha512',$_POST['pwd']);
                    $email=$_POST['email'];
                    $query="INSERT INTO korisnik(ime, prezime, email, u_name, sifra) VALUES ('$ime','$prezime','$email','$Uname','$password')";
                    $result=$connection->query($query);
                    header('Location: index.php');
                
                      

                
                      
                    

                }
            ?>
                
            <div class="container">
	            <div class="form-container sign-in-container">
                    <form method="POST" enctype="multipart/form-data">
                        <h2>Registruj se korisniče</h2>
                        <span> Popunite sve neophodne podatke</span></br>
                        <input type="text" id="ime" name="ime" placeholder="Ime" required>
                        <input type="text" id="surname" name="surname" placeholder="Prezime" required>
                        <input type="text" id="Uname" name="Uname"  placeholder="Korisnicko Ime" required>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                        <input type="password" id="pwd" name="pwd" placeholder="Šifra" required>
                        <button type="submit" name="submit"> Registruj se</button>
                            
                    </form>         
            </div> 
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-right">
                            <h1>Dobrodošao Korisnice</h1>            
                            <p>Neophodno je da kreirate vaš akunt, kako bi smo vam mogoli da Vam preporučimo filomve.</p>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>