<?php
   
   Include_once 'fpdf/fpdf.php' ;
   //require('fpdf/makefont/makefont.php');

   class PDF extends FPDF
	{
		function __construct()
		{
			parent::__construct();
		}

		function MultiCell($w, $h, $txt, $border=0, $align='J', $fill=false)
		{
			parent::MultiCell($w, $h, $this->normalize($txt), $border, $align, $fill);
		}

		function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
		{
			parent::Cell($w, $h, $this->normalize($txt), $border, $ln, $align, $fill, $link);
		}

		function Write($h, $txt, $link='')
		{
			parent::Write($h, $this->normalize($txt), $link);
		}

		function Text($x, $y, $txt)
		{
			parent::Text($x, $y, $this->normalize($txt));
		}

		protected function normalize($word)
		{
			// Thanks to: http://stackoverflow.com/questions/3514076/special-characters-in-fpdf-with-php
			$word = str_replace("°","%B0",$word);
			$word = str_replace("/","%27",$word);
			$word = str_replace("@","%40",$word);
			$word = str_replace("`","%60",$word);
			$word = str_replace("¢","%A2",$word);
			$word = str_replace("£","%A3",$word);
			$word = str_replace("¥","%A5",$word);
			$word = str_replace("|","%A6",$word);
			$word = str_replace("«","%AB",$word);
			$word = str_replace("¬","%AC",$word);
			$word = str_replace("¯","%AD",$word);
			$word = str_replace("º","%B0",$word);
			$word = str_replace("±","%B1",$word);
			$word = str_replace("ª","%B2",$word);
			$word = str_replace("µ","%B5",$word);
			$word = str_replace("»","%BB",$word);
			$word = str_replace("¼","%BC",$word);
			$word = str_replace("½","%BD",$word);
			$word = str_replace("¿","%BF",$word);
			$word = str_replace("À","%C0",$word);
			$word = str_replace("Á","%C1",$word);
			$word = str_replace("Â","%C2",$word);
			$word = str_replace("Ã","%C3",$word);
			$word = str_replace("Ä","%C4",$word);
			$word = str_replace("Å","%C5",$word);
			$word = str_replace("Æ","%C6",$word);
			$word = str_replace("Ç","%C7",$word);
			$word = str_replace("È","%C8",$word);
			$word = str_replace("É","%C9",$word);
			$word = str_replace("Ê","%CA",$word);
			$word = str_replace("Ë","%CB",$word);
			$word = str_replace("Ì","%CC",$word);
			$word = str_replace("Í","%CD",$word);
			$word = str_replace("Î","%CE",$word);
			$word = str_replace("Ï","%CF",$word);
			$word = str_replace("Ð","%D0",$word);
			$word = str_replace("Ñ","%D1",$word);
			$word = str_replace("Ò","%D2",$word);
			$word = str_replace("Ó","%D3",$word);
			$word = str_replace("Ô","%D4",$word);
			$word = str_replace("Õ","%D5",$word);
			$word = str_replace("Ö","%D6",$word);
			$word = str_replace("Ø","%D8",$word);
			$word = str_replace("Ù","%D9",$word);
			$word = str_replace("Ú","%DA",$word);
			$word = str_replace("Û","%DB",$word);
			$word = str_replace("Ü","%DC",$word);
			$word = str_replace("Ý","%DD",$word);
			$word = str_replace("Þ","%DE",$word);
			$word = str_replace("ß","%DF",$word);
			$word = str_replace("à","%E0",$word);
			$word = str_replace("á","%E1",$word);
			$word = str_replace("â","%E2",$word);
			$word = str_replace("ã","%E3",$word);
			$word = str_replace("ä","%E4",$word);
			$word = str_replace("å","%E5",$word);
			$word = str_replace("æ","%E6",$word);
			$word = str_replace("ç","%E7",$word);
			$word = str_replace("è","%E8",$word);
			$word = str_replace("é","%E9",$word);
			$word = str_replace("ê","%EA",$word);
			$word = str_replace("ë","%EB",$word);
			$word = str_replace("ì","%EC",$word);
			$word = str_replace("í","%ED",$word);
			$word = str_replace("î","%EE",$word);
			$word = str_replace("ï","%EF",$word);
			$word = str_replace("ð","%F0",$word);
			$word = str_replace("ñ","%F1",$word);
			$word = str_replace("ò","%F2",$word);
			$word = str_replace("ó","%F3",$word);
			$word = str_replace("ô","%F4",$word);
			$word = str_replace("õ","%F5",$word);
			$word = str_replace("ö","%F6",$word);
			$word = str_replace("÷","%F7",$word);
			$word = str_replace("ø","%F8",$word);
			$word = str_replace("ù","%F9",$word);
			$word = str_replace("ú","%FA",$word);
			$word = str_replace("û","%FB",$word);
			$word = str_replace("ü","%FC",$word);
			$word = str_replace("ý","%FD",$word);
			$word = str_replace("þ","%FE",$word);
			$word = str_replace("ÿ","%FF",$word);

			return urldecode($word);
		}
                 // En-tête
            function Header()
            {
                // Logo
                $this->Image('enteteMinistre.jpg',30,01,150);
                // Police Arial gras 15
                $this->SetFont('Arial','B',15);
                // Décalage à droite
                //$this->Cell(80);
                // Titre
                //$this->Cell(30,10,'Titre',1,0,'C');
                // Saut de ligne
                $this->Ln(60);
            }

            // Pied de page
            function Footer()
            {
                // Positionnement à 1,5 cm du bas
                $this->SetY(-17);
                // Police Arial italique 8
                $this->SetFont('Arial','I',10);
                // Numéro de page
                $this->Cell(0,20,'Complexe Universitaire Ibn Zohr.Quartier Dakhla,BP:20732-Agadir-Principale. Tél-Fax 0 5.28.22.50.41',0,0,'C');
                $this->ln(04);
                $this->Cell(0,20,'www.enaagadir.ac.ma',0,0,'C');
            }
            
            
            
            
            
            

	}


  



// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial','B',20);
$pdf->Cell(75);
$pdf->Cell(40,10,'Convocation');
$pdf->ln(10);
$pdf->Cell(15);
$pdf->SetFont('Arial','I',15);
$pdf->Cell(40,10,'Au concours d/accès à l/Ecole Nationale d/Architecture d/Agadir');


date_default_timezone_set('Africa/Casablanca');
$currentDateTime = date("d-m-Y H:i");


$servername = "localhost";
$username = "enaagadir_test";
$password = "99676857taha";

try {
  $conn = new PDO("mysql:host=$servername;dbname=enaagadir_liste", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

   if (isset($_GET["etudiantCIN"])) 
{

    
     $cin = $_GET["etudiantCIN"];
    
    $query0 = "INSERT INTO Date_impression (Cin, Date_Time)
              VALUES ('$cin', '$currentDateTime')";
	$result0 = $conn->prepare($query0);
	$result0->execute();
    
    $query = "select * from Concours_2024 where CIN = '$cin'";
	$result = $conn->prepare($query);
	$result->execute();
	
    if ($result->rowcount()!=0)
	{
		while ($etudiant = $result->fetch()) 
		{
		   
		    $pdf->ln(15);
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(15);
            $pdf->Cell(40,10,'NOM  :   '.$etudiant['NOM']);
            $pdf->Cell(60);
            $pdf->Cell(40,10,'PRENOM :   '.$etudiant['PRENOM']);
            $pdf->ln(07);
            $pdf->Cell(15);
            $pdf->Cell(40,10,'CIN   :    '.$etudiant['CIN']);
            $pdf->Cell(60);
            $pdf->Cell(40,10,'N° D/ÉXAMEN : '.$etudiant['Numero']);
            $pdf->ln(07);
            $pdf->Cell(15);
			$pdf->Cell(40,10,'CNE :    '.$etudiant['CNE']);
			$pdf->Cell(60);
			$pdf->Cell(40,10,'N° SALLE  : '.$etudiant['Numero_Salle']);
            $pdf->ln(10);
			$pdf->Cell(07);
			$pdf->SetFont('Arial','',13);
            $pdf->Cell(40,10,'Vous êtes invité(e) à vous présenter:');
			$pdf->Cell(34);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(40,10,' le Dimanche 28 Juillet 2024 à partir de 07:30 heure (Matin)');
			$pdf->ln(05);
			$pdf->Cell(07);
			$pdf->SetFont('Arial','',13);
			$pdf->Cell(40,10,'A l/adresse suivante:');
			$pdf->Cell(04);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(40,10,'Nouveau Complexe Universitaire Ibn Zohr. Quartier Dakhla. Agadir.');
			$pdf->ln(05);
			$pdf->Cell(25);
			$pdf->SetFont('Arial','',13);
			$pdf->Cell(40,10,'(A côté de la Faculté des Sciences Juridiques, Economiques et Sociales)');
			$pdf->ln(07);
			//$pdf->Cell(07);
			//$pdf->SetFont('Arial','I',11);
			//$pdf->Cell(40,10,'Le concours débutera à 9h00.');
			$pdf->Cell(25);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(40,10,'Tout accès au lieu du concours est formellement interdit au-delà de');
			$pdf->Cell(78);
			$pdf->SetFont('Arial','B',13);
			$pdf->Cell(40,10,'8h00mn.');
			$pdf->ln(07);
			$pdf->SetFont('Arial','B',13);
			$pdf->Cell(40,10,'Déroulement du concours');
			$pdf->ln(10);
			//$pdf->Cell(15);
			//$pdf->SetFont('Arial','B',15);
			//$pdf->Cell(40,10,'09h00min');
			$pdf->SetFont('Arial','I',15);
			$pdf->Cell(15);
			$pdf->Cell(40,10,'Epreuve 1: QCM                                                      Durée 50 minutes');
			$pdf->ln(07);
			//$pdf->Cell(15);
			//$pdf->SetFont('Arial','B',15);
			//$pdf->Cell(40,10,'10h10min');
			$pdf->SetFont('Arial','I',15);
			$pdf->Cell(15);
			$pdf->Cell(40,10,'Epreuve 2: Dessin et expression graphique            Durée 60 minutes');
			$pdf->ln(05);
			$pdf->Cell(15);
			$pdf->Cell(40,10,'                                                            ');
			$pdf->ln(10);
			$pdf->SetFont('Arial','B',13);
			$pdf->Cell(40,10,'Pièces à présenter obligatoirement le jour du concours:');
			$pdf->ln(07);
			$pdf->Cell(05);
			$pdf->SetFont('Arial','',13);
			$pdf->Cell(40,10,'- La présente convocation.');
			$pdf->ln(07);
			$pdf->Cell(05);
			$pdf->Cell(40,10,'- La carte nationale d/identité.');
			$pdf->ln(07);
			$pdf->Cell(05);
			$pdf->Cell(40,10,'- La pièce justifiant le paiment des frais de participation au concours d/accès à l/ENA Agadir.');
			$pdf->ln(07);
			$pdf->Cell(05);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(40,10,'Toute personne ne présentant pas ces pièces ne sera pas acceptée à passer le concours.');
			$pdf->ln(10);
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(40,10,'Consignes à respecter:');
			$pdf->ln(10);
			$pdf->Cell(05);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(40,10,'- Chaque candidat doit avoir comme fourniture uniquement:');
			$pdf->ln(05);
			$pdf->Cell(05);
			$pdf->Cell(40,10,'   stylo à bille bleu ou noir, crayon noir et gomme.');
			$pdf->ln(07);
			$pdf->Cell(05);
			$pdf->Cell(40,10,'- Aucun document n/est autorisé.');
            $pdf->ln(07);
			$pdf->Cell(05);
			$pdf->Cell(40,10,'- L/usage du téléphone portable et tout appareil électronique est formellement interdit à l/intérieur ');
			$pdf->ln(05);
			$pdf->Cell(05);
			$pdf->Cell(40,10,'  du lieu du concours.');
			$pdf->ln(05);
			$pdf->Cell(06);
			$pdf->SetFont('Arial','I',11);
			$pdf->Cell(40,10,'  (Tout candidat faisant usage de ces appareils sera exclu du concours).');
		//	$pdf->ln(07);
		//	$pdf->SetFont('Times','B',13);
		//	$pdf->Cell(40,10,'- Le port du masque est obligatoire');
		//	$pdf->Cell(30);
		//	$pdf->SetFont('Times','',13);
		//	$pdf->Cell(40,10,'ainsi que le respect des mesures sanitaires COVID 19');
		    date_default_timezone_set('Africa/Casablanca');
            $currentDateTime = date("d-m-Y H:i");
            
            $pdf->SetFont('Arial','B',11);
            $pdf->ln(10);
			$pdf->Cell(56);
			$pdf->Cell(40,10,'                        Cette convocation a été téléchargée le '.$currentDateTime);
			$pdf->ln(05);
			$pdf->Cell(06);
			$pdf->SetFont('Arial','B',11);
			
			// insert into Date_impression table the date of printed files
		
    $queri = $conn->prepare("INSERT INTO Date_impression (Cin, Date_Time)
    VALUES ('$cin', '$currentDateTime')");
 	$queri->execute();
           
		}
	}
	else
	{
        
	}
}






    $pdf->Output();
?>












   