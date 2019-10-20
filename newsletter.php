<?php
// Skrypt pozwala na zapisanie się do newslettera, każdy mail zapisuje się w bazie w pliku .txt, aczkolwiek jest to 
//niebezpieczne rozwiązanie  ponieważ łatwo o "wyciek danych", zdecydowanie lepszym  rozwiązaniem jest bezpieczna baza MySQL.
//Jeżeli dodanie do newslettera przebiegło pomyślnie, automatycznie zostaje wysłana wiadomość email do nowego użytkownika


$newemail = $_POST['email'];
$title = "Newsletter";
$message = "Dziekujemy za dolaczenie do newsleetera";

$valid = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/'; // Sprawdzenie poprawności adresu email


 $oldemail = file_get_contents('baza.txt');

 $put = $newemail.PHP_EOL .$oldemail;

if ((preg_match($valid, $newemail)) == true) { // $valid - "wzór"  $newmail - element roboczy do sprawdzenia
echo 'Dodano do newslettera' ;
file_put_contents('baza.txt',$put);
mail($newemail,$title,$message);
} else {
	echo 'Nieprawidlowy adres email' ;
}





?>