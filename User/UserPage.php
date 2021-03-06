<?php
	session_start();
	if(!isset($_SESSION['brind'])){
        header('Location: index.php');
        exit();
    }
    $id=$_SESSION['brind'];
    $connection=new mysqli("localhost","root","","imdb",3308);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>korisnik strana</title>
	<style>
			th,td,tr{text-align:center;}
	</style>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style4.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>E-korisnik portal</h3>
                <strong>IMDB</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">
                        
                        Pretraga po nazivu filma
                    </a>
                </li>
                <li>
                    <a href="pretraga_zanr.php">
                        Pretraga po zanru filma
                    </a>
                </li>
                <li>
                    <a href="Logout.php">
                        <i class="fas fa-user"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
   						<span>Skupi/Proširi</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	                    <ul class="nav navbar-nav ml-auto">
	                    <li>
	                    <?php
	                        $query="SELECT * from korisnik where id_korisnik='$id'";
	                        $result=$connection->query($query);
	                        $result=$result->fetch_all(MYSQLI_ASSOC);
	                        foreach($result as $rez){
	                            echo $rez['ime']." ".$rez['prezime'];
	                        }
	                        
	                    ?>
	                    </li>
	                    </ul>
                    </div>
                </div>
            </nav>

  			<div>
					
					
					<table class="table table-bordered mb-5" >
					<thead>
						<tr class="table-success">
							<th>ID</th>
							<th>Poster</th>
							<th>Naslov</th>
							<th>Srednja Ocena</th>
							<th>Glasalo</th>
						</tr>
					</thead>
					<?php
					
						
						
						$query = "SELECT * FROM film ";
						$result = $connection->query($query);
						$j=0;
						foreach ($result as $row) {
							$j+=1;
						?>
						
						<tr>
							<td> <?php echo $j ?></td>
							<td > <?php $image = file_get_contents('./upload/'.$row['slika']); //ovo promeni kod usera
										//header("Content-type: image/jpeg");
									echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width: 70px; height: 70px; padding-top: 5px;" >'; ?></td>
							<td> <?php echo $row['naslov'] ?></td>
							<td> <?php echo $row['s_ocena'] ?></td>
							<td> 	<?php echo $row['b_glasova'] ?></td>
						</tr>
						<?php
					}
							
					?>
				</table>
			</div>
	    </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>