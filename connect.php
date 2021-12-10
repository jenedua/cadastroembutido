<?php

$servidor =  "localhost";
$usuario =   "root";
$senha =     "";
$nomeBanco = "systemlogin";

//criar a conexao
$conn = mysqli_connect($servidor,$usuario,$senha,$nomeBanco);

if (!$conn) {
    die('Could not connect ...');
     //die(' connect success... ');

}

?>
