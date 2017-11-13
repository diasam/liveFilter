
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vendita bibite registration</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
	<style>
	    table, th, td {
	        border: 1px solid black;
	    }
    </style>
    <script>

		function showResult(str, element) {
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("livesearch").innerHTML=this.responseText;
		      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		    }
		  }
		  xmlhttp.open("POST","livesearch.php",true);

		  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xmlhttp.send(element + "=" + str);
		}
	</script>
</head>

<body>
<h1>Home</h1>
<div>
	<?php
		include_once("user.php");
		session_start();

		if(!isset($_SESSION['user_logged'])) {
		    header("location: index.php");
		}
		$user = unserialize($_SESSION['user_logged']);
		echo "<p>Logged as " . $user->getInfo() . "</p>";
	?>
</div>
<div>
	<form method="post">
		<input type="text" size="30" onkeyup="showResult(this.value, this.name)" name="nome" placeholder="nome">
		<input type="text" size="30" onkeyup="showResult(this.value, this.name)" name="cognome" placeholder="cognome">
		<div id="livesearch" style="display:inline" >
			<h2>Results</h2>
		</div>
	</form>
</div>
</body>
</html>