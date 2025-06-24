<!-
<!doctype html>
<html>
<head>
<title>Ena Agadir</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

h1
{
	text-align: center;

}
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
 /* button {
  background-color: #339DFF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
} */
.button {
        background-color: #1c87c9;
        border: none;
        color: white;
        padding: 20px 34px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        text-align: center;
      }

.button:hover {
  opacity: 0.8;
} 
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
  border: 1px solid black; 
}
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
html {
  scroll-behavior: smooth;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 50px;
}
td {
  text-align: center;
}

#tb tr:nth-child(even) {
  background-color: #eee;
}
#tb tr:nth-child(odd) {
 background-color: #fff;
}
#tb th {
  background-color: #fff;
  color: black;
}
 form 
 {
    padding: 40px 18px;
 }
 #cpt 
 {
     padding: 40px;
     font-family: Arial, Helvetica, sans-serif;
     font-size: 50px;
 }
 a:hover {
  color: hotpink;
}
#write
 {
     text-align: center;
     color: blue;
}
h2
 {
     text-align: center;
}
#tb
{
  margin-bottom: 10px;
}
 
</style>

</head>

<body>
    

 <div class="imgcontainer">
    <img src="e.jpg" alt="Avatar" class="avatar">
	<h2>Liste des candidats retenus pour passer le concours d’accès à l’École Nationale d’Architecture d'Agadir le 28 Juillet 2024 à 07:30</h2>
	<h2 id="write"> Le seuil de présélection a été fixé à 15.27</h2>
	
	<h4 > Les candidats sont sélectionnés en fonction de leur moyenne calculée selon la formule suivante : 75 % de la note de l’examen national et 25 % de la note de l’examen régional du baccalauréat.</h4>
	

  </div>

<form action="" method="post">
  
    <div class="container" style="background-color:#f1f1f1">
      <h2>Veuillez saisir votre CNE et CIN pour télecharger
          la convocation pour passer le concours écrit </h2>
    </div>
  <div class="container">
    <label for="get_CNE"><b>CNE</b></label>
    <input type="text" placeholder="Entrer votre code nationale d'étudiant 'CNE'" name="get_CNE"  required>

    <label for="get_CIN"><b>CIN</b></label>
    <input type="text" placeholder="Entrer votre carte d'Identité Nationale 'CIN'" name="get_CIN"  required>

    <div class="center">
    <button type="submit" name="search_by_id" onclick="window.location.href='#GOPDF'" class="button">Rechercher</button>
    
    </div>    
    
    
    
  </div>


</form>


    
</body>
</html>

<?php
/*
$host = 'localhost';
$db   = 'enaagadir_Liste';
$user = 'enaagadir_test';
$pass = '99676857taha';
$port = "3306";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;$port";
try {
     $conn = new \PDO($dsn, $user, $pass, $options);
     
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

*/

$servername = "localhost";
$username = "enaagadir_test";
$password = "99676857taha";

try {
  $conn = new PDO("mysql:host=$servername;dbname=enaagadir_liste", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo ".";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

 if (isset($_POST["search_by_id"])) 
 {
     $cne = $_POST["get_CNE"];
     $cin = $_POST["get_CIN"];
 	$queri = $conn->prepare("select * from Concours_2024 where CNE = '$cne' and CIN = '$cin'");
 	$queri->execute();

 	if ($queri->rowcount())
 	{
 		while ($etudiant = $queri->fetch()) 
 		{
       ?>

<table style="width:100%" id="tb">
<caption id="cpt"></caption>
  <tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>CNE</th>
    <th>CIN</th>
    <th>Numéro d'éxamen</th>
    <th>Numéro de la Salle</th>
    
  </tr>
  <tr>
    <td><?php echo $etudiant['NOM'];?></td>
    <td><?php echo $etudiant['PRENOM'];?></td>
    <td><?php echo $etudiant['CNE'];?></td>
    <td><?php echo $etudiant['CIN'];?></td>
    <td><?php echo $etudiant['Numero'];?></td>
    <td><?php echo $etudiant['Numero_Salle'];?></td>
    
  </tr>
</table> 
<div class="center">
<a id="GOPDF" class="button" target="_blank" href="ConvocationPDF.php?etudiantCIN=<?php echo $etudiant['CIN'];?>">Télecharger votre convocation</a>
</div>
 			<?php
 		}
 	}
   
 	else
 	{
     

     ?>
    <div class="container" style="background-color:#f1f1f1" id="GOPDF">
    <h2 id="write">Données Eronnées, Veuillez Vérifier votre CNE et CIN pour télecharger
     la convocation </h2>
     <h4 style="text-align: center">Si vous rencontrez des difficultés à télécharger votre convocation, veuillez nous contacter par email à "Convocation@enaagadir.ac.ma" après avoir vérifié que votre moyenne est égale ou supérieure à 15.27, calculée selon la formule suivante : 75 % de la note de l’examen national et 25 % de la note de l’examen régional du baccalauréat. 
   
  </div>
  
    
    <?php  
 	}
   
 }
 ?>

 	 

















































<!-- <style>
body {
  background-color: lightblue;
  text-align: center;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
#lienList {
  text-align: center;
  color: red;
}
</style>

</head>

<body>
	
	<h1>Résultats de préselection pour passer le concours ENA 2021</h1>
	
	<a target="_blank" href="http:enaagadir.ma/wp-content/uploads/2021/06/decision.pdf" id="lienList">la liste des condidats retenus pour passer le concours</a>





	<form action="" method="post">
		
		<input type="text" name="get_CNE" placeholder="CNE" required> <br>
		<input type="text" name="get_CIN" placeholder="CIN" required> <br>

		<button type="submit" name="search_by_id">Télecharger la convocation</button>
		
    </form>
</body>
</html>

<?php

//  Create connection
//  $conn = new PDO("mysql:host=localhost;dbname=enaagadir", 'root','');

//  if (isset($_POST["search_by_id"])) 
//  {
//      $cne = $_POST["get_CNE"];
//      $cin = $_POST["get_CIN"];
//  	$queri = $conn->prepare("select * from Table_test where CNE = '$cne' and CIN = '$cin'");
//  	$queri->execute();

//  	if ($queri->rowcount())
//  	{
//  		while ($etudiant = $queri->fetch()) 
//  		{
//  			echo $etudiant['CNE'];
//  			echo $etudiant['CIN'];
//  			echo $etudiant['Nom'];
 			?>
 		//	<a target="_blank" href="ConvocationPDF.php?etudiantCIN=<?php echo $etudiant['CIN'];?>">Download convocation </a>
 			<?php
//  		}
//  	}
//  	else
//  	{
//          echo "data not found";
//  	}
   
//  }
 ?>
<script type="text/javascript">
        var count = 0;
        var btn = document.getElementById("lienList");
        var disp = document.getElementById("write");
  
        btn.onclick = function () {
            count++;
            disp.innerHTML = count;
        }
    </script>
 	 -->
