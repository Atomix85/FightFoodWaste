<?php
	try{
		$pto = new PDO("mysql:host=localhost;dbname=ffw","phpmyadmin","sexecool");
	}catch(Exception $ex){
		die($ex);
	}
	
	$request = $pto->prepare("
		INSERT INTO PRODUCTS (idProduct,fk_group_product,name,quantity_unit,quantity)
		VALUES (:id, 7,:name,:unity,:quantity)
		");
	$request->execute(array(
		id => $_POST["idProduct"],
		name =>  $_POST["name"],
		quantity =>  $_POST["quantity"],
		unity => $_POST["unity"]
	));
	echo "ok";
?>

INSERT INTO [table1] ([data]) 
OUTPUT [inserted].[id], [external_table].[col2] 
INTO [table2] SELECT [col1] 
FROM [external_table] 