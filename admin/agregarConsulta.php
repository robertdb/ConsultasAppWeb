<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../src/director.php';
require_once '../src/administradorWeb.php';

$nombre= false;
$mail = false;
$tel = false;
$consulta = false;
          
if(empty(filter_input(INPUT_POST,'enviar')) ) 
{  
    $nombre = filter_input(INPUT_POST,'nombre');
    $telefono = filter_input(INPUT_POST,'telefono');
    $mail = filter_input(INPUT_POST,'mail');
    $consulta = nl2br(filter_input(INPUT_POST,'consulta'));
}
            
$director = new Director();
$admin = new AdministradorWeb();
$director->administrarSistema($admin);
$admin->agregarNuevaConsulta($nombre, $mail, $telefono, $consulta);
header("location:../index.php");


