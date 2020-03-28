<!DOCTYPE html>
<html>
<head>
	<title>IslandOfLoves</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<center>
	<div class="card" style="width: 18rem;margin-left: 15%">
	  <img src="{{ url('/images/iolmois.png/' )}}" class="card-img-top" alt="...">
	  <div class="card-body">
		<form>
		  <div class="form-group">
		    <label for="amound">Amound</label>
		    <input type="text" class="form-control" id="amound" aria-describedby="amountHelp" name="amount" placeholder="entrer votre compte">
		    <small id="emailHelp" class="form-text text-muted">Vos informations sont en securité.</small>
		  </div>
		  <button type="submit" class="btn btn-primary">Souscrire</button>
		</form>
	  </div>
	</div>
</center>




<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>