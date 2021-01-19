<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Izmeni film</title>

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
                <h3>E-admin portal</h3>
                <strong>AP</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.php">
                        
                        Dodaj film
                    </a>
                </li>
                <li>
                    <a href="update.php">
                        
                        Azuriraj film
                    </a>
                </li>
                <li>
                    <a href="delete.php.php">
                        
                        Obrisi film
                    </a>
                </li>
                <li>
                    <a href="viev.php">
                        
                        Vidi listu filmova
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
                        Admin
	                    </li>
	                    </ul>
                    </div>
                </div>
            </nav>

  		<form  method="POST" action="azuriraj.php" enctype="multipart/form-data">
  			<div  style="text-align: center">
					<div class="form-group ">
						<!--
							trazeni
						-->
						<label for="naziv">Unesite precizno naziv filma koji zelite da menjate</label>
					   <input type="text" class="form-control" id="naziv" name="naziv" placeholder="Naziv filma" >
					</div>
				
					<div class="form-group ">
						<!--
							naziv
						-->
						<label for="Novinaziv">novi Naziv filma</label>
					   <input type="text" class="form-control" id="Novinaziv" name="Novinaziv" placeholder="Naziv filma">
					</div>
							
						<!--
							opis
						-->
							
					<div class="form-group">
							<label for="opis">Opis filma(opis se azurira tako sto se na kraju postojeceg opisa dodaje novi)</label>
							<textarea class="form-control" id="opis" name="opis" rows="10" cols="60"></textarea>
					</div>
					<div class="form-group">
						<!--
							zanr
						-->
						<div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="zanr[]" placeholder="Unesi naziv zanra" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Dodaj jos jedan zanr</button></td>  
                                    </tr>  
                               </table> 
						
						</div>
					</div>
					
					<div class="form-group">
						<!--
							scenarista
						-->
						<label for="scenarista">Scenarista</label>
					   <input type="text" class="form-control" id="scenarista" name="scenarista" placeholder="Scenarista">
					</div>
					<div class="form-group">
						<!--
							reziser
						-->
						<label for="reziser">Reziser</label>
					   <input type="text" class="form-control" id="reziser" name="reziser" placeholder="Reziser">
					</div>
					<div class="form-group">
						<!--
							producentska kuca
						-->
						<label for="prod_kuca">Producentska kuca</label>
					   <input type="text" class="form-control" id="prod_kuca" name="prod_kuca" placeholder="Producentska kuca">
					</div>
					<div class="form-group">
						<!--
							lista glumaca
						-->
						<div class="table-responsive">  
                              <table class="table table-bordered" id="dynamic_field1">  
                                 <tr>
												<td><input type="text" name="ime[]" placeholder="Unesite ime glumca" class="form-control name_list" /></td>
												<td><input type="text" name="prezime[]" placeholder="Unesite preizme glumca" class="form-control name_list" /></td>
												<td><button type="button" name="add1" id="add1" class="btn btn-primary">Dodaj jos jednog glumca</button></td>  
											</tr> 
                              </table> 
						
						</div>
					</div>
					<div class="form-group">
						<!--
							godina izdanja
						-->
						<label for="godina">Godina izdanja</label>
					   <input type="number" class="form-control" id="godina" name="godina" placeholder="Godina izdanja">
					</div>
					<div class="form-group">
						<!--
							slika
						-->
						<label for="file">Okaci poster filma(MAX 2MB):</label>
					   <input type="file" id="file"  name="file">
					</div>
					<div class="form-group">
						<!--
							trajanje u minutima
						-->
						<label for="trajanje">Trajanje u minutima</label>
					   <input type="number" class="form-control" id="trajanje" name="trajanje" placeholder="Trajanje u minutima">
					</div>
						  
               <div class="form-group">
						 <input type="submit" name="submit" id="submit" class="btn btn-info" value="Izmeni film" /> 
					
					</div>
				
			</div>
  		</form>
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
<script>  
 $(document).ready(function(){  
      var i=1;  //za zanr
		var j=1;	 //za glumca	
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="zanr[]" placeholder="Unesi naziv zanra" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");
           $('#row'+button_id).remove();  
      });
		
		$('#add1').click(function(){
           j++;  
           $('#dynamic_field1').append('<tr id="row0'+j+'"><td><input type="text" name="ime[]" placeholder="Unesite ime glumca" class="form-control name_list" /></td><td><input type="text" name="prezime[]" placeholder="Unesite preizme glumca" class="form-control name_list"/></td><td><button type="button" name="remove1" id="'+j+'" class="btn btn-danger btn_remove1">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove1', function(){  
           var button_id = $(this).attr("id");
           $('#row0'+button_id).remove();  
      });  
 });  
 </script>

