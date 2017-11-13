<?php 
	include_once("connection.php");
	//$query_stmt = "SELECT nome, cognome, anni, genere FROM cantanti";
	$query_stmt = "SELECT nome, cognome FROM accesso.utente";
	$done = false;
	$nome = false;
	$cognome = false;
	if(!empty($_POST['nome'])) {
		$query_stmt = $query_stmt . " where nome LIKE :nome"; 
		$done = true;
		$nome = true;
	}
	if(!empty($_POST['cognome'])) {
		if($done)
			$query_stmt = $query_stmt . " AND ";
		$query_stmt = $query_stmt . " where cognome LIKE :cognome";
		$done = true;
		$cognome = true;
	}
	$stmt=$db_mysql->prepare($query_stmt);
	if($nome){
		$_POST['nome'] = "%" . $_POST['nome'] . "%";
    	$stmt->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR, 50);
	}
    if($cognome){
    	$_POST['cognome'] = "%" . $_POST['cognome'] . "%";
    	$stmt->bindParam(':cognome', $_POST['cognome'], PDO::PARAM_STR, 50);
    }
    $stmt->execute();
    echo "<table>";
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    for($i = 0; $i < $stmt->rowCount(); $i++) {
    	echo "<tr>";
	    echo "<td>" . $row['nome'] . "</td>";
	    echo "<td>" . $row['cognome'] . "</td>";
	    //echo "<td>" . $row['anni'] . "</td>";
	    //echo "<td>" . $row['genere'] . "</td>";
	    echo "</tr>";
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    echo "</table>";
    function echoTag($tag, $elem) {
        echo "<" . $tag . ">" . $elem . "</" . $tag . ">";
    }



 ?>