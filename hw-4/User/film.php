<?php
	session_start(); //izmeni
	if(!isset($_SESSION['film'])){
        header('Location: pretraga_zanr.php');
        exit();
    }
    $id=$_SESSION['brind'];
	$id_film=$_SESSION['film'];
    $connection=new mysqli("localhost","root","","imdb",3308);
	
	 if (isset($_POST['save'])) {
		$ratedIndex = $connection->real_escape_string($_POST['ratedIndex']);//ocena od korisnika
		$ratedIndex++;//uvecamo ocenu korisnika, jer smo reangirali od 0 , a ne od 1-10
		
		
		$query = "SELECT * FROM ocenio";
		$result = $connection->query($query);
		if(mysqli_num_rows($result)<1){
			$connection->query("INSERT INTO ocenio (id_korisnik,id_film,ocena) VALUES ('$id','$id_film','$ratedIndex')");
		} else
			$connection->query("UPDATE ocenio SET ocena='$ratedIndex' WHERE id_korisnik='$id'");
		
		exit(json_encode(array('id' => $uID)));
		
		$sql = $connection->query("SELECT id_korisnik FROM ocenio");
		$numR = $sql->num_rows;
		
		$sql = $connection->query("SELECT SUM(ocena) AS total FROM stars");
		$rData = $sql->fetch_array();
		$total = $rData['total'];
		
		$avg = $total / $numR;
		$connection->query("UPDATE film SET s_ocena='$avg',b_glasova='$numR' WHERE id_film='$id_film'");
	}
		
	
	
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>korisnik strana</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style4.css">
	<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
	<script src="rating.js"></script>
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
                    <a href="UserPage.php">
                        
                        Pogledaj listu filmova
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

  			<div style="text-align: center;">
				<?php
					$query="SELECT * from film where id_film='$id_film'";
					$result=$connection->query($query);
					foreach($result as $rez){
					
				?>
				<h1> Opis <?php echo $rez['naslov'];?> filma</h1>
			</div>
			<div id='flex'>
				<div>
					 <?php echo "<img src='./upload/$rez[slika]'  />";?>
					 <div id='ocena'>
						ocena: <?php echo $rez['s_ocena'];?> / broj glasova: <?php echo $rez['b_glasova'];?>
					 </div>
				</div>
				<table class="table table-bordered " >
					<tr>
						<th class="table-success">Godina izdanja:</th>
						<td><?php echo $rez['godina'];?>. godine je izasao</td>
					</tr>
					<tr>
						<th class="table-success">Trajanje</th>
						<td><?php echo $rez['trajanje'];?> minuta traje</td>
					</tr>
						<th class="table-success">
							Scenarista
						</th>
						<td><?php echo $rez['scenarista'];?></td>
					<tr>
						<th class="table-success">
							reziser
						</th>
						<td><?php echo $rez['reziser'];?></td>
					</tr>
					<tr>
						<th class="table-success">Produkciska kuca:</th>
						<td><?php echo $rez['prod_kuca'];?></td>
					</tr>
					<tr>
						<th class="table-success">Lista glumaca:</th>
						<?php
							$glumci="";
							$query="SELECT * from glumac where id_glumca IN (SELECT id_glumca from film_glumac WHERE id_film='$id_film')";
							$result=$connection->query($query);
							foreach($result as  $glumac){
								$glumci.=" ".$glumac['ime']." ".$glumac['prezime']."</br>	";
							}
						?>
						<td><?php echo $glumci;?></td>
						
					</tr>
					<tr>
						<th class="table-success">Zanr:</th>
						<?php
							$zanr="";
							$query="SELECT * from zanr where id_zanr IN (SELECT id_zanr from film_zanr WHERE id_film='$id_film')";
							$result=$connection->query($query);
							foreach($result as  $zanri){
								$zanr.=" ".$zanri['naziv']."</br>	";
							}
						?>
						<td><?php echo $zanr;?></td>
					</tr>
				</table>
			
	        </div>
			<div>
				<h2>Opis</h2>
				<P>
					<?php echo $rez['opis'];?>
				</P>
				<?php
					}
			?>
			</div>
			<div align='center' style="background:#00FFFF;padding: 50px;">
				Ocenite film: 
				<i class="fas fa-star fa-2x " data-index="0"></i>
				<i class="fas fa-star fa-2x " data-index="1"></i>
				<i class="fas fa-star fa-2x " data-index="2"></i>
				<i class="fas fa-star fa-2x " data-index="3"></i>
				<i class="fas fa-star fa-2x " data-index="4"></i>
				<i class="fas fa-star fa-2x " data-index="5"></i>
				<i class="fas fa-star fa-2x " data-index="6"></i>
				<i class="fas fa-star fa-2x " data-index="7"></i>
				<i class="fas fa-star fa-2x " data-index="8"></i>
				<i class="fas fa-star fa-2x " data-index="9"></i>
				
			</div>


		</div>
				
    </div>
	
    
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

<style>
	img{width:15em;height:30em;}
	#ocena{width:15em; text-align: center}
	#flex{display:flex;flex-flow:left}
	th,tr,td{text-align:center;align-self:center;}
	td{text-align:right;}
	tr{width:100%;}
	table{float right;  }
	h2{padding-top:2em;}
	h1{padding-bottom:2em;}
	
	
</style>
</html>
