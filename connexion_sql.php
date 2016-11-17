<?php
try{
    $bdd = new  PDO('mysql:host=localhost;dbname=generate;charset=utf8','root','martyna21');
}
catch(Exception $e){
    die('Erreur' . $e->getMessage());
}