<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../src/administradorLogin.php';
require_once '../src/director.php';

$director = new Director();
$adminLogin = new AdministradorLogin();
$director->administrarSistema($adminLogin);

if ($adminLogin->iniciarSesion() == False){
    echo 'Error de inicio de session';
}
echo $_SESSION['idAdminWeb'];

if(!isset($_SESSION['idAdminWeb']))
{
   
   if(isset($_POST['login']))
    {
    if($adminLogin->verificarLogin($_POST['usuario'],$_POST['password']) == True)
        {
            $_SESSION['idAdminWeb'] = $adminLogin->getIdAdminWeb();
            $_SESSION['usuario'] = $_POST['usuario'];
            header("location:index.php");
        }
        else
        {
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
            header("location:login.php");
        }
    }
}
