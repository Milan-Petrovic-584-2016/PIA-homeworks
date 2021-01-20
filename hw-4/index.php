<?php
    session_start();
?>
<html lang="en">
    
    <head>
       <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link 
            rel="stylesheet" 
            href=""
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
            crossorigin="anonymous"
         />
        
        <link rel="stylesheet" href="style.css">
        <title> Prijava Korisnika</title>
    </head>
    <body>
        <!-- Izmeni php login student -->
        <?php
            if (isset($_POST['submit'])){
                $connection=new mysqli("localhost","root","","imdb",3308);
                if ($connection -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $connection -> connect_error;
                    exit();
                }
                $index = $_POST['index'];
                $password=hash('sha512',$_POST['pwd']);
                $query = "SELECT id_korisnik FROM korisnik WHERE (email='$index' OR u_name='$index')  AND sifra='$password'";
                $result = $connection->query($query);
                if(mysqli_num_rows($result)>0){
                    echo"ovde sam";
                    $row=mysqli_fetch_assoc($result);
                    $id=$row['id_korisnik'];
                    $_SESSION['brind']=$id;
                    header('Location: UserPage.php?id='.$id);
                }
                else
                    echo "<script language='javascript'> alert('Pogresan broj indeksa ili sifra.') </script>";
               
            }
        ?>
        <div class="container">
                <div class="form-container sign-in-container">
                    <form method="POST" action="#">
                        <h1>Prijava Korisnika</h1>
                            <span>Prijavi se na svoj nalog</span>
                            <input type="text" id="index" name="index" placeholder="email/usrename"> 
                            <input type="password" id="pwd" name="pwd" placeholder="Šifra">
                            <button type="submit" name="submit" id="submit"> Prijavi se</button>
                    </form>        
                </div>
        
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                <h1>Dobrodošli Korisnice</h1>  
                 <p>Da bi ste imali bolji dozivljaj u pretrazi filma koji želite da gledate. Da bi ste se ulogovali neophodno je da unesete vaš email ili username i šifru. Ako
                    nemate akaunt, kreirajte vaš akaunt  preko linka, koji se nalazi ispod.</p>
                 <p>
                    <b><a href="registracija.php" style="color:white;"> Registruj se</a></b>
                 </p>
                 
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>