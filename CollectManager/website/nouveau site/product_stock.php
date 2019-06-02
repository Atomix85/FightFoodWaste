<?php 
	if(!isset($_GET["id"])) die("NOK");
	if(!isset($_GET["grp"])) die("NOK");
?>

<div class="row">
	<div id="err_stock" style="color:red" class="col-sm-12">
	</div>
	<?php echo "<input type='hidden' id='product' value='".$_GET["id"]."'>";
	echo "<input type='hidden' id='grp' value='".$_GET["grp"]."'>"; ?>
	<div class="form-group col-sm-3">
		<label for="entrepot" class="form-label">Entrepot :</label>
		<input type="number" class="form-control" id="entrepot">
	</div>
	<div class="form-group col-sm-3">
		<label for="secteur" class="form-label">Secteur :</label>
		<input type="number" class="form-control" id="secteur">
	</div>
	<div class="form-group col-sm-3">
		<label for="couloir" class="form-label">Couloir :</label>
		<input type="number" class="form-control" id="couloir">
	</div>
	<div class="form-group col-sm-3">
		<label for="bloc" class="form-label">Bloc :</label>
		<input type="number" class="form-control" id="bloc">
	</div>
	<center>
		<button class="btn btn-primary" onclick="addProductStock();">Valider</button>
	</center>
</div>