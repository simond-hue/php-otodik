<!DOCTYPE html> 
<html>
<head>
	<style type="text/css">
		*{
			background-color:#222222;
			color:#FFFFFF;
		}
		input{
			background-color:#FFFFFF;
			color: #222222;
		}
	</style>
	<title>Ötödik óra</title>
	<meta charset="UTF-8">
</head>
<body>
	<form method="POST">
		Add meg a család neved: <br>
		<input type="text" name="inputCsaladNev"><br>
		Add meg az utóneved: <br>
		<input type="text" name="inputUtoNev"><br>
		Add meg a korod: <br>
		<input type="number" name="inputKor"><br>
		<input type="hidden" name="action" value="elso_feladat">
		<input type="submit" value="OK">
	</form>
	<?php
		if (isset($_POST["inputCsaladNev"]) and !empty($_POST["inputCsaladNev"]) and
			isset($_POST["inputUtoNev"]) and !empty($_POST["inputUtoNev"]) and
			isset($_POST["inputKor"]) and is_numeric($_POST["inputKor"])){
			if(isset($_POST["action"]) and $_POST["action"] == "elso_feladat"){
				$ember = new Ember($_POST["inputCsaladNev"], $_POST["inputUtoNev"], $_POST["inputKor"]);
				echo $ember->getNev() . ", " . $ember->getKor() . " éves vagy.";
			}
		}
	?>
</body>

<?php

class Ember{
	private $nev;
	private $kor;

	public function __construct($vezeteknev, $utonev, $kor){
		$this->nev = strtoupper(substr($vezeteknev, 0,1)) . substr($vezeteknev, 1) . " " . strtoupper(substr($utonev, 0,1)) . substr($utonev, 1);
		$this->kor = $kor;
	}

	public function getNev(){
		return $this->nev;
	}
	public function getKor(){
		return $this->kor;
	}
}

?>
</html>
<!--
1. feladat:
	Kérd be a családneved és utóneved és a korod!
	Írasd ki egyben ezeket az adatokat az alábbi minta alapján:
	"Gipsz Jakab, 18 éves vagy!"
	1.1. Üresen nem maradhat egyik beviteli mező sem!
	1.2. A kor mező nem lehet sem negatív, sem nulla!
	1.3. A neveket össze kell illeszteni egy változóba, úgy, hogy minden kezdőbetű legyen nagybetűs!

2. feladat:
	Kérj be egy legalább 25 karakterből álló szöveges változót, ami nem állhat több, mint 200 karakter!
	Ezután írasd ki úgy a szöveget, hogy minden szó kezdőbetűje nagybetűs legyen!
	Ezután Írsd ki azt is, hogy hány karakterből állt a bevitt érték!
	Számoltasd meg a szavak számát a mondatban!

3. feladat:
	Kérj be egy szöveges beviteli mezőbe egy közmondást!
	A beviteli mező nem maradhat üres!
	Ha mégis üres maradna, akkor figyelmeztesd a felhasználód a hibára!
	Írasd ki visszafelé!

4. feladat:
	Kérd be az életkorod egy form segítségével!
	A bevitt érték csak szám típusú lehet!
	Ha megfelelő az adat, akkor írasd ki, hogy dohányozhatsz-e, vagy sem!

5. feladat:
	Kérd be a neved és azt, hogy mennyi pénzed van éppen a pénztárcádban!
	A név és pénz mező nem maradhat üresen!
	Ha minden bevitt adat megfelelő,
	akkor szövegesen írasd ki, hogy a felhasználónak mennyi pénze van!
	Lehetőségek:
	 - ha nulla éppen a pénz mező, akkor "Peti, Te nullán állsz! (0 forint)"
	 - ha negatív a pénz mező, "Peti, neked adósságod van! (-1500 forint)"
	 - ha 1 és 5000 forint között van, akkor "Peti, neked csak zsebpénzed van! (3125 forint)"
	 - ha 5000 fölött van a pénz mező, akkor "Peti, Te nagyon jól állsz anyagilag! (XYZ forint)"
		
7. feladat:
	Készíts formot és annak feldolgozását, amely segítségével egy pizzát tudunk összeállítani!
	Használd az alábbi form input type-okat:
		text,
		radio,
		checkbox,
		number,
		select - option
	Készítsd el a feldolgozását!
	Alapértelmezetten az első opciók legyenek mindig kiválasztva!
	Üresen nem maradhat egy érték sem!
	Ha megfelelőek az adatok, akkor írasd ki azokat egy táblázat segítségével!
	Ha minden feladatrésszel megvagy, akkor az egész feladatot egészítsd ki bootstrap segítségével!
	Ha a bootstrap is elkészült, akkor egy kliens oldali validációt is készíts hozzá!
	Nehezítés: Ha valóban mindennel elkészültél és unatkoznál, 
		   akkor keresd meg az interneten hogyan kell csv fájlba írni és írd be az adatokat abba,
		   a már meglévő pizzákat írasd ki megfelelő bootstrap komponens segítségével!		-->